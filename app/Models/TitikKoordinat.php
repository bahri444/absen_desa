<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitikKoordinat extends Model
{
    use HasFactory;
    use HasUuids;
    protected $primaryKey = 'titik_koordinat_uuid';
    protected $fillable = [''];
    protected $guarded = [];
}
