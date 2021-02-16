<?php
define('INSYS', true);
include '../include/header.php';

if (!$user['login']){
    die('<script type="text/javascript">
            window.location.href="index.php";
        </script>');
}

if (empty($_GET['test'])){
    $_GET['test'] = 0;
}
    if (intval($_GET['test']) != $user['now']){
        die('<script type="text/javascript">
                window.location.href="./unlock.php?test='.$user['now'].'";
            </script>');
    }
    if ($user['now'] == 11){
        die('<script type="text/javascript">
                window.location.href="../end.php";
            </script>');
    }

    if ($user['now'] == 3){
        $field = array('test'.$user['now'],'red3');
    }else if($user['now'] == 10){
        $field = array('test'.$user['now'],'red1');
    }else{
        $field = 'test'.$user['now'];
    }
    $answer = $db->where(array('uid'=>$_SESSION['uid']))->field($field)->select('answer')[0];
    if ($user['now'] == 3){
        $red = $answer['red3'];
        $answer = $answer['test'.$user['now']];
    }else if ($user['now'] == 10){
        $red = $answer['red1'];
        $answer = $answer['test'.$user['now']];
    }else{
        $answer = $answer['test'.$user['now']];
    }
    include '../include/test'.intval($_GET['test']).'.php';

include '../include/footer.php';