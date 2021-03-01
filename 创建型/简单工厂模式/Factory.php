<?php
include __DIR__ . '/RedisService.php';
include __DIR__ . '/MysqlService.php';

/**
 * 简单工厂类
 * Class Factory
 */
class Factory
{
	private $object;

	public function __construct($objectName)
	{
		$this->object = $objectName;
	}

	public function newObject()
	{
		echo $this->object . PHP_EOL;
		switch ($this->object) {
			case 'redis';
				new RedisService();
				break;
			case 'mysql':
				new MysqlService();
				break;
			default:
				echo '类未找到';
		}
	}
}