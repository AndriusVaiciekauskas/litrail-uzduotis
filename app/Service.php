<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service_name',
        'description',
        'parent_id',
        'system_id'
    ];

    public function children()
    {
        return $this->hasMany('App\Service', 'parent_id', 'service_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Service', 'parent_id');
    }
}
