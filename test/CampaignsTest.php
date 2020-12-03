<?php

namespace WombatDialer\Test;

class CampaignsTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCalls()
    {

       //test options()
        $opt = new \WombatDialer\Controllers\Campaigns;

        $show = $opt->options('start', 'Gamma');
        $this->assertTrue(true);
        $this->assertIsString($show, 'The response is not a string');

        //test clone campaign
        $clone = new \WombatDialer\Controllers\Campaigns;
        $clonecampaign = $clone->cloneCampaign('clone', 'Beta', 'Pascal');
        $this->assertTrue(true);
        $this->assertIsString($clonecampaign, 'The response is not a string');

        // test adding list to campaign
        $addList = new \WombatDialer\Controllers\Campaigns;
        $addListtocampaign = $addList->addList('addList', 'Beta', 'BetaaTest');
        $this->assertTrue(true);
        $this->assertIsString($clonecampaign, 'The response is not a string');

        //testing boost factor
        $bf = new \WombatDialer\Controllers\Campaigns;
        $boostfact = $bf->boostFactor('boost', 'Beta', '100');
        $this->assertTrue(true);
        $this->assertIsString($clonecampaign, 'The response is not a string');
    }
}
