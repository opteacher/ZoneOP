<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>日志记录 - @yield("title")</title>

	<link href={{asset("/css/bootstrap.min.css")}} rel="stylesheet">
	<link href={{asset("/css/prelgn.css")}} rel="stylesheet" type="text/css">
	<style type="text/css">
		.bkgd-img
		{
			@yield("background-image")
			background-repeat: no-repeat;
			background-size: cover;
			position: fixed;
			left: 0;
			top: 0;
			z-index: -1;
		}
	</style>
</head>
<body>
<div class="bkgd-img"></div>
<div class="container">
	<div class="col-md-6"></div>
	<div class="col-md-6">
		<div class="lgn-blk"></div>
		<div class="lgn-blk-edge"></div>
		<div class="lgn-pnl">
			@section("content")@show
		</div>
	</div>
</div>

<script src={{asset("/js/jquery.min.js")}}></script>
<script src={{asset("/js/bootstrap.min.js")}}></script>
<script src={{asset("/js/prelgn.js")}}></script>
</body>
</html>