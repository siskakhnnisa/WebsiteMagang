<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlitaDokumen extends Model
{
    use HasFactory;

    protected $table = "alita_dokumen";

    protected $fillable = ['dokumen', 'keterangan', 'segment_id'];
}
