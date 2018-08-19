<?php

// 适配器模式：需要转化一个对象的接口用于另一个对象

//场景：系统一开始使用 apc 缓存，后面经理说想用 memcache 缓存，这时可用到适配器模式，定义一个缓存接口，然后实现接接口。

interface CacheInterface
{
    function set($name, $value, $expire = null);

    function get($name);

    function delete($name);
}

// 适配器
class CacheApc implements CacheInterface
{
    function get($name) {
        return apc_fetch($name);
    }

    function set($name, $value, $expire = null) {
        return apc_store($name, $value, $expire);
    }

    function delete($name) {
         return apc_delete($name);
    }
}

class CacheMemcache implements CacheInterface
{
    private $memcache_obj;

    function __construct() 
    {
        $this->memcache_obj = new Memcache;
        $this->memcache_obj->connect('localhost', 11211);
    }

    function get($name) {
        return $this->memcache_obj->get($name);
    }

    function set($name, $value, $expire = null) {
        return $this->memcache_obj->set($name, $value, $expire);
    }

    function delete($name) {
         return $this->memcache_obj->delete($name);
    }
}

CacheApc::set('hello', 'world');
echo CacheApc::get('hello');
