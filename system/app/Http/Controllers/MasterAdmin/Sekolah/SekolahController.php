<?php

namespace App\Http\Controllers\MasterAdmin\Sekolah;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $sekolahs = Sekolah::when($search, function ($query, $search) {
            return $query
                ->where('nama_sekolah', 'like', '%' . $search . '%')
                ->orWhere('npsn', 'like', '%' . $search . '%')
                ->orWhere('alamat_lengkap', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('master-admin.data-sekolah.index', compact('sekolahs'));
    }

    public function create()
    {
        return view('master-admin.data-sekolah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'npsn' => 'required|string|max:20',
            'akreditasi' => 'required|string|in:A,B,C,Belum Terakreditasi',
            'kurikulum' => 'required|string|in:Kurikulum K-13,Kurikulum Merdeka,Kurikulum KTSP,Lainnya',
            'kepala_sekolah' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'status_sekolah' => 'required|string|in:Negeri,Swasta',
            'kepemilikan_sekolah' => 'required|in:Pemerintah Daerah,Yayasan',
            'status_aktif' => 'required|string|in:Aktif,Tidak Aktif',
            'tahun_berdiri' => 'required|integer|min:1900|max:' . date('Y'),
            'jumlah_guru' => 'required|integer|min:0',
            'jumlah_siswa' => 'required|integer|min:0',
            'ruang_kelas' => 'required|integer|min:0',
            'ruang_perpustakaan' => 'required|integer|min:0',
            'ruang_lab' => 'required|integer|min:0',
            'ruang_pimpinan' => 'required|integer|min:0',
            'ruang_guru' => 'required|integer|min:0',
            'tempat_ibadah' => 'required|integer|min:0',
            'ruang_uks' => 'required|integer|min:0',
            'toilet' => 'required|integer|min:0',
            'ruang_tata_usaha' => 'required|integer|min:0',
            'ruang_konseling' => 'required|integer|min:0',
            'logo_sekolah' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'foto_sekolah' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $validateData = $request->only([
            'nama_sekolah',
            'npsn',
            'akreditasi',
            'kurikulum',
            'kepala_sekolah',
            'alamat_lengkap',
            'email',
            'telepon',
            'status_sekolah',
            'kepemilikan_sekolah',
            'status_aktif',
            'tahun_berdiri',
            'jumlah_guru',
            'jumlah_siswa',
            'ruang_kelas',
            'ruang_perpustakaan',
            'ruang_lab',
            'ruang_pimpinan',
            'ruang_guru',
            'tempat_ibadah',
            'ruang_uks',
            'toilet',
            'ruang_tata_usaha',
            'ruang_konseling'
        ]);

        $targetPath = realpath(base_path('../public/app')) . '/data-sekolah';

        if ($request->hasFile('logo_sekolah')) {
            $logo_sekolah = $request->file('logo_sekolah');
            $logoFilename = 'logo-' .time() . '.' . $logo_sekolah->getClientOriginalExtension();
            $logo_sekolah->move($targetPath, $logoFilename);
            $validateData['logo_sekolah'] = $logoFilename;
        }

        if ($request->hasFile('foto_sekolah')) {
            $foto_sekolah = $request->file('foto_sekolah');
            $fotoFilename = 'foto-' . time() . '.' . $foto_sekolah->getClientOriginalExtension();
            $foto_sekolah->move($targetPath, $fotoFilename);
            $validateData['foto_sekolah'] = $fotoFilename;
        }

        Sekolah::create($validateData);

        return redirect('master-admin/data-sekolah')->with('success', 'Data sekolah berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $sekolah = Sekolah::findOrFail($id);
        return view('master-admin.data-sekolah.detail', compact('sekolah'));
    }

    public function edit(string $id)
    {
        $sekolah = Sekolah::findOrFail($id);
        return view('master-admin.data-sekolah.edit', compact('sekolah'));
    }

    public function update(Request $request, string $id)
    {
        $sekolah = Sekolah::findOrFail($id);

        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'npsn' => 'required|string|max:20',
            'akreditasi' => 'required|string|in:A,B,C,Belum Terakreditasi',
            'kurikulum' => 'required|string|in:Kurikulum K-13,Kurikulum Merdeka,Kurikulum KTSP,Lainnya',
            'kepala_sekolah' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'status_sekolah' => 'required|in:Negeri,Swasta',
            'kepemilikan_sekolah' => 'required|in:Pemerintah Daerah,Yayasan',
            'status_aktif' => 'required|string|in:Aktif,Tidak Aktif',
            'tahun_berdiri' => 'required|integer|min:1900|max:' . date('Y'),
            'jumlah_guru' => 'required|integer|min:0',
            'jumlah_siswa' => 'required|integer|min:0',
            'ruang_kelas' => 'required|integer|min:0',
            'ruang_perpustakaan' => 'required|integer|min:0',
            'ruang_lab' => 'required|integer|min:0',
            'ruang_pimpinan' => 'required|integer|min:0',
            'ruang_guru' => 'required|integer|min:0',
            'tempat_ibadah' => 'required|integer|min:0',
            'ruang_uks' => 'required|integer|min:0',
            'toilet' => 'required|integer|min:0',
            'ruang_tata_usaha' => 'required|integer|min:0',
            'ruang_konseling' => 'required|integer|min:0',
            'logo_sekolah' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'foto_sekolah' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $validateData = $request->only([
            'nama_sekolah',
            'npsn',
            'akreditasi',
            'kurikulum',
            'kepala_sekolah',
            'alamat_lengkap',
            'email',
            'telepon',
            'status_sekolah',
            'kepemilikan_sekolah',
            'status_aktif',
            'tahun_berdiri',
            'jumlah_guru',
            'jumlah_siswa',
            'ruang_kelas',
            'ruang_perpustakaan',
            'ruang_lab',
            'ruang_pimpinan',
            'ruang_guru',
            'tempat_ibadah',
            'ruang_uks',
            'toilet',
            'ruang_tata_usaha',
            'ruang_konseling'
        ]);

        $targetPath = realpath(base_path('../public/app')) . '/data-sekolah';

        if ($request->hasFile('logo_sekolah')) {
            $logo = $request->file('logo_sekolah');
            $logoFilename = 'logo-' . time() . '.' . $logo->getClientOriginalExtension();
            $logo->move($targetPath, $logoFilename);

            if ($sekolah->logo && file_exists($targetPath . '/' . $sekolah->logo)) {
                unlink($targetPath . '/' . $sekolah->logo);
            }

            $validateData['logo_sekolah'] = $logoFilename;
        }

        if ($request->hasFile('foto_sekolah')) {
            $foto = $request->file('foto_sekolah');
            $fotoFilename = 'foto-' . time() . '.' . $foto->getClientOriginalExtension();
            $foto->move($targetPath, $fotoFilename);

            if ($sekolah->foto && file_exists($targetPath . '/' . $sekolah->foto)) {
                unlink($targetPath . '/' . $sekolah->foto);
            }

            $validateData['foto_sekolah'] = $fotoFilename;
        }

        $sekolah->update($validateData);

        return redirect('master-admin/data-sekolah')->with('success', 'Data sekolah berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $sekolah = Sekolah::findOrFail($id);

        $targetPath = realpath(base_path('../public')) . '/app';

        if ($sekolah->logo && file_exists($targetPath . '/' . $sekolah->logo)) {
            unlink($targetPath . '/' . $sekolah->logo);
        }

        if ($sekolah->foto && file_exists($targetPath . '/' . $sekolah->foto)) {
            unlink($targetPath . '/' . $sekolah->foto);
        }

        $sekolah->delete();

        return redirect()->back()->with('success', 'Data sekolah berhasil dihapus.');
    }
}
