<?php

//事件发生通知关联对象处理

class User implements SplSubject
{
    public $email;
    private $observers;

    public function __construct($email)
    {
        $this->email = $email;

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

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function resetPass()
    {
        $this->notify();
    }
}

class UserEmailObserver implements SplObserver
{
    public function update(\SplSubject $subject)
    {
        echo '发送邮件至' . $subject->email;
    }
}

$user = new User('me@yunshu.com');
$user->attach(new UserEmailObserver());
$user->resetPass();
