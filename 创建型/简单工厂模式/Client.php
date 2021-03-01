<?php
include __DIR__ . '/Factory.php';

/**
 * 实际调用类
 * Class Client
 */
class Client
{
	public function __construct($objectName)
	{
		$factory = new Factory($objectName);
		$factory->newObject();
	}
}

new Client('redis');
new Client('mysql');
/**
 * output
 * redis
 * 我是Redis连接类
 * mysql
 * 我是MySQL类
 */