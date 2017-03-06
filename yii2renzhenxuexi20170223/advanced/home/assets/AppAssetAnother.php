<?php
/**
 * Created by PhpStorm.
 * User: admindyn
 * Date: 2017/3/6
 * Time: 下午12:03
 */

namespace home\assets;

use yii\web\AssetBundle;

class AppAssetAnother extends AssetBundle
{
    //公开相应的属性
    //自带的一些资源 bootstrap jquery 框架 要直接使用
    //自带的只需要填写以下就可以了
//    public $sourcePath='@bower/jquery/dist';




    public $baseUrl='@web/web';
    public $css=['css/index.css',];
    public $js=[];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}