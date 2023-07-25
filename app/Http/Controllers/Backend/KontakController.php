<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KontakController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $kontak = Kontak::orderBy('name', 'asc')->get();
            return DataTables::of($kontak)
                ->addIndexColumn()
                ->addColumn('comboBox', function ($data) {
                    $comboBox = "<label class='custom_check'>
                                    <input type='checkbox' id='checkbox' data-id='" . $data->id . "'>
                                    <span class='checkmark'></span>
                                </label>";
                    return $comboBox;
                })
                ->addColumn('aksi', function ($data) {
                    $btn = '<button type="button" class="btn btn-sm btn-white text-danger me-2" data-id="' . $data->id . '" id="btnHapus"><i class="far fa-trash-alt me-1"></i>Hapus</button>';
                    return $btn;
                })
                ->rawColumns(['aksi', 'comboBox'])
                ->make(true);
        }
        return view('backend.kontak.index');
    }

    public function destroy(Request $request)
    {
        $kontak = Kontak::where('id', $request->id)->delete();
        return Response()->json(['kontak' => $kontak, 'success' => 'Data berhasil dihapus']);
    }

    public function deleteMultiple(Request $request)
    {
        $id = $request->id;
        Kontak::whereIn('id', explode(",", $id))->delete();
        return response()->json(['success' => "Data berhasil dihapus"]);
    }
}
