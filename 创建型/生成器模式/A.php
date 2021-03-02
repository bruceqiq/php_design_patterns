<?php

/**
 * 汽车构造器接口
 * Interface Build
 */
interface Builder
{
	public function partA();

	public function partB();

	public function partC();
}

/**
 * 汽车构造器，实现汽车构造器中所有的操作
 * Class CarBuild
 */
class CarBuild implements Builder
{
	/**
	 * 存储产品需要的部分
	 * @var $product
	 */
	public $product;

	public function __construct()
	{
		$this->reset();
	}

	public function reset()
	{
		$this->product = new CarProduct();
	}

	public function partA()
	{
		$this->product->parts[] = 'partA';

		return $this;
	}

	public function partB()
	{
		$this->product->parts[] = 'partB';

		return $this;
	}

	public function partC()
	{
		$this->product->parts[] = 'partC';

		return $this;
	}

	/**
	 * 根据产品需要的部分，返回对应的部分
	 * @return mixed
	 * @author kert
	 */
	public function listProduct()
	{
		$result = $this->product;
		$this->reset();// 为了Client类中的getProduct方法多次调用时都重新创建一个对象。否则每次调用该防范，添加的属性都会才用累加到CarProduct属性上。
		return $result;
	}
}

/**
 * 具体的CarProduct类
 * Class CarProduct
 */
class CarProduct
{
	/**
	 * 产品具备的属性v
	 * @var array
	 */
	public $parts = [];

	/**
	 * 获取到CarProduct中所有的部分
	 * @author kert
	 */
	public function listParts()
	{
		echo 'Car产品包含的内容有:' . implode(',', $this->parts) . PHP_EOL;
	}
}

/**
 * 具体的操作类(不同的方法获取到产品的不同部分)
 * Class Direct
 */
class Direct
{
	/**
	 * 具体的构造器
	 * @var $builder
	 */
	public $builder;

	public function setBuilder(Builder $builder)
	{
		$this->builder = $builder;
	}

	/**
	 * 获取A部分
	 * @author kert
	 */
	public function listA()
	{
		$this->builder->partA();
	}

	/**
	 * 获取B部分
	 * @author kert
	 */
	public function listB()
	{
		$this->builder->partB();
	}

	/**
	 * 获取C部分
	 * @author kert
	 */
	public function listC()
	{
		$this->builder->partC();
	}

	/**
	 * 获取有所部分
	 * @author kert
	 */
	public function listAll()
	{
		$this->builder
			->partA()
			->partB()
			->partC();
		// partX方法放回$this时，不要重复调用。直接才用链式调用。
//		$this->builder->partA();
//		$this->builder->partB();
//		$this->builder->partC();
	}
}

class Client
{
	public function getProduct(Direct $direct)
	{
		$carBuilder = new CarBuild();
		$direct->setBuilder($carBuilder);

		$direct->listAll();
		$carBuilder->listProduct()->listParts();

		$direct->listA();
		$carBuilder->listProduct()->listParts();
	}
}

$direct = new Direct();
(new Client())->getProduct($direct);

/**
 * output
 * Car产品包含的内容有:partA,partB,partC
 * Car产品包含的内容有:partA
 */