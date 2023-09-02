<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    use HasUuids;
    protected $primaryKey = 'pegawai_uuid';
    protected $table = 'pegawai';
    protected $fillable = ['pegawai_uuid',    'nip',    'nama_lengkap',    'alamat',    'nomor_telepon',    'jenis_kelamin',    'dusun',    'created_at',    'updated_at'];
    protected $guarded = [];
}
