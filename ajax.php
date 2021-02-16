<?php

define('INSYS', true);
/** @var MMysql $db */
require './include/core.php';
if (empty($_GET['mod'])){
    dieJson(-1,'What the fuck?');
}
if ($_GET['mod'] === 'login'){
    if(empty($_POST['token'])){
        dieJson(-1,'请输入您的Token');
    }
    if ($time < 1613181600 || $time > 1613469600){
        dieJson(-2,'目前不在活动时间内，无法登录');
    }
    $res = $db->where(array('token'=> db_string($_POST['token'])))->field(array('id','cn'))->select('users')[0];
    if (empty($res)){
        dieJson(-1,'Token不存在');
    }else{
        $status = $db->field('now')->where(array('uid'=>$res['id']))->select('status');
        $_SESSION['uid'] = $res['id'];
        $_SESSION['token'] = $_POST['token'];
        $db->where(array('id'=>$_SESSION['uid']))->update('users',array('login'=>time()));
        if (!empty($status)){
            dieJson(2,'ok',array('id'=>$res['id'],'cn'=>$res['cn'],'now'=>$status[0]['now']));
        }else{
            $db->insert('status',array('uid'=>$res['id'],'now'=>1, 'start1'=> time()));
            dieJson(1,'ok',array('id'=>$res['id'],'cn'=>$res['cn'],'now'=>1));
        }
    }
}

