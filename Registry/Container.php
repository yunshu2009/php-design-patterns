<?php

namespace Alfred\DesignPatterns\Registry;

class Container
{
    protected static $instances;  //用于存放实例

    // 存入实例方法
    public static function set($abstract, $object)
    {
        self::$instances[$abstract] = $object;
    }

    // 获取实例方法
    public static function get($abstract)
    {
        if (! isset(self::$instances[$abstract])) {
            return null;
        }

        return self::$instances[$abstract];
    }

    // 删除实例方法
    public static function destory($abstract)
    {
        if (self::get($abstract)) {
            unset(self::$instances[$abstract]);
        }
    }
}
