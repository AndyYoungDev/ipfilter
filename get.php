<?php
/**
 * Created by PhpStorm.
 * User: JackYang500
 * Date: 2019/3/15
 * Time: 13:12
 */
include "Pdo.php";
//PDO单例
$ins=\app\Pdo::getInstance();
//PDO句柄
$pdo=$ins->handle;


//设定重复时间
$overtime=$pdo->query("select overtime from overtime where id = 1")->fetch(PDO::FETCH_ASSOC);
$overtime=$overtime['overtime'];

exit("时间为{$overtime}小时");



