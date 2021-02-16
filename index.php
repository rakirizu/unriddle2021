<?php
define('INSYS',true);
include './include/header.php';
?>


<div class="mdui-card mdui-m-t-5" id="startTips_card">
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title">活动需知</div>
        <div class="mdui-card-primary-subtitle">这个解密解密可能有一点点难，但是别担心，并不会用到特别多的专业知识。努力前进，我在终点等你哦！</div>
    </div>

    <div class="mdui-card-content mdui-typo" id="startTips_content">
        <div class="mdui-typo-subheading-opacity">1. 您可能在以下地方找到迷解或帮助</div>
            <blockquote>
                <p>这里的提示在实际解密中可能会用到，但并不是所有的迷解都在这些里面</p>
            </blockquote>
        <ul>
            <li>控制台</li>
            <li>源代码</li>
            <li>网页内容</li>
            <li>...</li>
        </ul>

        <div class="mdui-typo-subheading-opacity">2. 以下地方您<span class="mdui-text-color-theme-accent">不会</span>找到迷解</div>
        <ul>
            <li>CSS</li>
            <li>JS</li>
            <li>有明确说明的地方</li>
        </ul>

        <div class="mdui-typo-subheading-opacity">3. 相关规则约定以及提示</div>
        <ul>
            <li>1. 推荐使用 PC 端进行解密挑战，同时推荐使用 Chrome 浏览器，以获得良好的体验</li>
            <li>2. 请不要使用拒绝式服务攻击（DDOS）或与之相关的攻击（如CC）影响服务器的正常运行</li>
            <li>3. 不推荐使用目录暴力破解的方式，因为至少都是由16位及以上的大写、小写、数字、下划线构成</li>
            <li>4. 活动时间：2021年2月13日10时0分0秒 - 2021年2月16日18时0分0秒</li>
            <li>5. 本次活动总共准备了66.66的红包，分为3批，1批5个22.22元，总共15个，先到先得。</li>
            <li>6. 1批红包将在活动结束页面直接展出，另外两批红包将在不同关卡中隐藏。</li>
            <li>7. 如果所有红包都被领完后，系统将自动提前结束此次活动</li>
            <li>8. 活动中所获得的红包统一在2021年2月18日通过支付宝拼手气发放，届时机器人QQ将会推送红包二维码</li>
            <li>9. 如果出现服务器无法访问、机器人掉线等问题，请及时联系QQ 80071319 处理</li>
            <li>10. 为确保活动公平性，只有30级以上QQ可参与，活动所有密钥均为随机生成且每个人每一关密钥均不一样，也恳请大家不要分享流程</li>
            <li>11. 活动结束后，活动的流程、思路、答案均会在 <a href="https://space.bilibili.com/36181987">Bilibili: 桐泉和谷</a> 通过视频方式公布；活动期间您也可以在 <a href="./dashboard.php">这里</a> 查看活动实时运行状态仪表盘，不会的小伙伴也来吃瓜啊~</li>
            <li>12. 关卡Flag确定提交后，如果正确将无法再返回至前面的关卡，即如果错过红包将无法再次回到前面寻找，所以请仔细噢~</li>
        </ul>

        <div class="mdui-typo-subheading-opacity">4. 活动流程</div>
        <ul>
            <li>1. 添加机器人QQ为好友</li>
            <li>2. 发送 <kbd>新年解密</kbd> 获得密钥</li>
            <li>3. 将密钥填写到网页里面开始解密</li>
            <li>4. 如果现是活动时间内，您就可以开始从这个页面中找出线索了...</li>
        </ul>
        <blockquote>
            <p>祝您好运！Good Luck！</p>
        </blockquote>
        <div style="color: #FFF;float: left;line-height: 18px;min-height: 18px"><?php
            $time = time();
            if ($time > 1613181600 && $time < 1613469600){
                echo '机器人QQ：3356764532，解谜入口：https://happynewyear.acequan.com/start/，红包领取：https://happynewyear.acequan.com/red.php；不要透露思路！不要透露思路！不要透露思路！';
            }
            ?></div>
    </div>

</div>

<script src="./static/startTips.js"></script>
<?php include './include/footer.php'; ?>