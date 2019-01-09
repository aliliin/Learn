<?php

class DatabaseLogger implements \Learn\Logger\Logger
{
    public function save($message)
    {
        var_dump('log info Database!' . $message);
    }
}
