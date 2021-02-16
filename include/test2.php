<?php if (!defined('INSYS')) die(); ?>
<div class="mdui-card mdui-m-t-5">
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title">第二关</div>
        <div class="mdui-card-primary-subtitle">奇怪的图片</div>
    </div>
    <div class="mdui-card-content mdui-p-b-5">
        <div style="text-align: center">

            <img src="../include/DvfoAgRfmtaSHoIwFzoE.png"><br>
            这是 NanBot QQ机器人的Logo，其中好像藏着什么秘密...
        </div>
        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">输入Flag</label>
            <input class="mdui-textfield-input" id="flag"/>
        </div>
        <div style="text-align: right">
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" onclick="postFlag(2)">下一关  》》》</button>
        </div>
    </div>
</div>

<script src="../static/postFlag.js"></script>