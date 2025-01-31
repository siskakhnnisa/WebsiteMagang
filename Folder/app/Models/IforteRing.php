<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IforteRing extends Model
{
    use HasFactory;

    protected $table = 'iforterring';

    protected $fillable = ['nama_ring', 'no_spk'];

    public function segments()
    {
        return $this->hasMany(IforteSegment::class, 'ring_id');
    }
}



