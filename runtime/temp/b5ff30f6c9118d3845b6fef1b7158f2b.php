<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:86:"D:\php\PHPTutorial\WWW\soukebao\public/../application/admin\view\info\add_recruit.html";i:1533708173;s:73:"D:\php\PHPTutorial\WWW\soukebao\application\admin\view\public\header.html";i:1533027498;s:76:"D:\php\PHPTutorial\WWW\soukebao\application\admin\view\public\header_js.html";i:1533027498;}*/ ?>
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
        .pagination {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .pagination li {
            margin: 0px 10px;
            border: 1px solid #e6e6e6;
            padding: 3px 8px;
            display: inline-block;
        }

        .pagination .active {
            background-color: #dd1a20;
            color: #fff;
        }

        .pagination .disabled {
            color: #aaa;
        }
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
                <a class="name" href="javascript:;"><img src="/frame/static/image/code.png" alt="logo"> <?php echo $admin_name; ?>
                </a>
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
                        <dd><a href="<?php echo url('User/getMsg'); ?>" href-url="demo/login.html"><i class="layui-icon">
                            &#xe621;</i>求购信息审核</a></dd>
                        <dd><a href="<?php echo url('User/rentMsg'); ?>" href-url="demo/login.html"><i class="layui-icon">
                            &#xe621;</i>租房信息审核</a></dd>
                        <dd><a href="<?php echo url('User/recruitMsg'); ?>" href-url="demo/login.html"><i class="layui-icon">
                            &#xe621;</i>招聘信息审核</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon">&#xe628;</i>信息管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('Info/index'); ?>" href-url="demo/login.html"><i class="layui-icon">&#xe621;</i>卖房信息</a>
                        </dd>
                        <dd><a href="<?php echo url('Info/infoGet'); ?>" href-url="demo/login.html"><i class="layui-icon">
                            &#xe621;</i>求购信息</a></dd>
                        <dd><a href="<?php echo url('Info/infoRent'); ?>" href-url="demo/login.html"><i class="layui-icon">
                            &#xe621;</i>租房信息</a></dd>
                        <dd><a href="<?php echo url('Info/infoRecruit'); ?>" href-url="demo/login.html"><i class="layui-icon">
                            &#xe621;</i>招聘信息</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon">&#xe628;</i>系统设置</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('System/category'); ?>"><i class="layui-icon">&#xe621;</i>分类列表</a></dd>
                        <dd><a href="<?php echo url('System/index'); ?>"><i class="layui-icon">&#xe621;</i>设置经纪人付款金额</a></dd>
                        <dd><a href="<?php echo url('System/editAdmin'); ?>"><i class="layui-icon">&#xe621;</i>管理员信息</a></dd>
                    </dl>
                </li>

            </ul>

        </div>
    </div>
<!-- body -->
<div class="layui-body my-body">
    <div class="layui-tab layui-tab-card my-tab" lay-filter="card" lay-allowClose="true">
        <ul class="layui-tab-title">
            <li class="layui-this" lay-id="1"><span><i class="layui-icon">&#xe638;</i>招聘信息添加页</span></li>
        </ul>
        <div class="layui-tab-content" style="margin-left: 20px">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend>招聘信息发布</legend>
            </fieldset>
            <form class="layui-form layui-form-pane" action="" id="formdata" method="post" style="margin-left: 20px" enctype="multipart/form-data">
                <div class="layui-form-item">
                    <label class="layui-form-label">公司名称</label>

                    <div class="layui-input-inline">
                        <input type="text" name="name" lay-verify="required" placeholder="请输入" autocomplete="off"
                               class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">用户选择</label>

                    <div class="layui-input-block">
                        <select name="user_id" lay-filter="aihao">
                            <option value=""></option>
                            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['id']; ?>"><?php echo $vo['user_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">联系电话</label>

                    <div class="layui-input-inline">
                        <input type="text" name="phone" lay-verify="required" placeholder="请输入" autocomplete="off"
                               class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">角色选择</label>

                    <div class="layui-input-block">
                        <select name="role" lay-filter="aihao">
                            <option value=""></option>
                            <option value="0">个人</option>
                            <option value="1" selected="">经纪人</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">职位名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="job" lay-verify="required" placeholder="请输入" autocomplete="off"
                                   class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">薪资范围</label>
                        <div class="layui-input-inline">
                            <select name="price" lay-verify="required" lay-search="">
                                <option value="">直接选择或搜索选择</option>
                                <option value="500以下">3000以下</option>
                                <option value="500-1500">3000-5000</option>
                                <option value="2500-3500">5000-8000</option>
                                <option value="3500-4500">8000-10000</option>
                                <option value="4500以上">10000以上</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item layui-form-pane">
                    <label class="layui-form-label">城市区域选择</label>
                    <div class="layui-input-inline">
                        <select name="province" lay-verify="required" lay-search="" lay-skin="select"
                                lay-filter="province">
                            <option value="">请选择省</option>
                            <?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $v['code']; ?>"><?php echo $v['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="layui-input-inline">
                        <select name="city" lay-verify="required" lay-search="" lay-skin="select" lay-filter="city"
                                id="city">
                            <option value="">请选择市/县</option>
                        </select>
                    </div>
                    <div class="layui-input-inline">
                        <select name="area1" lay-verify="required" lay-search="" lay-skin="select" lay-filter="area"
                                id="area">
                            <option value="">请选择镇区</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">具体地址</label>

                    <div class="layui-input-inline">
                        <input type="text" name="address" lay-verify="required" placeholder="请输入" autocomplete="off"
                               class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">详细说明</label>

                    <div class="layui-input-block">
                        <input type="text" name="des" lay-verify="required" placeholder="请输入" autocomplete="off"
                               class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">上传图片</label>

                    <div class="layui-input-block">
                        <input type="file" name="img">
                    </div>
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
    layui.use(['layer', 'vip_nav'], function () {

        // 操作对象
        var layer = layui.layer
                , vipNav = layui.vip_nav
                , $ = layui.jquery;

        // 顶部左侧菜单生成 [请求地址,过滤ID,是否展开,携带参数]
        vipNav.top_left('/json/nav_top_left.json', 'side-top-left', false);
        // 主体菜单生成 [请求地址,过滤ID,是否展开,携带参数]
        vipNav.main('/json/nav_main.json', 'side-main', true);

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
                type: "post",
                url: "<?php echo url('Info/addRecruit'); ?>",
                data: formData,//这里data传递过去的是序列化以后的字符串
                success: function (data) {
                    if (data) {
                        window.location.href = `/admin/Info/infoRecruit`;
                    }
                }
            });
        });


        // you code ...
    });
