<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"D:\php\PHPTutorial\WWW\soukebao\public/../application/admin\view\system\index.html";i:1532660672;s:73:"D:\php\PHPTutorial\WWW\soukebao\application\admin\view\public\header.html";i:1532746147;s:76:"D:\php\PHPTutorial\WWW\soukebao\application\admin\view\public\header_js.html";i:1532675232;}*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台模板 HTML</title>
    <link rel="stylesheet" href="/frame/layui/css/layui.css">
    <link rel="stylesheet" href="/frame/static/css/style.css">
    <link rel="icon" href="/frame/static/image/code.png">
    <style>
        /*分页样式*/
        .pagination{text-align:center;margin-top:20px;margin-bottom: 20px;}
        .pagination li{margin:0px 10px; border:1px solid #e6e6e6;padding: 3px 8px;display: inline-block;}
        .pagination .active{background-color: #dd1a20;color: #fff;}
        .pagination .disabled{color:#aaa;}
    </style>
</head>
<body>

<!-- layout admin -->
<div class="layui-layout layui-layout-admin"> <!-- 添加skin-1类可手动修改主题为纯白，添加skin-2类可手动修改主题为蓝白 -->
<!-- header -->
<div class="layui-header my-header">
    <a href="index.html">
        <!--<img class="my-header-logo" src="" alt="logo">-->
        <div class="my-header-logo">搜客宝后台</div>
    </a>
    <div class="my-header-btn">
        <button class="layui-btn layui-btn-small btn-nav"><i class="layui-icon">&#xe65f;</i></button>
    </div>

    <!-- 顶部左侧添加选项卡监听 -->
    <ul class="layui-nav" lay-filter="side-top-left">
        <!--<li class="layui-nav-item"><a href="javascript:;" href-url="demo/btn.html"><i class="layui-icon">&#xe621;</i>按钮</a></li>
        <li class="layui-nav-item">
            <a href="javascript:;"><i class="layui-icon">&#xe621;</i>基础</a>
            <dl class="layui-nav-child">
                <dd><a href="javascript:;" href-url="demo/btn.html"><i class="layui-icon">&#xe621;</i>按钮</a></dd>
                <dd><a href="javascript:;" href-url="demo/form.html"><i class="layui-icon">&#xe621;</i>表单</a></dd>
            </dl>
        </li>-->
    </ul>

    <!-- 顶部右侧添加选项卡监听 -->
    <ul class="layui-nav my-header-user-nav" lay-filter="side-top-right">
        <li class="layui-nav-item">
            <a class="name" href="javascript:;"><i class="layui-icon">&#xe629;</i>主题</a>
            <dl class="layui-nav-child">
                <dd data-skin="0"><a href="javascript:;">默认</a></dd>
                <dd data-skin="1"><a href="javascript:;">纯白</a></dd>
                <dd data-skin="2"><a href="javascript:;">蓝白</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a class="name" href="javascript:;"><img src="/frame/static/image/code.png" alt="logo"> <?php echo $admin_name; ?> </a>
            <dl class="layui-nav-child">
                <dd><a href="<?php echo url('Login/singOut'); ?>"><i class="layui-icon">&#x1006;</i>退出</a></dd>
            </dl>
        </li>
    </ul>

</div>
<!-- side -->
<div class="layui-side my-side">
    <div class="layui-side-scroll">
        <!-- 左侧主菜单添加选项卡监听 -->
        <ul class="layui-nav layui-nav-tree" lay-filter="side-main">
            <li class="layui-nav-item  layui-nav-itemed">
                <a href="javascript:;"><i class="layui-icon">&#xe620;</i>用户管理</a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('User/index'); ?>"><i class="layui-icon">&#xe621;</i>用户列表</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;"><i class="layui-icon">&#xe628;</i>信息审核</a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('User/agent'); ?>"><i class="layui-icon">&#xe621;</i>卖房消息审核</a></dd>
                    <dd><a href="<?php echo url('User/getMsg'); ?>" href-url="demo/login.html"><i class="layui-icon">&#xe621;</i>求购信息审核</a></dd>
                    <dd><a href="<?php echo url('User/rentMsg'); ?>" href-url="demo/login.html"><i class="layui-icon">&#xe621;</i>租房信息审核</a></dd>
                    <dd><a href="<?php echo url('User/recruitMsg'); ?>" href-url="demo/login.html"><i class="layui-icon">&#xe621;</i>招聘信息审核</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
            <a href="javascript:;"><i class="layui-icon">&#xe628;</i>信息管理</a>
            <dl class="layui-nav-child">
                <dd><a href="<?php echo url('Info/index'); ?>" href-url="demo/login.html"><i class="layui-icon">&#xe621;</i>卖房信息</a></dd>
                <dd><a href="<?php echo url('Info/infoGet'); ?>" href-url="demo/login.html"><i class="layui-icon">&#xe621;</i>求购信息</a></dd>
                <dd><a href="<?php echo url('Info/infoRent'); ?>" href-url="demo/login.html"><i class="layui-icon">&#xe621;</i>租房信息</a></dd>
                <dd><a href="<?php echo url('Info/infoRecruit'); ?>" href-url="demo/login.html"><i class="layui-icon">&#xe621;</i>招聘信息</a></dd>
            </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;"><i class="layui-icon">&#xe628;</i>系统设置</a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('System/category'); ?>"><i class="layui-icon">&#xe621;</i>分类列表</a></dd>
                    <dd><a href="<?php echo url('System/index'); ?>"><i class="layui-icon">&#xe621;</i>设置经纪人付款金额</a></dd>
                </dl>
            </li>

        </ul>

    </div>
</div>
<!-- body -->
<div class="layui-body my-body">
    <div class="layui-tab layui-tab-card my-tab" lay-filter="card" lay-allowClose="true">
        <ul class="layui-tab-title">
            <li class="layui-this" lay-id="1"><span><i class="layui-icon">&#xe638;</i>系统设置页</span></li>
        </ul>
        <div class="layui-tab-content" style="margin-left: 20px">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend>经纪人设置付款金额</legend>
            </fieldset>
            <form class="layui-form layui-form-pane" action="" id="formdata">
                <!--<div class="layui-form-item">-->
                    <!--<label class="layui-form-label">长输入框</label>-->

                    <!--<div class="layui-input-block">-->
                        <!--<input type="text" name="title" autocomplete="off" placeholder="请输入标题" lay-verify="required"-->
                               <!--class="layui-input">-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="layui-form-item">-->
                    <label class="layui-form-label">金额</label>

                    <div class="layui-input-inline">
                        <?php if($list == ''): ?>
                        <input type="text" name="money" lay-verify="required" placeholder="请输入" autocomplete="off"
                               class="layui-input">
                        <?php else: ?>
                        <input type="text" name="money" lay-verify="required" placeholder="请输入" autocomplete="off"
                               class="layui-input" value="<?php echo $list['money']; ?>">
                        <?php endif; ?>
                    </div>
                <hr>
                <div class="layui-form-item">
                    <button class="layui-btn" lay-submit="" lay-filter="sub">提交</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- footer -->
<div class="layui-footer my-footer">

</div>
</div>

<!-- 右键菜单 -->
<div class="my-dblclick-box none">
    <table class="layui-tab dblclick-tab">
        <tr class="card-refresh">
            <td><i class="layui-icon">&#x1002;</i>刷新当前标签</td>
        </tr>
        <tr class="card-close">
            <td><i class="layui-icon">&#x1006;</i>关闭当前标签</td>
        </tr>
        <tr class="card-close-all">
            <td><i class="layui-icon">&#x1006;</i>关闭所有标签</td>
        </tr>
    </table>
</div>
<script type="text/javascript" src="/frame/layui/layui.js"></script>
<script type="text/javascript" src="/frame/static/js/vip_comm.js"></script>
<script type="text/javascript">
    layui.use(['layer','vip_nav'], function () {

        // 操作对象
        var layer       = layui.layer
                ,vipNav     = layui.vip_nav
                ,$          = layui.jquery;

        // 顶部左侧菜单生成 [请求地址,过滤ID,是否展开,携带参数]
        vipNav.top_left('/json/nav_top_left.json','side-top-left',false);
        // 主体菜单生成 [请求地址,过滤ID,是否展开,携带参数]
        vipNav.main('/json/nav_main.json','side-main',true);

        // you code ...


    });
</script>
</body>
</html>
<script src="../frame/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
    layui.use(['form', 'layedit', 'laydate', 'element'], function () {
        var form = layui.form
                , layer = layui.layer
                , layedit = layui.layedit



        //自定义验证规则
        form.verify({
            title: function (value) {
                if (value.length < 5) {
                    return '标题至少得5个字符啊';
                }
            }
            , pass: [/(.+){6,12}$/, '密码必须6到12位']
            , content: function (value) {
                layedit.sync(editIndex);
            }
        });

        //监听提交
        form.on('submit(sub)', function (data) {
            var formData = $("#formdata").serialize();
            $.ajax({
                type:"post",
                url:"<?php echo url('System/index'); ?>",
                data: formData,//这里data传递过去的是序列化以后的字符串
                success:function(data){
                    if(data){
                        window.location.href=`/admin/System/index`;
                    }
                }
            });
        });

        // you code ...


    });
</script>