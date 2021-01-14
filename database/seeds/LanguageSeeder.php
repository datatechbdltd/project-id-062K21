<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = new \App\Language();
        $language->code  = 'BN';
        $language->name  = 'বাংলা';
        $language->flag  = '';
        $language->is_default  = true;
        $language->save();

        $language = new \App\Language();
        $language->code  = 'EN';
        $language->name  = 'English';
        $language->flag  = '';
        $language->save();


    }
}
