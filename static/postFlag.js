// 都说了JS里面不会有答案的啦，别找了。
// There is no any answer.

var $ = mdui.$;
function postFlag(test){
    $.ajax({
        method: 'POST',
        url: '../ajax.php?mod=flag',
        data: {
            test: test,
            token: $("#flag").val()
        },
        dataType: 'json',
        success: function (data) {
            if (data.code < 1){
                mdui.snackbar(data.msg);
            }else{
                window.location.href = './unlock.php?test=' + (test + 1);
                mdui.snackbar('Flag正确，正在进入下一关...');
            }

        }
    });
}