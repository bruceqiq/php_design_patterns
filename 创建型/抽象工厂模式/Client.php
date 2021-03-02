<?php

/**
 * 创建一个产品接口A，让每一个产品都实现该接口
 * Interface AbstractProductA
 */
interface AbstractProductA
{
	public function usefulFunctionA(): string;
}

/**
 * 产品A实现产品接口A
 * Class ConcreteProductA1
 */
class ConcreteProductA1 implements AbstractProductA
{
	public function usefulFunctionA(): string
	{
		return 'A1产品' . PHP_EOL;
	}
}

/**
 * 创建一个产品接口B，让每一个产品都实现该接口
 * Interface AbstractProductB
 */
interface AbstractProductB
{
	public function usefulFunctionB(): string;
}

/**
 * 产品B实现产品B接口
 * Class ConcreteProductB1
 */
class ConcreteProductB1 implements AbstractProductB
{
	public function usefulFunctionB(): string
	{
		return 'B1产品' . PHP_EOL;
	}
}

/**
 * 创建一个接口工厂类(让其实现类，实现其中的所有方法，对应的一个方法就是一个产品的实例)
 * Interface AbstractFactory
 */
interface AbstractFactory
{
	/**
	 * 负责实例化A产品
	 * @return AbstractProductA
	 * @author kert
	 */
	public function createProductA(): AbstractProductA;

	/**
	 * 负责实例化B产品
	 * @return AbstractProductB
	 * @author kert
	 */
	public function createProductB(): AbstractProductB;

}

/**
 * 工厂类1实现工厂接口中的方法
 * Class ConcreteFactory1
 */
class ConcreteFactory1 implements AbstractFactory
{
	public function createProductA(): AbstractProductA
	{
		return new ConcreteProductA1();
	}

	public function createProductB(): AbstractProductB
	{
		return new ConcreteProductB1();
	}
}

/**
 * 工厂类2实现工厂接口中的所有方法
 * Class ConcreteFactory2
 */
class ConcreteFactory2 implements AbstractFactory
{
	public function createProductA(): AbstractProductA
	{
		return new ConcreteProductA1();
	}

	public function createProductB(): AbstractProductB
	{
		return new ConcreteProductB1();
	}

}

/**
 * 实际调用类
 * @param AbstractFactory $factory
 * @author kert
 */
function ClientCode(AbstractFactory $factory)
{
	$productA = $factory->createProductA();
	var_dump($productA->usefulFunctionA());

	$productB = $factory->createProductB();
	var_dump($productB->usefulFunctionB());
}

ClientCode(new ConcreteFactory1());
echo '-------------抽象工厂方法-------------' . PHP_EOL;
ClientCode(new ConcreteFactory2());
/**
 * output
 * string(9) "A1产品
 * "
 * string(9) "B1产品
 * "
 * -------------抽象工厂方法-------------
 * string(9) "A1产品
 * "
 * string(9) "B1产品
 * "
 */
