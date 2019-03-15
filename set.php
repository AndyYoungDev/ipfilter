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

$overtime=$_GET['overtime'];
//设定重复时间
$prepare=$pdo->prepare("update overtime set `overtime`=? where id = 1");
$prepare->bindValue(1,$overtime);
$prepare->execute();
exit("设定时间为{$overtime}小时");



