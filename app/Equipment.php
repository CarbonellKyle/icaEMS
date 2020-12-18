<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    //
    protected $primaryKey = 'equipment_id';


    function getLogs()
    {
        return $this->hasMany('App\Log');
    }
}
