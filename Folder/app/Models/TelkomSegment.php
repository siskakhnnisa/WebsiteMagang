<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelkomSegment extends Model
{
    use HasFactory;
    protected $table = 'telkom_segment';

    protected $fillable = ['nama_segment'];
}


