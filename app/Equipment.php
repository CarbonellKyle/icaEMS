<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $primaryKey = 'equipment_id';

    protected $fillable = [
        'equipment_name',
    ];

    function getLogs()
    {
        return $this->hasMany('App\Log');
    }
}
