<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalKelas = Kelas::count();
        return view('admin.dashboard', compact('totalSiswa', 'totalGuru', 'totalKelas'));
    }

    public function profil()
    {
        $admin = Admin::where('id', Auth::guard()->user()->id)->first();
        return view('admin.profil', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        $data = [
            'username' => $request->username,
            'email' => $request->email,
        ];

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $targetPath = realpath(base_path('../public/app')) . '/foto-admin';

        if ($request->hasFile('foto_profil'))
        {
            $foto = $request->file('foto_profil');
            $fotoFilename = 'foto-admin-' . time() . '.' . $foto->getClientOriginalExtension();
            $foto->move($targetPath, $fotoFilename);

            if ($admin->foto_profil && file_exists($targetPath . '/' . $admin->foto_profil))
            {
                unlink($targetPath . '/' . $admin->foto_profil);
            }

            $data['foto_profil'] = $fotoFilename;
        }

        $admin->update($data);

        return redirect('admin/profil')->with('success', 'Profil berhasil diperbarui.');
    }
}
