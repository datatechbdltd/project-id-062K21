<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name  = 'Mr. Admin';
        $user->email  = 'admin@gmail.com';
        $user->password  = bcrypt('password');
        $user->save();
    }
}
