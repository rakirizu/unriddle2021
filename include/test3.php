<?php if (!defined('INSYS')) die(); ?>
<?php
$baseImg = createQrCode($answer);
$redImg = createQrCode($red);
function createQrCode($answer){

    $pic = imagecreatetruecolor(400,140);
    $white = imagecolorallocate($pic,255,255,255);
    $bin = StrToBin($answer);
    preg_match_all("/./u", $bin, $arr);
    $top = 0;
    $left = 0;
    foreach ($arr[0] as $item){
        if(!$item){
            imagefilledrectangle($pic,$left * 20,$top * 20,($left+1)*20,($top+1) * 20,$white);
        }
        $top++;
        if ($top > 6){
            $top = 0;
            $left++;
        }
    }

    ob_start();  //开启缓存
    imagejpeg($pic);  //将图片输出到缓存
    $imageCode = ob_get_contents();  //读取缓存内容
    $baseImg = base64_encode($imageCode);
    ob_end_clean();  //关闭缓存
    return $baseImg;
}
function StrToBin($str){
  //1.列出每个字符
  $arr = preg_split('/(?<!^)(?!$)/u', $str);
  //2.unpack字符
  foreach($arr as &$v){
      $temp = unpack('H*', $v);
      $v = base_convert($temp[1], 16, 2);
      if (strlen($v) < 7){
          $v = '0'.$v;
      }
      unset($temp);
  }

  return join("",$arr);
}

/**
 * 将二进制转换成字符串
 * @param type $str
 * @return type
 */
function BinToStr($str){
    $arr = explode(' ', $str);
    foreach($arr as &$v){
        $v = pack("H".strlen(base_convert($v, 2, 16)), base_convert($v, 2, 16));
    }
    return join(' ', $arr);
}
?>
<div class="mdui-card mdui-m-t-5">
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title">第三关</div>
        <div class="mdui-card-primary-subtitle">作者闲的没事做自己研究了一个二极码。据说名字里面藏着大秘密,极好像是北极到南极即从上到下，那么另外两个字又是什么意思呢...</div>
    </div>
    <div class="mdui-card-content mdui-p-b-5">
        <div style="text-align: center">
            <img src= "data:image/png;base64,<?php echo $baseImg;?>"/><br>
            虽然很像二维码，但真的真的不是二维码，您能解出里面的内容吗？<br>提示：Flag长度为20个字符
        </div>
        <div id="redPacketKey3" style="text-align: center;display: none;"><img src="data:image/png;base64,<?php echo $redImg;?>"></div>

        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">输入Flag</label>
            <input class="mdui-textfield-input" id="flag"/>
        </div>
        <div style="text-align: right">
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" onclick="postFlag(3)">下一关  》》》</button>
        </div>
    </div>
</div>

<script src="../static/postFlag.js"></script>