<?php

/**
 * Created by PhpStorm.
 * User: admindyn
 * Date: 2017/2/24
 * Time: 下午2:58
 */
namespace app\components;
//放到命名空间  但是命名空间 要和文件路径 生成components文件夹 把该文件放在该目录下
use yii\base\Widget;
class TopMenu2 extends Widget
{
    public function init(){
        parent::init();
        echo '<ul>';
    }


    public function run(){
        return'</ul>';
    }

    public function addMenu($meuName){
        return '<li>'.$meuName.'</li>';
    }

}