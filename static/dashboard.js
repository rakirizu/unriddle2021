var $ = mdui.$;
window.onload = function (){
    $.ajax({
        method: 'GET',
        url: './ajax.php?mod=status',
        dataType: 'json',
        success: function (data) {
            if (data.code < 1){
                mdui.alert('数据加载失败，请刷新页面重试');
            }else{
                $("#all").html(data.data.all);
                $("#done").html(data.data.done);
                $("#time").html(data.data.time);
                $("#red1").width(parseInt(data.data.red1  * 100) + '%');
                $("#red2").width(parseInt(data.data.red2 * 100) + '%');
                $("#red3").width(parseInt(data.data.red3 * 100) + '%');


                var donL = '';
                for (const donLElement of data.data.doneList) {
                    donL += '<tr><td>'+donLElement.id+'</td><td>'+donLElement.cn+'</td><td>'+donLElement.end10+'</td><td>'+donLElement.len+'</td></tr>'
                }
                if (donL == ''){
                    $("#doneList").html('<tr><td>暂无记录</td><td></td><td></td><td></td></tr>');
                }else{
                    $("#doneList").html(donL);
                }
                donL = '';
                for (const donLElement of data.data.redList) {
                    if (donLElement.isok){
                        donL += '<tr><td>'+donLElement.cn+'</td><td>'+donLElement.time+'</td><td class="mdui-text-color-theme-accent">成功领取RED.'+donLElement.redno+'</td></tr>'
                    }else{
                        donL += '<tr><td>'+donLElement.cn+'</td><td>'+donLElement.time+'</td><td class="mdui-text-color-theme-200">尝试领取红包...Miss</td></tr>'
                    }
                }
                if (donL == ''){
                    $("#recentRedTry").html('<tr><td>暂无记录</td><td></td><td></td></tr>');
                }else{
                    $("#recentRedTry").html(donL);
                }

                donL = '';
                for (const donLElement of data.data.tryList) {
                    if (donLElement.succ){
                        donL += '<tr><td>'+donLElement.cn+'</td><td>'+donLElement.time+'</td><td class="mdui-text-color-theme-accent">成功通过第'+donLElement.test+'关，进入下一关！</td></tr>'
                    }else{
                        donL += '<tr><td>'+donLElement.cn+'</td><td>'+donLElement.time+'</td><td class="mdui-text-color-theme-200">尝试提交第'+donLElement.test+'关的Flag...Miss</td></tr>'
                    }
                }
                if (donL == ''){
                    $("#recentTry").html('<tr><td>暂无记录</td><td></td><td></td></tr>');
                }else{
                    $("#recentTry").html(donL);
                }

                mdui.mutation();

                var upid = document.getElementById("userProgress");
                var userProgress = new Chart(upid, {
                    type: 'bar',
                    data: {
                        labels: ["第一关", "第二关", "第三关", "第四关", "第五关", "第六关", "第七关", "第八关", "第九关", "第十关"],
                        datasets: [{
                            label: '人数',
                            data: data.data.nowTest,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(102,255, 163, 0.2)',
                                'rgba(200, 172, 99, 0.2)',
                                'rgba(102,242,255,0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(72,179,30,0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(102,255,163, 1)',
                                'rgba(200 ,172,99, 1)',
                                'rgba(102,242,255,1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(72,179,30,1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        },
                        title: {
                            display: true,
                            text: "闯关进度统计"
                        }
                    }
                });




                var pse = document.getElementById("postSuccessError");
                var postSuccessError = new Chart(pse, {
                    type: 'radar',
                    data: {
                        labels:  ["第一关", "第二关", "第三关", "第四关", "第五关", "第六关", "第七关", "第八关", "第九关", "第十关"],
                        datasets: [{
                            label: '提交次数',
                            data: data.data.post,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)' ,
                            borderColor:  'rgba(54, 162, 235,1)',
                            pointBackgroundColor: 'rgba(54, 162, 235,1)',

                        },
                            {
                                label: '成功次数',
                                data: data.data.success,
                                backgroundColor: 'rgba(72,179,30, 0.2)' ,
                                borderColor:  'rgba(72,179,30,1)',
                                pointBackgroundColor: 'rgba(72,179,30,1)',

                            }
                        ],
                    },
                    options: {
                        title: {
                            display: true,
                            text: "提交答案结果"
                        }
                    }
                });
            }
            $("#loading").hide();
            $("#content").show();
        }
    });

}


