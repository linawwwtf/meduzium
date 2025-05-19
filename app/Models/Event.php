<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    public function getTypeNameAttribute()
{
    return [
        'exhibition' => 'Выставка',
        'masterclass' => 'Мастер-класс',
        'lecture' => 'Лекция'
    ][$this->type];
}
}
