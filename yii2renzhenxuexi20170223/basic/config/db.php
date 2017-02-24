<?php
/*公司mac盒子数据库
create database yii2basic;
create table test (name varchar(256),title text(1024),id  int not null primary key auto_increment);*/
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => 'asd1453NMDmysql',
    'charset' => 'utf8',
];
