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
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'jenis_kelamin' => 'required',
            'dusun' => 'required',
        ]);
        // dd($request);
        try {
            Pegawai::create([
                'nip' => $request->nip,
                'nama_lengkap' => $request->nama_lengkap,
                'alamat' => $request->alamat,
                'nomor_telepon' => $request->nomor_telepon,
                'jenis_kelamin' => $request->jenis_kelamin,
                'dusun' => $request->dusun,
            ]);
            return response()->json(['success' => 'data berhasil di tambahkan'], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => 'data gagal di tambahkan', $e], 500);
        }
    }
    public function UpdatePegawaiByUuid(Request $request, $uuid)
    {
        Validator::make($request->all(), [
            'nip' => 'required',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'jenis_kelamin' => 'required',
            'dusun' => 'required',
        ]);
        try {
            $data = Pegawai::find($uuid);
            $data->nip = $request->nip;
            $data->nama_lengkap = $request->nama_lengkap;
            $data->alamat = $request->alamat;
            $data->nomor_telepon = $request->nomor_telepon;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->dusun = $request->dusun;
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
