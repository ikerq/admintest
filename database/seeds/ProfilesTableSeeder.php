<?php

use App\Entities\Profile;

class ProfilesTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new Profile();
    }

    public function getDummyData(\Faker\Generator $faker, array $customValue = array())
    {
        return [];
    }

    public function run()
    {
        $this->create(
            [
                'name' => 'Administrador',
                'description' => 'Usuario encargado de la gestión completa de todo el sistema, por lo tanto tiene total privilegio en el mismo',
            ]
        );

        $this->create(
            [
                'name' => 'Usuario',
                'description' => 'Usuario cliente que solo podrá realizar consultas y peticiones en el sistema cliente',
            ]
        );
    }
}
