<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelkomRing extends Model
{
    use HasFactory;

    protected $table = 'telkom_ring';

    protected $fillable = ['nama_ring', 'no_spk'];

    public function segments()
    {
        return $this->hasMany(IforteSegment::class, 'ring_id');
    }
}



