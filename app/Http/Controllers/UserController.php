<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        Validator::make($request->all([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]));
        try {
            return response()->json(['success' => 'data berhasil di tambahkan'], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => 'data gagal di tambahkan', $e], 500);
        }
    }
    public function UpdateUserByUuid(Request $request, $uuid)
    {
        Validator::make($request->all([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]));
        try {
            $data = User::find($uuid);
            // data->=$request->;
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
}
