<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PengaturanController extends Controller
{
    public function profile()
    {
        return view('backend.pengaturan.profile');
    }

    public function updateProfile(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'email' => 'required|string|unique:users,email,' . $id,
                'foto' => 'image|mimes:jpg,png,jpeg,webp,svgfile|max:5120',
                'no_telepon' => 'required',
                'gender' => 'required',
                'address' => 'required',
            ],
            [
                'name.required' => 'Silakan isi nama terlebih dahulu!',
                'email.required' => 'Silakan isi email terlebih dahulu!',
                'email.unique' => 'Email sudah tersedia!',
                'foto.image' => 'File harus berupa gambar!, ',
                'foto.mimes' => 'Gambar yang diunggah harus dalam format JPG, PNG, JPEG, WEBP, atau SVG.',
                'foto.max' => 'Maksimal ukuran foto 5 MB',
                'no_telepon.required' => 'Silakan isi no telepon terlebih dahulu!',
                'gender.required' => 'Silakan isi jenis kelamin terlebih dahulu!',
                'address.required' => 'Silakan isi alamat terlebih dahulu!',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                if ($file->isValid()) {
                    $guessExtension = $request->file('foto')->guessExtension();
                    $request->file('foto')->storeAs('avatar/', $request->name . '.' . $guessExtension, 'public');

                    $user = User::findOrFail($id);

                    if (Storage::exists('users/' . $user->image)) {
                        Storage::delete('users/' . $user->image);
                    }

                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->no_telepon = $request->no_telepon;
                    $user->gender = $request->gender;
                    $user->address = $request->address;
                    $user->avatar = $request->name . '.' . $guessExtension;
                    $user->save();

                    return response()->json(['success' => 'Data barhasil diperbarui']);
                }
            } else {
                $user = User::findOrFail($id);

                $user->name = $request->name;
                $user->email = $request->email;
                $user->no_telepon = $request->no_telepon;
                $user->gender = $request->gender;
                $user->address = $request->address;
                $user->save();

                return response()->json(['success' => 'Data barhasil diperbarui']);
            }
        }
    }

    public function gantiPassword()
    {
        return view('backend.pengaturan.ganti_password');
    }

    public function updatePassword(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'old_password' => 'required',
                'password' => 'required|min:8|confirmed',
            ],
            [
                'old_password.required' => 'Silakan isi password terlebih dahulu!',
                'password.required' => 'Silakan isi password baru terlebih dahulu!',
                'password.min' => 'Password minimal 8 karakter',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            if (!Hash::check($request->old_password, auth()->user()->password)) {
                return response()->json(['error_password' => 'Kata sandi lama tidak cocok!']);
            } else {
                User::whereId(auth()->user()->id)->update([
                    'password' => Hash::make($request->password)
                ]);
                return response()->json(['success' => 'Kata sandi berhasil diubah']);
            }
        }
    }

    public function nonaktif()
    {
        return view('backend.pengaturan.nonaktif');
    }

    public function updateStatus()
    {
        User::whereId(auth()->user()->id)->update([
            'active_status' => '1'
        ]);
        return response()->json(['success' => 'Akun berhasil di nonaktifkan']);
    }
}
