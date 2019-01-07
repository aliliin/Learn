<?php

require_once __DIR__ . "/interfaceLogger.php";

class DatabaseLogger implements Logger
{
    public function save($message)
    {
        var_dump('log info Database!' . $message);
    }
}
