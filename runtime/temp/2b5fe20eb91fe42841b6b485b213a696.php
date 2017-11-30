<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:57:"F:\www\tp\public/../application/home\view\user\index.html";i:1512063726;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>个人中心</title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
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
                <p class="navbar-text"><a href="/user/login/index.html" class="navbar-link">登录</a></p>
                <p class="navbar-text"><a href="/user/login/register.html" class="navbar-link">注册</a></p>
            </div>
            <?php endif; ?>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container">
        <div class="blank"></div>
        <div class="row">
            <div class="col-xs-3">
                <img src="/image/default_touxiang.jpg" width="60" height="60" alt="暂无头像"/>
            </div>
            <div class="col-xs-9">
                <?php echo $username; if(get_user().status==2): ?>
                    <button class="btn btn-xs btn-success" id="is_auth">已认证业主</button>
                <?php else: ?>
                    <a href="<?php echo url('home/auth/auth'); ?>" class="btn btn-xs btn-warning">未认证业主</a>
                <?php endif; ?>
                <br/>
                北大花园小区<br/>
                积分:<span class="text-danger">100</span><br>
                <a href="<?php echo url('user/login/logout'); ?>">退出登录</a>
            </div>
        </div>
        <div class="blank"></div>
        <div class="row text-center myLabel">
            <div class="col-xs-4 label-danger"><a href="#"><span class="iconfont">&#xe60b;</span>我的资料</a></div>
            <div class="col-xs-4 label-success"><a href="<?php echo url('repairs'); ?>"><span class="iconfont">&#xe609;</span>我的报修</a></div>
            <div class="col-xs-4 label-primary"><a href="<?php echo url('active'); ?>"><span class="iconfont">&#xe606;</span>报名的活动</a></div>
        </div>
        <div class="blank"></div>
        <div>
            <ul class="list-group fuwuList">
                <li class="list-group-item"><a href="diaochawenjuan.html" class="text-danger"><span class="iconfont">&#xe60a;</span>我的缴费账单</a> </li>
                <li class="list-group-item"><a href="yezhurenzheng.html" class="text-info"><span class="iconfont">&#xe608;</span>我的物业通知</a></li>
                <li class="list-group-item"><a href="yezhurenzheng.html" class="text-info"><span class="iconfont">&#xe607;</span>我的水电气使用</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/bootstrap/js/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/bootstrap/js/bootstrap.min.js"></script>



<!--JS代码-->

<script type="text/javascript">
    //>>已认证状态
    $("#is_auth").click(function () {
        alert("以认证,无需再次认证");
    })
</script>

</body>
</html>