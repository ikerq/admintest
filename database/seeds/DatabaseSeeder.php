<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->truncateTables(array(
            'users',
            'password_resets',
//            'profiles_modules',
            'profiles',
            'modules',

        ));
        $this->call(ModulesTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }

    /**
     * @param $tables
     */
    public function truncateTables($tables)
    {
        $this->checkForeignKeys(false);
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        $this->checkForeignKeys(true);
    }

    public function checkForeignKeys($check)
    {
        $check = $check ? '1' : '0';
        DB::statement('SET FOREIGN_KEY_CHECKS = '.$check);
    }
}
