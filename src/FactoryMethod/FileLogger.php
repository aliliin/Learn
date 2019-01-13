<?php

namespace Learn\FactoryMethod;

class FileLogger implements Logger
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function Log(string $message)
    {
        file_put_contents($this->filePath, $message, PHP_EOL, FILE_APPEND);
    }
}
