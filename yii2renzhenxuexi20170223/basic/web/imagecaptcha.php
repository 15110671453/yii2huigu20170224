<?php
/**
 * Created by PhpStorm.
 * User: admindyn
 * Date: 2017/2/27
 * Time: 下午1:36
 */


session_start();


//首先维护一套物料库 与 验证信息的对应关系


$table = array(
    'pic0' => '狗',
    'pic1' => '猫',
    'pic2' => '鱼',
    'pic3' => '鸟',
);

$index = rand(0,3);

$value = $table['pic'.$index];

$_SESSION['authcode']=$value;

$fileName = dirname(__FILE__).'/pic'.$index.'jpg';

$contents = file_get_contents($fileName);

header('content-type:image/jpg');


echo $contents;












