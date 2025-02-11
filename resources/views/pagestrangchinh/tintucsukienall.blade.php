	 @extends('layout1.index')
	 @section('content')
		<section>
			<div style="background-image:url(upload/slide/adult-business-composition-959816.jpg); background-repeat: no-repeat;
    background-color: rgb(8, 44, 68);
    background-size: COVER;
    background-position: center center;
    visibility: visible;
	padding-top: 100px;
    animation-name: fadeInUp;">
      <div  style="    font-weight: 700;
      text-align: center;
      color: white;
      padding-top: 150px;
	  padding-bottom: 50px;
      font-size: 40px;
  ">
        TIN TỨC MỚI NHẤT
        </div>
        <div style="text-align: center;
        color: WHITE  ;
        padding-bottom: 50px;
        font-size: 22px;">
          <p>Cập nhật tin tức mới nhất của chúng tôi</p>
          </div>
       </div>
			<div class="all-newsfeed" style="    padding-top: 30PX;!important">
				<div class="container">
					<ol class="breadcrumb">
						<li><a href="index.html">Trang chủ</a></li>
						<li><a class="active">Tin tức sự kiện</a></li>
					</ol>
					<!--  <hr> -->
					<div class="page-title">
						<h1>Tin Tức Sự kiện</h1>
						{{-- @include('layout1.menutintuc') --}}
						<hr>
						
						<div class="page-new">
							<div class="row">
								@foreach($tintuc as $tt)
								<div class="col-md-12  inner_new ">
									<div class="inner" style="" >
										<div class="form-row">
											<div class="col-md-5 page-new-img">
												{{-- <div class="form-group col-md-6"> --}}
												<a href="tintuc/{{$tt->id}}"><img src="upload/tintuc/{{$tt->Hinh}}" alt=""></a>
												
											</div>
											<div class="col-md-7">
												<a href="tintuc/{{$tt->id}}"><h3 class="type-title" style="text-transform: uppercase">{{$tt->TieuDe}}</h3></a>
												<small id="helper" class="text-muted">{{date('H:i:s d/m/Y',strtotime($tt->updated_at))}}</small>
											<div style="height: 145px;
											padding: 15px;
											text-align: justify;
											overflow: hidden;
											font-size: 14px;
											line-height: 1.5;
											text-overflow: ellipsis;">{!!$tt->NoiDung!!}</div>
											<span style="margin-left: 15px;font-size: 14px;">...(còn nữa)...</span>
											<a href="tintuc/{{$tt->id}}" class="btn btn-primary float-right m-3">Xem thêm</a>
											{{-- <div class="page-new-content"> --}}
												{{-- <div class="desc">
													<p>Tin {{$tt->loaitin->Ten}}</p>
												</div> --}}
												{{-- <div class="title"> --}}
													
												{{-- </div> --}}
											</div>
											
										
									</div>
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