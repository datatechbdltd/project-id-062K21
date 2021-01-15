<?php

use Illuminate\Database\Seeder;

class oAuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $o_auth = new \App\oAuth();
        $o_auth->name = 'Facebook';
        $o_auth->save();

        $o_auth = new \App\oAuth();
        $o_auth->name = 'Google';
        $o_auth->save();

        $o_auth = new \App\oAuth();
        $o_auth->name = 'Twitter';
        $o_auth->save();
    }
}
