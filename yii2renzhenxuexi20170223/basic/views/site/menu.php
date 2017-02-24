<?php
/**
 * Created by PhpStorm.
 * User: admindyn
 * Date: 2017/2/24
 * Time: 下午3:03
 */

use app\components\TopMenu2;
?>

<div>
    <?php $menu = TopMenu2::begin(); ?>

    <?= $menu->addMenu('新导航2');?>
    <?= $menu->addMenu('新导航2');?>

    <li>menu3</li>

    <?php TopMenu2::end(); ?>
</div>