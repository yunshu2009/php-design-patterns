<?php

//门面模式：通过向客户端提供一个可以访问的系统的接口来统一处理多个关联对象的逻辑，隐藏系统的复杂性。外观模式属于结构型模式。

class TypeChecker
{
    static function checkType()
    {
       echo "检查类型\n";
    }
}

class AntiVirus
{
    static function checkVirus()
    {
         echo "反病毒\n";
    }
}

class SizeReducer
{
    static function reduceSize()
    {
         echo "压缩尺寸\n";
    }
}

class WaterMark
{
    static function mark()
    {
         echo "添加水印\n";
    }
}

class StorageServer
{
    static function storageFile()
    {
         echo "文件存储\n";
    }
}

//定义门面类
class UploadFacade
{
    static function uploadFile()
    {
        TypeChecker::checkType();
        AntiVirus::checkVirus();
        SizeReducer::reduceSize();
        WaterMark::mark();
        StorageServer::storageFile();
    }  
}

UploadFacade::uploadFile(); 
/* 结果：
检查类型
反病毒
压缩尺寸
添加水印
文件存储
*/
