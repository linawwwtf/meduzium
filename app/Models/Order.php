<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = ['name', 'email', 'date', 'adult_tickets_count', 'child_tickets_count', 'total_price'];

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
