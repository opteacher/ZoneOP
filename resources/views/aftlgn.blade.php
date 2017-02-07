<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield("title", "主界面")</title>

	<link href={{asset("/css/bootstrap.min.css")}} rel="stylesheet">
	<link href={{asset("/css/main.css")}} rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">空间</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">个人</a></li>
				<li><a href="#">主页</a></li>
				<li><a href="#">好友</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">{{$user->name}}</a></li>
				<li><a href="#"><img class="icn-20" src={{asset("/img/setting.png")}} alt="设置"></a></li>
				<li><a href="#"><img class="icn-20" src={{asset("/img/logout.png")}} alt="退出"></a></li>
			</ul>
			<form class="navbar-form navbar-right" role="search">
				<div class="form-group">
					<input class="form-control search-ipt" type="text" placeholder="用户/动态">
					<a href="#"><img class="search-btn" src={{asset("/img/search.png")}}></a>
				</div>
			</form>
		</div>
	</div>
</nav>

<div class="container" style="margin-top:70px;">
	<div class="row">
		<div class="col-md-2 pfl">
			<a href="#" class="thumbnail">
				<img data-src="holder.js/100%x180" src={{asset($user->profile)}} alt="头像">
			</a>
		</div>
		<div class="col-md-8 hgt-180px">
			<h1 style="color: white">{{$user->name}}</h1>
			<h3 style="color: white">"{{$user->signature}}"</h3>
			<ol class="breadcrumb loc-path">
				<li class="active">主页</li>
			</ol>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class="col-md-2">
			<ul class="nav nav-pills nav-stacked nav-sdr-lst" role="tablist">
				<li role="presentation" @yield("mainActive", "")>
					<a class="text-center" href="shwmn">
						<img class="icn-20" src={{asset(($navTyp == 1) ? "/img/home-sel.png" : "/img/home.png")}}>
						&nbsp;&nbsp;主页
					</a>
				</li>
				<li role="presentation" @yield("dryLstActive", "")>
					<a class="text-center" href="shwdl">
						<img class="icn-20" src={{asset(($navTyp == 2) ? "/img/dairy-sel.png" : "/img/dairy.png")}}>
						&nbsp;&nbsp;日志
					</a>
				</li>
				<li role="presentation" @yield("active", "")>
					<a class="text-center" href="gallery.html">
						<img class="icn-20" src={{asset(($navTyp == 3) ? "/img/gallery-sel.png" : "/img/gallery.png")}}>
						&nbsp;&nbsp;相册
					</a>
				</li>
				<li role="presentation" @yield("active", "")>
					<a class="text-center" href="#">
						<img class="icn-20" src={{asset(($navTyp == 4) ? "/img/music-sel.png" : "/img/music.png")}}>
						&nbsp;&nbsp;音乐
					</a>
				</li>
			</ul>
		</div>
		<div class="col-md-8">
			@yield("content")
			<div class="modal fade del-dry-cfm-dlg" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">×</span>
								<span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title" id="mySmallModalLabel">警告</h4>
						</div>
						<div class="modal-body">
							确认删除日志？
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal" role="confirmDel">
								确认<input type="hidden" value="">
							</button>
							<button type="button" class="btn btn-default" data-dismiss="modal" role="cancelDel">取消</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>

<script src={{asset("/js/jquery.min.js")}}></script>
<script src={{asset("/js/bootstrap.min.js")}}></script>
<script src={{asset("/js/aftlgn.js")}}></script>
</body>
</html>