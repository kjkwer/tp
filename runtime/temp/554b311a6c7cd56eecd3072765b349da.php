<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"F:\www\tp\public/../application/home\view\user\repairs.html";i:1511944231;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
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
<div class="container">
    <div class="row">
        <div style="height: 100px"></div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                <tr>
                    <th>联系人</th>
                    <th>联系电话</th>
                    <th>地址</th>
                    <th>报修内容</th>
                    <th>状态</th>
                    <th>更新时间</th>
                    <th>操作</th>
                </tr>
                </thead>

                <thbody>
                    <?php if(is_array($repairsList) || $repairsList instanceof \think\Collection || $repairsList instanceof \think\Paginator): $i = 0; $__LIST__ = $repairsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$repairs): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo $repairs['name']; ?></td>
                        <td><?php echo $repairs['tel']; ?></td>
                        <td><?php echo $repairs['address']; ?></td>
                        <td><?php echo $repairs['title']; ?></td>
                        <td><?php echo !empty($repairs['status']=1)?"待处理":"已处理"; ?></td>
                        <td><?php echo $repairs['update_time']; ?></td>
                        <td>
                            <a href="<?php echo url('editRepairs?id='.$repairs['id']); ?>">编辑</a>
                            <a href="<?php echo url('deleteRepairs?id='.$repairs['id']); ?>">删除</a>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </thbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="page">
            <?php echo $pager; ?>
        </div>
    </div>
</div>





<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/bootstrap/js/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {

    })
</script>
</body>
</html>