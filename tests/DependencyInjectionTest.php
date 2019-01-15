<?php

namespace Learn\DependencyInjection\Tests;

use Learn\DependencyInjection\DatabaseConfiguration;
use Learn\DependencyInjection\DatabaseConnection;
use PHPUnit\Framework\TestCase;

/**
 * 依赖注入 测试类
 */
class DependencyInjectionTest extends TestCase
{

    public function testDependencyInjection()
    {
        $config     = new DatabaseConfiguration('127.0.0.1', 3306, 'root', '');
        $connection = new DatabaseConnection($config);
        $this->assertEquals('root:@127.0.0.1:3306', $connection->getDsn());
    }
}
