<?php

// 抽象工厂模式：有多个工厂生产产品，每个工厂又有多条产品线生产产品。在抽象工厂模式中，每一个工厂可以创建多个类的实例。

interface Person
{
    function getRole();
}

class Student implements Person
{
    function getRole()
    {
        return 'student';
    }
}

class Teacher implements Person
{
    function getRole()
    {
        return 'teacher';
    }
}

interface Grade 
{
    function getYear();
}

//另一条产品线的具体产品
class Grade1 implements Grade 
{
    public function getYear() 
    {
        return '2003级';
    }
}

class Grade2 implements Grade 
{
    public function getYear() 
    {
        return '2004级';
    }
}

interface AbstractFactory 
{
    function getPerson();
    function getGrade();
}

class Grade1StudentFactory implements AbstractFactory 
{
    public function getPerson() 
    {
        return new Student();
    }

    public function getGrade() 
    {
        return new Grade1();
    }
}

class Grade1TeacherFactory implements AbstractFactory 
{
    public function getPerson() 
    {
        return new Teacher();
    }

    public function getGrade() 
    {
        return new Grade1();
    }
}

class Grade2TeacherFactory implements AbstractFactory 
{
    public function getPerson() 
    {
        return new Teacher();
    }

    public function getGrade() 
    {
        return new Grade2();
    }
}

class Client
{
    static function main()
    {
        $factory = new Grade1StudentFactory();

        echo $factory->getPerson()->getRole() . ':' . $factory->getGrade()->getYear();

        $factory = new Grade2TeacherFactory();

        echo $factory->getPerson()->getRole() . ':' . $factory->getGrade()->getYear();
    }
}

$res = Client::main();   //student:2003级teacher:2004级
