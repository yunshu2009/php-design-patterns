<?php

// 模板模式：模板模式：一个抽象类公开定义了执行它的方法的方式/模板。它的子类可以按需要重写方法实现，但调用将以抽象类中定义的方式进行。

class Request 
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

class Respone
{
    protected $format;

    public function __construct($format='json')
    {
        $this->format = $format;
    }

    public function render()
    {
        if ($this->format == 'json') {
            return 'json data';
        } else {
            return 'other format data';
        }
    }

    public function redirect($url)
    {
        header("Location:{$url}");
    }
}

//定义一个抽象类。将类方法定义为 protected 或者  abstract 让子类去覆盖方法。
abstract class Controller
{
    protected $request;
    protected $response;

    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function execute()
    {
        $this->before();
        if ($this->valid()) {
            $this->handleRequest();
        }
        $this->after();
    }

    //定义前置方法。可见性定义为 protected ，子类可选择不覆盖。 
    protected function before()
    {
    }

    //定义后置方法。可见性定义为 protected ，子类可选择不覆盖。
    protected function after()
    {
    }

    protected function valid()
    {
        return true;
    }

    abstract protected function handleRequest();
}

class UserController extends Controller
{
    public function before()
    {
        // if (empty($_SESSION['auth'])){
        //     //没登录就直接跳转了，不再执行后续的操作
        //     $this->response->redirect("user/login.php");
        // }
    }

    protected function valid()
    {
        //参数校验

        return true;
    }

    protected function handleRequest()
    {
        echo 'user data';
    }
}

class Client
{
    public static function main()
    {
        $request = new Request($_GET);
        $respone = new Respone();
        (new UserController($request, $respone))->execute();
    } 
}

Client::main();
