<?php
/**
 * Created by PhpStorm.
 * User: JackYang500
 * Date: 2019/3/15
 * Time: 13:15
 */

namespace app;
ini_set('date.timezone','Asia/Shanghai');
date_default_timezone_set('Asia/Shanghai');
class Pdo
{
    private $dsn="mysql:host=127.0.0.1;dbname=ip";
    private $dbUser="root";
    private $dbPassword="";
    public static $instance;
    public $handle;
    private function __construct()
    {
        try{
            $pdo=new \PDO($this->dsn,$this->dbUser,$this->dbPassword);
            $this->handle=$pdo;
        }catch (\Exception $exception){
            echo $exception->getMessage();
            die;
        }
    }
    public static function getInstance()
    {
        if (!(self::$instance instanceof Pdo)){
            self::$instance=new self();
        }
        return self::$instance;
    }
    public function query($sql){
        return $handle=$this->handle->query($sql)->fetchAll();
    }
    public function execute($sql){
        $this->handle->exec($sql);
        return true;
    }
}