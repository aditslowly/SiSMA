<?php

namespace App\Http\Controllers\Guru\Kelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    public function index()
    {
        return view('guru.kelas.index');
    }

    public function create()
    {
        return view('guru.kelas.create');
    }
}
