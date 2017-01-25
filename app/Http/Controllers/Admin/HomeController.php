<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entities\Module;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$modules = Module::all();
    	
        return view('admin/layouts/template', ['modules' => $modules, 'modulesChild' => $modules]);
    }
}
