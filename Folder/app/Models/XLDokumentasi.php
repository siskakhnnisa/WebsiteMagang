<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XLDokumentasi extends Model
{
    use HasFactory;

    protected $table = "xldokumentasi";

    protected $fillable = [
        'keterangan',
        'gambar',
        'segment_id',
    ];
}