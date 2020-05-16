<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['event_date', 'created_at', 'updated_at'];
}
