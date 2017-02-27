<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');


//这里 的实现 就是利用 base 下的 Application类 并且继承Component 以及用到Event类
//这里就用到了事件触发机制
(new yii\web\Application($config))->run();