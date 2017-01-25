<?php

use App\Entities\User;
use \Faker\Generator;

class UsersTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $customValue = array())
    {
        return  [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'sex' => 1,
            'email' => $faker->email,
            'cellphone' => '+56945139944',
            'password' => bcrypt('123456'),
            'profile_id' => $this->getRandom('Profile')->id,
            'active' => rand(1, 2),
            'password_reset' => 0,
        ];
    }
    public function run()
    {
        $this->createAdministrators();
        $this->createMultiple(50);
    }

    public function createAdministrators()
    {
        $this->create([
            'first_name' => 'Administrador',
            'last_name' => '',
            'sex' => 1,
            'email' => 'admin@admin.com',
            'cellphone' => '+56945139944',
            'password' => bcrypt('123'),
            //'password'       => bcrypt('19558434'),
            'profile_id' => 1,
            'active' => 1,
            'password_reset' => 0,
        ]);
        $this->create([
            'first_name' => 'Iker',
            'last_name' => 'Quirós',
            'sex' => 1,
            'email' => 'ikerq15@gmail.com',
            'cellphone' => '+56945139944',
            'password' => bcrypt('123456'),
            'profile_id' => 1,
            'active' => 1,
            'password_reset' => 0,
        ]);
        $this->create([
            'first_name' => 'Eliana',
            'last_name' => 'Rodriguez',
            'sex' => 2,
            'email' => 'eliana@gmail.com',
            'cellphone' => '+56945139944',
            'password' => bcrypt('123456'),
            'profile_id' => 1,
            'active' => 1,
            'password_reset' => 0,
        ]);
        $this->create([
            'first_name' => 'Milagros',
            'last_name' => 'Castillo',
            'sex' => 2,
            'email' => 'milaelina@gmail.com',
            'cellphone' => '+56945139944',
            'password' => bcrypt('123456'),
            'profile_id' => 1,
            'active' => 1,
            'password_reset' => 0,
        ]);
    }
}
