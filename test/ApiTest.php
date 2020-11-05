<?php
  
namespace WombatDialer\Test;

use WombatDialer\Test\UnitAbstract;

class MyTestCase extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
	public function testExample()
	{
		$this->assertTrue(true);
	}

	public function testConfigAccess()
	{
		$value = 'demoadmin';
		$this->assertEquals($value, config('wombatdialer.admin.user'));
	}
}