<?php
use App\Entities\Module;

class ModulesTableSeeder extends BaseSeeder
{

	function getModel()
	{
		return new Module;
	}

	function getDummyData(\Faker\Generator $faker, array $customValue = array())
	{
		return [];
	}
    public function run()
    {
        $this->create([
        	'name' 		  => 'Usuarios',
        	'description' => 'Usuarios del sistema',
        	'route'		  => '#',
        	'has_child'	  => '1',
        	'active'	  => '1',
        	'order'		  => '1',
        	'icon'		  => 'group',
    	]);

        $this->create([
        	'name' 		  => 'Listado',
        	'description' => 'Listado de usuarios del sistema',
        	'route'		  => 'admin/users',
        	'has_child'	  => '0',
        	'parent'	  => '1',
        	'active'	  => '1',
        	'order'		  => '1',
    	]);

        $this->create([
        	'name' 		  => 'Registrar',
        	'description' => 'Formulario de registro de usuarios del sistema',
        	'route'		  => 'admin/users/edit',
        	'has_child'	  => '0',
        	'parent'	  => '1',
        	'active'	  => '1',
        	'order'		  => '2',	
    	]);
    }
}
