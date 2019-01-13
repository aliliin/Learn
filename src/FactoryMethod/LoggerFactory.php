<?php
namespace Learn\FactoryMethod;

interface LoggerFactory
{
    public function createLogger(): Logger;
}
