<?php

namespace App\Http\Controllers\Admin\Mapel;

use App\Exports\MapelExport;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sekolahId = auth('admin')->user()->sekolah_id;

        $mapels = Mapel::with('guru')
            ->where('sekolah_id', $sekolahId)
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('kode_mapel', 'like', "%{$search}%")
                        ->orWhere('nama_mapel', 'like', "%{$search}%");
                });
            })->paginate(10);

        return view('admin.mata-pelajaran.index', compact('mapels', 'search'));
    }

    public function create()
    {
        $sekolahId = auth('admin')->user()->sekolah_id;
        $gurus = Guru::where('sekolah_id', $sekolahId)->get();

        return view('admin.mata-pelajaran.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sekolah_id' => 'required|exists:sekolahs,id',
            'kode_mapel' => 'required|string|max:255|unique:mapels,kode_mapel',
            'nama_mapel' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
            'guru_id' => 'required|array',
            'guru_id.*' => 'exists:gurus,id',
        ]);

        $mapel = Mapel::create([
            'sekolah_id' => $request->sekolah_id,
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'deskripsi' => $request->deskripsi,
        ]);

        $mapel->guru()->sync($request->guru_id);

        return redirect('admin/mata-pelajaran')->with('success', 'Mata Pelajaran berhasil ditambahkan.');
    }

    public function export()
    {
        return Excel::download(new MapelExport(), 'mapel.xlsx');
    }

    public function edit(string $id)
    {
        $sekolahId = auth('admin')->user()->sekolah_id;
        $mapel = Mapel::with(['gurus'])->where('sekolah_id', $sekolahId)->findOrFail($id);
        $gurus = Guru::where('sekolah_id', $sekolahId)->get();

        $selectedGurus = $mapel->guru->pluck('id')->toArray();

        return view('admin.mata-pelajaran.edit', compact('mapel', 'gurus', 'selectedGurus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sekolah_id' => 'required|exists:sekolahs,id',
            'kode_mapel' => 'required|string|max:255|unique:mapels,kode_mapel,' . $id,
            'nama_mapel' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
            'guru_id' => 'required|array',
            'guru_id.*' => 'exists:gurus,id',
        ]);

        $mapel = Mapel::findOrFail($id);

        $mapel->update([
            'sekolah_id' => $request->sekolah_id,
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'deskripsi' => $request->deskripsi,
        ]);

        $mapel->guru()->sync($request->guru_id);

        return redirect('admin/mata-pelajaran')->with('success', 'Data mata pelajaran berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->guru()->detach(); // Detach all related gurus
        $mapel->delete();

        return redirect('admin/mata-pelajaran')->with('success', 'Data mata pelajaran berhasil dihapus!');
    }
}
