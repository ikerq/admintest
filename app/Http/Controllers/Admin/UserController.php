<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entities\Module;
use App\Profile;
use App\User;

use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function userDelete($id = NULL)
    {
        $user = User::find($id)->delete($id);

        if(request()->ajax())
        {
            return "Usuario eliminado";
        }
    }

    public function userForm($id = NULL)
    {
        $getProfiles = Profile::all();
        $profiles = [];

        foreach ($getProfiles as $getProfile)
        {
            $profiles[$getProfile->id] = $getProfile->name;
        }

    	if($id == NULL)
    	{
    		return view('admin/users/edit',['action' => 'new', 'profiles' => $profiles]);
    	}
    	else
    	{
    		$user = User::findOrFail($id);
    		return view('admin/users/edit',['action' => 'edit', 'profiles' => $profiles, 'user' => $user]);
    	}
    }

    public function usersList()
    {   //exit('entro');
    	$users = User::where('id','>',1)
                    ->select('id',
                            'first_name', 
                            'last_name', 
                            'sex', 
                            'birth_date', 
                            'email',
                            'cellphone', 
                            'localphone', 
                            'id_profile', 
                            'active')
                    ->paginate(10);

        $mainView = view('admin/users/list', ['users' => $users]);

        if(request()->ajax())
        {
            return $mainView;
        }
        else
        {
            $modules = Module::all();
            return view('admin/layouts/template', ['modules' => $modules, 'modulesChild' => $modules, 'mainContent' => $mainView]);
        }
    }

    public function userStore()
    {
    	$this->validate(request(), [
            'first_name' => 'required|max:100',
            'last_name'  => 'required|max:100',
            'birth_date' => 'required',
            'email'      => 'required|email|max:255|unique:users,email,'.request()->get('id'),
        ]);

        $data = request()->all();

        //Se crea el objeto Carbon en d/m/Y el cual viene asi de la vista para despues formatearlo con comodidad para la BD
        $date = Carbon::createFromFormat('d/m/Y', $data['birth_date']);

        switch ($data['action']) {
        	case 'new':        		
		        User::create([
		            'first_name' => $data['first_name'],
		            'last_name'  => $data['last_name'],
		            'birth_date' => $date->format('Y-m-d'),
		            'sex'        => $data['sex'],
		            'email'      => $data['email'],
		            'cellphone'  => $data['cellphone'],
		            'localphone' => $data['localphone'],
		            'password'   => bcrypt('123456'),
		            'id_profile' => $data['profile'],
		            'active'     => $data['active'],
		        ]);
        		break;
        	
        	case 'edit':
		        User::find($data['id'])->update([
									            'first_name' => $data['first_name'],
									            'last_name'  => $data['last_name'],
									            'birth_date' => $date->format('Y-m-d'),
									            'sex'        => $data['sex'],
									            'email'      => $data['email'],
									            'cellphone'  => $data['cellphone'],
									            'localphone' => $data['localphone'],
									            'id_profile' => $data['profile'],
									            'active'     => $data['active'],
									        ]);
        		break;
        }

        return redirect()->to('admin/users');
    }

    public function userView($id)
    {
        $user = User::findOrFail($id);
        $user['profile_name'] = $user->profile->name;
        return $user;
    }
}
