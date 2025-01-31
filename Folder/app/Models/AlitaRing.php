<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlitaRing extends Model
{
    use HasFactory;

    protected $table = 'alita_ring';

    protected $fillable = ['nama_ring', 'no_spk'];

    public function segments_alita()
    {
        return $this->hasMany(AlitaSegment::class, 'ring_id');
    }
}



