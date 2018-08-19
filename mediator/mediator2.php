<?php

// 使用中介者模式让 SNSFriend 和 WeiboFans 两个类相关联，在中介类 FriendMediator 中处理添加好友逻辑（比如将好友添加到数据库中） 

class SNSFriend
{
    protected $mediator;

    public function __construct()
    {
        $this->mediator = new FriendMediator(FriendMediator::FRIEND_TYPE_SNS);
    }

    function addFriend($uid, $touid)
    {
        $this->mediator->addFriend($uid, $touid);
    }

}

class WeiboFans
{
    protected $mediator;

    public function __construct()
    {
        $this->mediator = new FriendMediator(FriendMediator::FRIEND_TYPE_WEIBO);
    }

    function addFriend($uid, $touid)
    {
        $this->mediator->addFriend($uid, $touid);
    }
}

class FriendMediator
{

    const FRIEND_TYPE_SNS = 1;
    const FRIEND_TYPE_WEIBO = 2;

    private $type;

    public function __construct($type = self::FRIEND_TYPE_SNS)
    {
        $this->type = $type;
    }

    function addFriend($uid, $touid)
    {
        switch ($this->type)
        {
            case self::FRIEND_TYPE_SNS:
                echo "添加了 SNS 好友\n";
                break;
            case self::FRIEND_TYPE_WEIBO:
                echo "添加了 Weibo 好友\n";
                break;
            default:
                break;
        }
    }

}


$fsns = new SNSFriend();
$fsns->addFriend(1, 2);

$weibo = new WeiboFans();
$weibo->addFriend(3, 4);
