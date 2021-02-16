<?php
define('INSYS', true);
include '../include/header.php';
if ($user['login']){
    die('<script type="text/javascript">
                window.location.href="./unlock.php";
            </script>');
}
?>

<!-- 这是真的！别想多了！这个页面没有任何有用的线索，只是个登录验证而已啦！ -->
    <div class="mdui-card mdui-m-t-5" style="max-width: 550px;margin: 0 auto">
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title">开始你的表演</div>
            <div class="mdui-card-primary-subtitle">在别的游戏里像我这么帅的一般都是主角咯。</div>
        </div>
        <div class="mdui-divider"></div>
        <div class="mdui-card-content mdui-p-b-5">
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">输入您的口令</label>

                <input class="mdui-textfield-input" id="token"/>
                <div class="mdui-textfield-helper">可通过QQ机器人获得</div>
            </div>
            <div style="text-align: right">
                <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" onclick="login()">登录</button>
            </div>
        </div>
    </div>
<script src="../static/login.js"></script>
<?php include '../include/footer.php'; ?>