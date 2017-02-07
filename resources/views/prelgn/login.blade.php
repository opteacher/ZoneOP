@extends("prelgn")

@section("title")登陆@stop

@section("background-image")
	background-image: url({{asset("/img/background1.jpg")}});
@stop

@section("content")
	<form action="chklgn" method="post">
		@if(count($errors) > 0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach($errors->all() as $err)
						<li>{{$err}}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<h2 class="text-center"><b>登&nbsp;陆</b></h2>
		<br>
		<input name="name" type="text" class="form-control form-input" placeholder="用户名" value="{{(isset($user)) ? $user : ""}}" required autofocus>
		<input name="password" type="password" class="form-control form-input" placeholder="密码" required>
		<div class="input-group form-control no-padding form-input" id="chkStoreUsr">
			<span class="input-group-addon no-border">
				<input type="checkbox" disabled="disabled">
			</span>
			<button type="button" class="btn btn-default form-control no-border">是否保存用户名</button>
		</div>
		<button type="submit" class="btn btn-lg btn-primary btn-block form-input">登陆</button>
		<button type="button" class="btn btn-lg btn-default btn-block form-input" onclick="window.location='register'">新注册用户</button>
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
	</form>
@stop