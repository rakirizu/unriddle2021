<?php if (!defined('INSYS')) die(); ?>
<?php
//下面的是数据库操作说明

/*
 * 数据库使用说明
$mysql = new MMysql($configArr);

//插入
$data = array(
    'sid'=>101,
    'aa'=>123456,
    'bbc'=>'aaaaaaaaaaaaaa',
);
$mysql->insert('t_table',$data);
//查询
$res = $mysql->field(array('sid','aa','bbc'))
    ->order(array('sid'=>'desc','aa'=>'asc'))
    ->where(array('sid'=>"101",'aa'=>array('123455','>','or')))
    ->limit(1,2)
    ->select('t_table');
$res = $mysql->field('sid,aa,bbc')
    ->order('sid desc,aa asc')
    ->where('sid=101 or aa>123455')
    ->limit(1,2)
    ->select('t_table');
//获取最后执行的sql语句
$sql = $mysql->getLastSql();
//直接执行sql语句
$sql = "show tables";
$res = $mysql->doSql($sql);
//事务
$mysql->startTrans();
$mysql->where(array('sid'=>102))->update('t_table',array('aa'=>666666));
$mysql->where(array('sid'=>103))->update('t_table',array('bbc'=>'呵呵8888呵呵'));
$mysql->where(array('sid'=>104))->delete('t_table');
$mysql->commit();
*/

error_reporting(E_ERROR);
//session_set_cookie_params(2592000);//保持登陆30天
//session_start();//开启SESSION功能
date_default_timezone_set('PRC');//设置当前时区为中国
header("Content-type: text/html; charset=utf-8");
session_start();

//链接数据库s
include 'db.class.php';

try {
    $db = new MMysql(array('host' => 'localhost', 'port' => 3306, 'user' => 'happynewyear_ace', 'passwd' => 'G3NajHWwZDJTcCcx', 'dbname' => 'happynewyear_ace'));
} catch (Exception $e) {
    dieJson(-100,$e->getMessage());
}

if (!empty($_SESSION['uid'])){
    $info = $db->where(array('id'=>$_SESSION['uid']))->select('users');
    if(!empty($info)){
        $info = $info[0];
        if ($_SESSION['token'] === $info['token']){
            $user['info'] = $info;
            $user['now'] = $db->where(array('uid'=>$info['id']))->field('now')->select('status')[0]['now'];
            $user['login'] = true;
        }else{
            $user['login'] = false;
        }
    }

}else{
    $user['login'] = false;
}

$time = time();
if ($time < 1613181600 || $time > 1613469600){
    $user['login'] = false;
}


function db_string($str){
    return '\'' . addslashes($str) . '\'';
}


function dieJson($code, $msg, $data = null){
    $b['code'] = intval($code);
    $b['msg'] = $msg;
    if (!empty($data)){
        $b['data'] = $data;
    }
    die(json_encode($b));
}

function GetRandStr($length){
    //字符组合
    $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $len = strlen($str)-1;
    $randstr = '';
    for ($i=0;$i<$length;$i++) {
        $num=mt_rand(0,$len);
        $randstr .= $str[$num];
    }
    return $randstr;
}