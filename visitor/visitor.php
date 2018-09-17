<?php

//访问者模式

//实体类接口
interface ComputerPart
{
    function accept($vistor);
}

class Keyboard  implements ComputerPart 
{    
    function accept($vistor) 
    {
        $vistor->visit($this);
   }
}

//访问者接口
interface ComputerPartVistor
{
    public function visit($keyboard);
}

class KeyboardDisplayVistor implements ComputerPartVistor
{
    function visit($keyboard)
    {
        print("Displaying Keyboard.");
    }
}

$keyboard = new Keyboard();
$keyboard->accept(new KeyboardDisplayVistor());
