<?php

//建造者模式：将创建一个对象的复杂过程封装起来，使对象的创建过程与它的表示分离

class Config
{
    protected $dbConfig;
    protected $staticConfig;
    protected $webConfig;
    protected $storageConfig;

    public function setDbConfig($config)
    {
        $this->dbConfig = $config;
    }

    public function setStaticConfig($config)
    {
        $this->staicConfig = $config;
    }

    public function setWebConfig($config)
    {
        $this->webConfig = $config;
    }

    public function setStorageConfig($config)
    {
        $this->storageConfig = $config;
    }

    public function printConfig()
    {
        print_r($this->dbConfig);
        print_r($this->staticConfig);
        print_r($this->webConfig);
        print_r($this->storageConfig);
    }
}

class ConfigBuilder
{
    private $options;
    private $config;

    public function __construct($options)
    {
        $this->options = $options;
        $this->config = new Config();
    }

    public function build()
    {
        $this->config->setDbConfig($this->options['dbConfig']);
        $this->config->setStaticConfig($this->options['staticConfig']);
        $this->config->setWebConfig($this->options['webConfig']);
        $this->config->setStorageConfig($this->options['storageConfig']);
    }

    public function getConfig()
    {
        return $this->config;
    }
}

$options = [
    'dbConfig'  =>  [
        'default'    =>  [
            'dsn'   =>  'mysql:host=192.168.10.1;dbname=web_db',
            'user'  =>  'root',
            'password' =>   'LX89gx7lu86BhEgD',
        ],
        'crm'    =>  [
            'dsn'   =>  'mysql:host=192.168.10.2;dbname=crm_db',
            'user'  =>  'root',
            'password' =>   'LX89gx7lu86BhEgD',
        ],
    ],
    'staticConfig'  =>  [
        'pic_host'    =>  'img.yunshu.me',
        'static_host' =>   's.yunshu.me',
    ],
    'webConfig'  =>  [
        'host'    =>  'www.yunshu.me',
    ],
    'storageConfig'  =>  [
        's1'    =>  '192.168.10.3:FILE1',
    ],
];

$builder = new ConfigBuilder($options);
$builder->build();
$builder->getConfig()->printConfig();