<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"D:\php\PHPTutorial\WWW\soukebao\public/../application/admin\view\login\index.html";i:1533027498;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>登录</title>
    <link rel="stylesheet" href="/frame/layui/css/layui.css">
    <link rel="stylesheet" href="/frame/static/css/style.css">
    <link rel="icon" href="/frame/static/image/code.png">
</head>
<body class="login-body body">

<div class="login-box">
    <form class="layui-form layui-form-pane" method="post" action="" id="formdata">
        <div class="layui-form-item">
            <h3>搜客宝后台登录系统</h3>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">账号：</label>

            <div class="layui-input-inline">
                <input type="text" name="account" class="layui-input" lay-verify="account" placeholder="账号"
                       autocomplete="on" maxlength="20"/>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码：</label>

            <div class="layui-input-inline">
                <input type="password" name="password" class="layui-input" lay-verify="password" placeholder="密码"
                       maxlength="20"/>
            </div>
        </div>
        <!--<div class="layui-form-item">-->
        <!--<label class="layui-form-label">验证码：</label>-->

        <!--<div class="layui-input-inline">-->
        <!--<input type="number" name="code" class="layui-input" lay-verify="code" placeholder="验证码" maxlength="4"/><img-->
        <!--src="../frame/static/image/v.png" alt="">-->
        <!--</div>-->
        <!--</div>-->
        <div class="layui-form-item">
            <button type="reset" class="layui-btn layui-btn-danger btn-reset">重置</button>
            <button type="button" class="layui-btn btn-submit" lay-submit="" lay-filter="sub">立即登录</button>
        </div>
    </form>
</div>

<script type="text/javascript" src="/frame/layui/layui.js"></script>
<script type="text/javascript">
    layui.use(['form', 'layer'], function () {

        // 操作对象
        var form = layui.form
                , layer = layui.layer
                , $ = layui.jquery;

        // 验证
        form.verify({
            account: function (value) {
                if (value == "") {
                    return "请输入用户名";
                }
            },
            password: function (value) {
                if (value == "") {
                    return "请输入密码";
                }
            },
            code: function (value) {
                if (value == "") {
                    return "请输入验证码";
                }
            }
        });

        // 提交监听
        form.on('submit(sub)', function (data) {
//            var formData = JSON.stringify(data.field);
            var formData = $("#formdata").serialize();
            $.ajax({
                type: "post",
                url: "<?php echo url('Login/index'); ?>",
                data: formData,//这里data传递过去的是序列化以后的字符串
                success: function (data) {
                    if (data) {
                        window.location.href = `/admin/User/index?admin_name=` + data;
                    } else {
                        alert("用户名或密码错误！")
                    }
                }
            });
        });

        // you code ...
    })

</script>
</body>
</html>