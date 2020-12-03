<?php

namespace WombatDialer\Test\Models;
use Illuminate\Database\Eloquent\Model;

class listtest extends Model
{
     protected $fillable = [
         'email', 'name', 'value'
    ];
     public $timestamps = false;
}
