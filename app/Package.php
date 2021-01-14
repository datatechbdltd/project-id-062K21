<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
            'service_id',
            'name',
            'price',
            'description',
            'offer_percent',
            'color',
            'is_highlight',

    ];
    public function service(){
        return $this->belongsTo(Service::class, 'service_id','id');
    }
}
