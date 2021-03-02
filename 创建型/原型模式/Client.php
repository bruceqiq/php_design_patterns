<?php

class Prototype
{
    public $primitive;
    public $component;
    public $circularReference;
    private $a;

    public function __clone()
    {
        /** @var object prototype 当前对象的实例 */
        $this->circularReference->prototype = $this;
    }

    /**
     * 定义一个方法来实现访问类中的私有属性
     * @return mixed
     */
    public function getAValue()
    {
        return $this->a;
    }
}

class ComponentWithBackReference
{
    public $prototype;

    public function __construct(Prototype $prototype)
    {
        $this->prototype = $prototype;
    }
}

class Client
{
    public function _clone()
    {
        $p1            = new Prototype();
        $p1->primitive = 245;
        $p1->component = new \DateTime();
        /** @var object circularReference 将对象$p1复制给类Prototype中的属性 */
        $p1->circularReference = new ComponentWithBackReference($p1);

        $p2            = clone $p1;
        $p1->component = '11111';
        $p2->component = 'aaaaa';
        var_dump($p2->component, $p1->component, $p2->getAValue());

        if ($p2 instanceof $p1) echo '====';
        else return '---';

    }
}

(new Client())->_clone();
/**
 * output
 * string(5) "aaaaa"
 * string(5) "11111"
 * NULL
 * ====
 */