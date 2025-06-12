<?php

namespace App\Http\Controllers\Admin\Kelas;

use App\Exports\KelasExport;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('wali_kelas')->paginate(10);
        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        $gurus = Guru::all();
        return view('admin.kelas.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas'=> 'required|string|max:255',
            'wali_kelas_id'=> 'required|exists:gurus,id',
            'tingkat'=> 'required|in:X,XI,XII',
            'jurusan'=> 'required|in:IPA,IPS',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas_id' => $request->wali_kelas_id,
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
            'wali_kelas_id'=> 'required|exists:gurus,id',
            'tingkat'=> 'required|in:X,XI,XII',
            'jurusan'=> 'required|in:IPA,IPS',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update([
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
