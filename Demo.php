<?php

interface Demo
{
	public function show();

	public function run();
}

class A implements Demo
{
	public function run()
	{
		echo __CLASS__ . "||" . __METHOD__ . PHP_EOL;
	}

	public function show()
	{
		echo __CLASS__ . "||" . __METHOD__ . PHP_EOL;
	}
}

class B implements Demo
{
	public function show()
	{
		echo __CLASS__ . "||" . __METHOD__ . PHP_EOL;
	}

	public function run()
	{
		echo __CLASS__ . "||" . __METHOD__ . PHP_EOL;
	}
}

class Client
{
	/**
	 * Client constructor.
	 * @param Demo $demo Demo接口实现类
	 */
	public function __construct(Demo $demo)
	{
		$demo->show();
	}
}

new Client(new A());

