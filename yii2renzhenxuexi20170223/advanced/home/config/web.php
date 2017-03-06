<?php
/**
 * Created by PhpStorm.
 * User: admindyn
 * Date: 2017/3/6
 * Time: 上午11:02
 */

$config =[

    'id' => 'app-home',
    'basePath' => dirname(__DIR__),
    'aliases'=>[
//        '@home'=>__DIR__.'/home',
    //修改项
        '@home'=>dirname(__DIR__),


    ],
    'controllerNamespace'=>'home\controllers',
    //在配置文件 设置 不载入布局文件
    //'layout'=>null,
    'params' => [
        'admin'=>'管理员',
        'adminEmail'=>'12@163.com',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ssss-VdRncZ-s75wUqzqRax7_qvaayM3',
        ],
        'assetManager' => [

            'basePath'=>'@webroot/web',
            'baseUrl'=>'@web/web',
        ],
    ],




];
//这里要使用debug 使用gii 需要 验证的关键字
// 他也是一个组件 需要添加到组件数组中
$config['bootstrap'][]='debug';
//配置变量 加数组项  并指定模块
$config['modules']['debug']=[
    'class'=>'yii\debug\Module',
];
//在引导中配置脚手架 并设置模块
$config['bootstrap'][]='gii';
$config['modules']['gii']=[
    'class'=>'yii\gii\Module',
];

return $config;