if ($_GET['mod'] === 'flag'){
    if (!$user['login']){
        dieJson(-1,'请先登录');
    }
    $test = intval($_POST['test']);
    if ($test < 1 || $test > 10){
        dieJson(-1,'数据异常');
    }
    if (empty($_POST['token'])){
        dieJson(-1,'Flag不能为空');
    }
    $num = $db->field('count(*) as num')->where(array('uid'=>$_SESSION['uid'],'time'=>array(time()-60 , '>' , 'AND')))->select('trys')[0]['num'];
    if ($num >= 10){
        dieJson(-3,'1分钟内最多提交10次，休息一下叭');
    }
    $res = $db->field('time')->where(array('uid'=>$_SESSION['uid'],'val'=>db_string($_POST['token'])))->select('trys');
    if($res){
         dieJson(-3,'都说了这个Flag是错误的啦...');
    }
    if (intval($test) != $user['now']){
        $db->insert('trys',array('uid'=>$_SESSION['uid'],'test'=>$test,'time'=>time(),'val'=>$_POST['token'],'warn'=>1));
        dieJson(-2,'数据异常，当前题目ID与数据库中的不符，请不要尝试模拟POST，此次错误已记录到数据库');
    }

    $answer = $db->where(array('uid'=>$_SESSION['uid']))->field('test'.$user['now'])->select('answer')[0]['test'.$user['now']];
    if ($test == 1){
        $answer = substr(base64_encode($answer),0,24);
    }
    if ($test == 4){
        $answer = '入Flag';
    }

    if (hash_equals(mb_strtolower($answer),mb_strtolower($_POST['token']))){
        $db->insert('trys',array('uid'=>$_SESSION['uid'],'test'=>$test,'time'=>time(),'val'=>$_POST['token'],'succ'=>1));
        $db->where(array('uid'=>$_SESSION['uid']))->update('status',array('end'.intval($test)=>time(),'start'.(intval($test) + 1)=>time(),'now'=>intval($test)+1));
        dieJson(1,'ok');
    }else{
        $db->insert('trys',array('uid'=>$_SESSION['uid'],'test'=>$test,'time'=>time(),'val'=>$_POST['token']));
        dieJson(-1, '这个Flag不对的呐，试试其他吧');
    }
}
if ($_GET['mod'] === 'getRed'){
    if (!$user['login']){
        dieJson(-1,'请先登录');
    }
    if (empty($_POST['token'])){
        dieJson(-1,'Key不能为空');
    }

    $num = $db->field('count(*) as num')->where(array('uid'=>$_SESSION['uid'],'time'=>array(time()-60 , '>' , 'AND')))->select('redtry')[0]['num'];
    if ($num >= 3){
        dieJson(-3,'1分钟内最多提交3次，休息一下叭');
    }
    
    $red = $db->field(array('red1','red2','red3'))->where(array('uid'=>$_SESSION['uid']))->select('answer')[0];
    if (hash_equals($red['red1'],$_POST['token'])){
        if ($user['now'] < 10){
            makeRedLog(0,0,1);
            dieJson(-2, '这个Key不是红包Key呐，试试其他吧~');
        }
        
        $res = $db->field('id')->where(array('uid'=>$_SESSION['uid'],'isok'=>1,'redno'=>1))->select('redtry');
        if($res){
            dieJson(-3, '这个红包你已经领取过啦！');
        }
        
        $num = $db->field('count(*) as num')->where(array('redno'=>1,'isok'=>1))->select('redtry')[0]['num'];
        if ($num >= 5){
            dieJson(-1,'新年快乐，RED1红包已经领完了，下次记得早点吖，祝您玩的愉快~');
        }
        makeRedLog(1,1);
        dieJson(1,'ok');
    }

    if (hash_equals($red['red2'],$_POST['token'])){
        if ($user['now'] != 11){
            makeRedLog(0,0,1);
            dieJson(-2, '这个Key不是红包Key呐，试试其他吧~');
        }
        $res = $db->field('id')->where(array('uid'=>$_SESSION['uid'],'isok'=>1,'redno'=>2))->select('redtry');
        if($res){
            dieJson(-3, '这个红包你已经领取过啦！');
        }
        $num = $db->field('count(*) as num')->where(array('redno'=>2,'isok'=>1))->select('redtry')[0]['num'];
        if ($num >= 5){
            dieJson(-1,'新年快乐，RED2红包已经领完了，下次记得早点吖，祝您玩的愉快~');
        }
        makeRedLog(1,2);
        dieJson(1,'ok');
    }

    if (hash_equals($red['red3'],$_POST['token'])){
        if ($user['now'] < 3){
            makeRedLog(0,0,1);
            dieJson(-2, '这个Key不是红包Key呐，试试其他吧~');
        }
        $res = $db->field('id')->where(array('uid'=>$_SESSION['uid'],'isok'=>1,'redno'=>3))->select('redtry');
        if($res){
            dieJson(-3, '这个红包你已经领取过啦！');
        }
        $num = $db->field('count(*) as num')->where(array('redno'=>3,'isok'=>1))->select('redtry')[0]['num'];
        if ($num >= 5){
            dieJson(-1,'新年快乐，RED3红包已经领完了，下次记得早点吖，祝您玩的愉快~');
        }
        makeRedLog(1,3);
        dieJson(1,'ok');
    }
    makeRedLog();
    dieJson(-1, '这个Key不是红包Key呐，试试其他吧~');
}
if ($_GET['mod'] === 'status'){
    $m = new Memcached();
    $m->addServer('127.0.0.1','11211');
    if(time() - $m->get('time') < 30){
        dieJson(1,'ok',$m->get('data'));
    }

    $status['all'] = $db->field('count(*) as num')->select('users')[0]['num'];

    $status['time'] = date('Y-m-d H:i:s');
    $status['red1'] = $db->field('count(*) as num')->where(array('redno'=>1,'isok'=>1))->select('redtry')[0]['num']/5;
    $status['red2'] = $db->field('count(*) as num')->where(array('redno'=>2,'isok'=>1))->select('redtry')[0]['num']/5;
    $status['red3'] = $db->field('count(*) as num')->where(array('redno'=>3,'isok'=>1))->select('redtry')[0]['num']/5;

    $status['nowTest'][0] = $db->field('count(*) as num')->where(array('now'=>1))->select('status')[0]['num'];
    $status['nowTest'][1] = $db->field('count(*) as num')->where(array('now'=>2))->select('status')[0]['num'];
    $status['nowTest'][2] = $db->field('count(*) as num')->where(array('now'=>3))->select('status')[0]['num'];
    $status['nowTest'][3] = $db->field('count(*) as num')->where(array('now'=>4))->select('status')[0]['num'];
    $status['nowTest'][4] = $db->field('count(*) as num')->where(array('now'=>5))->select('status')[0]['num'];
    $status['nowTest'][5] = $db->field('count(*) as num')->where(array('now'=>6))->select('status')[0]['num'];
    $status['nowTest'][6] = $db->field('count(*) as num')->where(array('now'=>7))->select('status')[0]['num'];
    $status['nowTest'][7] = $db->field('count(*) as num')->where(array('now'=>8))->select('status')[0]['num'];
    $status['nowTest'][8] = $db->field('count(*) as num')->where(array('now'=>9))->select('status')[0]['num'];
    $status['nowTest'][9] = $db->field('count(*) as num')->where(array('now'=>10))->select('status')[0]['num'];


    $status['post'][0] = $db->field('count(*) as num')->where(array('test'=>1))->select('trys')[0]['num'];
    $status['post'][1] = $db->field('count(*) as num')->where(array('test'=>2))->select('trys')[0]['num'];
    $status['post'][2] = $db->field('count(*) as num')->where(array('test'=>3))->select('trys')[0]['num'];
    $status['post'][3] = $db->field('count(*) as num')->where(array('test'=>4))->select('trys')[0]['num'];
    $status['post'][4] = $db->field('count(*) as num')->where(array('test'=>5))->select('trys')[0]['num'];
    $status['post'][5] = $db->field('count(*) as num')->where(array('test'=>6))->select('trys')[0]['num'];
    $status['post'][6] = $db->field('count(*) as num')->where(array('test'=>7))->select('trys')[0]['num'];
    $status['post'][7] = $db->field('count(*) as num')->where(array('test'=>8))->select('trys')[0]['num'];
    $status['post'][8] = $db->field('count(*) as num')->where(array('test'=>9))->select('trys')[0]['num'];
    $status['post'][9] = $db->field('count(*) as num')->where(array('test'=>10))->select('trys')[0]['num'];


    $status['success'][0] = $db->field('count(*) as num')->where(array('test'=>1,'succ'=>1))->select('trys')[0]['num'];
    $status['success'][1] = $db->field('count(*) as num')->where(array('test'=>2,'succ'=>1))->select('trys')[0]['num'];
    $status['success'][2] = $db->field('count(*) as num')->where(array('test'=>3,'succ'=>1))->select('trys')[0]['num'];
    $status['success'][3] = $db->field('count(*) as num')->where(array('test'=>4,'succ'=>1))->select('trys')[0]['num'];
    $status['success'][4] = $db->field('count(*) as num')->where(array('test'=>5,'succ'=>1))->select('trys')[0]['num'];
    $status['success'][5] = $db->field('count(*) as num')->where(array('test'=>6,'succ'=>1))->select('trys')[0]['num'];
    $status['success'][6] = $db->field('count(*) as num')->where(array('test'=>7,'succ'=>1))->select('trys')[0]['num'];
    $status['success'][7] = $db->field('count(*) as num')->where(array('test'=>8,'succ'=>1))->select('trys')[0]['num'];
    $status['success'][8] = $db->field('count(*) as num')->where(array('test'=>9,'succ'=>1))->select('trys')[0]['num'];
    $status['success'][9] = $db->field('count(*) as num')->where(array('test'=>10,'succ'=>1))->select('trys')[0]['num'];

    //SELECT `A`.`id`,`A`.`cn`,`B`.`end10`,(`B`.`end10` - `B`.`start1`) as len FROM `users` A, `status` B WHERE `B`.`now` = 11 AND `A`.`id` = `B`.`uid`
    $res = $db->field('`A`.`id`,`A`.`cn`,`B`.`end10`,(`B`.`end10` - `B`.`start1`) as len')->where('`B`.`now` = 11 AND `A`.`id` = `B`.`uid`')->select('`users` A, `status` B');
    $status['done'] = count($res);
    $status['doneList'] = $res;



    $res = $db->field('`A`.`id`,`A`.`cn`,`B`.`time`,`B`.`test`,`B`.`succ`')->where('`A`.`id` = `B`.`uid`')->limit(200)->order(array('time'=>'desc'))->select('`users` A, `trys` B');
    $status['tryList'] = $res;

    $res = $db->field('`A`.`id`,`A`.`cn`,`B`.`time`,`B`.`isok`,`B`.`redno`')->where('`A`.`id` = `B`.`uid`')->limit(200)->order(array('time'=>'desc'))->select('`users` A, `redtry` B');
    $status['redList'] = $res;

    foreach ($status['doneList'] as &$item){
        $item['end10'] =  formatTime($item['end10']);
        $item['len'] =  timeCalculation($item['len']);
    }
   foreach ($status['redList'] as &$item){
        $item['time'] =  formatTime($item['time']);
    }

    foreach ($status['tryList'] as &$item){
        $item['time'] =  formatTime($item['time']);
    }

    $m->set('time',time());
    $m->set('data',$status);
    dieJson(1,'ok',$status);
}

