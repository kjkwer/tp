<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"F:\www\tp\public/../application/home/view/default/article\lists.html";i:1512027172;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title><?php echo $category['title']; ?></title>

	<!-- Bootstrap -->
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<style>
		.main{margin-bottom: 60px;}
		.indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
	</style>
</head>
<body>
<div class="main" category_id="<?php echo $category['id']; ?>">
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

	<div class="container-fluid" id="inform">
		<?php if(is_array($informList) || $informList instanceof \think\Collection || $informList instanceof \think\Paginator): $i = 0; $__LIST__ = $informList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$inform): $mod = ($i % 2 );++$i;?>
		<div class="row noticeList">
			<a href="<?php echo url('Article/detail?id='.$inform['id']); ?>">
				<div class="col-xs-2">
					<img class="noticeImg" src="<?php echo get_cover($inform['cover_id'],path); ?>" />
				</div>
				<div class="col-xs-10">
					<p class="title"><?php echo $inform['title']; ?></p>
					<p class="intro"><?php echo $inform['description']; ?></p>
					<p class="info">浏览: <?php echo $inform['view']; ?> <span class="pull-right"><?php echo date("Y-m-d H:i:s",$inform['update_time']); ?></span> </p>
				</div>
			</a>
		</div>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<!-- 分页 -->
	<div class="container-fluid">
		<button type="button" class="btn btn-primary btn-lg btn-block" id="nextpage">加载下一页</button>
	</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/bootstrap/js/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    var page=1;
    $("#nextpage").click(function () {
        page++
		var category_id=$(".main").attr("category_id");
        $.getJSON("/home/inform/nextpage",{"page":page,"category_id":category_id},function (data) {
            var data = $.parseJSON(data).data
            if (data.length != 0){
                $.each(data,function () {
                    var that = this;
                    //>>发送Ajax请求获取小区通知的封面图片路径和更新时间
                    $.post("/home/inform/message",{"cover_id":this.cover_id,"update_time":this.update_time},function (data) {
                        var cover = $.parseJSON(data).cover;
                        var time = $.parseJSON(data).time;
                        var str = '<div class="row noticeList"> <a href="/home/article/detail/id/'+that.id+'.html"> <div class="col-xs-2"> <img class="noticeImg" src="'+cover+'" alt="加载失败"/> </div> <div class="col-xs-10"> <p class="title">'+that.title+'</p> <p class="intro">'+that.description+'</p> <p class="info">浏览: '+that.view+' <span class="pull-right">'+time+'</span> ';
                        str += '</p> </div> </a> </div>';
                        $("#inform").append(str);
                    })
                })
            }else {
                $("#nextpage").text("内容已经加载完成")
            }
        })
    })
</script>
</body>
</html>