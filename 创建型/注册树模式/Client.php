<?php

class A
{

}


class B
{

}

/**
 * 注册数模式
 * Class Register
 */
class Register
{
	/**
	 * 存储对象
	 * @var array
	 */
	public static $objectTree = [];

	/**
	 * 获取对象
	 * @param $key 对象键
	 * @return mixed
	 * @author kert
	 */
	public function get($key)
	{
		return self::$objectTree[$key];
	}

	/**
	 * 注册对象
	 * @param $key 对象键
	 * @param $object 对象
	 * @author kert
	 */
	public function set($key, $object)
	{
		self::$objectTree[$key] = $object;

	}

	/**
	 * 销毁对象
	 * @param $key 对象键
	 * @author kert
	 */
	public function _unset($key)
	{
		unset(self::$objectTree[$key]);
	}
}

$register = new Register();

$register->set('a', new A());
$register->set('b', new B());
var_dump($register::$objectTree, $register->get('a'));
/**
 * output
 * array(2) {
 * ["a"]=>
 * object(A)#2 (0) {
 * }
 * ["b"]=>
 * object(B)#3 (0) {
 * }
 * }
 * object(A)#2 (0) {
 * }
 */