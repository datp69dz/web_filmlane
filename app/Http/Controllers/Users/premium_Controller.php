<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class premium_Controller extends Controller
{
    //
    public function index()
    {
        return view('users.page.premium');
    }
}
