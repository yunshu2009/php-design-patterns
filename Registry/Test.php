<?php

namespace Alfred\DesignPatterns\Registry;

/**
 * 注册树模式: 为应用中经常使用的对象创建一个中央存储器来存放这些对象实例
 */
require '../vendor/autoload.php';
class Test
{
    public static function main()
    {
        Container::set('cache', new Cache());
        Container::set('log', new Log());

        $cache = Container::get('cache');
        var_dump($cache);

        $log = Container::get('log');
        var_dump($log);

        Container::destory('log');
        $log = Container::get('log');
        var_dump($log);
    }
}

Test::main();
