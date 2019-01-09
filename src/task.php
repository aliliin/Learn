<?php

class Task
{
    public $description;
    public $completed = false;

    public function __construct($description)
    {
        $this->description = $description;
    }
    public function complete()
    {
        $this->complete = true;
    }
}
$task  = new Task('learn oop');
$task2 = new Task('learn php');
$task->complete();
echo $task->complete;
echo '<br>';

echo $task->description;
echo '<br>';
echo $task2->description;
