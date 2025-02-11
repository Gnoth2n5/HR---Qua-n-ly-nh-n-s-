 
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
               
                <h1>+ CHI TIẾT 
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
                                        
                                        <th>Mã nhân viên</th>
                                        <th>Tên nhân viên</th>
                                        <th>Chức vụ</th>
                                        <th>Người lập quyết định</th>
                                        <th>Ngày lập quyết định</th>
                                        <th>Ngày nghĩ việc</th>
                                       
                                        <th>Hình ảnh</th>
                                                                    
                                    </tr>
                                </thead>
                                <tbody><?php $count=1 ?>
                                    
                                  
                                    <tr class="even gradeC" align="center">
                                        
                                        <td>{{$quyetdinh->id_nhanvien}}</td>
                                        <td>{{$quyetdinh->tbl_hosonhanvien->ho_ten}}</td>
                                        <td>{{$quyetdinh->tbl_hosonhanvien->tbl_chucvu->ten_chuc_vu}}</td>
                                        <td>{{$quyetdinh->nguoi_lap_quyet_dinh}}</td>
                                        <td>{{date('d-m-Y',strtotime($quyetdinh->ngay_quyet_dinh))}}</td>
                                        <td>{{date('d-m-Y',strtotime($quyetdinh->ngay_nghi_viec))}}</td>
                                        <?php 
                                            $a=(strtotime($quyetdinh->ngay_nghi_viec)-strtotime(date("Y-m-d")) )/(60*60*24);

                                            ?>
                                           
                                            <td>
                                                @if($quyetdinh->anh_minh_chung==null)
                                                <form method="POST" action="{{url('private/upanhkyluat/'.$quyetdinh->id)}}"  enctype="multipart/form-data" class="needs-validation">
                                                    {{ csrf_field() }}
                                                    <input type="file" name="Hinh" class="form-control mb-1" style="width: 95px;" required>
                                                    <button class="btn btn-primary" type="submit">Gửi</button>
                                                </form>
                                                @else
                                                <a href="{{url('upload/anhminhchung/'.$quyetdinh->anh_minh_chung)}}" target="_blank" ><img src="{{url('upload/anhminhchung/'.$quyetdinh->anh_minh_chung)}}"style="width: 100px;height: 110px;"></a>
                                                @endif
                                            </td>
                                                              
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
                



                
            </div>
    </div>
</div>
@endsection