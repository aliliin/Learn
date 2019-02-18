<?php

namespace Learn\Delegation\Tests;

use PHPUnit\Framework\TestCase;
use Learn\Delegation;

class DelegationTest extends TestCase
{
	public function testHowTeamLeadWriteCode()
	{
		$junior = new Delegation\JuniorDeveloper();
		$teamLead = new Delegation\TeamLead($junior);
		$this->assertEquals($junior->writeBadCode(),$teamLead->writeCode());
	}
}