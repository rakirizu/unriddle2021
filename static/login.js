// 都说了JS里面不会有答案的啦，别找了。
// There is no any answer.
var $ = mdui.$;
function login(){
    $.ajax({
        method: 'POST',
        url: '../ajax.php?mod=login',
        data: {
            token: $("#token").val()
        },
        dataType: 'json',
        success: function (data) {
            if (data.code < 1){
                mdui.snackbar(data.msg);
            }else{
                if (data.code == 2){
                    window.location.href = './unlock.php?test='+data.data.now;
                    mdui.snackbar(data.data.cn + '，欢迎回来，正在跳转到上次挑战的题目[' + data.data.now + ']');
                }else{
                    window.location.href = './unlock.php?test=1';
                    mdui.snackbar(data.data.cn + '，欢迎参加解密游戏，正在跳转，请稍后...');
                }
            }

        }
    });
}