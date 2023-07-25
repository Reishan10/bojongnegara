<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Layanan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->where('status', '0')->take('3')->get();
        $layanan = Layanan::latest()->take(5)->get();
        return view('frontend.beranda', compact('layanan', 'berita'));
    }
}