if ($_GET['mod'] === 'createUsers'){
    $token = 'TKbt1BHX7fWPCUPXf7qNUNAff0iG6L0Kn4AliXkVCIBju8ubHh9UzTIvXTZnUV7i';
    if ($_POST['token'] !== $token){dieJson(-1,'err');}
    $res = $db->field('token')->where(array('qq'=>intval($_POST['qq'])))->limit(1)->select('users');
    if ($res){
        dieJson(1,'ok',array('token'=>$res[0]['token']));
    }
    $token = GetRandStr(16);
    while ($db->where(array('token'=>db_string($token)))->select('users')){
        $token = GetRandStr(16);
    }

    $db->insert('users',array(
        'qq'=>$_POST['qq'],
        'cn'=>$_POST['cn'],
        'reg'=>time(),
        'token'=>$token,

    ));
    $he = '';
    for($i = 0; $i < 12; $i++){
        $he .=dechex(rand(90,200));
    }
    $b = $db->insert('answer',array(
        'uid'=>$db->getLastInsertId(),
        'test1'=>GetRandStr(25),
        'test2'=>'B809C0B77B7DD13ABEAFD22B26C04DA4',
        'test3'=>GetRandStr(20),
        'test4'=>'',
        'test5'=>random_user(18),
        'test6'=>GetRandStr(26),
        'test7'=>$he,
        'test8'=>GetRandStr(28),
        'test9'=>GetRandStr(29),
        'test10'=>GetRandStr(27),
        'red1'=>GetRandStr(32),
        'red2'=>GetRandStr(32),
        'red3'=>GetRandStr(20)
    ));

    dieJson(1,'ok',array('token'=>$token));
}

