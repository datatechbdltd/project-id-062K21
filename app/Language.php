<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable =[
        'status',
        'name',
        'code',
        'flag',
        'alignment',
        'is_default',
    ];

    //Application seo
    public function application_seo(){
        return $this->hasOne(ApplicationSeo::class,'language_code','code');
    }
}
