<?php

namespace Learn\Observer\Tests;

use Learn\Observer\User;
use Learn\Observer\UserObserver;
use PHPUnit\Framework\TestCase;

/**
 * Class ObserverTest 观察者模式观察消息队列  单元测试
 * @package Learn\Observer\Tests
 */
class ObserverTest extends TestCase
{
    public function testChangeInUserLeadsToUserObserverBeingNotified()
    {
        $observer = new UserObserver();
        $user     = new User();
        $user->attach($observer);
        $user->changeEmail('PHPerAli@Gmail.com');
        $this->assertCount(1, $observer->getChangedUsers());
    }
}
