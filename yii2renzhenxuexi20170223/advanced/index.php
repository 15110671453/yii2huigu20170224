<?php
/**
 * Created by PhpStorm.
 * User: admindyn
 * Date: 2017/3/6
 * Time: 上午10:43
 */
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

//载入自动载入文件类
require (__DIR__.'/vendor/autoload.php');

//载入yii核心类
require (__DIR__.'/vendor/yiisoft/yii2/yii.php');


//书写 配置文件 定义变量 数组
$config = require(__DIR__.'/home/config/web.php');



//实例化 一个应用 并把配置数组 参数传入 并调用run方法

(new yii\web\Application($config))->run();



