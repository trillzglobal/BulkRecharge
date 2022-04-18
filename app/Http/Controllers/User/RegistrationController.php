<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    //

    public function register(Request $request){
        $data = $this->validate($request->all(), config('rules.register'));
        $data = Hash::make($data['password']);
        if(!User::insert($data))
        {
            return error('Account Creation failed, Try again', []);
        }

        return success('Account created successfully',[]);
    }
}
