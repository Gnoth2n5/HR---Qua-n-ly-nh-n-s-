@extends('layout1.index')
@section('content')
<div class="owl-carousel owl-theme">
  {{-- <div class="item">
      <img src="upload/slide/1326_hinh-nen-laptop.jpeg" >
  </div>
  <div class="item">
      <img src="upload/slide/Ai16_hinh-anh-cuc-quang-1.jpg" >    
  </div> --}}
  <div class="item">
      
  </div>
 
</div>
   <section>
    <div style="background-image:url(upload/slide/achievement-agreement-arms-1068523.jpg); background-repeat: no-repeat;
    background-color: rgb(8, 44, 68);
    background-size: COVER;
    background-position: center center;
    visibility: visible;
    animation-name: fadeInUp;">
      <div  style="    font-weight: 700;
      text-align: center;
      color: olivedrab;
      padding: 95px;
      font-size: 40px;
  ">
        MỘT NGƯỜI VÌ MỌI NGƯỜI, MỌI NGƯỜI VÌ MỘT NGƯỜI
        </div>
        <div style="text-align: center;
        color: WHITE  ;
        padding-bottom: 25px;
        font-size: 22px;">
          <p>Rất nhiều cơ hội công việc phù hợp với bạn tại STU đang chờ được khám phá!</p><p>Nộp đơn ngay hoặc liên lạc trực tiếp với bộ phận tuyển dụng <a href="mailto:{{$thongtinchinh->mail}}">{{$thongtinchinh->mail}}</a></p>
          </div>
       </div>
       <div class="about" style="    padding-top: 30PX;!important">
        
           <div class="container">
            
               <ol class="breadcrumb">
                   <li><a href="index.html">Trang chủ</a></li>
                   <li><a >/</a></li>
                   <li><a class="active"> Tin tuyển dụng</a></li>
               </ol>
               <!--  <hr> -->
               {{-- @foreach ($tuyendung as $td)
                   
               
               <div class="item" style="overflow: auto">
                   <h1>{{$td->Ten}}</h1>
               <p ><img src="upload/linhvuc/{{$td->Hinh}}" align="left" style="width:50%;padding:12px">{!!$td->NoiDung!!}</p>

               </div>
               <br>
                <hr>
                @endforeach --}}

<div style="text-align: center"><h1>Các vị trí tuyển dụng hiện tại</h1></div>
                <table class="table table-hover">
                    {{-- <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead> --}}
                    <tbody><?php $count=1 ?>
                    @foreach($tuyendung as $td)
                      <tr>
                        <th scope="row">{{$count++}}</th>
                        <td><h3>Vị trí: {{$td->tbl_chucvu->ten_chuc_vu}}-{{$td->tbl_chucvu->tbl_phongban->ten_phong_ban}}</h3>
                        <br>
                        <h5>Lương: {{$td->muc_luong}} | Hạn nộp: {{date('d-m-Y',strtotime($td->han_nop))}}</h5></td>
                        <td><a class="btn btn-info" href="{{url('tuyendung/'.$td->id)}}" style="    font-size: 14px;margin-top: 25px "><i class="fa fa-edit">  Ứng tuyển vị trí này</a></td>

                      </tr>
                      @endforeach
                      {{-- <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                      </tr> --}}
                    </tbody>
                  </table>
               {{-- <div class="item">
                   <h1>Năng lực</h1>
                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, cum modi? Accusamus, corrupti! Quos repellat dignissimos porro perspiciatis incidunt, rerum ab labore, ex veniam sit nobis, optio nesciunt asperiores consequuntur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, cum modi? Accusamus, corrupti! Quos repellat dignissimos porro perspiciatis incidunt, rerum ab labore, ex veniam sit nobis, optio nesciunt asperiores consequuntur.</p>
               </div>
               <hr>
               <div class="item">
                   <h1>Sứ mệnh</h1>
                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, cum modi? Accusamus, corrupti! Quos repellat dignissimos porro perspiciatis incidunt, rerum ab labore, ex veniam sit nobis, optio nesciunt asperiores consequuntur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, cum modi? Accusamus, corrupti! Quos repellat dignissimos porro perspiciatis incidunt, rerum ab labore, ex veniam sit nobis, optio nesciunt asperiores consequuntur.</p>
               </div>
               <hr>
               <div class="item">
                   <h1>Ban lãnh đạo</h1>
                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, cum modi? Accusamus, corrupti! Quos repellat dignissimos porro perspiciatis incidunt, rerum ab labore, ex veniam sit nobis, optio nesciunt asperiores consequuntur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, cum modi? Accusamus, corrupti! Quos repellat dignissimos porro perspiciatis incidunt, rerum ab labore, ex veniam sit nobis, optio nesciunt asperiores consequuntur.</p>
               </div> --}}
           </div>
       </div>
   </section>
@endsection