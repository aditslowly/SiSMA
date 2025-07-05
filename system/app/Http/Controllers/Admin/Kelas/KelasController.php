<?php

namespace App\Http\Controllers\Admin\Kelas;

use App\Exports\KelasExport;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\PivotGuru;
use App\Models\PivotKelas;
use App\Models\PivotMapel;
use App\Models\PivotSiswa;
use App\Models\Siswa;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $sekolahId = auth('admin')->user()->sekolah_id;

        $kelas = Kelas::with(['pivot_guru.guru', 'pivot_guru.tahun_ajar'])
            ->where('sekolah_id', $sekolahId)
            ->paginate(10);

        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        $sekolahId = auth('admin')->user()->sekolah_id;

        $pivotGuru = PivotGuru::whereHas(
            'guru',
            fn($q) =>
            $q->where('sekolah_id', $sekolahId)
        )->get();
        $siswas = Siswa::where('sekolah_id', $sekolahId)->get();
        $mapels = Mapel::where('sekolah_id', $sekolahId)->get();

        return view('admin.kelas.create', compact('pivotGuru', 'siswas', 'mapels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sekolah_id' => 'required|exists:sekolahs,id',
            'nama_kelas' => 'required|string|max:255',
            'tingkat' => 'required|in:X,XI,XII',
            'jurusan' => 'required|in:IPA,IPS',
            'pivot_guru_id' => 'required|array',
            'pivot_guru_id.*' => 'exists:pivots_gurus,id',
            'siswa_id' => 'required|array',
            'siswa_id.*' => 'exists:siswas,id',
            'mapel_id' => 'required|array',
            'mapel_id.*' => 'exists:mapels,id',
        ]);

        $pivotGuruIds = is_array($request->pivot_guru_id) ? $request->pivot_guru_id : explode(',', $request->pivot_guru_id);

        $kelas = Kelas::create([
            'sekolah_id' => $request->sekolah_id,
            'nama_kelas' => $request->nama_kelas,
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
        ]);


        foreach ($pivotGuruIds as $pivotGuruId) {
            $pivotKelas = PivotKelas::create([
                'pivot_guru_id' => $pivotGuruId,
                'kelas_id' => $kelas->id,
            ]);

            $siswaIds = is_array($request->siswa_id) ? $request->siswa_id : [];

            foreach ($siswaIds as $siswaId) {
                PivotSiswa::create([
                    'pivot_kelas_id' => $pivotKelas->id,
                    'siswa_id' => $siswaId,
                ]);
            }

            $mapelIds = is_array($request->mapel_id) ? $request->mapel_id : [];

            foreach ($mapelIds as $mapelId) {
                PivotMapel::create([
                    'pivot_kelas_id' => $pivotKelas->id,
                    'mapel_id' => $mapelId,
                ]);
            }
        }


        return redirect('admin/kelas')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function export()
    {
        return Excel::download(new KelasExport, 'data-kelas.xlsx');
    }

    public function show($id)
    {
        $sekolahId = auth('admin')->user()->sekolah_id;
        $kelas = Kelas::with([
            'pivot_guru.guru',
            'pivot_guru.tahun_ajar',
        ])
            ->where('id', $id)
            ->where('sekolah_id', $sekolahId)
            ->firstOrFail();

        $siswaList = collect();

        foreach ($kelas->pivot_guru as $pivotGuru) {
            foreach ($pivotGuru->pivot_kelas as $pivotKelas) {
                if ($pivotKelas->kelas_id === $kelas->id) {
                    $siswaList = $siswaList->merge($pivotKelas->siswa);
                }
            }
        }

        return view('admin.kelas.detail', compact('kelas', 'siswaList'));
    }

    public function edit($id)
    {
        $sekolahId = auth('admin')->user()->sekolah_id;
        $kelas = Kelas::with([
            'pivot_guru.guru',
            'pivot_guru.tahun_ajar'
        ])->findOrFail($id);

        $pivotGuru = PivotGuru::whereHas(
            'guru',
            fn($q) =>
            $q->where('sekolah_id', $sekolahId)
        )->get();

        $siswas = Siswa::where('sekolah_id', $sekolahId)->get();
        $mapels = Mapel::where('sekolah_id', $sekolahId)->get();

        $selectedPivotGuruIds = $kelas->pivot_guru->pluck('id')->toArray();

        $pivotKelasIds = $kelas->pivot_guru->flatMap(function ($pg) {
            return $pg->pivot_kelas->pluck('id');
        });

        $selectedSiswaIds = PivotSiswa::whereIn('pivot_kelas_id', $pivotKelasIds)->pluck('siswa_id')->toArray();
        $selectedMapelIds = PivotMapel::whereIn('pivot_kelas_id', $pivotKelasIds)->pluck('mapel_id')->toArray();

        return view('admin.kelas.edit', compact('kelas', 'pivotGuru', 'siswas', 'mapels', 'selectedPivotGuruIds', 'selectedSiswaIds', 'selectedMapelIds'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'sekolah_id' => 'required|exists:sekolahs,id',
            'tingkat' => 'required|in:X,XI,XII',
            'jurusan' => 'required|in:IPA,IPS',
            'pivot_guru_id' => 'required|array',
            'pivot_guru_id.*' => 'exists:pivots_gurus,id',
            'siswa_id' => 'required|array',
            'siswa_id.*' => 'exists:siswas,id',
            'mapel_id' => 'required|array',
            'mapel_id.*' => 'exists:mapels,id',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'sekolah_id' => $request->sekolah_id,
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas_id' => $request->wali_kelas_id,
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
        ]);

        PivotKelas::where('kelas_id', $kelas->id)->delete();

        foreach ($request->pivot_guru_id as $pivotGuruId) {
            $pivotKelas = PivotKelas::create([
                'pivot_guru_id' => $pivotGuruId,
                'kelas_id' => $kelas->id,
            ]);

            foreach ($request->siswa_id as $siswaId) {
                PivotSiswa::create([
                    'pivot_kelas_id' => $pivotKelas->id,
                    'siswa_id' => $siswaId,
                ]);
            }

            foreach ($request->mapel_id as $mapelId) {
                PivotMapel::create([
                    'pivot_kelas_id' => $pivotKelas->id,
                    'mapel_id' => $mapelId,
                ]);
            }
        }

        return redirect('admin/kelas')->with('success', 'Kelas berhasil diperbaharui.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect('admin/kelas')->with('success', 'Kelas berhasil dihapus');
    }
}
