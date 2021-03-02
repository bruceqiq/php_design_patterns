<?php


class A
{
    private $name;

    public $selfObject;

    public $age;

    /**
     * 当前类被clone时，自动调用
     */
    public function __clone()
    {
        /** @var object prototype 将当前类复制给属性, clone时会自动将self复制到属性中 */
        $this->selfObject->prototype = $this;
    }

    /**
     * 获取到本类中的私有属性
     * @return mixed
     */
    public function getNameValue()
    {
        return $this->name;
    }
}


class B
{
    public $prototype;

    public function __construct(A $a)
    {
        $this->prototype = $a;
    }
}


class Client
{
    public function _run()
    {
        $aObj             = new A();
        $aObj->selfObject = new B($aObj);
        $aObj->age        = 100;

        $cObj      = clone $aObj;
        $aObj->age = 101;
        var_dump($aObj, $cObj, $aObj->age, $cObj->age, $cObj->selfObject);
    }
}

(new Client())->_run();

/**
 * output
 * int(101)
 * int(100)
 */