<?php

/**
 * 单例模式
 * Class Demo
 */
class  Demo
{
	protected static $demo;

	// 防止直接实例化类
	private function __construct()
	{
		// TODO
	}

	// 防止clone时，会创建一个新对象
	private function __clone()
	{
		// TODO: Implement __clone() method.
	}

	// 防止unserialize(serialize($object));会创建一个新对象
	private function __wakeup()
	{
		// TODO: Implement __wakeup() method.
	}

	public static function getInstance()
	{
		if (!self::$demo instanceof self) {
			self::$demo = new  self();
		}

		return self::$demo;
	}

	public function __destruct()
	{
		echo '调用结束了';
		// TODO: Implement __destruct() method.
	}
}

$demo  = Demo::getInstance();
$demo1 = Demo::getInstance();
$demo2 = Demo::getInstance();
$demo3 = Demo::getInstance();
$demo4 = Demo::getInstance();
var_dump($demo, $demo1, $demo2, $demo3, $demo4);
/**
 * output
 * object(Demo)#1 (0) {
 * }
 * object(Demo)#1 (0) {
 * }
 * object(Demo)#1 (0) {
 * }
 * object(Demo)#1 (0) {
 * }
 * object(Demo)#1 (0) {
 * }
 * 调用结束了
 */