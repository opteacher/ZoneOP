@extends("prelgn")

@section("title")注&nbsp;册@stop

@section("background-image")
	background-image: url({{asset("/img/background2.jpg")}});
@stop

@section("content")
	<form action="chkreg" method="post">
		@if(count($errors) > 0)
			<div class="alert alert-danger" role="alert">
				<ul>
					@foreach($errors as $err)
						<li>{{$err}}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<h2 class="text-center"><b>注&nbsp;册</b></h2>
		<br>
		<input name="name" type="text" class="form-control form-input" placeholder="用户名" required autofocus>
		<input name="password" type="password" class="form-control form-input" placeholder="密码" required>
		<input name="repeatPwd" type="password" class="form-control form-input" placeholder="重复密码" required>
		<input name="mgrCode" type="text" class="form-control form-input" placeholder="管理员码（可以留空）">
		<button type="submit" class="btn btn-lg btn-primary btn-block form-input">注册</button>
		<div class="text-center"><a href="login">已有账户，直接登陆</a></div>
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
	</form>
@stop