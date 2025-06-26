<?php

namespace App\Http\Controllers\Admin\Siswa;

use App\Exports\SiswaExport;
use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class SiswaController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        $sekolahId = auth('admin')->user()->sekolah_id;

        $siswa = Siswa::where('sekolah_id', $sekolahId)
            ->when($search, function ($query, $search) {
                return $query
                    ->where(function ($q) use ($search) {
                        $q->where('nisn', 'like', '%' . $search . '%')
                            ->orWhere('nis', 'like', '%' . $search . '%')
                            ->orWhere('nama_siswa', 'like', '%'. $search . '%');
                    });
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
            'sekolah_id' => 'required|exists:sekolahs,id',
            'nisn' => 'required|string',
            'nis' => 'required|string',
            'nama_siswa' => 'required|string|max:225',
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
            'rt' => 'required|string',
            'rw' => 'required|string',
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
            'sekolah_id',
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
            'tanggal_lahir',
            'tempat_lahir',
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

    private function formatTanggal($value) {
        if (is_numeric($value)) {
            return Date::excelToDateTimeObject($value)->format('Y-m-d');
        }

        try {
            return Carbon::parse($value)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
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

            $jenis_kelamin = null;
            // Validasi jenis kelamin
            if (isset($row[11])) {
                $value = strtolower(trim($row[11]));
                if ($value === 'laki-laki' || $value === 'l') {
                    $jenis_kelamin = 'Laki-Laki';
                } elseif ($value === 'perempuan' || $value === 'p') {
                    $jenis_kelamin = 'Perempuan';
                }
            }

            if (is_null($jenis_kelamin)) {
                continue;
            }

            $existing = Siswa::where('nisn', $row[0])->first();
            if ($existing) {
                continue;
            }

            $siswa = Siswa::create([
                'sekolah_id' => auth('admin')->user()->sekolah_id,
                'nisn' => $row[0],
                'nis' => $row[1],
                'nama_siswa' => $row[2],
                'jalur_pendaftaran' => in_array($row[3], ['Zonasi', 'Afirmasi', 'Perpindahan Orang Tua', 'Prestasi', 'Mandiri']) ? $row[4] : 'Zonasi',
                'jenis_pendaftaran' => $row[4] == 'Peserta Didik Baru' ? 'Peserta Didik Baru' : 'Pindahan',
                'tanggal_masuk' => $this->formatTanggal($row[5]),
                'status' => $row[6] == 'Aktif' ? 'Aktif' : 'Tidak Aktif',
                'kebutuhan_khusus' => $row[7] == 'Iya' ? 'Iya' : 'Tidak',
                'email' => $row[8],
                'no_kk' => $row[9],
                'nik' => $row[10],
                'jenis_kelamin' => $jenis_kelamin,
                'agama' => in_array($row[12], ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']) ? $row[12] : 'Islam',
                'tanggal_lahir' => $this->formatTanggal($row[13]),
                'tempat_lahir' => $row[14],
                'alamat' => $row[15],
                'rt' => $row[16],
                'rw' => $row[17],
                'dusun' => $row[18],
                'desa_kelurahan' => $row[19],
                'provinsi' => $row[20],
                'kabupaten' => $row[21],
                'kecamatan' => $row[22],
                'telepon' => $row[23],
                'password' => isset($row[24]) ? bcrypt($row[24]) : null,
                'foto' => isset($row[25]) && !empty($row[25]) ? $row[25] : 'belum ada foto',
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
            'sekolah_id' => 'required|exists:sekolahs,id',
            'nisn' => 'required|string',
            'nis' => 'required|string',
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
            'rt' => 'required|string',
            'rw' => 'required|string',
            'dusun' => 'required|string',
            'desa_kelurahan' => 'required|string',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'telepon' => 'required|string',
            'password' => 'nullable|min:6',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',

        ]);

        $targetPath = realpath(base_path('../public/app')) . '/data-siswa';

        $validateData = $request->only([
            'sekolah_id',
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
