<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XLDokumen extends Model
{
    use HasFactory;

    protected $table = "xldokumen";

    protected $fillable = ['dokumen', 'keterangan', 'segment_id'];
}
