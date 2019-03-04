<?php

namespace Learn\Delegation\Tests;

use Learn\Delegation;
use PHPUnit\Framework\TestCase;

class DelegationTest extends TestCase
{
    public function testHowTeamLeadWriteCode()
    {
        $junior   = new Delegation\JuniorDeveloper();
        $teamLead = new Delegation\TeamLead($junior);
        $this->assertEquals($junior->writeBadCode(), $teamLead->writeCode());
    }
}
