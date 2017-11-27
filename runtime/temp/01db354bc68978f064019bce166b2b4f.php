<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"F:\www\tp\public/../application/home\view\repairs\repairs.html";i:1511757871;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>报修</title>
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
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">
        <form action="<?php echo url(); ?>" method="post">
            <div class="form-group">
                <label>您的姓名(必填):</label>
                <input type="text" class="form-control" name="name"  class="form-control" placeholder="请填写用户名" errormsg="请填写1-16位用户名" nullmsg="请填写用户名" required autofocus/>
            </div>
            <div class="form-group">
                <label>您的电话(必填):</label>
                <input type="text" class="form-control" name="tel" placeholder="请填写联系方式" errormsg="请输入正确的联系方式" nullmsg="请填联系方式" required autofocus/>
            </div>
            <div class="form-group">
                <label>您的地址(必填):</label>
                <input type="text" class="form-control" name="address" placeholder="请填写地址" errormsg="请填写地址" nullmsg="请填写地址" required autofocus/>
            </div>
            <div class="form-group">
                <label>标题(必填):</label>
                <input type="text" class="form-control" name="title" placeholder="报修内容" errormsg="报修内容" nullmsg="报修内容" required autofocus />
            </div>
            <div class="form-group">
                <label>内容(详细描述需要报修的内容):</label>
                <textarea type="text" class="form-control" name="content" placeholder="报修详情" errormsg="报修详情" nullmsg="报修详情" required autofocus></textarea>
            </div>
            <!--<div class="form-group">-->
            <!--<div><a href="#"><span class="glyphicon glyphicon-plus onlineUpImg"></span></a></div>-->
            <!--<label>图片(最多上传5张,可不上传):</label>-->
            <!--</div>-->
            <div class="form-group">
                <button class="btn btn-primary onlineBtn">确认提交</button>
            </div>
        </form>
    </div>
</div>



<!--Bootstrap -->
<script src="/bootstrap/js/jquery-1.11.2.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
</body>

