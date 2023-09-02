<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function GetAllUser()
    {
        $data = User::all();
        return response()->json($data);
    }
    public function GetUserByUuid($uuid)
    {
        $data = User::findOrFail($uuid);
        return response()->json($data);
    }
    public function Register(Request $request)
    {
        Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'password' => 'required',
        ]);
        try {
            User::create([
                'nama_lengkap' => $request->nama_lengkap,
                'password' => Hash::make($request->password),
            ]);
            return response()->json(['success' => 'register berhasil'], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => 'register gagal', $e], 500);
        }
    }
    public function UpdateUserByUuid(Request $request, $uuid)
    {
        Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'password' => 'required',
        ]);
        try {
            $data = User::find($uuid);
            $data->nama_lengkap = $request->nama_lengkap;
            $data->password = Hash::make($request->password);
            $data->save();
            return response()->json(['success' => 'data berhasil di update'], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => 'data gagal di update'], 500);
        }
    }
    public function DeleteUserByUuid($uuid)
    {
        try {
            $data = User::find($uuid);
            $data->delete();
            return response()->json(['success' => 'data berhasil di hapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => 'data gagal di hapus'], 500);
        }
    }
    // pending
    public function Login(Request $request)
    {
        Validator::make($request->all(), [
            'nama_lengkap' => $request->nama_lengkap,
            'password' => $request->password,
        ]);
        $data = $request->only('nama_lengkap', 'password');
        // if () {
        //     # code...
        // }
    }
}
