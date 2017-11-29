<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"F:\www\tp\public/../application/home/view/default/index\index.html";i:1511936990;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>首页</title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
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
            <?php endforeach; endif; else: echo "" ;endif; if(is_login()): ?>
                <div class="col-xs-3">
                    <p class="navbar-text"><a href="<?php echo url('user/index'); ?>" class="navbar-link">我的</a></p>
                </div>
                <?php else: ?>
                <div class="col-xs-3">
                    <p class="navbar-text"><a href="/user/login/index.html" class="navbar-link">登录/注册</a></p>
                </div>
            <?php endif; ?>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">
        <div class="indexImg row">
            <img src="/image/index.png" width="100%" />
        </div>
        <div class="serviceList text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4">
                        <a href="<?php echo url('Article/lists?category='.get_category_name(42)); ?>">
                            <div class="indexLabel label-danger">
                                <span class="glyphicon glyphicon-bullhorn"></span><br/>
                                小区通知
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo url('Article/lists?category='.get_category_name(45)); ?>">
                            <div class="indexLabel label-warning">
                                <span class="glyphicon glyphicon-ok-circle"></span><br/>
                                便民服务
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo url('repairs/repairs'); ?>">
                            <div class="indexLabel label-info">
                                <span class="glyphicon glyphicon-heart-empty"></span><br/>
                                在线报修
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo url('Article/lists?category='.get_category_name(46)); ?>">
                            <div class="indexLabel label-success">
                                <span class="glyphicon glyphicon-briefcase"></span><br/>
                                商家活动
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="zushou.html">
                            <div class="indexLabel label-primary">
                                <span class="glyphicon glyphicon-usd"></span><br/>
                                小区租售
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo url('Article/lists?category='.get_category_name(48)); ?>">
                            <div class="indexLabel label-default">
                                <span class="glyphicon glyphicon-apple"></span><br/>
                                小区活动
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Bootstrap -->
<script src="/bootstrap/js/jquery-1.11.2.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>