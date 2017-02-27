<?php
/**
 * Created by PhpStorm.
 * User: admindyn
 * Date: 2017/2/27
 * Time: 下午1:48
 */
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
$image = imagecreatetruecolor(200,60);

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

//从苹果电脑导出字体 放到php程序目录下
$fontFace='AnkeCalligraph.TTF';//ttf文件明

$strdb = array('那','里','呢','不');

$str = '';

$strdb2 = str_split($str,3);

header('content-type:text/html;charset=utf-8');

var_dump($strdb2);

//注意 GBK 编码 需要将中文 通过iconv 转为utf-8
//选用ttf文件需要支持中文
/*
 *
 * 首先编译安装FreeType，以2.4.0为例：
wget http://download.savannah.gnu.org/releases/freetype/freetype-2.4.0.tar.bz2
tar -jxf freetype-2.4.0.tar.bz2
cd reetype-2.4.0
# 安装到/usr/local/freetype
./configure –prefix=/usr/local/freetype
make && make install
下面我们重新编译PHP，加上参数–with-freetype-dir=/usr/local/freetype
./configure –with-freetype-dir=/usr/local/freetype
编译完成重启php
kill -USR2 `cat /usr/local/php/var/run/php-fpm.pid`
再GD库中找到FreeType Support说明安装成功！
需要注意的是，如果服务器freetype的版本是1.*，那么你可能需要改变编译参数为–with-ttf[=DIR]，以下转自ChinaUnix论坛：
字库 配置开关
FreeType 1.x 要激活 FreeType 1.x 的支持，加上 –with-ttf[=DIR]。
FreeType 2 要激活 FreeType 2 的支持，加上 –with-freetype-dir=DIR。
T1lib 要激活 T1lib（Type 1 字体），加上 –with-t1lib[=DIR]。
本地 TrueType 字符串函数 要激活本地 TrueType 字符串函数的支持，加上 –enable-gd-native-ttf。
 * */
for ($i=0;$i<4;$i++)
{
    $fontSize = 6;
    $fontColor =imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));

    $index = rand(0,count($strdb2));

    $cn = $strdb[$i];

    $captch_code.=$cn;

    imagettftext($image,mt_rand(20,24),mt_rand(-60,60),(40*$i+20),mt_rand(30,35),$fontColor,$fontFace,$cn);


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