<?php

namespace WombatDialer\Test;

class ReportStatsTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testReportStats()
    {

       //test ReportStats()
        $stats = new \WombatDialer\Controllers\Reports\Stats;

        $show = $stats->reportStats(2);
        $this->assertIsArray($show, 'The result is not an array');
        $this->assertArrayHasKey('campaignsToConsider', $show['result'], 'The Key is not present in an array');
    }
}
