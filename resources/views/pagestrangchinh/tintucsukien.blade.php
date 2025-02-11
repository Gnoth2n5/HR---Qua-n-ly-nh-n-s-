	 @extends('layout1.index')
	 @section('content')
		<section>
			<div class="all-newsfeed">
				<div class="container">
					<ol class="breadcrumb">
						<li><a href="index.html">Trang chủ</a></li>
						<li><a class="active">Tin tức sự kiện</a></li>
					</ol>
					<!--  <hr> -->
					<div class="page-title">
						<h1>Tin Tức Sự kiện</h1>
						@include('layout1.menutintuc')
						<hr>
						
						<div class="page-new">
							<div class="row">
								@foreach($tintuc as $tt)
								<div class="col-md-4 col-sm-4 inner_new ">
									<div class="inner">
										<a href="tintuc/{{$tt->id}}">
											<div class="page-new-img">
												<img src="upload/tintuc/{{$tt->Hinh}}" alt="">
											</div>
											<div class="page-new-content">
												<div class="desc">
													<p>Tin {{$tt->loaitin->Ten}}</p>
												</div>
												<div class="title">
													<span class="type-title">{{$tt->TieuDe}}</span>
												</div>
											</div>
										</a>
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<div style="display: flex;justify-content: center;">
						{{$tintuc->links()}}
						</div>
					</div>
				</div>
			</div>
        </section>
     @endsection