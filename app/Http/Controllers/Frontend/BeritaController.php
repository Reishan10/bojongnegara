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
        $berita = Berita::latest()->where('status', '0')->paginate(10);
        $berita_new = Berita::latest()->where('status', '0')->take('5')->get();
        $kategori = Kategori::withCount('berita')
            ->orderBy('name', 'asc')
            ->get();

        $tag = Tag::orderBy('name', 'asc')->get();
        return view('frontend.berita', compact('berita', 'berita_new', 'kategori', 'tag'));
    }

    public function detail($slug)
    {
        $berita = Berita::with('kategori')->where('slug', $slug)->first();
        $berita_new = Berita::latest()->where('status', '0')->take('5')->get();
        $kategori = Kategori::withCount('berita')
            ->orderBy('name', 'asc')
            ->get();

        $tag = Tag::orderBy('name', 'asc')->get();
        return view('frontend.berita_detail', compact('berita', 'berita_new', 'kategori', 'tag'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $berita = Berita::latest()->where('status', '0')
            ->where(function ($query) use ($keyword) {
                $query->where('title', 'like', "%$keyword%")
                    ->orWhere('content', 'like', "%$keyword%");
            })
            ->paginate(10);

        $berita_new = Berita::latest()->where('status', '0')->take('5')->get();

        $kategori = Kategori::withCount('berita')
            ->orderBy('name', 'asc')
            ->get();

        $tag = Tag::orderBy('name', 'asc')->get();

        return view('frontend.berita', compact('berita', 'berita_new', 'kategori', 'tag', 'keyword'));
    }

    public function kategori($kategori)
    {
        $berita = Berita::latest()->whereHas('kategori', function ($query) use ($kategori) {
            $query->where('slug', $kategori);
        })
            ->where('status', '0')
            ->paginate(10);

        $berita_new = Berita::latest()->where('status', '0')->take('5')->get();

        $kategori = Kategori::withCount('berita')->orderBy('name', 'asc')->get();
        $tag = Tag::orderBy('name', 'asc')->get();

        return view('frontend.berita', compact('berita', 'berita_new', 'tag', 'kategori'));
    }

    public function tag($tagSlug)
    {
        $berita = Berita::latest()->where('tag', 'like', '%' . $tagSlug . '%')
            ->where('status', '0')
            ->paginate(10);

        $berita_new = Berita::latest()->where('status', '0')->take('5')->get();

        $kategori = Kategori::withCount('berita')->orderBy('name', 'asc')->get();
        $tag = Tag::orderBy('name', 'asc')->get();

        return view('frontend.berita', compact('berita', 'berita_new', 'kategori', 'tag', 'tagSlug'));
    }
}
