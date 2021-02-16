<?php if (!defined('INSYS')) die();
function hex2rgb($hexColor){
    $color=str_replace('#','',$hexColor);
    if (strlen($color)> 3){
        $rgb=array(
            'r'=>hexdec(substr($color,0,2)),
            'g'=>hexdec(substr($color,2,2)),
            'b'=>hexdec(substr($color,4,2))
        );
    }else{
        $r=substr($color,0,1). substr($color,0,1);
        $g=substr($color,1,1). substr($color,1,1);
        $b=substr($color,2,1). substr($color,2,1);
        $rgb= array(
            'r'=>hexdec($r),
            'g'=>hexdec($g),
            'b'=>hexdec($b)
        );
    }
    return "rgb({$rgb['r']},{$rgb['g']},{$rgb['b']})";
}
?>
<div class="mdui-card mdui-m-t-5">
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title" style="opacity:1;background-color: <?php echo hex2rgb(substr($answer,0,6));?>">第七关</div>
        <div class="mdui-card-primary-subtitle" style="opacity:1;background-color: <?php echo hex2rgb(substr($answer,6,6));?>">变色了###</div>
    </div>
    <div class="mdui-card-content mdui-p-b-5">
        <div class="mdui-textfield mdui-textfield-floating-label" style="opacity:1;background-color: <?php echo hex2rgb(substr($answer,12,6));?>">
            <label class="mdui-textfield-label">请输入Flag</label>
            <input class="mdui-textfield-input" id="flag"/>
        </div>
        <div style="opacity:1;text-align: right;background-color: <?php echo hex2rgb(substr($answer,18,6));?>">
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" onclick="postFlag(7)">下一关  》》》</button>
        </div>
    </div>
</div>

<script src="../static/postFlag.js"></script>