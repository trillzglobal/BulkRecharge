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
}
