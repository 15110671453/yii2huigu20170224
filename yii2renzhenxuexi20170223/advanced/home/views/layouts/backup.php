<?php
/**
 * Created by PhpStorm.
 * User: admindyn
 * Date: 2017/3/6
 * Time: 上午11:23
 */
use home\assets\AppAssetAnother;

AppAssetAnother::register($this); //将资源管理类 将当前的文件绑定到这个类去

?>
<?php
//特定写法 需要遵循

//首先 调用实例的方法  开始
$this->beginPage()

?>
<html>
<head>
    <meta charset="utf-8">
    <title>使用资源包</title>
    <?php $this->head()?>
</head>
<body>
<?php $this->beginBody()?>

<?php


echo '我是布局文件 一般网页 在布局文件写 头部 和 尾部 公用模版'.'<br/>';
echo '我是布局文件 我想改变 头部 显示的名字<br/>';
echo '<br/>';
echo '<br/>';
echo '<br/>';
echo $this->title.'我收到了参数<br/>';
echo isset($this->params['newkey'])?$this->params['newkey']:'error:视图文件没有传递该参数名参数.<br/>';
echo '布局文件头部内容到此为止<br/>';
echo '<br/>';
echo '<br/>';
echo '<br/>';
echo '<br/>';
echo  $content.'<br/>';

echo '<br/>';
echo '<br/>';
echo '<br/>';
echo '<br/>';
echo '<br/>';
echo '我是布局文件 尾部内容';

?>



<?php $this->endBody()?>


</body>
</html>

<?php $this->endPage()?>


