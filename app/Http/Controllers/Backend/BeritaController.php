<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::orderBy('created_at', 'asc');

        $status = request()->query('status');

        if ($status === '1') {
            $berita->where('status', '1');
        } elseif ($status === '0') {
            $berita->where('status', '0');
        }

        $berita = $berita->paginate(15);
        return view('backend.berita.index', compact('berita'));
    }

    public function create()
    {
        $kategori = Kategori::orderBy('name', 'asc')->get();
        $tag = Tag::orderBy('name', 'asc')->get();
        return view('backend.berita.add', compact('kategori', 'tag'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|unique:berita,title',
                'content' => 'required|string',
                'image' => 'image|mimes:jpg,png,jpeg,webp,svg',
                'kategori' => 'required|string',
                'tag' => 'required|array',
                'tag.*' => 'required|string|distinct',
            ],
            [
                'title.required' => 'Silakan isi judul terlebih dahulu!',
                'title.unique' => 'Judul sudah tersedia!',
                'content.required' => 'Silakan isi konten terlebih dahulu!',
                'image.image' => 'File harus berupa gambar!, ',
                'image.mimes' => 'Gambar yang diunggah harus dalam format JPG, PNG, JPEG, WEBP, atau SVG.',
                'kategori.required' => 'Silakan pilih kategori terlebih dahulu!',
                'tag.required' => 'Silakan pilih tag terlebih dahulu!',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $guessExtension = $request->file('image')->guessExtension();
                    $request->file('image')->storeAs('thumbnail', 'Thumbnail - ' . $request->title . '.' . $guessExtension, 'public');

                    $berita = new Berita();
                    $berita->title = $request->title;
                    $berita->content = $request->content;
                    $berita->description = Str::limit(strip_tags(htmlspecialchars_decode($berita->content)), 100);
                    $berita->image = 'Thumbnail - ' . $request->title . '.' . $guessExtension;
                    $berita->kategori_id = $request->kategori;
                    $berita->tag = implode(',', $request->tag);
                    $berita->slug = $request->slug;
                    $berita->status = 0;
                    $berita->user_id = auth()->user()->id;
                    $berita->save();

                    return response()->json(['success' => 'Data barhasil ditambahkan']);
                }
            } else {
                $berita = new Berita();
                $berita->title = $request->title;
                $berita->content = $request->content;
                $berita->description = Str::limit(strip_tags(htmlspecialchars_decode($berita->content)), 100);
                $berita->kategori_id = $request->kategori;
                $berita->tag = implode(',', $request->tag);
                $berita->slug = $request->slug;
                $berita->status = 0;
                $berita->user_id = auth()->user()->id;
                $berita->save();

                return response()->json(['success' => 'Data barhasil ditambahkan']);
            }
        }
    }

    public function edit($id)
    {
        $berita = Berita::find($id);
        $kategori = Kategori::orderBy('name', 'asc')->get();
        $tag = Tag::orderBy('name', 'asc')->get();
        return view('backend.berita.edit', compact('berita', 'kategori', 'tag'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|unique:berita,title,' . $id,
                'content' => 'required|string',
                'image' => 'image|mimes:jpg,png,jpeg,webp,svg',
                'kategori' => 'required|string',
                'tag' => 'required|array',
                'tag.*' => 'required|string|distinct',
            ],
            [
                'title.required' => 'Silakan isi judul terlebih dahulu!',
                'title.unique' => 'Judul sudah tersedia!',
                'content.required' => 'Silakan isi konten terlebih dahulu!',
                'image.image' => 'File harus berupa gambar!, ',
                'image.mimes' => 'Gambar yang diunggah harus dalam format JPG, PNG, JPEG, WEBP, atau SVG.',
                'kategori.required' => 'Silakan pilih kategori terlebih dahulu!',
                'tag.required' => 'Silakan pilih tag terlebih dahulu!',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $guessExtension = $request->file('image')->guessExtension();
                    $request->file('image')->storeAs('thumbnail/', 'Thumbnail - ' . $request->title . '.' . $guessExtension, 'public');

                    $berita = Berita::findOrFail($id);

                    if (Storage::exists('thumbnail/' . $berita->image)) {
                        Storage::delete('thumbnail/' . $berita->image);
                    }

                    $berita->title = $request->title;
                    $berita->content = $request->content;
                    $berita->description = Str::limit(strip_tags(htmlspecialchars_decode($berita->content)), 100);
                    $berita->image = 'Thumbnail - ' . $request->title . '.' . $guessExtension;
                    $berita->kategori_id = $request->kategori;
                    $berita->tag = implode(',', $request->tag);
                    $berita->slug = $request->slug;
                    $berita->user_id = auth()->user()->id;
                    $berita->save();

                    return response()->json(['success' => 'Data barhasil ditambahkan']);
                }
            } else {
                $berita = Berita::findOrFail($id);
                $berita->title = $request->title;
                $berita->content = $request->content;
                $berita->description = Str::limit(strip_tags(htmlspecialchars_decode($berita->content)), 100);
                $berita->kategori_id = $request->kategori;
                $berita->tag = implode(',', $request->tag);
                $berita->slug = $request->slug;
                $berita->user_id = auth()->user()->id;
                $berita->save();

                return response()->json(['success' => 'Data barhasil ditambahkan']);
            }
        }
    }

    public function destroy(Request $request)
    {
        $berita = Berita::find($request->id);

        if ($berita) {
            if ($berita->image) {
                $thumbnailPath = 'thumbnail/' . $berita->image;
                if (Storage::disk('public')->exists($thumbnailPath)) {
                    Storage::disk('public')->delete($thumbnailPath);
                    $berita->delete();
                }
                $berita->delete();

                return response()->json(['success' => 'Data berhasil dihapus']);
            }
        }

        return response()->json(['error' => 'Data tidak ditemukan'], 404);
    }

    public function publish(Request $request)
    {
        $berita = Berita::find($request->id);
        $berita->status = 0;
        $berita->save();
        return response()->json(['success' => 'Data berhasil di publish']);
    }

    public function pending(Request $request)
    {
        $berita = Berita::find($request->id);
        $berita->status = 1;
        $berita->save();
        return response()->json(['success' => 'Data berhasil di pending']);
    }
}
