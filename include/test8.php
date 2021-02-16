<?php if (!defined('INSYS')) die();?>
<?php
$base = file_get_contents('../include/illust_45270406_20200907_161751.jpg');
$base = $base . ' flag:'.$answer;
$base64 = base64_encode($base);
?>
<div class="mdui-card mdui-m-t-5">
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title" >第八关</div>
        <div class="mdui-card-primary-subtitle" >刀剑如光，闪耀如钻！</div>
    </div>
    <div class="mdui-card-content mdui-p-b-5">
        <div style="text-align: center"><img src= "data:image/jpeg;base64,<?php echo $base64;?>"/><br>这个图片文件似乎有点奇怪</div>
        <div class="mdui-textfield mdui-textfield-floating-label" >
            <label class="mdui-textfield-label">请输入Flag</label>
            <input class="mdui-textfield-input" id="flag"/>
        </div>
        <div style="text-align: right;">
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" onclick="postFlag(8)">下一关  》》》</button>
        </div>
    </div>
</div>

<script src="../static/postFlag.js"></script>
