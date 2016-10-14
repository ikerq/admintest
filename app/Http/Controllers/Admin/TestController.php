<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	$data['tasks'] = [
    		[
	    		'name' 		=> 'Design New Dashboard',
	    		'progress' 	=> '87',
	    		'color'		=> 'danger'
	    	],
	        [
	                'name' => 'Create Home Page',
	                'progress' => '76',
	                'color' => 'warning'
	        ],
	        [
	                'name' => 'Some Other Task',
	                'progress' => '32',
	                'color' => 'success'
	        ],
	        [
	                'name' => 'Start Building Website',
	                'progress' => '56',
	                'color' => 'info'
	        ],
	        [
	                'name' => 'Develop an Awesome Algorithm',
	                'progress' => '10',
	                'color' => 'success'
	        ]
        ];
        $data['session'] = session('users');
        return view('admin/test/test')->with($data);
    }
}
