<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Tag;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();
        $kategori = Kategori::orderBy('name', 'asc')->get();
        $tag = Tag::orderBy('name', 'asc')->get();
        return view('frontend.berita', compact('berita', 'kategori', 'tag'));
    }
}
