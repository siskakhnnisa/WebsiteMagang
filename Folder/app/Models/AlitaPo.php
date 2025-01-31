<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlitaPo extends Model
{
    use HasFactory;
    protected $table = 'alita_po';

    public function rings_alita()
    {
        return $this->hasMany(AlitaRing::class, 'no_spk', 'no_spk');
    }
}


