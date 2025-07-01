<?php

namespace App\Http\Controllers\Admin\TahunAjar;

use App\Http\Controllers\Controller;
use App\Models\TahunAjar;
use Illuminate\Http\Request;

class TahunAjarController extends Controller
{
    public function index(Request $request)
    {
        $query = TahunAjar::where('sekolah_id', auth('admin')->user()->sekolah_id);
        if ($request->has('q') && $request->q != '') {
            $query->where('tahun_ajar', 'like', '%' . $request->q . '%');
        }
        $tahunAjar = $query->paginate(10);
        return view('admin.tahun-ajar.index', compact('tahunAjar'));
    }


    public function create()
    {
        return view('admin.tahun-ajar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sekolah_id' => 'required|exists:sekolahs,id',
            'tahun_ajar' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'dokumen' => 'required|mimes:pdf|max:4096',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $file = $request->file('dokumen');
        $fileName = 'tahun-ajar_' .  time() . '.' . $file->getClientOriginalExtension();
        $pathFile = realpath(base_path('../public/app')) . '/data-dokumen';
        $file->move($pathFile, $fileName);

        $validated = [
            'sekolah_id' => $request->input('sekolah_id'),
            'tahun_ajar' => $request->input('tahun_ajar'),
            'deskripsi' => $request->input('deskripsi'),
            'dokumen' => $fileName,
            'status' => $request->input('status')
        ];

        TahunAjar::create($validated);

        return redirect('admin/tahun-ajar')->with('success', 'Tahun ajar berhasil ditambahkan.');
    }

    public function show($id)
    {
        $tahunAjar = TahunAjar::findOrFail($id);
        return view('admin.tahun-ajar.detail', compact('tahunAjar'));
    }

    public function edit($id)
    {
        $tahunAjar = TahunAjar::findOrFail($id);
        return view('admin.tahun-ajar.edit', compact('tahunAjar'));
    }

    public function update(Request $request, string $id)
    {
        $tahunAjar = TahunAjar::findOrFail($id);
        $request->validate([
            'sekolah_id' => 'required|exists:sekolahs,id',
            'tahun_ajar' => 'required|string',
            'deskripsi' => 'nullable|string',
            'dokumen' => 'nullable|mimes:pdf|max:4096',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $targetPath = realpath(base_path('../public/app')) . '/data-dokumen';

        $validateData = [
            'sekolah_id' => $request->input('sekolah_id'),
            'tahun_ajar' => $request->input('tahun_ajar'),
            'deskripsi' => $request->input('deskripsi'),
            'status' => $request->input('status'),
        ];

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = 'tahun-ajar_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($targetPath, $fileName);

            if ($tahunAjar->dokumen && file_exists($targetPath . '/data-dokumen' . $tahunAjar->dokumen)) {
                unlink($targetPath . '/data-dokumen' . $tahunAjar->dokumen);
            }

            $validateData['dokumen'] = $fileName;
        }

        $tahunAjar->update($validateData);

        return redirect('admin/tahun-ajar')->with('success', 'Data Berasil Diubah');
    }

    public function destroy(string $id)
    {
        $tahunAjar = TahunAjar::findOrFail($id);
        $filePath = realpath(base_path('../public/app')) . '/data-dokumen';
        if ($tahunAjar->dokumen && file_exists($filePath . '/data-dokumen'. $tahunAjar->dokumen)) {
            unlink($filePath . '/data-dokumen' . $tahunAjar->dokumen);
        }
    }
}
