<?php

require_once __DIR__.'/../Base.php';

use Formatter\TaskFilterGanttFormatter;
use Model\Project;
use Model\TaskCreation;
use Model\DateParser;

class TaskFilterGanttFormatterTest extends Base
{
    public function testFormat()
    {
        $dp = new DateParser($this->container);
        $p = new Project($this->container);
        $tc = new TaskCreation($this->container);
        $tf = new TaskFilterGanttFormatter($this->container);

        $this->assertEquals(1, $p->create(array('name' => 'test')));
        $this->assertNotFalse($tc->create(array('project_id' => 1, 'title' => 'task1')));

        $this->assertNotEmpty($tf->search('status:open')->format());
    }
}
