<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsenController extends Controller
{
    public function GetAllAbsen()
    {
        $data = Absen::all();
        return response()->json($data);
    }
    public function GetAbsenByUuid($uuid)
    {
        $data = Absen::findOrFail($uuid);
        return response()->json($data);
    }
    public function AddAbsen(Request $request)
    {
        Validator::make($request->all([
            'pegawai_uuid' => 'required',
            'tgl_absen' => 'required',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
        ]));
        try {
            Absen::create([
                'pegawai_uuid' => $request->pegawai_uuid,
                'tgl_absen' => $request->tgl_absen,
                'jam_masuk' => $request->jam_masuk,
                'jam_pulang' => $request->jam_pulang,
            ]);
            return response()->json(['success' => 'data berhasil di tambahkan'], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => 'data gagal di tambahkan', $e], 500);
        }
    }
    public function UpdateAbsenByUuid(Request $request, $uuid)
    {
        Validator::make($request->all([
            'pegawai_uuid' => 'required',
            'tgl_absen' => 'required',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
        ]));
        try {
            $data = Absen::find($uuid);
            $data->pegawai_uuid = $request->pegawai_uuid;
            $data->tgl_absen = $request->tgl_absen;
            $data->jam_masuk = $request->jam_masuk;
            $data->jam_pulang = $request->jam_pulang;
            $data->save();
            return response()->json(['success' => 'data berhasil di update'], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => 'data gagal di update'], 500);
        }
    }
    public function DeleteAbsenByUuid($uuid)
    {
        try {
            $data = Absen::find($uuid);
            $data->delete();
            return response()->json(['success' => 'data berhasil di hapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => 'data gagal di hapus'], 500);
        }
    }
}
