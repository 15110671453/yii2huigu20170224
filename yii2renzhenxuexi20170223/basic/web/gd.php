<?php
/**
 * Created by PhpStorm.
 * User: admindyn
 * Date: 2017/2/27
 * Time: 上午11:17
 */

// 服务器端 使用session
session_start();// 该方法 必须 在 代码的顶端
//依赖GD扩展 输出图片前 必须提前输出图片header头信息
$captch_code='';
$image = imagecreatetruecolor(100,30);

$bgcolor = imagecolorallocate($image,255,255,255);

imagefill($image,0,0,$bgcolor);

//
//for ($i=0;$i<4;$i++)
//{
//    $fontSize = 6;
//    //数字颜色0-120为深色区间
//    $fontColor = imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
//    //数字内容
//    $fontContent = rand(0,9);
//
//    $x=($i*100/4)+rand(5,10);
//    $y=rand(5,10);
//
//    //这里需要注意 字符重叠 因为 每次字符填充 都是从00左上角开始
//    // 我们需要解决字符叠加的问题
//
//    imagestring($image,$fontSize,$x,$y,$fontContent,$fontColor);
//
//
//    //增加干扰元素 增加点 线  但是要注意颜色 避免 难以识别
//}



for ($i=0;$i<4;$i++)
{
    $fontSize = 6;
    $fontColor =imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));

    //不出线0 与 o 同时出现 1 与 l 同时出现 难以识别
    $data = 'abcdefghigkmnopqrstuvwxyz123456789';

    $x=($i*100/4)+rand(5,10);
    $y=rand(5,10);

    $fontContent = substr($data,rand(0,strlen($data)),1);
    $captch_code .= $fontContent;
    imagestring($image,$fontSize,$x,$y,$fontContent,$fontColor);


}

//增加干扰元素 增加点 线  但是要注意颜色 避免 难以识别
//干扰信息添加 要控制好颜色  避免干扰 无法识别

for($i=0;$i<200;$i++){

    $pointColor = imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));

    imagesetpixel($image,rand(1,99),rand(1,29),$pointColor);

}

for($i=0;$i<3;$i++){

    $lineColor= imagecolorallocate($image,rand(80,220),rand(80,220),rand(80,220));
    imageline($image,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$lineColor);
}

//增加验证码复杂度 添加字母 与 数字混合体 int rand(int $min,int $max) mixed array_rand(array $input [,int $num_req=1])

//如何将验证码记录到服务端
//这里需要 服务器开启session
//多服务器情况 需要考虑管理session信息  最好用数据库多好 memorycache 保存用户信息也可以


//最后一步 让用户看到表单

header('content-type:image/png');

imagepng($image);

imagedestroy($image);