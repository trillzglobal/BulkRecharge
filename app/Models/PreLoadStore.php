<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreLoadStore extends Model
{
    use HasFactory;

    public function m_n_o_s(){
        return $this->belongsTo(MNO::class, "m_n_o_id");
    }

    public function data_packages(){
        return $this->belongsTo(DataPackage::class, "data_package_id");
    }

}
