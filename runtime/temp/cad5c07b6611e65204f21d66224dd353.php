<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"F:\www\tp\public/../application/home\view\server\index.html";i:1512029548;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

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
                <p class="navbar-text"><a href="<?php echo url('user/login/index'); ?>" class="navbar-link">登录/注册</a></p>
            </div>
            <?php endif; ?>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">
        <div class="indexImg row">
            <img src="/image/3.png" width="100%" />
        </div>
        <div class="blank"></div>
        <div class="container">
            <ul class="list-group fuwuList">
                <li class="list-group-item"><a href="diaochawenjuan.html" class="text-danger"><span class="iconfont">&#xe604;</span>调查问卷</a> </li>
                <li class="list-group-item"><a href="<?php echo url("auth/auth"); ?>" class="text-info"><span class="iconfont">&#xe605;</span>业主认证</a></li>
                <li class="list-group-item"><a href="#" class="text-success"><span class="iconfont">&#xe602;</span>在线缴费</a></li>
                <li class="list-group-item"><a href="<?php echo url("server/live"); ?>" class="text-warning"><span class="iconfont">&#xe601;</span>生活贴士</a></li>
                <li class="list-group-item"><a href="<?php echo url('Article/lists?category='.get_category_name(50)); ?>" class="text-primary"><span class="iconfont">&#xe600;</span>关于我们</a></li>
            </ul>
        </div>
    </div>
</div>
<!--Bootstrap -->
<script src="/bootstrap/js/jquery-1.11.2.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>