<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlitaSegment extends Model
{
    use HasFactory;
    protected $table = 'alita_segment';

    protected $fillable = ['nama_segment'];
}