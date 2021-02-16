// 都说了JS里面不会有答案的啦，别找了。
// There is no any answer.
var $ = mdui.$;
function login(){
    $.ajax({
        method: 'POST',
        url: './ajax.php?mod=getRed',
        data: {
            token: $("#token").val()
        },
        dataType: 'json',
        success: function (data) {
            if (data.code < 1){
                mdui.snackbar(data.msg);
            }else{
                mdui.alert('领取成功，已记录至数据库，当活动结束后将会统一通过拼手气方式发放');
            }
        }
    });
}