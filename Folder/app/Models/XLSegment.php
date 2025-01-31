<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XLSegment extends Model
{
    use HasFactory;
    protected $table = 'xl_segment';

    protected $fillable = ['nama_segment'];
}