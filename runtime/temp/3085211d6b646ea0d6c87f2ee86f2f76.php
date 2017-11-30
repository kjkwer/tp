<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"F:\www\tp\public/../application/home\view\rent_sell\index.html";i:1512062209;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>租售信息</title>

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
        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
            <ul id="myTabs" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">租</a></li>
                <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">售</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                    <p class="text-danger">免费提供小区内的租房信息</p>
                    <div class="row">
                        <?php if(is_array($rents) || $rents instanceof \think\Collection || $rents instanceof \think\Paginator): $i = 0; $__LIST__ = $rents;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rent): $mod = ($i % 2 );++$i;?>
                        <div class="col-xs-6 col-md-4">
                            <div class="thumbnail">
                                <img src="<?php echo get_cover($rent['cover_id'],path); ?>" alt="...">
                                <div class="caption">
                                    <h4><?php echo $rent['title']; ?></h4>
                                    <p class="zushouInfo"><?php echo $rent['desc']; ?></p>
                                    <p class="text-danger"><?php echo $rent['price']; if($rent['genre']==1): ?>
                                        <span>万元</span>
                                        <?php else: ?>
                                        <span>/月</span>
                                        <?php endif; ?></p>
                                    <p><a href="<?php echo url('intro?id='.$rent['id']); ?>" class="btn btn-danger zushouBtn">详细信息</a> </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                    <div class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                        <p class="text-danger">免费提供小区内的二手房信息</p>
                        <div class="row">
                            <?php if(is_array($sells) || $sells instanceof \think\Collection || $sells instanceof \think\Paginator): $i = 0; $__LIST__ = $sells;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sell): $mod = ($i % 2 );++$i;?>
                            <div class="col-xs-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="<?php echo get_cover($sell['cover_id'],path); ?>" alt="...">
                                    <div class="caption">
                                        <h4><?php echo $sell['title']; ?></h4>
                                        <p class="zushouInfo"><?php echo $sell['desc']; ?></p>
                                        <p class="text-danger"><?php echo $sell['price']; if($sell['genre']==1): ?>
                                            <span>万元</span>
                                            <?php else: ?>
                                            <span>/月</span>
                                            <?php endif; ?></p>
                                        <p><a href="<?php echo url('intro?id='.$sell['id']); ?>" class="btn btn-danger zushouBtn">详细信息</a> </p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
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