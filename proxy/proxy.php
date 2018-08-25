<?php

//代理模式：通过一层额外的调用屏蔽后端的细节
//一个类代理另一个类的功能。

interface Connector
{

    function connect($host, $port, $user, $password);

    function request($sql);
}

class DBConnector implements Connector
{

    private static $conn;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$conn)
        {
            return self::$conn;
        }

        return (self::$conn = new DBConnector());
    }

    function connect($host, $port, $user, $password)
    {
        echo "连上 数据库\n";
    }

    function request($sql)
    {
        //执行sql
    }
}


//代理类，可以代理多个对象，只要实体实现 Connector 接口
class DBProxy implements Connector
{
    function __construct()
    {
    }

    function connect($host, $port, $user, $password)
    {
        $this->conn = DBConnector::getInstance();
        $this->conn->connect($host, $port, $user, $password);
    }

    function request($sql)
    {
        $this->connect->request($sql);
    }
}


$proxy = (new DBProxy)->connect("127.0.0.1", 3306, 'root', '123456');
