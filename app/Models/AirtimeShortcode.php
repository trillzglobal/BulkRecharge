<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    MNO,
    };

class AirtimeShortcode extends Model
{
    use HasFactory;

    public function m_n_o_s() {
        return $this->belongsTo(MNO::class, 'mno_id');
    }
}
