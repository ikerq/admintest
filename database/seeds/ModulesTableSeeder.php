<?php
use App\Entities\Module;
use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create([
        	'name' 		  => 'Usuarios',
        	'description' => 'Usuarios del sistema',
        	'route'		  => '#',
        	'has_child'	  => '1',
        	'active'	  => '1',
        	'order'		  => '1',
        	'icon'		  => 'group',
    	]);

        Module::create([
        	'name' 		  => 'Listado',
        	'description' => 'Listado de usuarios del sistema',
        	'route'		  => 'admin/users',
        	'has_child'	  => '0',
        	'parent'	  => '1',
        	'active'	  => '1',
        	'order'		  => '1',
    	]);

        Module::create([
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
