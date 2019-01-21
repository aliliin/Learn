<?php
namespace Learn\Observer;

/**
 * User 实现观察者模式（称为主体），它维护一个观察者列表
 *  当对象发生变化的时候，通知 User
 */
class User implements \SplSubject
{
    /**
     *
     * @var string
     */
    private $email;

    /**
     * $observers description
     * @var object
     */
    private $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function changeEmail(string $email)
    {
        $this->email = $email;
        $this->notify();
    }

    public function notify()
    {
        /**
         * @var \SpObsever $observer
         */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
