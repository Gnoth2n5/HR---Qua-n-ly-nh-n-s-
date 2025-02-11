 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->

 <div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
       
        
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
            <div class="row">
                <!-- ============================================================== -->
                <!-- validation form -->
                <!-- ============================================================== -->
               
                <h1>+ QUYẾT ĐỊNH KỶ LUẬT NHÂN VIÊN
                </h1>


                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-12 ">
                                
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                            
                            <table class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr align="center">
                                        <th>Số thứ tự</th>
                                        <th>Mã nhân viên</th>
                                        <th>Tên nhân viên</th>
                                        <th>Chức vụ</th>
                                        <th>Người lập quyết định</th>
                                        <th>Ngày lập quyết định</th>
                                        <th>Ngày nghĩ việc</th>
                                        <th>Tình trạng</th>
                                        <th>Hình ảnh</th>
                                        <th style="width: 120.8px;">Tác vụ</th>                              
                                    </tr>
                                </thead>
                                <tbody><?php $count=1 ?>
                                    @foreach($quyetdinh as $qd)
                                    @if($qd->loai==1&& $qd->trang_thai==0)
                                    <tr class="even gradeC" align="center">
                                        <td>{{$count++}}</td>
                                        <td>{{$qd->id_nhanvien}}</td>
                                        <td>{{$qd->tbl_hosonhanvien->ho_ten}}</td>
                                        <td>{{$qd->tbl_hosonhanvien->tbl_chucvu->ten_chuc_vu}}</td>
                                        <td>{{$qd->nguoi_lap_quyet_dinh}}</td>
                                        <td>{{date('d-m-Y',strtotime($qd->ngay_quyet_dinh))}}</td>
                                        <td>{{date('d-m-Y',strtotime($qd->ngay_nghi_viec))}}</td>
                                        <?php 
                                            $a=(strtotime($qd->ngay_nghi_viec)-strtotime(date("Y-m-d")) )/(60*60*24);

                                            ?>
                                            @if($a>=0)
                                            <td class=" label label-success" >Còn: {{$a}} ngày</td>
                                            @else
                                            <td class=" label label-danger">Hết hạn</td>
                                            @endif
                                            <td>
                                                @if($qd->anh_minh_chung==null)
                                                <form method="POST" action="{{url('private/upanhkyluat/'.$qd->id)}}"  enctype="multipart/form-data" class="needs-validation">
                                                    {{ csrf_field() }}
                                                    <input type="file" name="Hinh" class="form-control mb-1" style="width: 95px;" required>
                                                    <button class="btn btn-primary" type="submit">Gửi</button>
                                                </form>
                                                @else
                                                <a href="{{url('upload/anhminhchung/'.$qd->anh_minh_chung)}}" target="_blank" ><img src="{{url('upload/anhminhchung/'.$qd->anh_minh_chung)}}"style="width: 100px;height: 110px;"></a>
                                                @endif
                                            </td>
                                        <td>@if($qd->anh_minh_chung==null)
                                            <a class="btn btn-primary mb-2" href="{{url('private/quyetdinh/pdf/'.$qd->id_nhanvien)}}" target="_blank">Xuất file pdf</a>
                                            <a class="btn btn-danger" href="{{url('private/huyquyetdinh/'.$qd->id_nhanvien)}}">Hủy</a>
                                            @else
                                            <a class="btn btn-danger" href="{{url('private/quyetdinh/'.$qd->id_nhanvien)}}">Đuổi</a>
                                            @endif
                                           
                                        </td>                          
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
                <h1>+ NHÂN VIÊN XIN NGHỈ VIỆC
                </h1>


                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-12 ">
                                
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                            
                            <table class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr align="center">
                                        <th>Số thứ tự</th>
                                        <th>Mã nhân viên</th>
                                        <th>Tên nhân viên</th>
                                        <th>Chức vụ</th>
                                        <th>Người lập quyết định</th>
                                        <th>Ngày lập quyết định</th>
                                        <th>Ngày nghĩ việc</th>
                                        <th>Tình trạng</th>
                                        <th>Hình ảnh</th>
                                        
                                        <th style="width: 120.8px;">Tác vụ</th>                              
                                    </tr>
                                </thead>
                                <tbody><?php $count=1 ?>
                                    
                                    @foreach($quyetdinh as $qd)
                                    @if($qd->loai==2 && $qd->trang_thai==0)
                                    <tr class="even gradeC" align="center">
                                        <td>{{$count++}}</td>
                                        <td>{{$qd->id_nhanvien}}</td>
                                        <td>{{$qd->tbl_hosonhanvien->ho_ten}}</td>
                                        <td>{{$qd->tbl_hosonhanvien->tbl_chucvu->ten_chuc_vu}}</td>
                                        <td>{{$qd->nguoi_lap_quyet_dinh}}</td>
                                        <td>{{date('d-m-Y',strtotime($qd->ngay_quyet_dinh))}}</td>
                                        <td>{{date('d-m-Y',strtotime($qd->ngay_nghi_viec))}}</td>
                                        <?php 
                                            $a=(strtotime($qd->ngay_nghi_viec)-strtotime(date("Y-m-d")) )/(60*60*24);

                                            ?>
                                            @if($a>=0)
                                            <td class=" label label-success" >Còn: {{$a}} ngày</td>
                                            @else
                                            <td class=" label label-danger">Hết hạn</td>
                                            @endif
                                            <td>
                                                @if($qd->anh_minh_chung==null)
                                                <form method="POST" action="{{url('private/upanhkyluat/'.$qd->id)}}"  enctype="multipart/form-data" class="needs-validation">
                                                    {{ csrf_field() }}
                                                    <input type="file" name="Hinh" class="form-control mb-1" style="width: 95px;" required>
                                                    <button class="btn btn-primary" type="submit">Gửi</button>
                                                </form>
                                                @else
                                                <a href="{{url('upload/anhminhchung/'.$qd->anh_minh_chung)}}" target="_blank" ><img src="{{url('upload/anhminhchung/'.$qd->anh_minh_chung)}}"style="width: 100px;height: 110px;"></a>
                                                @endif
                                            </td>
                                        <td>@if($qd->anh_minh_chung==null)
                                            <a class="btn btn-primary mb-2" href="{{url('private/nghiviec/pdf/'.$qd->id_nhanvien)}}" target="_blank">Xuất file pdf</a>
                                            
                                            @else
                                            <a class="btn btn-danger" href="{{url('private/quyetdinh/'.$qd->id_nhanvien)}}">Đuổi</a>
                                            @endif
                                           
                                        </td>                          
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



                <h1>+ THEO DÕI THỜI HẠN LÀM VIỆC CÒN LẠI CỦA NHÂN VIÊN
                </h1>


                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-12 ">
                                
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                            
                            <table class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr align="center">
                                        <th>Số thứ tự</th>
                                        <th>Mã nhân viên</th>
                                        <th>Tên nhân viên</th>
                                        <th>Chức vụ</th>
                                        <th>Người lập quyết định</th>
                                        <th>Ngày lập quyết định</th>
                                        <th>Ngày nghĩ việc</th>
                                        <th>Tình trạng</th>
                                        <th>Hình ảnh</th>
                                        
                                        <th style="width: 120.8px;">Tác vụ</th>                              
                                    </tr>
                                </thead>
                                <tbody><?php $count=1 ?>
                                    
                                    @foreach($quyetdinh as $qd)
                                    @if($qd->trang_thai==1)
                                    <tr class="even gradeC" align="center">
                                        <td>{{$count++}}</td>
                                        <td>{{$qd->id_nhanvien}}</td>
                                        <td>{{$qd->tbl_hosonhanvien->ho_ten}}</td>
                                        <td>{{$qd->tbl_hosonhanvien->tbl_chucvu->ten_chuc_vu}}</td>
                                        <td>{{$qd->nguoi_lap_quyet_dinh}}</td>
                                        <td>{{date('d-m-Y',strtotime($qd->ngay_quyet_dinh))}}</td>
                                        <td>{{date('d-m-Y',strtotime($qd->ngay_nghi_viec))}}</td>
                                        <?php 
                                            $a=(strtotime($qd->ngay_nghi_viec)-strtotime(date("Y-m-d")) )/(60*60*24);

                                            ?>
                                            @if($a>=0)
                                            <td class=" label label-success" >Còn: {{$a}} ngày</td>
                                            @else
                                            <td class=" label label-danger">Hết hạn</td>
                                            @endif
                                            <td>
                                                @if($qd->anh_minh_chung==null)
                                                <form method="POST" action="{{url('private/upanhkyluat/'.$qd->id)}}"  enctype="multipart/form-data" class="needs-validation">
                                                    {{ csrf_field() }}
                                                    <input type="file" name="Hinh" class="form-control mb-1" style="width: 95px;" required>
                                                    <button class="btn btn-primary" type="submit">Gửi</button>
                                                </form>
                                                @else
                                                <a href="{{url('upload/anhminhchung/'.$qd->anh_minh_chung)}}" target="_blank" ><img src="{{url('upload/anhminhchung/'.$qd->anh_minh_chung)}}"style="width: 100px;height: 110px;"></a>
                                                @endif
                                            </td>
                                        <td>@if($qd->anh_minh_chung==null)
                                            <a class="btn btn-primary mb-2" href="{{url('private/nghiviec/pdf/'.$qd->id_nhanvien)}}" target="_blank">Xuất file pdf</a>
                                            
                                            @else
                                            <a class="btn btn-danger" href="{{url('private/quyetdinh/'.$qd->id_nhanvien)}}">Đuổi</a>
                                            @endif
                                           
                                        </td>                          
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection