<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {

        $name = 'John Doe';
        $habits = ['Coding', 'Traveling', 'Cooking'];
        return view( view: 'site', data: [
            'name' => $name,
            'habits' => $habits
        ]);
    }
}
