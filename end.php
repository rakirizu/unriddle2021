<?php
define('INSYS', true);
include './include/header.php';
if (!$user['login'] || $user['now'] != 11){
    die('<script type="text/javascript">
                window.location.href="./start/";
            </script>');
}


$red = $db->where(array('uid'=>$_SESSION['uid']))->field('red2')->select('answer')[0]['red2'];


?>
    <div class="mdui-card mdui-m-t-5">
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title">恭喜通关！</div>
            <div class="mdui-card-primary-subtitle mdui-typo">怎么样，是不是只有一点点难度～</div>
            <div class="mdui-card-content mdui-typo">
                红包Key2：<?php echo $red;?><br><a href="dashboard.php" >前去观战>>></a> | <a href="red.php" >红包领取>>></a>
            </div>
        </div>
    </div>
<?php include './include/footer.php'; ?>