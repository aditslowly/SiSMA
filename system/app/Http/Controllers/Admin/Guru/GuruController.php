<?php

namespace App\Http\Controllers\Admin\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GuruExport;
use App\Models\TahunAjar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class GuruController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        $sekolahId = auth('admin')->user()->sekolah_id;

        $gurus = Guru::where('sekolah_id', $sekolahId)
            ->when($search, function ($query, $search) {
                return $query
                    ->where(function ($q) use ($search)  {
                        $q->where('username', 'like', '%' . $search . '%')
                          ->orWhere('nip', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                    });
            })->paginate(10);

        return view('admin.data-guru.index', compact('gurus'));
    }

    public function create()
    {
        $sekolahId = auth('admin')->user()->sekolah_id;
        $tahunAjar = TahunAjar::where('sekolah_id', $sekolahId)->get();
        return view('admin.data-guru.create', compact('tahunAjar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sekolah_id'          => 'required|exists:sekolahs,id',
            'username'            => 'required|string|max:255',
            'nip'                 => 'required|numeric|unique:gurus,nip',
            'password'            => 'required|string|min:8',
            'jenis_kelamin'       => 'required|in:Laki-Laki,Perempuan',
            'agama'               => 'required|in:Islam,Kristen,Katolik,Buddha,Hindu,Konghuchu',
            'tempat_lahir'        => 'required|string|max:255',
            'tanggal_lahir'       => 'required|date',
            'status'              => 'required|in:Aktif,Tidak Aktif',
            'alamat'              => 'required|string',
            'no_telepon'          => 'required|numeric',
            'email'               => 'required|email|unique:gurus,email',
            'jabatan'             => 'required|in:Kepala Sekolah,Waka Kesiswaan,Waka Kurikulum,Guru,Tata Usaha',
            'pendidikan_terakhir' => 'required|in:Diploma,Sarjana,Megister,Doktor',
            'tahun_masuk'         => 'required|integer',
            'foto_profil'         => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'tahun_ajar_id'       => 'required|array',
            'tahun_ajar_id'       => 'exists:tahun_ajars,id',
        ]);

        $file = $request->file('foto_profil');
        $filename = 'foto-guru-' . time() . '.' . $file->getClientOriginalExtension();
        $targetPath = realpath(base_path('../public/app')) . '/foto-guru';
        $file->move($targetPath, $filename);

        $validateData = [
            'sekolah_id' => $request->input('sekolah_id'),
            'username' => $request->input('username'),
            'nip' => $request->input('nip'),
            'password' => bcrypt($request->input('password')),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'status' => $request->input('status'),
            'alamat' => $request->input('alamat'),
            'no_telepon' => $request->input('no_telepon'),
            'email' => $request->input('email'),
            'jabatan' => $request->input('jabatan'),
            'pendidikan_terakhir' => $request->input('pendidikan_terakhir'),
            'tahun_masuk' => $request->input('tahun_masuk'),
            'foto_profil' => $filename
        ];

        $guru = Guru::create($validateData);

        $guru->tahun_ajar()->sync($request->tahun_ajar_id);


        return redirect('admin/guru')->with('success', 'Data guru berhasil disimpan.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        foreach ($rows as $index => $row) {
            if ($index == 0) continue;

            if (!is_numeric($row[1])) {
                return redirect()->back()->with('error', 'NIP harus berupa angka pada baris ' . ($index + 1));
            }

            if (!is_numeric($row[9])) {
                return redirect()->back()->with('error', 'No telepon harus berupa angka pada baris ' . ($index + 1));
            }

            if (!filter_var($row[10], FILTER_VALIDATE_EMAIL)) {
                return redirect()->back()->with('error', 'Email tidak valid pada baris ' . ($index + 1));
            }

            $serialDate = (int)$row[6];
            $tanggalLahir = date('Y-m-d', strtotime('1899-12-30 + ' . $serialDate . ' days'));

            $guru = Guru::create([
                'sekolah_id'          => auth('admin')->user()->sekolah_id,
                'username'            => $row[0],
                'nip'                 => $row[1],
                'password'            => bcrypt($row[2]),
                'jenis_kelamin'       => $row[3] == 'Laki-Laki' ? 'Laki-Laki' : 'Perempuan',
                'agama'               => in_array($row[4], ['Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu', 'Konghuchu']) ? $row[4] : 'Lainnya',
                'tempat_lahir'        => $row[5],
                'tanggal_lahir'       => $tanggalLahir,
                'alamat'              => $row[7],
                'no_telepon'          => $row[8],
                'email'               => $row[9],
                'jabatan'             => in_array($row[11], ['ASN', 'Honorer', 'Magang', 'Kepala Sekolah', 'Waka Kesiswaan', 'Waka Kurikulum', 'Tata Usaha']) ? $row[11] : 'Lainnya',
                'pendidikan_terakhir' => in_array($row[12], ['Diploma', 'Sarjana', 'Megister', 'Doktor']) ? $row[12] : 'Lainnya',
                'tahun_masuk'         => $row[13],
                'foto_profil'         => $row[14],
            ]);
        }
        return redirect('admin/guru')->with('success', 'Data guru berhasil diimpor.');
    }

    public function export()
    {
        return Excel::download(new GuruExport, 'data-guru.xlsx');
    }

    public function show(string $id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.data-guru.detail', compact('guru'));
    }

    public function edit(string $id)
    {
        $sekolahId = auth('admin')->user()->sekolah_id;
        $guru = Guru::findOrFail($id);
        $tahunAjar = TahunAjar::where('sekolah_id', $sekolahId)->get();
        $selectTahunAjar = $guru->tahun_ajar->pluck('id')->array();
        return view('admin.data-guru.edit', compact('guru'));
    }

    public function update(Request $request, string $id)
    {
        $guru = Guru::findOrFail($id);
        $request->validate([
            'username'            => 'required|string|max:255',
            'nip'                 => 'required|numeric|unique:gurus,nip,' . $guru->id,
            'password'            => 'nullable|string|min:8',
            'jenis_kelamin'       => 'required|in:Laki-Laki,Perempuan',
            'agama'               => 'required|in:Islam,Kristen,Katolik,Buddha,Hindu,Konghuchu',
            'tempat_lahir'        => 'required|string|max:255',
            'tanggal_lahir'       => 'required|date',
            'status'              => 'required|in:Aktif,Tidak Aktif',
            'alamat'              => 'required|string',
            'no_telepon'          => 'required|numeric',
            'email'               => 'required|email|string:gurus,email,' . $guru->id,
            'jabatan'             => 'nullable|in:Kepala Sekolah,Waka Kesiswaan,Waka Kurikulum,Guru,Tata Usaha',
            'pendidikan_terakhir' => 'required|in:Diploma,Sarjana,Megister,Doktor',
            'tahun_masuk'         => 'required|integer',
            'foto_profil'         => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'tahun_ajar_id'       => 'required|array',
            'tahun_ajar_id.*'     => 'exists:tahun_ajars,id',
        ]);

        $validateData = [
            'username' => $request->input('username'),
            'nip' => $request->input('nip'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'status' => $request->input('status'),
            'alamat' => $request->input('alamat'),
            'no_telepon' => $request->input('no_telepon'),
            'email' => $request->input('email'),
            'jabatan' => $request->input('jabatan'),
            'pendidikan_terakhir' => $request->input('pendidikan_terakhir'),
            'tahun_masuk' => $request->input('tahun_masuk'),
        ];

        $targetPath = realpath(base_path('../public/app')) . '/foto-guru';

        if ($request->filled('password')) {
            $validateData['password'] = bcrypt($request->input('password'));
        }

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filename = 'foto-guru-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($targetPath, $filename);

            $validateData['foto_profil'] = $filename;
        }


        $guru->update($validateData);
        $guru->tahun_ajar()->sync($request->tahun_ajar_id);

        return redirect('admin/guru')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->foto_profil) {
            Storage::disk('public')->delete($guru->foto_profil);
        }

        $guru->delete();

        return redirect()->back()->with('success', 'Data guru berhasil dihapus.');
    }
}
