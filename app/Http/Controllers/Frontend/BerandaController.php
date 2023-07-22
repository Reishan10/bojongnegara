<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $layanan = Layanan::latest()->take(5)->get();
        return view('frontend.beranda', compact('layanan'));
    }
}
