<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadRequest extends Model
{
    use HasFactory;

    public function pre_load_stores(){
        return $this->hasMany(PreLoadStore::class);
    }

    public function pre_load_airtime_stores(){
        return $this->hasMany(PreLoadAirtimeStore::class);
    }

    public function users(){
        return $this->belongsTo(User::class, "user_id");
    }
    protected $dateFormat = 'Y-m-d H:i:s';

}
