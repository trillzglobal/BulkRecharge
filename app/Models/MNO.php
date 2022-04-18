<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AirtimeShortcode;

class MNO extends Model
{
    use HasFactory;

    public function airtime_shortcodes() {
        return $this->hasMany(AirtimeShortcode::class);
    }
}
