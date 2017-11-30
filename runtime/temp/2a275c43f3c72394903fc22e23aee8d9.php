<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"F:\www\tp\public/../application/home\view\rent_sell\intro.html";i:1512062715;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo $message['title']; ?></title>

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
        <div class="blank"></div>
        <h3 class="noticeDetailTitle"><strong><?php echo $message['title']; ?></strong></h3>
        <div class="noticeDetailInfo">发布者:<?php echo get_username($message['uid']); ?>小区物管</div>
        <div class="noticeDetailInfo">发布时间：<?php echo time_format($message['create_time']); ?></div>
        <div class="noticeDetailInfo">联系电话：<?php echo $message['tel']; ?></div>
        <h4 class="text-danger">价格:<?php echo $message['price']; if($message['genre']==1): ?>
            <span>万元</span>
            <?php else: ?>
            <span>/月</span>
            <?php endif; ?></h4>
        <div class="noticeDetailContent">
            <?php echo $message['content']; ?>
        </div>
    </div>
</div>
<!--Bootstrap -->
<script src="/bootstrap/js/jquery-1.11.2.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>