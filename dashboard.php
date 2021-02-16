<?php
define('INSYS', true);
include './include/header.php';
?>
    <div class="mdui-card mdui-m-t-5">
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title">仪表中心</div>
            <div class="mdui-card-primary-subtitle mdui-typo">吃瓜！吃瓜！吃瓜！吃瓜！</a></div>
        </div>

        <div id="loading"><div class="mdui-spinner mdui-center"></div></div>

        <div class="mdui-card-content mdui-text-center" id="content" style="display: none">

            <div class="mdui-row">
                <div class="mdui-col-sm-3">
                    总数：<span id="all"></span>
                </div>
                <div class="mdui-col-sm-3">
                    通关：<span id="done"></span>
                </div>
                <div class="mdui-col-sm-6">
                    统计时间：<span id="time"></span>
                </div>
            </div>
            <div class="mdui-divider mdui-m-a-4"></div>
            红包领取统计
            <div class="mdui-row">
                <div class="mdui-col-sm-4">
                    RED1
                    <div class="mdui-progress">
                        <div class="mdui-progress-determinate" style="width: 0%;" id="red1"></div>
                    </div>
                </div>
                <div class="mdui-col-sm-4">
                    RED2
                    <div class="mdui-progress">
                        <div class="mdui-progress-determinate" style="width: 0%;" id="red2"></div>
                    </div>
                </div>
                <div class="mdui-col-sm-4">
                    RED3
                    <div class="mdui-progress">
                        <div class="mdui-progress-determinate" style="width: 0%;" id="red3"></div>
                    </div>
                </div>
            </div>
            <div class="mdui-divider mdui-m-a-4"></div>
            <canvas id="userProgress"></canvas>
            <div class="mdui-divider mdui-m-a-4"></div>
            <canvas id="postSuccessError"></canvas>
            <div class="mdui-divider mdui-m-a-4"></div>
            已通关
            <div class="mdui-table-fluid">
                <table class="mdui-table mdui-table-hoverable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>昵称</th>
                        <th>通关时间</th>
                        <th>通关耗时</th>
                    </tr>
                    </thead>
                    <tbody id="doneList">

                    </tbody>
                </table>
            </div>
            <div class="mdui-divider mdui-m-a-4"></div>
            红包记录
            <div class="mdui-table-fluid">
                <table class="mdui-table mdui-table-hoverable">
                    <thead>
                    <tr>
                        <th>昵称</th>
                        <th>时间</th>
                        <th>内容</th>
                    </tr>
                    </thead>
                    <tbody id="recentRedTry">

                    </tbody>
                </table>
            </div>
            <div class="mdui-divider mdui-m-a-4"></div>
            近期动态
            <div class="mdui-table-fluid">
                <table class="mdui-table mdui-table-hoverable">
                    <thead>
                    <tr>
                        <th>昵称</th>
                        <th>时间</th>
                        <th>内容</th>
                    </tr>
                    </thead>
                    <tbody id="recentTry">

                    </tbody>
                </table>
            </div>

        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="/static/dashboard.js"></script>
<?php include './include/footer.php'; ?>

