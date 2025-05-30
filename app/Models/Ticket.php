<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['name', 'email', 'children_ticket', 'uniq_identity', 'order_id'];
}
