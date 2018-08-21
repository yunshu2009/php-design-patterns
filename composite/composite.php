<?php


// 组合模式：用引用方式而不是继承来构造一个复杂的对象。 相比继承模式，当继承层次多了，子类会继承一些用不到的属性，存在浪费的现象，组合模式就不存在这种情况。组合模式是结构型模式。

//用户的基本信息类
class UserInfo
{
    private $name;
    private $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function getName()
    {
        return $this->name;
    }

    function getAge()
    {
        return $this->age;
    }
}

//管理员的基本信息类
class AdminInfo
{
    private $name;
    private $level;

    public function __construct($name, $level)
    {
        $this->name = $name;
        $this->level = $level;
    }

    function getName()
    {
        return $this->name;
    }

    function getLevel()
    {
        return $this->level;
    }
}

// 使用组合方式为 AdminInfo 和 UserInfo 都添加 is_login 状态

class LoginInfo
{
    private $user;
    private $isLogin;

    public function __construct($user, $isLogin) 
    {
        $this->user = $user;
        $this->isLogin = $isLogin;
    }

    public function isLogin()
    {
        return $this->isLogin;
    }
}

$admin = new AdminInfo('yunshu', 1);
$is_login = (new LoginInfo($admin, TRUE))->isLogin();
if ($is_login) {
    printf("级别为 %d 的管理员已经登录了\n", $admin->getLevel());
} else {
    printf("级别为 %d 的管理员未登录\n", $admin->getLevel());
}
