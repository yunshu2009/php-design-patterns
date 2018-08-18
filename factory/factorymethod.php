<?php

// 工厂方法: 使用不同的工厂创建不同的产品。

// 抽象产品
interface Person
{
    function getRole();
}

//具体产品
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

// 抽象工厂类
interface Factory
{
    function getPerson();
}

// 具体工厂类
class StudentFactory implements Factory
{
    function getPerson()
    {
        return new Student();
    }
}

class TeacherFactory implements Factory
{
    function getPerson()
    {
        return new Teacher();
    }
}

class Client
{
    static function main()
    {
        $student = (new StudentFactory())->getPerson()->getRole();
        var_dump($student);

        $teacher = (new TeacherFactory())->getPerson()->getRole();
        var_dump($teacher);

        /*
        结果：string(7) "student"
            string(7) "teacher"
        */
    }
}

Client::main();
