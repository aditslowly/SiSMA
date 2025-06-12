<?php

namespace App\Http\Controllers\Admin\TahunAjar;

use App\Http\Controllers\Controller;
use App\Models\TahunAjar;
use Illuminate\Http\Request;

class TahunAjarController extends Controller
{
    public function index(Request $request)
    {

    $query = TahunAjar::where('sekolah_id', auth('admin')->user()->asal_sekolah_id);
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
        $validated = $request->validate([
            'sekolah_id' => 'required|exists:sekolahs,id',
            'tahun_ajar' => 'required|string|max:255',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        TahunAjar::create($validated);

        return redirect('admin/tahun-ajar')->with('success', 'Tahun ajar berhasil ditambahkan.');
    }

    public function show()
    {
        return view('admin.tahun-ajar.detail');
    }

    public function edit()
    {
        return view('admin.tahun-ajar.edit');
    }

    public function update(Request $request)
    {
        
    }
}
