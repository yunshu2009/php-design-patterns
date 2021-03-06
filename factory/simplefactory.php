<?php

// 简单工厂模式：提供一个公共的接口来创建类的实例。同一个类创建多个类实例。
// 参考：http://www.runoob.com/design-pattern/factory-pattern.html

interface Shape 
{
   function draw();
}

class Rectangle implements Shape 
{ 
   public function draw() 
   {
      print("Inside Rectangle::draw() method.");
   }
}

class Square implements Shape 
{
   public function draw() 
   {
      print("Inside Square::draw() method.");
   }
}

class Circle implements Shape 
{
   public function draw() {
      print("Inside Circle::draw() method.");
   }
}

//创建一个工厂，生成基于给定信息的实体类的对象。
class ShapeFactory 
{   
   //使用 getShape 方法获取形状类型的对象
   // 所有相关类的实例都在这个方法里创建
   public static function getShape($shapeType)
   {
      if ($shapeType == null){
         throw new RuntimeException('share type error');
      }  

      if($shapeType == "CIRCLE") {
         return new Circle();
      } else if($shapeType == "RECTANGLE") {
         return new Rectangle();
      } else if($shapeType == "SQUARE") {
         return new Square();
      }

      return null;
   }
}

ShapeFactory::getShape('CIRCLE')->draw();    //Inside Circle::draw() method
