<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlitaDokumentasi extends Model
{
    use HasFactory;

    protected $table = "alita_dokumentasi";

    protected $fillable = [
        'keterangan',
        'gambar',
        'segment_id',
    ];
}