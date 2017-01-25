<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profilesList()
    {
        $profiles = Profile::all();

        if (request()->ajax()) {
            return $profiles;
        }
    }
}
