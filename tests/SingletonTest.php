<?php
namespace Learn\Singleton\Tests;
use Learn\Singleton\Singleton;
use PHPUnit\Framework\TestCase;
/**
 * Class SingletonTest 单例模式 单元测试
 * @package Learn\Singleton\Tests
 */
class SingletonTest extends TestCase
{
    public function testGetInstance()
    {
        $firstCall  = Singleton::getInstance();
        $secondCall = Singleton::getInstance();
        $this->assertInstanceOf(Singleton::class, $firstCall);
        $this->assertSame($firstCall, $secondCall);
    }
}