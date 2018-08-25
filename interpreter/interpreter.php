<?php

//解释器模式：实现了一个表达式接口，该接口解释一个特定的上下文。这种模式被用在 SQL 解析、模板引擎等。

abstract class Expression 
{ 
    abstract function interpreter($str);
} 

class ExpressionNum extends Expression 
{ 
    function interpreter($str) 
    { 
        switch($str) 
        { 
            case "0": return "零"; 
            case "1": return "一"; 
            case "2": return "二"; 
            case "3": return "三"; 
            case "4": return "四"; 
            case "5": return "五"; 
            case "6": return "六"; 
            case "7": return "七"; 
            case "8": return "八"; 
            case "9": return "九"; 
        } 
    } 
} 

class ExpressionCharater extends Expression 
{ 
    function interpreter($str) 
    { 
        return strtoupper($str); 
    } 
} 

class Interpreter 
{ 
    function execute($string) 
    { 
        $expression = null; 
        for ($i = 0;$i<strlen($string);$i++) { 
            $temp = $string[$i]; 
            switch(true) 
            { 
                case is_numeric($temp): 
                    $expression = new ExpressionNum(); 
                    break; 
                default: 
                    $expression = new ExpressionCharater(); 
            }

            echo $expression->interpreter($temp); 
        } 
    } 
} 

$obj = new Interpreter(); 
$obj->execute("12345abc"); 
