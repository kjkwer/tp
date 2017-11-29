<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"F:\www\tp\public/../application/home\view\repairs\repairs.html";i:1511858401;}*/ ?>
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
            <?php endforeach; endif; else: echo "" ;endif; if(is_login()): ?>
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

    <div class="container-fluid">
        <form action="<?php echo url(); ?>" method="post">
            <input type="hidden" class="form-control" name="id" value="<?php echo (isset($repairses['id']) && ($repairses['id'] !== '')?$repairses['id']:''); ?>"/>
            <div class="form-group">
                <label>联系人(必填):</label>
                <input type="text" class="form-control" name="name" value="<?php echo (isset($repairses['name']) && ($repairses['name'] !== '')?$repairses['name']:''); ?>" class="form-control" placeholder="请填写联系人" errormsg="请填写1-16位用户名" nullmsg="请填写联系人" required autofocus/>
            </div>
            <div class="form-group">
                <label>您的电话(必填):</label>
                <input type="text" class="form-control" name="tel" value="<?php echo (isset($repairses['tel']) && ($repairses['tel'] !== '')?$repairses['tel']:''); ?>" placeholder="请填写联系方式" errormsg="请输入正确的联系方式" nullmsg="请填联系方式" required autofocus/>
            </div>
            <div class="form-group">
                <label>您的地址(必填):</label>
                <input type="text" class="form-control" name="address" value="<?php echo (isset($repairses['address']) && ($repairses['address'] !== '')?$repairses['address']:''); ?>" placeholder="请填写地址" errormsg="请填写地址" nullmsg="请填写地址" required autofocus/>
            </div>
            <div class="form-group">
                <label>标题(必填):</label>
                <input type="text" class="form-control" name="title" value="<?php echo (isset($repairses['title']) && ($repairses['title'] !== '')?$repairses['title']:''); ?>" placeholder="报修内容" errormsg="报修内容" nullmsg="报修内容" required autofocus />
            </div>
            <div class="form-group">
                <label>内容(详细描述需要报修的内容):</label>
                <textarea type="text" class="form-control" name="content" placeholder="报修详情" errormsg="报修详情" nullmsg="报修详情" required autofocus><?php echo (isset($repairses['content']) && ($repairses['content'] !== '')?$repairses['content']:''); ?> </textarea>
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

