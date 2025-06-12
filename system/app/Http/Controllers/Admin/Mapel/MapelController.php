<?php

namespace App\Http\Controllers\Admin\Mapel;

use App\Exports\MapelExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $mapels = Mapel::with('gurus')
            ->when($search, function ($query, $search) {
                return $query
                    ->where('kode_mapel', 'like', '%' . $search . '%')
                    ->orWhere('nama_mapel', 'like', '%' . $search . '%')
                    ->orWhereHas('guru', function ($q) use ($search) {
                        $q->where('username', 'like', '%' . $search . '%');
                    });
            })->paginate(10);
        return view('admin.mata-pelajaran.index', compact('mapels', 'search'));
    }

    public function create()
    {
        $gurus = Guru::all();
        return view('admin.mata-pelajaran.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mapel' => 'required|string|max:255|unique:mapels,kode_mapel',
            'nama_mapel' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
            'guru_id' => 'required|exists:gurus,id',
        ]);

        Mapel::create([
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'deskripsi' => $request->deskripsi,
            'guru_id' => $request->guru_id,
        ]);

        return redirect('admin/mata-pelajaran')->with('success', 'Mata Pelajaran berhasil ditambahkan.');
    }

    public function export()
    {
        return Excel::download(new MapelExport(), 'mapel.xlsx');
    }

    public function show(string $id)
    {
        $mapel = Mapel::with('guru')->findOrFail($id);
        return view('admin.mata-pelajaran.show', compact('mapel'));
    }

    public function edit(string $id)
    {
        $mapel = Mapel::with('gurus')->findOrFail($id);
        $gurus = Guru::all();
        return view('admin.mata-pelajaran.edit', compact('mapel', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_mapel' => 'required|string|max:255|unique:mapels,kode_mapel,' . $id,
            'nama_mapel' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
            'guru_id' => 'required|exists:gurus,id',
        ]);

        $mapel = Mapel::findOrFail($id);

        $mapel->update([
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'deskripsi' => $request->deskripsi,
            'guru_id' => $request->guru_id,
        ]);

        return redirect('admin/mata-pelajaran')->with('success', 'Data mata pelajaran berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect('admin/mata-pelajaran')->with('success', 'Data mata pelajaran berhasil dihapus!');
    }
}
