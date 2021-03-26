<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            [
                'name' => 'Jon',
                'age' => '28'
            ],
            [
                'name' => 'Alice',
                'age' => '15'
            ],
            [
                'name' => 'Cristin',
                'age' => '40'
            ]
        ];
        return view('users', compact('users'));
    }
}
