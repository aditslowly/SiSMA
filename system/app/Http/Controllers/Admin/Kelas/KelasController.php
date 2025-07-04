<?php

namespace App\Http\Controllers\Admin\Kelas;

use App\Exports\KelasExport;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunAjar;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $sekolahId = auth('admin')->user()->sekolah_id;

        $kelas = Kelas::with(['wali_kelas', 'tahun_ajar', 'siswa'])
            ->where('sekolah_id', $sekolahId)
            ->paginate(10);

        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        $sekolahId = auth('admin')->user()->sekolah_id;
        $gurus = Guru::where('sekolah_id', $sekolahId)->get();
        $tahun_ajar = TahunAjar::where('sekolah_id', $sekolahId)->get();
        $siswas = Siswa::where('sekolah_id', $sekolahId)->get();

        return view('admin.kelas.create', compact('gurus', 'tahun_ajar', 'siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sekolah_id' => 'required|exists:sekolahs,id',
            'nama_kelas'=> 'required|string|max:255',
            'wali_kelas_id'=> 'required|exists:gurus,id',
            'siswa_id' => 'required|exists:siswas,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
            'tingkat'=> 'required|in:X,XI,XII',
            'jurusan'=> 'required|in:IPA,IPS',
        ]);

        Kelas::create([
            'sekolah_id' => $request->sekolah_id,
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas_id' => $request->wali_kelas_id,
            'tahun_ajar_id' => $request->tahun_ajar_id,
            'siswa_id' => $request->siswa_id,
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
        ]);


        return redirect('admin/kelas')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function export()
    {
        return Excel::download(new KelasExport, 'data-kelas.xlsx');
    }

    public function edit($id)
    {
        $kelas = Kelas::with('wali_kelas')->findOrFail($id);
        $gurus = Guru::all();
        return view('admin.kelas.edit', compact('kelas', 'gurus'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nama_kelas'=> 'required|string|max:255',
            'sekolah_id' => 'required|exists:sekolahs,id',
            'wali_kelas_id'=> 'required|exists:gurus,id',
            'tingkat'=> 'required|in:X,XI,XII',
            'jurusan'=> 'required|in:IPA,IPS',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'sekolah_id' => $request->sekolah_id,
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas_id' => $request->wali_kelas_id,
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
        ]);

        return redirect('admin/kelas')->with('success', 'Kelas berhasil diperbaharui.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect('admin/kelas')->with('success', 'Kelas berhasil dihapus');
    }
}
