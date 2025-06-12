<?php

namespace App\Http\Controllers\MasterAdmin\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $admins = Admin::with('sekolahs')
            ->when($search, function ($query, $search) {
                $query->where('username', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
            })->paginate(10);

        return view('master-admin.data-admin.index', compact('admins'));
    }

    public function create()
    {
        $sekolahs = Sekolah::all();
        return view('master-admin.data-admin.create', compact('sekolahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'sekolah_id' => 'required|exists:sekolahs,id',
            'email' => 'required|email|unique:admins,email',
            'phone' => 'required|numeric',
            'password' => 'required|min:8',
            'foto_profil' => 'required|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $file = $request->file('foto_profil');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $targetPath= realpath(base_path('../public/app')) . '/foto-admin';
        $file->move($targetPath, $filename);

        Admin::create([
            'username' => $request->username,
            'sekolah_id' =>$request->sekolah_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'foto_profil' => $filename,
        ]);

        return redirect('master-admin/data-admin');
    }

    public function show(string $id)
    {
        $admin = Admin::findOrFail($id);
        return view('master-admin.data-admin.detail', compact('admin'));
    }

    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);
        $sekolahs = Sekolah::all();
        return view('master-admin.data-admin.edit', compact('admin', 'sekolahs'));
    }

    public function update(Request $request, string $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'sekolah_id' => 'required|exists:sekolahs,id',
            'username'      => 'required|string|max:255',
            'email'         => 'required|email|unique:admins,email,' . $admin->id,
            'phone'         => 'required|string|max:20',
            'asal_sekolah_id'  => 'required|exists:sekolahs,id',
            'password'      => 'nullable|min:8',
            'foto_profil'   => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $validateData = [
            'sekolah_id' => $request->input('asal_sekolah_id'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'asal_sekolah_id' => $request->input('asal_sekolah_id'),
        ];

        if ($request->filled('password')) {
            $validateData['password'] = bcrypt($request->input('password'));
        }

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $targetPath = realpath(base_path('../public/app')) . '/foto-admin';
            $file->move($targetPath, $filename);
            $validateData['foto_profil'] = $filename;
        }

        $admin->update($validateData);

        return redirect('master-admin/data-admin')->with('success', 'Data admin berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);

        if ($admin->foto_profil) {
            $fotoPath = public_path('public/app/' . $admin->foto_profil);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        $admin->delete();

        return redirect()->back()->with('success', 'Data admin berhasil dihapus.');
    }
}

