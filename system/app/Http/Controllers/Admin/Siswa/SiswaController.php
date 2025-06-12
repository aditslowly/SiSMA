<?php

namespace App\Http\Controllers\Admin\Siswa;

use App\Exports\SiswaExport;
use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        $siswa = Siswa::when($search, function ($query, $search) {
            return $query
                ->where('nisn', 'like', '%' . $search . '%')
                ->orWhere('username', 'like', '%' . $search . '%');
        })->paginate(10);


        return view('admin.data-siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('admin.data-siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|integer',
            'nis' => 'required|integer',
            'nama_siswa' => 'required|string|max:225',
            'kelas' => 'required|string',
            'jenis_pendaftaran' => 'required|string|in:Peserta Didik Baru,Pindahan',
            'jalur_pendaftaran' => 'required|string|in:Zonasi,Afirmasi,Perpindahan Orang Tua,Prestasi,Mandiri',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|string|in:Aktif,Tidak Aktif',
            'kebutuhan_khusus' => 'required|string|in:Iya,Tidak',
            'email' => 'required|email|max:225',
            'no_kk' => 'required|string|max:225',
            'nik' => 'required|string|max:225  ',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'agama' => 'required|string|in:Islam,Katolik,Protestan,Hindu,Buddha,Khonghucu',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'rt' => 'required|integer',
            'rw' => 'required|integer',
            'dusun' => 'required|string',
            'desa_kelurahan' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'telepon' => 'required|string',
            'password' => 'required|min:6',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:4096',

        ]);

        $validateData = $request->only([
            'nisn',
            'nis',
            'kelas',
            'nama_siswa',
            'jenis_pendaftaran',
            'jalur_pendaftaran',
            'tanggal_masuk',
            'status',
            'kebutuhan_khusus',
            'email',
            'no_kk',
            'nik',
            'jenis_kelamin',
            'agama',
            'tanggal_lahir',
            'alamat',
            'rt',
            'rw',
            'dusun',
            'desa_kelurahan',
            'provinsi',
            'kabupaten',
            'kecamatan',
            'telepon',
            'password',
            'foto',
        ]);

        $targetPath = realpath(base_path('../public/app')) . '/foto-siswa';

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoFilename = 'foto-siswa-' . time() . '.' . $foto->getClientOriginalExtension();
            $foto->move($targetPath, $fotoFilename);
            $validateData['foto'] = $fotoFilename;
        }

        Siswa::create($validateData);

        return redirect('admin/siswa')->with('success', 'Data Siswa berhasil ditambahkan.');
    }

    public function import(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        foreach ($rows as $index => $row) {
            if ($index == 0) continue;
            $data = array_slice($row, 1);

            // Validasi jenis kelamin
            if (isset($row[12]) ){
                if (strtolower(trim($row[12])) == 'laki-laki') {
                    $jenis_kelamin = 'Laki-Laki';
                } elseif (strtolower(trim($row[12])) == 'perempuan') {
                    $jenis_kelamin = 'Perempuan';
                } else {
                    $jenis_kelamin = null;
                }
            }

            $siswa = Siswa::create([
                'nisn' => $row[0],
                'nis' => $row[1],
                'nama_siswa' => $row[2],
                'kelas' => isset($row[3]) && !empty($row[3]) ? $row[3] : null,
                'jalur_pendaftaran' => in_array($row[4], ['Zonasi', 'Afirmasi', 'Perpindahan Orang Tua', 'Prestasi', 'Mandiri']) ? $row[4] : 'Zonasi',
                'jenis_pendaftaran' => $row[5] == 'Peserta Didik Baru' ? 'Peserta Didik Baru' : 'Pindahan',
                'tanggal_masuk' => $row[6],
                'status' => $row[7] == 'Aktif' ? 'Aktif' : 'Tidak Aktif',
                'kebutuhan_khusus' => $row[8] == 'Iya' ? 'Iya' : 'Tidak',
                'email' => $row[9],
                'no_kk' => $row[10],
                'nik' => $row[11],
                'jenis_kelamin' => $jenis_kelamin,
                'agama' => in_array($row[13], ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']) ? $row[13] : 'Islam',
                'tanggal_lahir' => $row[14],
                'tempat_lahir' => $row[15],
                'alamat' => $row[16],
                'rt' => $row[17],
                'rw' => $row[18],
                'dusun' => $row[19],
                'desa_kelurahan' => $row[20],
                'provinsi' => $row[21],
                'kabupaten' => $row[22],
                'kecamatan' => $row[23],
                'telepon' => $row[24],
                'password' => isset($row[25]) ? bcrypt($row[25]) : null,
                'foto' => isset($row[26]) && !empty($row[26]) ? $row[26] : 'belum ada foto',
            ]);
        }


        return redirect('admin/siswa')->with('success', 'Data siswa berhasil diimport!');
    }

    public function export()
    {
        return Excel::download(new SiswaExport, 'data-siswa.xlsx');
    }

    public function show(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('admin.data-siswa.detail', compact('siswa'));
    }

    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('admin.data-siswa.edit', compact('siswa'));
    }

    public function update(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nisn' => 'required|integer',
            'nis' => 'required|integer',
            'nama_siswa' => 'required|string|max:225',
            'jenis_pendaftaran' => 'required|string|in:Peserta Didik Baru,Pindahan',
            'jalur_pendaftaran' => 'required|string|in:Zonasi,Afirmasi,Perpindahan Orang Tua,Prestasi,Mandiri',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|string|in:Aktif,Tidak Aktif',
            'kebutuhan_khusus' => 'required|string|in:Iya,Tidak',
            'email' => 'required|email|max:225',
            'no_kk' => 'required|string',
            'nik' => 'required|string',
            'jenis_kelamin' => 'required|string|in:Laki-Laki,Perempuan',
            'agama' => 'required|string|in:Islam,Katolik,Kristen,Hindu,Buddha,Khonghucu',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'rt' => 'required|integer',
            'rw' => 'required|integer',
            'dusun' => 'required|string',
            'desa_kelurahan' => 'required|string',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'telepon' => 'required|string',
            'password' => 'nullable|min:6',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:4096',

        ]);

        $targetPath = realpath(base_path('../public/app')) . '/data-siswa';

        $validateData = $request->only([
            'nisn',
            'nis',
            'nama_siswa',
            'jenis_pendaftaran',
            'jalur_pendaftaran',
            'tanggal_masuk',
            'status',
            'kebutuhan_khusus',
            'email',
            'no_kk',
            'nik',
            'jenis_kelamin',
            'agama',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'rt',
            'rw',
            'dusun',
            'desa_kelurahan',
            'provinsi',
            'kabupaten',
            'kecamatan',
            'telepon',
        ]);

        if ($request->filled('password')) {
            $validateData['password'] = bcrypt($request->input('password'));
        }

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoFilename = 'foto-siswa-' . time() . '.' . $foto->getClientOriginalExtension();
            $foto->move($targetPath, $fotoFilename);

            if ($siswa->foto && file_exists($targetPath . '/' . $siswa->foto)) {
                unlink($targetPath . '/' . $siswa->foto);
            }

            $validateData['foto'] = $fotoFilename;
        }

        $siswa->update($validateData);

        return redirect('admin/siswa')->with('success', 'Data Siswa berhasil diupdate.');
    }



    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        if ($siswa->foto && Storage::exists('public/app/foto-siswa/' . $siswa->foto)) {
            Storage::delete('public/app/foto-siswa/' . $siswa->foto);
        }
        $siswa->delete();
        return redirect('admin/siswa')->with('success', 'Data siswa berhasil dihapus.');
    }
}
