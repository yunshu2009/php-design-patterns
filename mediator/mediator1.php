<?php
// 开启类型声明严格模式，代码使用了 php 7/7.1 的新特性
declare(strict_types=1);

// 中介者模式。通过中介来减少不同类之间通讯的复杂度。
//参考：http://www.runoob.com/design-pattern/mediator-pattern.html

// 应用实例： 1、中国加入 WTO 之前是各个国家相互贸易，结构复杂，现在是各个国家通过 WTO 来互相贸易。 2、机场调度系统。 3、MVC 框架，其中C（控制器）就是 M（模型）和 V（视图）的中介者。
// 优点： 1、降低了类的复杂度，将一对多转化成了一对一。 2、各个类之间的解耦。
// 缺点：中介者会庞大，变得复杂难以维护。
// 使用场景： 1、系统中对象之间存在比较复杂的引用关系，导致它们之间的依赖关系结构混乱而且难以复用该对象。 2、想通过一个中间类来封装多个类中的行为，而又不想生成太多的子类。

// 中介类
class ChatRoom
{
    static function showMessage(User $user, string $message) : void
    {
        print(date('Y-m-d H:i:s') . ' [' . $user->getName() . '] : ' . $message . "\n");
    }
}

class User
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }

    // 返回类型 void 为 php 7.1 的新特性
    public function setName(string $name) : void    
    {
        $this->name = $name;
    }

    public function sendMessage(string $message) : void
    {
        ChatRoom::showMessage($this, $message);
    }
}

class Client
{
    public static function main() : void
    {
        (new User('yunshu'))->sendMessage('Hello, lily');
        (new User('lily'))->sendMessage("Hello, yunshu");
    } 
}

Client::main();
