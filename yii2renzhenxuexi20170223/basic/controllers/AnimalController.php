<?php
/**
 * Created by PhpStorm.
 * User: admindyn
 * Date: 2017/2/27
 * Time: 下午3:14
 */

namespace app\controllers;

use vendor\animal\Cat;
use vendor\animal\Dog;
use vendor\animal\Mourse;
use yii\web\Controller;
use yii\base\Event;
use app\Behaviors\Behavior1;


class AnimalController extends Controller
{


    public function  actionIndex(){
        $cat = new Cat();
        $cat2 = new Cat();
        $mourse = new Mourse();
        //这个on方法 由于cat猫这个类 继承子component
        //component 不仅提供trigger方法 也提供了on方法 直接使用即可
        //下面我们告诉程序 如果触发miao这个事件  第一个参数 即事件名
        //第二个参数 是一个数组 数组第一个元素是 那个类的实例 第二个元素 是类要执行的方法名
        $cat->on('miao',[$mourse,'run']);

        //每个实例实现绑定 新的实例 如果不绑定就不会绑定
        //那么是不是又类级别的绑定呢 任何一个实例都会绑定该自定义触发逻辑
        Event::on(Cat::className(),'miao',[$mourse,'run']);

        //测试 让猫叫 我们看小效果

        $cat->shout();
        $cat2->shout();//对比类级别的事件绑定 与 实例级别的事件绑定
        $dog= new Dog();
        $dog->look();//这里是dog类原始的方法
        $dog->eat();//这里是mixin 混合

        //通过在视图控制器使用 behavior类的attachBehavior来实现给对象注入

        $behavior1 = new Behavior1();
        //第一个参数 标识符 仅是为了标记 将来为了删除 该行为做准备
        $dog->attachBehavior('behav1',$behavior1);

        $dog->detachBehavior('behav1');
    }
}