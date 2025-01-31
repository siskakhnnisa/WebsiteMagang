<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IfortePo extends Model
{
    use HasFactory;
    protected $table = 'ifortepo';

    public function rings()
    {
        return $this->hasMany(IforteRing::class, 'no_spk', 'no_spk');
    }
}


