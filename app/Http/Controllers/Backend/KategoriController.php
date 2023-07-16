<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $kategori = Kategori::orderBy('name', 'asc')->get();
            return DataTables::of($kategori)
                ->addIndexColumn()
                ->addColumn('comboBox', function ($data) {
                    $comboBox = "<label class='custom_check'>
                                    <input type='checkbox' id='checkbox' data-id='" . $data->id . "'>
                                    <span class='checkmark'></span>
                                </label>";
                    return $comboBox;
                })
                ->addColumn('aksi', function ($data) {
                    $btn = '<button type="button" class="btn btn-sm btn-white text-success me-2" data-id="' . $data->id . '" id="btnEdit"><i class="far fa-edit me-1"></i>Edit</button>';
                    $btn = $btn . '<button type="button" class="btn btn-sm btn-white text-danger me-2" data-id="' . $data->id . '" id="btnHapus"><i class="far fa-trash-alt me-1"></i>Hapus</button>';
                    return $btn;
                })
                ->rawColumns(['aksi', 'comboBox'])
                ->make(true);
        }
        return view('backend.kategori.index');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:kategori,name,' . $id
            ],
            [
                'name.required' => 'Silakan isi nama terlebih dahulu!',
                'name.unique' => 'Kategori sudah tersedia!',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $kategori = Kategori::updateOrCreate([
                'id' => $id
            ], [
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);
            return response()->json($kategori);
        }
    }

    public function edit($id)
    {
        $data = Kategori::where('id', $id)->first();
        return response()->json($data);
    }

    public function destroy(Request $request)
    {
        $kategori = Kategori::where('id', $request->id)->delete();
        return Response()->json(['kategori' => $kategori, 'success' => 'Data berhasil dihapus']);
    }

    public function deleteMultiple(Request $request)
    {
        $id = $request->id;
        Kategori::whereIn('id', explode(",", $id))->delete();
        return response()->json(['success' => "Data berhasil dihapus"]);
    }
}
