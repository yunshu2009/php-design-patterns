<?php

// 装饰器模式：允许向一个现有的对象添加新的功能,同时又不改变其结构
// 装饰模式把子类中比基类中多出来的部分放到单独的类里面，以适应新功能增加的需要。

abstract class User 
{
    abstract function getPermission();
}

// 一般用户
class CommpanyUser extends User 
{
    public function getPermission() 
    {
        return '公共文档权限';
    }
}

//装饰类
class SpecialUser extends User
{
    protected $user;
    protected $special = '';

    function __construct($user) 
    {
        $this->user = $user;
    }

    public function getPermission() 
    {
        return $this->user->getPermission() . $this->special;
    }
}

class Programmer extends SpecialUser 
{
    protected $special = ' 技术部文档权限';
}

class Accountant extends SpecialUser 
{
    protected $special = ' 财务文档权限';
}


$user = new Programmer(new CommpanyUser());
printf("permission：%s\n", $user->getPermission());
$user = new Accountant(new CommpanyUser());
printf("permission：%s\n", $user->getPermission());

/*
结果：
permission：公共文档权限 技术部文档权限
permission：公共文档权限 财务文档权限
*/