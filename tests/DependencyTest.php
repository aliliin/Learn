<?php

namespace Learn\Dependency\Tests;

use Learn\Dependency\DatabaseConfig;
use Learn\Dependency\Dependency;
use PHPUnit\Framework\TestCase;

/**
 * 依赖注入 测试类
 */
class DependencyTest extends TestCase
{
    public function testDependency()
    {
        $config     = new DatabaseConfig('localhost', 33060, 'root', '123');
        $connection = new Dependency($config);
        $this->assertEquals('root:123@localhost:33060', $connection->getDsn());
    }
}
