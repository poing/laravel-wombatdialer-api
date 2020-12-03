<?php

namespace WombatDialer\Test;

class ReportsLogsTest extends UnitAbstract
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testReportLogs()
    {

       //test ReportLogs()
        $logs = new \WombatDialer\Controllers\Reports\Logs;

        $show = $logs->reportLogs(2, 10, 4);
        $this->assertIsArray($show, 'The result is not an array');
        $this->assertArrayHasKey('results', $show, 'The Key is not present in an array');
    }
}
