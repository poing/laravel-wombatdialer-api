<?php

namespace WombatDialer\test;
use \PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Http;


class ApiTest extends TestCase
{
  
    public function testConfig()
   {
    $value = 'demoadmin';
    $this->assertEquals($value, config('wombatdialer.admin.user'));
   }
   
}