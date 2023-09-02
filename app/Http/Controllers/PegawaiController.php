<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{

    public function GetAllPegawai()
    {
        $data = Pegawai::all();
        return response()->json($data);
    }
    public function GetPegawaiByUuid($uuid)
    {
        $data = Pegawai::findOrFail($uuid);
        return response()->json($data);
    }
    public function AddPegawai(Request $request)
    {
        Validator::make($request->all(), [
            'nip' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'dusun' => 'required',
            'jabatan' => 'required',
            'nomor_telepon' => 'required',
        ]);
        // dd($request);
        // 'user_uuid',    'nip',    'jenis_kelamin',    'alamat', 'dusun', 'jabatan',   'nomor_telepon',
        try {
            Pegawai::create([
                'user_uuid' => $request->user_uuid,
                'nip' => $request->nip,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'dusun' => $request->dusun,
                'jabatan' => $request->jabatan,
                'nomor_telepon' => $request->nomor_telepon,
            ]);
            return response()->json(['success' => 'data berhasil di tambahkan'], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => 'data gagal di tambahkan', $e], 500);
        }
    }
    public function UpdatePegawaiByUuid(Request $request, $uuid)
    {
        Validator::make($request->all(), [
            'user_uuid' => 'required',
            'nip' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'dusun' => 'required',
            'jabatan' => 'required',
            'nomor_telepon' => 'required',
        ]);
        try {
            $data = Pegawai::find($uuid);
            $data->user_uuid = $request->user_uuid;
            $data->nip = $request->nip;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->alamat = $request->alamat;
            $data->dusun = $request->dusun;
            $data->jabatan = $request->jabatan;
            $data->nomor_telepon = $request->nomor_telepon;
            $data->save();
            return response()->json(['success' => 'data berhasil di update'], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => 'data gagal di update'], 500);
        }
    }
    public function DeletePegawaiByUuid($uuid)
    {
        try {
            $data = Pegawai::find($uuid);
            $data->delete();
            return response()->json(['success' => 'data berhasil di hapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => 'data gagal di hapus'], 500);
        }
    }
}
