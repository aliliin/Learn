<?php

namespace Learn\FactoryMethod;

class StdoutLogger implements Logger
{
    public function Log(string $message)
    {
        echo $message;
    }
}
