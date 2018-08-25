<?php

//委托模式：，接受请求的对象将请求委托给另一个对象来处理。
//去除核心对象的复杂性，方便增加新功能

interface UploaderDelegate
{

    function checkType();

    function checkVirus();

    function reduceSize();

    function storageFile();
}

class PhotoUploader implements UploaderDelegate
{

    function checkType()
    {
        echo ("扫描图片类型\n");
    }

    function checkVirus()
    {
        echo ("扫描图片病毒\n");
    }

    function reduceSize()
    {
        echo ("压缩图片尺寸\n");
    }

    function storageFile()
    {
        echo "存储图片\n";
    }

}

class FileUploader implements UploaderDelegate
{

    function checkType()
    {
        echo ("检查文件类型\n");
    }

    function checkVirus()
    {
        echo ("扫描文件病毒\n");
    }

    function reduceSize()
    {
        echo ("压缩文件尺寸\n");
    }

    function storageFile()
    {
        echo "存储文件\n";
    }

}

class Uploader
{
    private $uploader;

    public function __construct($type)
    {
        $object = ucfirst($type)."Uploader";
        $this->uploader = new $object;
    }
    
    function checkVirus()
    {
        $this->uploader->checkVirus();
    }
    function checkType()
    {
        $this->uploader->checkType();
    }
    function reduceSize()
    {
        $this->uploader->reduceSize();
    }
    function storageFile()
    {
        $this->uploader->storageFile();
    }

    function saveFile()
    {
        $this->checkType();
        $this->checkVirus();
        $this->reduceSize();
        $this->storageFile();
    }
}

$uploader = new Uploader("photo");
$uploader->saveFile(); 


$uploader = new Uploader("file");
$uploader->saveFile();