</script>
<script>
    layui.use(['form', 'layedit', 'laydate'],
            function () {
                var $ = layui.jquery,
                        form = layui.form,
                        layer = layui.layer,
                        layedit = layui.layedit,
                        laydate = layui.laydate;

                //监听省份选择
                form.on('select(province)',
                        function (data) {
                            console.log(data);
                            $('#city').html('<option value="">请选择市/县</option>');
                            $('#area').html('<option value="">请选择镇区</option>');
                            $.ajax({
                                url: "<?php echo url('Info/city'); ?>",
                                data: {
                                    provincecode: data.value
                                },
                                type: 'POST',
                                dataType: 'json',
                                success: function (data1) {
                                    if (data1.error == 0) {
                                        $("#city").append(data1.option);
                                        form.render('select'); //刷新select选择框渲染
                                    }
                                }
                            });
                        });
                form.on('select(city)',
                        function (data) {
                            $('#area').html('<option value="">请选择镇区</option>');
                            $.ajax({
                                url: "<?php echo url('Info/area'); ?>",
                                data: {
                                    citycode: data.value
                                },
                                type: 'POST',
                                dataType: 'json',
                                success: function (data1) {
                                    if (data1.error == 0) {
                                        $("#area").append(data1.option);
                                        form.render('select'); //刷新select选择框渲染
                                    }
                                }
                            });
                        });


            });
</script>
