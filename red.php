<?php
define('INSYS', true);
include './include/header.php';
if (!$user['login']){
    die('<script type="text/javascript">
                window.location.href="./start/";
            </script>');
}
?>

    <!-- 这是真的！别想多了！这个页面没有任何有用的线索，只是个登录验证而已啦！ -->
    <div class="mdui-card mdui-m-t-5" style="max-width: 550px;margin: 0 auto">
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title">红包兑换中心</div>
            <div class="mdui-card-primary-subtitle">三批红包是独立的，一批只有5个，领完了后就无法领取了，1分钟内最多提交3次。</div>
        </div>
        <div class="mdui-divider"></div>
        <div class="mdui-card-content mdui-p-b-5">
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">红包Key</label>

                <input class="mdui-textfield-input" id="token"/>

            </div>
            <div style="text-align: right">
                <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" onclick="login()">登录</button>
            </div>
        </div>
    </div>
    <script src="./static/red.js"></script>

<?php include './include/footer.php'; ?>