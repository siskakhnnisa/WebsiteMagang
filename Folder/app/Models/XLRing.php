<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XLRing extends Model
{
    use HasFactory;

    protected $table = 'xl_ring';

    protected $fillable = ['nama_ring', 'no_spk'];

    public function segments_xl (){
    	return $this->hasMany(XLSegment::class, 'ring_id');
    }
}



