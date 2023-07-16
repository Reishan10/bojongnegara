<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PenggunaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $user = User::where('id', '!=', auth()->user()->id)->orderBy('name', 'asc')->get();
            return DataTables::of($user)
                ->addIndexColumn()
                ->addColumn('comboBox', function ($data) {
                    $comboBox = "<label class='custom_check'>
                                    <input type='checkbox' id='checkbox' data-id='" . $data->id . "'>
                                    <span class='checkmark'></span>
                                </label>";
                    return $comboBox;
                })
                ->addColumn('active_status', function ($data) {
                    if ($data->active_status == 0) {
                        $active_status = '<span class="badge rounded-pill bg-primary">Aktif</span>';
                        return $active_status;
                    } else {
                        $active_status = '<span class="badge rounded-pill bg-danger">Tidak aktif</span>';
                        return $active_status;
                    }
                })

                ->addColumn('aksi', function ($data) {
                    $btn = ' <a href="' . route('pengguna.edit', $data->id) . '" class="btn btn-sm btn-white text-success me-2"><i class="far fa-edit me-1"></i>Edit</a>';
                    $btn = $btn . '<button type="button" class="btn btn-sm btn-white text-danger me-2" data-id="' . $data->id . '" id="btnHapus"><i class="far fa-trash-alt me-1"></i>Hapus</button>';
                    return $btn;
                })
                ->rawColumns(['aksi', 'comboBox', 'active_status'])
                ->make(true);
        }
        return view('backend.pengguna.index');
    }

    public function create()
    {
        return view('backend.pengguna.add');
    }

    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'no_telepon' => 'required|string|min:11|max:13|unique:users,no_telepon',
                'gender' => 'required|string',
                'address' => 'required|string',
                'type' => 'required|string',
            ],
            [
                'name.required' => 'Silakan isi nama terlebih dahulu!',
                'email.required' => 'Silakan isi alamat email terlebih dahulu!',
                'email.unique' => 'Alamat email sudah digunakan!',
                'no_telepon.required' => 'Silakan isi nomor telepon terlebih dahulu!',
                'no_telepon.min' => 'Nomor telepon minimal harus terdiri dari 11 karakter!',
                'no_telepon.max' => 'Nomor telepon maksimal harus terdiri dari 13 karakter!',
                'no_telepon.unique' => 'Nomor telepon sudah digunakan!',
                'gender.required' => 'Silakan pilih jenis kelamin terlebih dahulu!',
                'address.required' => 'Silakan isi alamat terlebih dahulu!',
                'type.required' => 'Silakan pilih tipe terlebih dahulu!',
            ]

        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->no_telepon = $request->no_telepon;
            $user->password = Hash::make($request->no_telepon);
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->type = $request->type;
            $user->active_status = 0;
            $user->save();

            return response()->json(['success' => 'Data barhasil ditambahkan']);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.pengguna.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'email' => 'required|string|unique:users,email,' . $id,
                'no_telepon' => 'required|string|min:11|max:13|unique:users,no_telepon,' . $id,
                'gender' => 'required|string',
                'address' => 'required|string',
                'type' => 'required|string',
            ],
            [
                'name.required' => 'Silakan isi nama terlebih dahulu!',
                'email.required' => 'Silakan isi alamat email terlebih dahulu!',
                'email.unique' => 'Alamat email sudah digunakan!',
                'no_telepon.required' => 'Silakan isi nomor telepon terlebih dahulu!',
                'no_telepon.min' => 'Nomor telepon minimal harus terdiri dari 11 karakter!',
                'no_telepon.max' => 'Nomor telepon maksimal harus terdiri dari 13 karakter!',
                'no_telepon.unique' => 'Nomor telepon sudah digunakan!',
                'gender.required' => 'Silakan pilih jenis kelamin terlebih dahulu!',
                'address.required' => 'Silakan isi alamat terlebih dahulu!',
                'type.required' => 'Silakan pilih tipe terlebih dahulu!',
            ]

        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->no_telepon = $request->no_telepon;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->type = $request->type;
            $user->active_status = $request->status;
            $user->save();

            return response()->json(['success' => 'Data barhasil ditambahkan']);
        }
    }

    public function destroy(Request $request)
    {
        $user = User::where('id', $request->id)->delete();
        return Response()->json(['user' => $user, 'success' => 'Data berhasil dihapus']);
    }

    public function deleteMultiple(Request $request)
    {
        $id = $request->id;
        User::whereIn('id', explode(",", $id))->delete();
        return response()->json(['success' => "Data berhasil dihapus"]);
    }
}