function makeRedLog($isok = 0,$redno = 0,$err = 0){
    global $db;
    $db->insert('redtry',array(
        'uid'=>$_SESSION['uid'],
        'val'=>$_POST['token'],
        'isok'=>$isok,
        'time'=>time(),
        'redno'=>$redno,
        'err'=>$err
    ));
}

function formatTime($sTime, $formt = 'Y-m-d') {

    if (!$sTime) {
        return '';
    }

    //sTime=源时间，cTime=当前时间，dTime=时间差
    $cTime = time();
    $dTime = $cTime - $sTime;
    $dDay = intval(date('z',$cTime)) - intval(date('z',$sTime));
    $dYear = intval(date('Y',$cTime)) - intval(date('Y',$sTime));

    //n秒前，n分钟前，n小时前，日期
    if ($dTime < 60 ) {
        if ($dTime < 10) {
            return '刚刚';
        } else {
            return intval(floor($dTime / 10) * 10).'秒前';
        }
    } elseif ($dTime < 3600 ) {
        return intval($dTime/60).'分钟前';
    } elseif( $dTime >= 3600 && $dDay == 0  ){
        return intval($dTime/3600).'小时前';
    } elseif( $dDay > 0 && $dDay<=7 ){
        return intval($dDay).'天前';
    } elseif( $dDay > 7 &&  $dDay <= 30 ){
        return intval($dDay/7).'周前';
    } elseif( $dDay > 30 ){
        return intval($dDay/30).'个月前';
    } elseif ($dYear==0) {
        return date('m月d日', $sTime);
    } else {
        return date($formt, $sTime);
    }
}
function timeCalculation($subTime)
{

    $day = $subTime > 86400 ? floor($subTime / 86400) : 0;
    $subTime -= $day * 86400;
    $hour = $subTime > 3600 ? floor($subTime / 3600) : 0;
    $subTime -= $hour * 3600;
    $minute = $subTime > 60 ? floor($subTime / 60) : 0;
    $subTime -= $minute * 60;
    $second = $subTime;

    $dayText = $day ? $day . '天' : '';
    $hourText = $hour ? $hour . '小时' : '';
    $minuteText = $minute ? $minute . '分钟' : '';

    $date = $dayText . $hourText . $minuteText . ($second ? $second . '秒' : '');
    return $date;
}
function random_user($len = 8)
{
    $user = '';
    $lchar = 0;
    $char = 0;
    for($i = 0; $i < $len; $i++)
    {
        while($char == $lchar)
        {
            $char = rand(65, 116);
            if($char > 90) $char += 6;
        }
        $user .= chr($char);
        $lchar = $char;
    }
    return $user;
}