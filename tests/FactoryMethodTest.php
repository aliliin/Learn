<?php

namespace Learn\FactoryMethod\test;

use Learn\FactoryMethod\FileLogger;
use Learn\FactoryMethod\FileLoggerFactory;
use Learn\FactoryMethod\StdoutLogger;
use Learn\FactoryMethod\StdoutLoggerFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class FactoryMethodTest 工厂模式的测试方法
 * @package Learn\FactoryMethod\test
 */
class FactoryMethodTest extends TestCase
{
    public function testCreateStdoutLogging()
    {
        $loggerFactory = new StdoutLoggerFactory();
        $logger        = $loggerFactory->createLogger();
        $this->assertInstanceOf(StdoutLogger::class, $logger);
    }

    public function testCreateFileLogging()
    {
        $loggerFactory = new FileLoggerFactory(sys_get_temp_dir());
        $logger        = $loggerFactory->createLogger();
        $this->assertInstanceOf(FileLogger::class, $logger);
    }
}
