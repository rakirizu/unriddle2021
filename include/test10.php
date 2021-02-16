<?php if (!defined('INSYS')) die();?>
<?php


$pre_str =<<<ST
OlOlll="(x)";OllOlO=" String";OlllOO="tion";OlOllO="Code(x)}";OllOOO="Char";OlllOl="func";OllllO=" l = ";OllOOl=".from";OllOll="{return";Olllll="var";eval(Olllll+OllllO+OlllOl+OlllOO+OlOlll+OllOll+OllOlO+OllOOl+OllOOO+OlOllO);eval(l(79)+l(61)+l(102)+l(117)+l(110)+l(99)+l(116)+l(105)+l(111)+l(110)+l(40)+l(109)+l(41)+l(123)+l(114)+l(101)+l(116)+l(117)+l(114)+l(110)+l(32)+l(83)+l(116)+l(114)+l(105)+l(110)+l(103)+l(46)+l(102)+l(114)+l(111)+l(109)+l(67)+l(104)+l(97)+l(114)+l(67)+l(111)+l(100)+l(101)+l(40)+l(77)+l(97)+l(116)+l(104)+l(46)+l(102)+l(108)+l(111)+l(111)+l(114)+l(40)+l(109)+l(47)+l(49)+l(48)+l(48)+l(48)+l(48)+l(41)+l(47)+l(57)+l(57)+l(41)+l(59)+l(125));
ST;
$mystr ='//something begin,keep this line!important
if(typeof red != "undefined"){console.log("RedPacketKey1 is:'.$red.'");}
console.log("Flag is:'.$answer.'");
//something end,keep this line!important';
$tmpStr = chunk_split($mystr,1,"+");
$arr = explode('+', $tmpStr);
$tmp = 'eval(""';
foreach ($arr as $k => $v){
    $tmp .= '+O('.intval(((ord($v)+(rand(99999999,999999999)/1000000000))*99)*10000).')';
}
$tmp .='+"");';

$data  = $pre_str.$tmp;
?>
<div class="mdui-card mdui-m-t-5">
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title" >第十关</div>
        <div class="mdui-card-primary-subtitle" >让我们朝着终点run起来</div>
    </div>
    <div class="mdui-card-content mdui-p-b-5">
        <div class="mdui-typo mdui-text-center"><?php echo $data;?></div>
        <div class="mdui-textfield mdui-textfield-floating-label" >
            <label class="mdui-textfield-label">请输入Flag</label>
            <input class="mdui-textfield-input" id="flag"/>
        </div>
        <div style="text-align: right;">
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" onclick="postFlag(10)">完成挑战 》》》</button>
        </div>
    </div>
</div>

<script src="../static/postFlag.js"></script>

