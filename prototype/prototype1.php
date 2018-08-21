<?php

//原型模式：用较低成本方式创建高成本的实例。属于创建型模式
//这种模式是实现了一个原型接口，该接口用于创建当前对象的克隆。当直接创建对象的代价比较大时，则采用这种模式。

interface Prototype
{
    function copy();
}

class User implements Prototype
{
    public $age;
    public $name;
    public $school;

    public function __construct($age, $name, $school)
    {
        $this->age = $age;
        $this->name = $name;
        $this->school = $school;
    }

    public function copy()
    {
        return clone $this;
    }

    public function printInfo()
    {
        print("name:".$this->name." age:".$this->age.' school:'.$this->school);
    }
}

//假设创建一个 user 对象成本很高，要从数据库中读取、逻辑复杂。这时，可以将该对象缓存起来， clone 已有的一个 已经缓存的 user 对象，然后对个别属性重新赋值。

$user = new User('18', 'yunshu', '中国大学');  
$new_user = $user->copy();
$new_user->age = 20;
$new_user->printInfo();

