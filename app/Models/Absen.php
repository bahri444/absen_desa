<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    use HasUuids;
    protected $primaryKey = 'absen_uuid';
    protected $table = 'absen';
    protected $fillable = ['pegawai_uuid',    'tgl_absen', 'jarak_koordinat',    'jam_masuk',    'jam_pulang',    'created_at', 'updated_at'];
    protected $guarded = [];
}
