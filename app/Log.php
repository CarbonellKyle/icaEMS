<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'borrower_name','equipment_id','datetime_borrowed','datetime_returned',
        ];
}
