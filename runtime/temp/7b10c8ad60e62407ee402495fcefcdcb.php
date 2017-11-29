<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"F:\www\tp\public/../application/home/view/default/article\article\detail.html";i:1511953654;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo $inform['title']; ?></title>

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
        <div class="blank"></div>
        <h3 class="noticeDetailTitle"><strong><?php echo $inform['title']; ?></strong></h3>
        <div class="noticeDetailInfo">发布者:<?php echo $author; ?></div>
        <div class="noticeDetailInfo">时间：<?php echo date("Y-m-d H:i",$inform['create_time']); ?>至<?php echo date("Y-m-d H:i",$inform['deadline']); ?></div>
        <?php if($overdue=="no"): if($category['id']==48): if($model): ?>
                    <a href="javascript:;" class="btn btn-success" disabled="disabled">报名成功</a>
                <?php else: ?>
                    <a href="javascript:;" class="btn btn-primary" id="join" article_id="<?php echo $inform['id']; ?>">参与活动</a>
                <?php endif; endif; else: ?>
            <a href="javascript:;" class="btn btn-warning" disabled="disabled">已过期</a>
        <?php endif; ?>
        <div class="noticeDetailContent">
            <?php echo $inform['content']; ?>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/bootstrap/js/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    //>>点击参与活动
    $("#join").click(function () {
        //>>获取活动的id
        var article_id = $(this).attr("article_id");
        var that = $(this);
        //>>发送Ajax请求
        $.post("/home/inform/join",{"article_id":article_id},function (data) {
            if (data == "fail"){
                //>>请先登录
                window.location.href="/home/user/index";
            }else if (data == "success"){
                //>>参与成功
                alert("报名成功");
                that.attr("disabled","disabled");
                that.removeClass("btn-primary");
                that.addClass("btn-success");
                that.removeAttr("id");
                that.text("报名成功")
            }
        })
    })
</script>
</body>
</html>