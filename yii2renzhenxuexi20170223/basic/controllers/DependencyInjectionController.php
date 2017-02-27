<?php
/**
 * Created by PhpStorm.
 * User: admindyn
 * Date: 2017/2/27
 * Time: 下午4:28
 */

namespace app\controllers;


use yii\base\Controller;
use yii\di\Container;
use yii\di\ServiceLocator;

class DependencyInjectionController extends  Controller
{
    public  function  actionIndex(){

        //服务定位器 实现方式

        //服务器内部已经有一个全局的服务定位器 和 容器
        \YII::$container->set('app\controllers\Driver','app\controllers\ManDriver');
        \YII::$app->car;//通过属性的方式调用car再调用run方法

//下面new出来的服务定位器 没有和yii应用程序的web.php配置文件关联起来 上面是使用yii已经启用的内置的服务定位器与容器
//        $sl = new ServiceLocator();
//        $sl->set('car',[
//            'class'=>'app\controllers\Car'
//
//        ]);
//        $car = $sl->get('car');
//        $car->run();
        /*
         * 容器 和 服务定位器 在实例化我们需要的类时
         * 会自己尝试解决依赖关系 如果失败 会报错
         * */


        //容器实现方式：：
//        $container2 = new Container();
        //这里直接用类名 不可以 需要 写清楚命名空间 app\controllers\Car
//        $car = $container->get('Car');//通过容器竟然可以获取实例
        //但是这里  信息还不够 因为我们的Car类文件 构造实例时 还需要一个传参 该参数来自一个Driver的类
//        $driver = new ManDriver();
//        $car = new Car($driver);//这样做 两个类有强引用 如何解决 使用接口

        //这里 使用 接口 消除强依赖 但是 无法实例化 会运行报错 需要添加set方法 告诉容器 如果这个依赖 是接口
        //就去找实现这个接口的类的实例
//        $container2->set('app\controllers\Driver','app\controllers\ManDriver');
//        $car = $container2->get('app\controllers\Car');//通过容器竟然可以获取实例
//
//        $car->run();



    }
}

interface  Driver {

    public  function drive();
}

class ManDriver implements Driver {
    //使用接口 消除 mandriver 与 car 类的 强引用关系
    public function drive(){

        echo  'I am an old man driver';
    }
}

class Car {

    private $driver = null;

    public function __construct(Driver $driver)
    {
        $this->driver = $driver;
    }

    public function run(){

        $this->driver->drive();
    }
}