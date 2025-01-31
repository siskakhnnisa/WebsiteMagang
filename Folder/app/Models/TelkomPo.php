<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelkomPo extends Model
{
    use HasFactory;
    protected $table = 'telkom_po';

    public function rings()
    {
        return $this->hasMany(IforteRing::class, 'no_spk', 'no_spk');
    }
}


