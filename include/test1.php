<?php if (!defined('INSYS')) die(); ?>
<div class="mdui-card mdui-m-t-5">
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title">第一关</div>
        <div class="mdui-card-primary-subtitle">Debug</div>
    </div>
    <div class="mdui-card-content mdui-p-b-5">
        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label" >输入Flag</label>
            <input class="mdui-textfield-input" id="flag"/>
        </div>
        <div style="text-align: right">
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" onclick="postFlag(1)">下一关  》》》</button>
        </div>
        <div id="content" style="display: none"><?php echo $answer ;?></div>
    </div>
</div>
<script src="../static/test1.js"></script>
<script src="../static/postFlag.js"></script>