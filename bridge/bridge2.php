<?php

//桥接模式：提供统一的接口公外部调用。

abstract class Member
{
    abstract function getName();
}

class VipMember extends Member
{
    public function getName()
    {
        return 'vip member';
    }
}

class GoldMember extends Member
{
    public function getName()
    {
        return 'gold member';
    }
}

class DiamondMember extends Member
{
    public function getName()
    {
        return 'diamond member';
    }
}

class Bridge
{
    protected $member;

    public function __construct($member)
    {
        $this->member = $member;
    }

    public function getName()
    {
        return $this->member->getName();
    }
}

$name = (new Bridge(new VipMember()))->getName();
print($name);

$name = (new Bridge(new GoldMember()))->getName();
print($name);
