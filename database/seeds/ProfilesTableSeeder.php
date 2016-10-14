<?php

use App\Profile;
use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create(
            [
                'name' => 'Administrador', 
                'description' => 'Usuario encargado de la gestión completa de todo el sistema, por lo tanto tiene total privilegio en el mismo'
            ]
        );
        Profile::create(
            [
                'name' => 'Usuario', 
                'description' => 'Usuario cliente que solo podrá realizar consultas y peticiones en el sistema'
            ]
        );
    }
}
