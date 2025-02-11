 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->

 <div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
       
        <div class="row">
            <div class="col-lg-12 ">
                <h1>QUYẾT ĐỊNH THÔI VIỆC
                </h1>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
            <div class="row">
                <!-- ============================================================== -->
                <!-- validation form -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        
                        <div class="card-body">
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                            <table class="table table-striped table-bordered table-hover" id="data-tables">
                                <thead>
                                    <tr align="center">
                                        <th>Số thứ tự</th>
                                        <th>Mã nhân viên</th>
                                        <th>Tên nhân viên</th>
                                        <th>Chức vụ</th>
                                        <th>Phòng ban</th>
                                        <th>Quyết định</th>                                 
                                    </tr>
                                </thead>
                                <tbody><?php $count=1 ?>
                                    @foreach($nhanvien as $nv) 
                                    <tr class="even gradeC" align="center">
                                        <td>{{$count++}}</td>
                                        <td>{{$nv->id_nhanvien}}</td>
                                        <td>{{$nv->ho_ten}}</td>
                                        <td>{{$nv->tbl_chucvu->ten_chuc_vu}}</td>
                                        <td>{{$nv->tbl_chucvu->tbl_phongban->ten_phong_ban}}</td>
                                        <td><a class="btn btn-danger" href="{{url('private/quyetdinhthoiviecNV/'.$nv->id_nhanvien)}}">Đuổi</a></td>                          
                                    </tr>
                                    @endforeach
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