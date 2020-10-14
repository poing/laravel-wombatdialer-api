<?php

namespace WombatDialer\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $fillable = [
        'email', 'name', 'value',
    ];
    public $timestamps = false;
}
