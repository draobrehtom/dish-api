<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \App\User::create(['email'=>'admin', 'password'=>bcrypt('123456'), 'role'=>'admin', 'name'=>'admin']);
        \App\User::create(['email'=>'user', 'password'=>bcrypt('123456'), 'role'=>'user', 'name'=>'user']);
    }
}
