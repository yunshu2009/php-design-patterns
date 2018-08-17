<?php

// 单例模式

class DBConn
{
    private static $instance = null;
    private static $counter = 0;
    private $db;

    private function __construct()
    {
        self::$counter++;
    
        $this->connect();
    }

    public static function getInstance()
    {
        if (! self::$instance) {
            self::$instance = new DBConn();
        }

        return self::$instance;
    }


    private function __clone()
    {

    }

    private function connect()
    {
        echo "connected: " . (self::$counter) . "\n";

        //连接数据库
        //$this->db = ;
    }
}

$instance1 = DBConn::getInstance();

$instance2 = DBConn::getInstance();

var_dump($instance1 == $instance2);

/*
结果：
connected: 1
bool(true)
*/


