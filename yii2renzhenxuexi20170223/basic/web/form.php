<?php
/**
 * Created by PhpStorm.
 * User: admindyn
 * Date: 2017/2/27
 * Time: 上午11:56
 */

if (isset($_REQUEST['authcode']))
{
    session_start();

    if (isset($_SESSION['authcode']))
    {
        if (strtolower( $_REQUEST['authcode']) == $_SESSION['authcode']){
            echo '<font color="#0000CC">输入正确</font>';
        }else{
            echo '<font color="#0000CC">输入错误</font>';
        }
    }else
    {
        echo '<font color="#0000CC">没有session</font>';

    }

    exit();

}
