<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreLoadAirtimeStore extends Model
{
    use HasFactory;

    use HasFactory;

    public function m_n_o_s(){
        return $this->belongsTo(MNO::class, "m_n_o_id");
    }
    protected $dateFormat = 'Y-m-d H:i:s';


}
