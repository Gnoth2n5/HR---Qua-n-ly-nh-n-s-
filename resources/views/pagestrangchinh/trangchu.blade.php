        @extends('layout1.index')
        @section('content')
        <div class="banner">
            <div class="owl-carousel owl-theme">
                {{-- <div class="item">
                    <img src="upload/slide/1326_hinh-nen-laptop.jpeg" >
                </div>
                <div class="item">
                    <img src="upload/slide/Ai16_hinh-anh-cuc-quang-1.jpg" >    
                </div> --}}
                <div class="item">
                    <img src="upload/slide/jXdY_vinbanner-20190725T095649450825.jpg" > 
                </div>
               
            </div>
            <p>CUỘN XUỐNG</p>
            <div class="imgscroll">
                
            <img class="ar" src="https://vingroup.net/assets/images/scrolldown-icon.png"  style="width: 14px">
            </div>
            {{-- width: 12px;
    position: absolute;
    z-index: 999999;
    color: black;
    top: 570px;
    left: 50%; --}}
        </div>
        <section id="page-intro">
            <div class="container">
                <div class="page-intro">
                    <h1>SƠ LƯỢC VỀ CHÚNG TÔI</h1>
                    <div class="page-content">
                       {!!$gioithieu->NoiDung!!}
                        <a href="gioithieuchung" class="view-intro">Xem thêm <i class="fas fa-angle-right"></i></a>
                    </div>
                    <div class="page-img">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 img-content">
                                <img src="https://yoshigroup.jp/wp-content/uploads/2020/01/xx1.png" alt="">
                            </div>
                            <div class="col-md-6 col-sm-6 img-content">
                                <img src="https://yoshigroup.jp/wp-content/uploads/2020/01/xx1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="page-news">
            <div class="bg-newfeed" >
                <h1>TIN TỨC SỰ KIỆN</h1>
            </div>
            <div class="page-new" style="text-align: center">
                <div class="container">
                    <div class="row">
                       {{--  @foreach($tintuc as $tt) --}}
                        <?php 
                        $data=$tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(6);
                       
                         ?>
                         @foreach($data->all() as $tintuc)
                        <div class="col-md-4 col-sm-4 col-xs-4 fix-card">
                            <div class="inner" style="height: 490px;">
                                <a href="tintuc/{{$tintuc['id']}}">
                                    <div class="page-new-img">
                                        <img src="upload/tintuc/{{$tintuc['Hinh']}}" alt="" style="width: 350px;">
                                    </div>
                                    <div class="page-new-content">
                                        
                                        <div class="title">
                                            <span class="type-title">{{$tintuc['TieuDe']}}</span>
                                        </div>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                       <a href="tintucsukienall" class="view-intro float-left">Xem thêm <i class="fas fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                     
                
                    <hr>
                </div>
            </div>
        </section>
        <section class="page-content" id="page-content">
            <div class="container">
                <div class="row page-content-row">
                    <div class="col-md-6 col-sm-12">
                        <div class="content">
                            <div class="title">
                                <h1>TUYỂN DỤNG</h1>
                            </div>
                            <div class="desc">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dignissimos eaque
                                    explicabo ullam autem sed laborum qui minima modi nostrum? Dicta, nulla? Nobis, hic
                                    quidem dicta fugit odit molestiae ipsa. Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Dolorum impedit sit eveniet soluta, voluptas ut consectetur nihil
                                    dolorem deleniti et libero quia, laborum exercitationem? Porro eos saepe temporibus
                                earum aspernatur?</p>
                                <a href="tintuyendung" class="view-intro">Xem thêm <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="img-right">
                            <img src="https://yoshigroup.jp/wp-content/uploads/2020/01/top_image.png" alt="">
                        </div>

                    </div>
                </div>
                <hr>
            </div>
        </section>
       
        @endsection