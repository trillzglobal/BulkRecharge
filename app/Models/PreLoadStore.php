<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreLoadStore extends Model
{
    use HasFactory;

    public function m_n_o_s(){
        return $this->belongTo(MNO::class, "mno_id");
    }

    public function data_packages(){
        return $this->belongTo(DataPackage::class, "data_package_id");
    }

}
