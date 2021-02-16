<?php if (!defined('INSYS')) die(); ?>
<div class="mdui-card mdui-m-t-5">
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title">第四关</div>
        <div class="mdui-card-primary-subtitle">so easy</div>
    </div>
    <div class="mdui-card-content mdui-p-b-5">
        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">请输 入Flag</label>
            <input class="mdui-textfield-input" id="flag"/>
        </div>
        <div style="text-align: right">
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" onclick="postFlag(4)">下一关  》》》</button>
        </div>
    </div>
</div>

<script src="../static/postFlag.js"></script>