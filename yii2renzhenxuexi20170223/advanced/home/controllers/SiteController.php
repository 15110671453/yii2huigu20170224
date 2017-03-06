<?php
/**
 * Created by PhpStorm.
 * User: admindyn
 * Date: 2017/3/6
 * Time: 上午10:53
 */

namespace home\controllers;
use yii\web\Controller;

class SiteController extends Controller
{
        public function actionIndex(){
//            echo '必须有一个视图控制器 写了 之后 但还是404
//            因为 它要默认找寻一个控制器 并调用控制器的一个方法 才行'
//
             $data = [
               'name' => '张三' ,
            ];

            return $this->render('index',$data);


        }
}