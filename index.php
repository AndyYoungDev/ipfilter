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
//获取IP并转换int型
$ip=$_SERVER['REMOTE_ADDR'];

$ip=ip2long($ip);

//查询是否在规定时间内存在某ip

//查询设定的不允许重复时间
$overtime=$pdo->query("select overtime from overtime where id = 1")->fetch(PDO::FETCH_ASSOC);
$overtime=$overtime['overtime'];
$now=time();
//计算出截止时间
$option=$now-$overtime*3600;

//查询是否有重复ip
$isIp=$pdo->prepare("select * from ip where ip=? and created_at>? limit 1");
$isIp->bindValue(1,$ip);
$isIp->bindValue(2,$option);
$isIp->execute();
$res=$isIp->fetchAll(PDO::FETCH_ASSOC);
if (!empty($res)){
    exit("ip重复");
}

//不重复则记录
$prepare=$pdo->prepare("insert into ip (`ip`,`created_at`) values (?,?)");
$prepare->bindValue(1,$ip);
$prepare->bindValue(2,time());
$prepare->execute();
exit("ip不重复");



