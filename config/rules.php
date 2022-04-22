<?php

return [
    'login' => [
        'email' => 'required',
        'password' => 'required'
    ],
    'register'=>[
        'email'=>'required|unique:users|email',
        'phone_number'=>'required|unique:users',
        'password'=>'required|alpha_num|min:8',
        'name'=>'required|max:255',
        'address'=>'max:255|nullable',
        'webhook'=>'max:255|nullable'
    ],
    'upload'=>[
        'reference'=>'required|unique:upload_requests',
        'csv_file' => 'required|mimes:csv,txt'
    ],
    'upload_details'=>[
        'reference'=>'required|unique:upload_requests',
        'details' => 'required'
    ]
];
