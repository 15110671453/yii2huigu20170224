
<?php
/**
 * Created by PhpStorm.
 * User: admindyn
 * Date: 2017/3/6
 * Time: 上午11:14
 */


$this->title = '随便命名 一个传入的 传信息 给布局文件可以吗<br/> 我在视图文件  向 布局文件传参数<br/> ';

$this->params['newkey']='我是视图文件 我自定义一个参数newkey 给布局文件<br/>';
echo 'site控制器对应的 视图文件 在方法actionIndex中调用 暂时关闭布局文件载入';
echo '在render之前 不能echo';
//            echo '必须有一个视图控制器 写了 之后 但还是404
//            因为 它要默认找寻一个控制器 并调用控制器的一个方法 才行';


//直接使用 控制器传入参数 数组 中的键名 就可以

echo '<br/>'.$name.':我是传入的视图文件参数';




/*
 * 使用 未传入的参数 报错
 * Error (#8)

An internal server error occurred.
The above error occurred while the Web server was processing your request.

Please contact us if you think this is a server error. Thank you.
 * */

echo '<br/>我是该应用程序参数 在应用程序params中Yii::$app->params[\'adminEmail\']';
//echo Yii::$app->params['adminEmail'];