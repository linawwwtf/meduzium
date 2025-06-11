<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketPrice extends Model
{
    protected $fillable = ['adult_weekday_price', 'adult_weekend_price', 'child_weekday_price', 'child_weekend_price', 'group_price', 'group_min_people', 'school_group_price'];
}
