<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class LayananController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $layanan = Layanan::orderBy('name', 'asc')->get();
            return DataTables::of($layanan)
                ->addIndexColumn()
                ->addColumn('comboBox', function ($data) {
                    $comboBox = "<label class='custom_check'>
                                    <input type='checkbox' id='checkbox' data-id='" . $data->id . "'>
                                    <span class='checkmark'></span>
                                </label>";
                    return $comboBox;
                })
                ->addColumn('aksi', function ($data) {
                    $btn = ' <a  href="' . route('layanan.edit', $data->id) . '" class="btn btn-sm btn-white text-success me-2"><i class="far fa-edit me-1"></i>Edit</a>';
                    $btn = $btn . '<button type="button" class="btn btn-sm btn-white text-danger me-2" data-id="' . $data->id . '" id="btnHapus"><i class="far fa-trash-alt me-1"></i>Hapus</button>';
                    return $btn;
                })
                ->rawColumns(['aksi', 'comboBox'])
                ->make(true);
        }
        return view('backend.layanan.index');
    }

    public function create()
    {
        return view('backend.layanan.add');
    }

    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:layanan,name',
                'deskripsi' => 'required'
            ],
            [
                'name.required' => 'Silakan isi nama terlebih dahulu!',
                'name.unique' => 'Layanan sudah tersedia!',
                'deskripsi.required' => 'Silakan isi deskripsi terlebih dahulu!',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $layanan = Layanan::create([
                'name' => $request->name,
                'deskripsi' => $request->deskripsi,
            ]);
            return response()->json($layanan);
        }
    }


    public function edit($id)
    {
        $layanan = Layanan::where('id', $id)->first();
        return view('backend.layanan.edit', compact('layanan'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:layanan,name,' . $id,
                'deskripsi' => 'required'
            ],
            [
                'name.required' => 'Silakan isi nama terlebih dahulu!',
                'name.unique' => 'Layanan sudah tersedia!',
                'deskripsi.required' => 'Silakan isi deskripsi terlebih dahulu!',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $layanan = Layanan::find($id);
            $layanan->name = $request->name;
            $layanan->deskripsi = $request->deskripsi;
            $layanan->save();
            return response()->json($layanan);
        }
    }

    public function destroy(Request $request)
    {
        $layanan = Layanan::where('id', $request->id)->delete();
        return Response()->json(['layanan' => $layanan, 'success' => 'Data berhasil dihapus']);
    }

    public function deleteMultiple(Request $request)
    {
        $id = $request->id;
        Layanan::whereIn('id', explode(",", $id))->delete();
        return response()->json(['success' => "Data berhasil dihapus"]);
    }
}
