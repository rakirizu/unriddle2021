<?php if (!defined('INSYS')) die(); ?>
<?php
$keyboard = array(
    'a'=>'2(1)',
    'b'=>'2(2)',
    'c'=> '2(3)',
    'd'=>'3(1)',
    'e'=>'3(2)',
    'f'=> '3(3)',
    'g'=>'4(1)',
    'h'=>'4(2)',
    'i'=> '4(3)',
    'j'=>'5(1)',
    'k'=>'5(2)',
    'l'=> '5(3)',
    'm'=>'6(1)',
    'n'=>'6(2)',
    'o'=> '6(3)',
    'p'=>'7(1)',
    'q'=>'7(2)',
    'r'=> '7(3)',
    's'=>'7(4)',
    't'=>'8(1)',
    'u'=> '8(2)',
    'v'=>'8(3)',
    'w'=>'9(1)',
    'x'=> '9(2)',
    'y'=>'9(3)',
    'z'=> '9(4)',
);
preg_match_all("/./u", strtolower($answer), $arr);
$s = '';
foreach ($arr[0] as $item){
    $s .= $keyboard[$item];
}
?>
<div class="mdui-card mdui-m-t-5">
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title">第五关</div>
        <div class="mdui-card-primary-subtitle">十年前的abcdefghijklmnopq...</div>
    </div>
    <div class="mdui-card-content mdui-p-b-5">
        <div style="text-align: center;"><?php echo $s;?></div>
        <div style="text-align: center">
            提示：Flag为18个字符
        </div>
        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">请输入Flag</label>
            <input class="mdui-textfield-input" id="flag"/>
        </div>
        <div style="text-align: right">
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" onclick="postFlag(5)">下一关  》》》</button>
        </div>
    </div>
</div>

<script src="../static/postFlag.js"></script>