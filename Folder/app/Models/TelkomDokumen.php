<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelkomDokumen extends Model
{
    use HasFactory;

    protected $table = "telkom_dokumen";

    protected $fillable = ['dokumen', 'keterangan', 'segment_id'];
}
