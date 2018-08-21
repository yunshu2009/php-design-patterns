<?php

// 桥接模式是一种结构型模式，它主要应对的是：由于实际的需要，某个类具有两个或两个以上的维度变化，如果只是使用继承将无法实现这种需要，或者使得设计变得相当臃肿。

//为了解决这个问题，我们可以使用桥接模式，桥接模式的做法是把变化部分抽象出来，使变化部分与主类分离开来，从而将多个维度的变化彻底分离。最后提供一个管理类来组合不同维度上的变化，通过这种组合来满足业务的需要。

//参考：http://www.cnblogs.com/houleixx/archive/2008/02/23/1078877.html

abstract class AbstractCar
{
    abstract function run();
}

class Car extends AbstractCar
{
    function run()
    {
        echo  '小汽车在跑';
    }
}

class Bus extends AbstractCar
{
    function run()
    {
        echo '公共汽车在跑';
    }
}

abstract class Road
{
    public $car;

    function __construct($car)
    {
        $this->car = $car;
    }

    abstract function run();
}

class Street extends Road
{
    function run()
    {
        $this->car->run();
        print("在市区中的街道跑");
    }
}

class SpeedWay extends Road
{
    function run()
    {
        $this->car->run();
        print("在高速公路上跑");
    }
}


$speed_way = new SpeedWay((new Car));
$speed_way->run();
echo "\n";
$street = new Street((new Car));
$street->run();

