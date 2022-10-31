<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin Add Personnel Page
    public function add()
    {
        return view('user.admin.add-personnel');
    }
}
