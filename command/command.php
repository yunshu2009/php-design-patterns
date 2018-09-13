<?php

 // 这种模式使用「命令行」将方法调用委托给接收器并且呈现相同的「执行」方法。 因此，调用程序只用知道如何调用执行接收器的命令。

interface CommandInterface
{
    public function execute();
}

class Tv
{
    public function off()
    {
        echo 'tv is is off';
    }

    public function on()
    {
        echo 'tv is is on';
    }
}

//关机
Class TvOffCommand implements CommandInterface
{
    private $tv;

    public function __construct($tv)
    {
        $this->tv = $tv;
    }

    public function execute()
    {
        $this->tv->off();
    }
}

Class TvOnCommand implements CommandInterface
{
    private $tv;

    public function __construct($tv)
    {
        $this->tv = $tv;
    }

    public function execute()
    {
        $this->tv->on();
    }
}

class TvControl
{
    private $command;

    public function setCommand(CommandInterface $cmd)
    {
        $this->command = $cmd;
    }

    public function run()
    {
        $this->command->execute();
    }
}

$control = new TvControl();
$tv = new Tv();

$control->setCommand(new TvOffCommand($tv));
$control->run();

$control->setCommand(new TvOnCommand($tv));
$control->run();
