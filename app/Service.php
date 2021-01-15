<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'adder_id',
        'updater_id',
        'language_code',
        'name',
        'slug',
        'icon',
        'featured_image',
        'attachment_file',
        'short_description',
        'long_description',
        'visitor_counter',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'adder_id','id');
    }
    public function packages(){
        return $this->hasMany(Package::class, 'service_id','id');
    }
}
