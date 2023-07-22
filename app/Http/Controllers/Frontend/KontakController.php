<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KontakController extends Controller
{
    public function index()
    {
        return view('frontend.kontak');
    }

    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'no_telepon' => 'required|min:11|max:13',
                'subject' => 'required',
                'pesan' => 'required',
            ],
            [
                'name.required' => 'Silakan isi nama terlebih dahulu!',
                'no_telepon.required' => 'Silakan isi no telepon terlebih dahulu!',
                'no_telepon.min' => 'No telepon minimal 11 karakter',
                'no_telepon.max' => 'No telepon maksimal 13 karakter',
                'subject.required' => 'Silakan isi subject terlebih dahulu!',
                'pesan.required' => 'Silakan isi pesan terlebih dahulu!',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $kontak = new Kontak();
            $kontak->name = $request->name;
            $kontak->no_telepon = $request->no_telepon;
            $kontak->subject = $request->subject;
            $kontak->pesan = $request->pesan;
            $kontak->save();
            return response()->json(['success' => 'Data berhasil dikirim!']);
        }
    }
}
