<?php if (!defined('INSYS')) die();?>
<?php
include 'rcnb.php';
$rcnb = new RCNB();
$data =$rcnb->encode($answer); // 'ɌcńƁȓČņÞ'


?>
<div class="mdui-card mdui-m-t-5">
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title" >第九关</div>
        <div class="mdui-card-primary-subtitle" >rcnb.app</div>
    </div>
    <div class="mdui-card-content mdui-p-b-5">
        <div style="text-align: center"><?php echo $data;?></div>
        <div class="mdui-textfield mdui-textfield-floating-label" >
            <label class="mdui-textfield-label">请输入Flag</label>
            <input class="mdui-textfield-input" id="flag"/>
        </div>
        <div style="text-align: right;">
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" onclick="postFlag(9)">下一关  》》》</button>
        </div>
    </div>
</div>

<script src="../static/postFlag.js"></script>
