<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IforteSegment extends Model
{
    use HasFactory;
    protected $table = 'ifortesegment';

    protected $fillable = ['nama_segment'];
}


