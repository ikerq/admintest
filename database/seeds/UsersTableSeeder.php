<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'     => 'Administrador',
            'last_name'      => '',
            'sex'            => 1,
            'email'          => 'admin@admin.com',
            'cellphone'       => '+56945139944',
            'password'       => bcrypt('bonsai-tivoli'),
            'profile_id'     => 1,
            'active'         => 1,
            'password_reset' => 0,
        ]);
        User::create([
            'first_name'     => 'Iker',
            'last_name'      => 'Quirós',
            'sex'            => 1,
            'email'          => 'ikerq15@gmail.com',
            'cellphone'       => '+56945139944',
            'password'       => bcrypt('123456'),
            'profile_id'     => 1,
            'active'         => 1,
            'password_reset' => 0,
        ]);
        User::create([
            'first_name'     => 'Eliana',
            'last_name'      => 'Rodriguez',
            'sex'            => 2,
            'email'          => 'eliana@gmail.com',
            'cellphone'       => '+56945139944',
            'password'       => bcrypt('123456'),
            'profile_id'     => 1,
            'active'         => 1,
            'password_reset' => 0,
        ]);
        User::create([
            'first_name'     => 'Milagros',
            'last_name'      => 'Castillo',
            'sex'            => 2,
            'email'          => 'milaelina@gmail.com',
            'cellphone'       => '+56945139944',
            'password'       => bcrypt('123456'),
            'profile_id'     => 1,
            'active'         => 1,
            'password_reset' => 0,
        ]);
        User::create([
            'first_name'     => 'Juan',
            'last_name'      => 'Carlos',
            'sex'            => 1,
            'email'          => 'jc@gmail.com',
            'cellphone'       => '+56945139944',
            'password'       => bcrypt('123456'),
            'profile_id'     => 2,
            'active'         => 1,
            'password_reset' => 0,
        ]);
        User::create([
            'first_name'     => 'Maria',
            'last_name'      => 'Fernanda',
            'sex'            => 2,
            'email'          => 'mf@gmail.com',
            'cellphone'       => '+56945139944',
            'password'       => bcrypt('123456'),
            'profile_id'     => 2,
            'active'         => 1,
            'password_reset' => 0,
        ]);
        User::create([
            'first_name'     => 'John',
            'last_name'      => 'Perez',
            'sex'            => 1,
            'email'          => 'jp@gmail.com',
            'cellphone'       => '+56945139944',
            'password'       => bcrypt('123456'),
            'profile_id'     => 2,
            'active'         => 1,
            'password_reset' => 0,
        ]);
        User::create([
            'first_name'     => 'Francisco',
            'last_name'      => 'Perez',
            'sex'            => 1,
            'email'          => 'fp@gmail.com',
            'cellphone'       => '+56945139944',
            'password'       => bcrypt('123456'),
            'profile_id'     => 1,
            'active'         => 1,
            'password_reset' => 0,
        ]);
        User::create([
            'first_name'     => 'Grenlis',
            'last_name'      => 'Berroteran',
            'sex'            => 2,
            'email'          => 'gb@gmail.com',
            'cellphone'       => '+56945139944',
            'password'       => bcrypt('123456'),
            'profile_id'     => 1,
            'active'         => 1,
            'password_reset' => 0,
        ]);
        User::create([
            'first_name'     => 'Yanlimar',
            'last_name'      => 'Rosales',
            'sex'            => 2,
            'email'          => 'yr@gmail.com',
            'cellphone'       => '+56945139944',
            'password'       => bcrypt('123456'),
            'profile_id'     => 2,
            'active'         => 1,
            'password_reset' => 0,
        ]);
        User::create([
            'first_name'     => 'Eduil',
            'last_name'      => 'Blanco',
            'sex'            => 1,
            'email'          => 'eb@gmail.com',
            'cellphone'       => '+56945139944',
            'password'       => bcrypt('123456'),
            'profile_id'     => 1,
            'active'         => 1,
            'password_reset' => 0,
        ]);
        User::create([
            'first_name'     => 'Anibal',
            'last_name'      => 'Salgado',
            'sex'            => 1,
            'email'          => 'as@gmail.com',
            'cellphone'       => '+56945139944',
            'password'       => bcrypt('123456'),
            'profile_id'     => 2,
            'active'         => 1,
            'password_reset' => 0,
        ]);
        User::create([
            'first_name'     => 'Alejandro',
            'last_name'      => 'Gonzalez',
            'sex'            => 1,
            'email'          => 'ag@gmail.com',
            'cellphone'       => '+56945139944',
            'password'       => bcrypt('123456'),
            'profile_id'     => 1,
            'active'         => 1,
            'password_reset' => 0,
        ]);
        User::create([
        	'first_name'	 => 'Hector',
            'last_name'      => 'Mosquera',
        	'sex' 	         => 1,
        	'email'			 => 'hm@gmail.com',
            'cellphone'       => '+56945139944',
        	'password'  	 => bcrypt('123456'),
        	'profile_id'	 => 2,
            'active'         => 1,
        	'password_reset' => 0,
    	]);
    }
}
