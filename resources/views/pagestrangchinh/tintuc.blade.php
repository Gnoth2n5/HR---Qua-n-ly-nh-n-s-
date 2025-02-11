@extends('layout1.index')
@section('content')

<section id="page-detail-news">
			<div class="page-detail-newfeed" style="padding-top: 130px;">
				<div class="container">
					<ol class="breadcrumb">
						<li><a href="trangchu">Trang chủ  /    </a></li>
						<li><a href="tintucsukien">Tin tức  /    </a></li>
						<li><a class="active">{{$tintuc->TieuDe}}</a></li>
					</ol>
					<hr>
					<div class="page-title">
						<p><span class="glyphicon glyphicon-time"></span>Ngày đăng bài : {{date('d-m-Y',strtotime($tintuc->updated_at))}}</p>
						<h1>{{$tintuc->TieuDe}}</h1>
					</div>

					<div class="page-content1">
						
						<p style="margin-top: 15px;margin-bottom: 15px;line-height: 30px;"><img src="upload/tintuc/{{$tintuc->Hinh}}" align="left" style="width:50%;padding:12px">{!!$tintuc->NoiDung!!}
							
						</p>
						

					</div>
					<hr>
					
					<section id="page-news">
						<div>
							<h1>Tin tức khác</h1>
						</div>
						<div class="page-new">
							<div class="container">
								
								<div class="row">
									@foreach($tinlienquan as $tt)
									<div class="col-md-4 col-sm-4 col-xs-4 fix-card">
										<div class="inner" style="height: 490px;">
											<a href="tintuc/{{$tt['id']}}">
												<div class="page-new-img">
													<img src="upload/tintuc/{{$tt['Hinh']}}" alt="" style="width: 350px;">
												</div>
												<div class="page-new-content">
													
													<div class="title">
														<span class="type-title">{{$tt['TieuDe']}}</span>
													</div>
													
												</div>
											</a>
										</div>
									</div>
									@endforeach
								</div>
								
							</div>
						</div>
					</section>
				</div>
			</div>
</section>

@endsection