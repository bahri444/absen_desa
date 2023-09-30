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
    protected $fillable = ['user_uuid',    'nip',    'jenis_kelamin',    'alamat', 'dusun', 'jabatan',   'nomor_telepon',    'created_at',    'updated_at'];
    protected $guarded = [];
    public function JoinToUserOneToOne()
    {
        return $this->hasOne(User::class, 'user_uuid', 'user_uuid');
    }
}
