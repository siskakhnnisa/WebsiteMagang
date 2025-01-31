<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XLPo extends Model
{
    use HasFactory;
    protected $table = 'xl_po';

    public function rings_xl()
    {
        return $this->hasMany(XLRing::class, 'no_spk', 'no_spk');
    }
}


