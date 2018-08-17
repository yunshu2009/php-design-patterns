<?php

// 迭代器模式：提供一种方法顺序的访问一个聚合对象中各个元素，而又不暴露该对象的内部表示（有多少个元素）。

class Book
{
    public $name;
    public $pageCount;
    public $author;
}

class BookList implements Iterator
{

    private $data = [];
    private $index = 0;

    public function __construct()
    {
        $data = [];

        //初始化booklist
        for ($i=0; $i<5; $i++) {
            $book =new Book();
            $book->name = "book_$i";
            $book->author = 'yunshu';
            $book->pageCount = mt_rand(250, 600);

            $data[] = $book;
        }

        $this->data = $data;
    }

    //1 重置迭代器
    public function rewind()
    {
        // echo 'rewind';

        $this->index = 0;
    }

    // 2. 验证迭代器是否有数据
    public function valid()
    {
        // echo 'valid';

        return $this->index < count($this->data);
    }

    //3 获取当前内容
    public function current()
    {
        // echo 'current';

        return $this->data[$this->index];
    }

    //4 移动key到下一个
    public function next()
    {
        // echo 'next';

        return $this->index++;
    }

    //5 迭代器位置key
    public function key()
    {
        return $this->index;
    }
}

$bookList = new BookList();

foreach ($bookList as $value) {
    echo $value->name;  //book_0book_1book_2book_3book_4
}
