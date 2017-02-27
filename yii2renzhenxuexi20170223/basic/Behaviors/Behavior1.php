<?php
/**
 * Created by PhpStorm.
 * User: admindyn
 * Date: 2017/2/27
 * Time: 下午3:56
 */


/*
 * mixin
 *
 * 类的混合  行为类
 *
 * dog cat  mourse 使用了 yii的component 与 event类
 *
 * 这里我们要用到 yii的Behavior
 * */
namespace app\Behaviors;//这里app代表basic 这个目录
use yii\base\Behavior;

class Behavior1 extends Behavior{
    public $height;

    public  function  eat(){

        echo '这里是mixin的类混合 dog eat';
    }
}

