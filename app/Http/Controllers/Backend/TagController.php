<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class TagController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tag = Tag::orderBy('name', 'asc')->get();
            return DataTables::of($tag)
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
        return view('backend.tag.index');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:tag,name,' . $id,
            ],
            [
                'name.required' => 'Silakan isi nama terlebih dahulu!',
                'name.unique' => 'Nama sudah tersedia!',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $id = $request->id;

            $validated = Validator::make(
                $request->all(),
                [
                    'name' => 'required|unique:tag,name,' . $id
                ],
                [
                    'name.required' => 'Silakan isi nama terlebih dahulu!',
                    'name.unique' => 'Tag sudah tersedia!',
                ]
            );

            if ($validated->fails()) {
                return response()->json(['errors' => $validated->errors()]);
            } else {
                $tag = Tag::updateOrCreate([
                    'id' => $id
                ], [
                    'name' => $request->name,
                ]);
                return response()->json($tag);
            }
        }
    }

    public function edit($id)
    {
        $data = Tag::where('id', $id)->first();
        return response()->json($data);
    }

    public function destroy(Request $request)
    {
        $tag = Tag::where('id', $request->id)->delete();
        return Response()->json(['tag' => $tag, 'success' => 'Data berhasil dihapus']);
    }

    public function deleteMultiple(Request $request)
    {
        $id = $request->id;
        Tag::whereIn('id', explode(",", $id))->delete();
        return response()->json(['success' => "Data berhasil dihapus"]);
    }
}
