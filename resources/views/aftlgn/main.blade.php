@extends("aftlgn")

@section("title")主界面@stop

@section("mainActive")class='active'@stop

@section("content")
	<div class="log-blk">
		@include("aftlgn.new")
	</div>
	@foreach($dairys as $dry)
		<div class="log-blk">
			<h2>{{$dry->title}}<span class="blog-post-meta">{{$dry->updated_at}}</span></h2>
			<p>
				{{$dry->content}}&nbsp;
				<a href="#">
					<img class="icn-20" src={{asset("/img/feedback.png")}}>
				</a>
			</p>
			<p class="text-right">由&nbsp;<a href="#">{{$dry->user}}</a>&nbsp;撰写</p>
			<hr style="border-top-color: #bbb">
			<div class="row text-right wid-100pc dry-ctl" style="margin: 0 auto;margin-bottom: 10px;">
				<input type="hidden" name="dryMd5Hid" value={{$dry->md5}}>
				@if($dry->usr_idx == $user->id)
					<div class="col-md-6 text-left" style="padding-left: 0px">
						<div class="btn-group">
							<button type="button" class="btn btn-default">
								<img class="icn-20" src={{asset("/img/edit.png")}}>
							</button>
							<button type="button" class="btn btn-default" data-toggle="modal" data-target=".del-dry-cfm-dlg">
								<img class="icn-20" src={{asset("/img/delete.png")}}>
							</button>
						</div>
					</div>
					<div class="col-md-6 text-right" style="padding-right: 0px">
				@endif
						<div class="btn-group">
							<button type="button" class="btn btn-default">
								<img class="icn-20" src={{asset("/img/appreciate.png")}}>
							</button>
							<button type="button" class="btn btn-default">
								<img class="icn-20" src={{asset("/img/favor.png")}}>
							</button>
							<button type="button" class="btn btn-default">
								<img class="icn-20" src={{asset("/img/message.png")}}>
								<img class="icn-20" src={{asset("/img/dltgl-vtl.png")}}>
							</button>
						</div>
				@if($dry->usr_idx == $user->id)
					</div>
				@endif
			</div>
			@if(!empty($remarks))
				<ul class="rmk-lst list-unstyled">
					@foreach($remarks as $rmk)
						@if($rmk->tgtId == $dry->id)
							<li>
								<div class="row">
									<div class="col-md-1">
										<a class="no-btm-mgn thumbnail icn-50" href="#">
											<img src={{$rmk->userPfl}}>
										</a>
									</div>
									<div class="col-md-11 hgt-50px">
										<p class="rmk-ctt">
											<a href="#">{{$rmk->userNam}}</a>:&nbsp;{{$rmk->content}}&nbsp;
											<a href="#"><img class="icn-16" src={{asset("/img/feedback.png")}}></a>
										</p>
										<p class="rmk-tm">{{$rmk->time}}</p>
									</div>
								</div>
								@if(!empty($rmk->subRmk))
									<ul class="sub-rmk">
										@foreach($rmk->subRmk as $sub)
											<li>
												<div class="row">
													<div class="col-md-1">
														<a class="no-btm-mgn thumbnail icn-50" href="#">
															<img src={{$sub->userPfl}}>
														</a>
													</div>
													<div class="col-md-11 hgt-50px">
														<p class="rmk-ctt">
															<a href="#">{{$sub->userNam}}</a>:&nbsp;{{$sub->content}}&nbsp;
															<a href="#"><img class="icn-16" src={{asset("/img/feedback.png")}}></a>
														</p>
														<p class="rmk-tm">{{$sub->time}}</p>
													</div>
												</div>
											</li>
										@endforeach
									</ul>
								@endif
							</li>
						@endif
					@endforeach
				</ul>
			@endif
		</div>
	@endforeach
@stop