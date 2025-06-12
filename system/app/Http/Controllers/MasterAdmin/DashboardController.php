<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\MasterAdmin;
use App\Models\Sekolah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $totalAdmin = Admin::count();
        $totalSekolah = Sekolah::count();
        $masterAdmin = MasterAdmin::where('id', Auth::guard()->user()->id)->first();
        return view('master-admin.dashboard', compact('totalAdmin', 'totalSekolah', 'masterAdmin'));
    }

    public function profil(){
        $masterAdmin = MasterAdmin::where('id', Auth::guard()->user()->id)->first();
        return view('master-admin.profil', compact('masterAdmin'));
    }

    public function update(Request $request, string $id)
    {
        $masterAdmin = MasterAdmin::findOrFail($id);

        $request->validate([
            'username'      => 'required|string|max:255',
            'email'         => 'required|email',
            'password'      => 'nullable|string',
            'foto_profil'   => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $validateData = [
            'username' => $request->input('username'),
            'email' => $request->input('email'),
        ];

        $targetPath = realpath(base_path('../public/app')) . '/foto-masterAdmin';

        if ($request->filled('password')) {
            $validateData['password'] = bcrypt($request->input('password'));
        }

        if($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move($targetPath, $filename);

            $validateData['foto_profil'] = $filename;
        }
        $masterAdmin->update($validateData);

        return redirect('master-admin/profil')->with('success', 'Data admin berhasil diupdate.');
    }
}
