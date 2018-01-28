<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $fillable = [
    'name',
    'description'
	    ];

    public function services()
    {
        return $this->hasMany('App\Service');
    }

}
