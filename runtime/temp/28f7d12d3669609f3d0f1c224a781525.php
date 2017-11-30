<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"F:\www\tp\public/../application/home/view/default/auth\auth.html";i:1512025802;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>


    <title>微信物业管理系统</title>

</head>
<body>
<div class="main">
    <!-- 头部 -->
    <div class="container-fluid">
        <div id="top-alert" class="fixed alert alert-error bg-danger" style="display: none;margin-top: 10%;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
    </div>


    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="container-fluid text-center">
                <?php if(is_array($channel) || $channel instanceof \think\Collection || $channel instanceof \think\Paginator): $i = 0; $__LIST__ = $channel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                <div class="col-xs-3">
                    <p class="navbar-text"><a href="/home/<?php echo $menu['url']; ?>.html" class="navbar-link"><?php echo $menu['title']; ?></a></p>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="col-xs-3">
                    <p class="navbar-text"><a href="<?php echo url('server/index'); ?>" class="navbar-link">服务</a></p>
                </div>
                <?php if(is_login()): ?>
                <div class="col-xs-3">
                    <p class="navbar-text"><a href="<?php echo url('user/index'); ?>" class="navbar-link">我的</a></p>
                </div>
                <?php else: ?>
                <div class="col-xs-3">
                    <p class="navbar-text"><a href="<?php echo url('user/login/index'); ?>" class="navbar-link">登录/注册</a></p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <!-- /头部 -->

    <!-- 主体 -->
    <div class="container">

        <form class="form-signin login-form" action="<?php echo url(); ?>" method="post">
            <h2 class="form-signin-heading">业主认证</h2>
            <p class="form-group has-warning">
                <label for="inputUsername" class="control-label">您的姓名</label>
                <input type="text" name="username" id="inputUsername" class="form-control" placeholder="请填写用户名" errormsg="请填写1-16位用户名" nullmsg="请填写用户名" required autofocus>
            </p>
            <p class="form-group has-error">
                <label for="inputArea" class="control-label">您的小区名称</label>
                <input type="text" name="area" id="inputArea" class="form-control" placeholder="请填写小区名称" errormsg="请填写小区名称" nullmsg="请填写小区名称" required autofocus>
            </p>
            <p class="form-group has-success">
                <label for="inputNum" class="control-label">您的房号</label>
                <input type="text" name="num" id="inputNum" class="form-control" placeholder="请填写您的房间号" errormsg="请填写您的房间号" nullmsg="请填写您的房间号" required autofocus>
            </p>
            <p class="form-group has-warning">
                <label for="inputIdentity" class="control-label">您与业主的关系</label>
                <select class="form-control" name="identity" id="inputIdentity" placeholder="您与业主的关系" errormsg="您与业主的关系" nullmsg="您与业主的关系" required autofocus>
                    <option value="本人">本人</option>
                    <option value="亲属">亲属</option>
                    <option value="租户">租户</option>
                </select>
            </p>
            <p class="form-group has-error">
                <label for="inputTel" class="control-label">联系电话</label>
                <input type="text" id="inputTel" name="tel" class="form-control" placeholder="请输入联系电话" errormsg="请输入联系电话" nullmsg="请输入联系电话" datatype="e" value="" required autofocus>
            </p>
            <p class="form-group has-success">
                <label for="inputidCard" class="control-label">身份证号码</label>
                <input type="text" name="idCard" id="inputidCard" class="form-control" placeholder="请输入身份证号码" errormsg="请输入身份证号码" nullmsg="请输入身份证号码" required autofocus>
            </p>
            <p class="form-group has-warning">
                <label for="inputDesc" class="control-label">描述</label>
                <!--<input type="text" id="inputidCard" class="form-control" placeholder="请输入身份证号码" errormsg="请输入身份证号码" nullmsg="请输入身份证号码" datatype="e" value="" name="idCard" required autofocus>-->
                <textarea name="desc" id="inputDesc" cols="20" rows="5" class="form-control" placeholder="描述" errormsg="描述" nullmsg="描述" required autofocus></textarea>
            </p>
            <p>
                <label for="inputVerify" class="sr-only">验证码</label>
                <input type="text" id="inputVerify" name="verify" class="form-control" placeholder="请填写5位验证码" required>
            </p>
            <p>
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls verifyimg">
                    <?php echo captcha_img(); ?>
                </div>
                <div class="controls Validform_checktip text-warning"></div>
            </div>
            </p>
            <input type="submit" value="认证" class="btn btn-lg btn-primary btn-block">

            <!--<button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>-->
        </form>
    </div>
    <!-- /container -->


    <!-- /主体 -->

    <!-- 底部 -->

    <!-- 底部
    ================================================== -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/bootstrap/js/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        (function(){
            var ThinkPHP = window.Think = {
                "ROOT"   : "", //当前网站地址
                "APP"    : "", //当前项目地址
                "PUBLIC" : "/Public", //项目公共目录地址
                "DEEP"   : "/", //PATHINFO分割符
                "MODEL"  : ["2", "", "html"],
                "VAR"    : ["m", "c", "a"]
            }
        })();
    </script>

    <script type="text/javascript">
        $(document)
            .ajaxStart(function () {
                $("button:submit").addClass("log-in").attr("disabled", true);
            })
            .ajaxStop(function () {
                $("button:submit").removeClass("log-in").attr("disabled", false);
            });


        $("form").submit(function(){
            var self = $(this);
            $.post(self.attr("action"), self.serialize(), success, "json");
            return false;

            function success(data){
                if(data.code){
                    window.location.href = data.url;
                } else {
                    self.find(".Validform_checktip").text(data.msg);
                    //刷新验证码
                    $(".verifyimg img").click();
                }
            }
        });

        $(function(){
            //刷新验证码
            var verifyimg = $(".verifyimg img").attr("src");
            $(".verifyimg img").click(function(){
                if( verifyimg.indexOf('?')>0){
                    $(".verifyimg img").attr("src", verifyimg+'&random='+Math.random());
                }else{
                    $(".verifyimg img").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
                }
            });
        });
    </script>
    <!-- 用于加载js代码 -->
    <!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
    <div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->

    </div>

    <!-- /底部 -->
</div>
</body>
</html>