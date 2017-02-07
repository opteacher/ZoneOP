@extends("aftlgn")

@section("title")日志列表@stop

@section("dryLstActive")class='active'@stop

@section("content")
	<div class="log-blk">
		<button class="btn btn-primary" type="button">新建日志</button>
	</div>
	<div class="log-blk">
		@foreach($dairys as $idx => $dry)
			<h2 class="dry-ctl">
				{{$dry->title}}
				<input type="hidden" name="dryMd5Hid" value={{$dry->md5}}>
				<div class="btn-group" style="float:right">
					<button type="button" class="btn btn-default">
						<img class="icn-20" src={{asset("/img/edit.png")}}>
					</button>
					<button type="button" class="btn btn-default" data-toggle="modal" data-target=".del-dry-cfm-dlg">
						<img class="icn-20" src={{asset("/img/delete.png")}}>
					</button>
				</div>
				<span class="blog-post-meta" style="margin-right: 10px;">{{$dry->updated_at}}</span>
			</h2>
			@if($idx != count($dairys) - 1)
				<hr>
			@endif
		@endforeach
	</div>
@stop