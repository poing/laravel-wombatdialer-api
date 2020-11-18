<?php

namespace WombatDialer\Test;

class ReportsRunsTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testReportRuns()
    {

       //test ReportRuns()
        $runs = new \WombatDialer\Controllers\Reports\Runs;

        $show = $runs->reportRuns('2020-11-11.00:00:00', '2020-11-18.23:59:59');
        $this->assertIsArray($show, 'The result is not an array');
        $this->assertArrayHasKey('campaignsAndRuns', $show['result'], 'The Key is not present in an array');
    }
}
