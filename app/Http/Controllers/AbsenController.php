<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Carbon\Carbon;
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
        Validator::make($request->all(), [
            'pegawai_uuid' => 'required',
            'jarak_koordinat' => 'required',
        ]);
        try {
            $jamMasuk = Carbon::now();
            $tanggalAbsen = Carbon::now();
            Absen::create([
                'pegawai_uuid' => $request->pegawai_uuid,
                'tgl_absen' => $tanggalAbsen,
                'jarak_koordinat' => $request->jarak_koordinat,
                'jam_masuk' => $jamMasuk,
            ]);
            return response()->json(['success' => 'data berhasil di tambahkan'], 200);
        } catch (\Exception $e) {
            return response()->json(['errors' => 'data gagal di tambahkan', $e], 500);
        }
    }
    public function UpdateAbsenByUuid(Request $request, $uuid)
    {
        $jamPulang = Carbon::now();
        Validator::make($request->all(), [
            // 'jam_pulang' => 'required',
        ]);
        try {
            $data = Absen::find($uuid);
            $data->jam_pulang = $jamPulang;
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
