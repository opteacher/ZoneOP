<form action="newdry" method="post">
	<input name="title" class="form-control edt-dry-ttl" placeholder="标题" type="text">
	<textarea name="contents" class="form-control edt-dry" placeholder="说点什么"></textarea>
	<div class="row">
		<div class="col-md-6">
			<div class="btn-group">
				<button type="button" class="btn btn-default">
					<img class="icn-20" src={{asset("/img/emoji.png")}}>
				</button>
				<button type="button" class="btn btn-default">
					<img class="icn-20" src={{asset("/img/code.png")}}>
				</button>
				<button type="button" class="btn btn-default">
					<img class="icn-20" src={{asset("/img/strong.png")}}>
				</button>
				<button type="button" class="btn btn-default">
					<img class="icn-20" src={{asset("/img/list.png")}}>
				</button>
			</div>
		</div>
		<div class="col-md-6 text-right">
			<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" id="dropdownMenu2">
				公开&nbsp;<span class="caret"></span>
			</button>
			<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu2">
				<li role="presentation"><a href="#">公开</a></li>
				<li role="presentation"><a href="#">仅好友</a></li>
				<li role="presentation"><a href="#">仅自己</a></li>
			</ul>
			<button class="btn btn-primary" type="submit">发布</button>
		</div>
	</div>
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
</form>