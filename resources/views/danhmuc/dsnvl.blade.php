 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">DANH SÁCH NHÂN VIÊN
                        @if($num==1)
                            ĐANG LÀM
                        @else
                            NGHỈ VIỆC
                        @endif
                    </h1>
                    </div>
                  
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                
                                <div class="card-body">
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                        <thead>
                            <tr align="center">
                                <th>Số thứ tự</th>
                                <th>Mã nhân viên</th>
                                <th>Tên nhân viên</th>
                                <th>Chức vụ</th>
                                <th>Phòng ban</th>
                                @if($num==2)
                                <th>Hành động</th>
                                @endif
                                <th>Tác vụ</th>                                
                            </tr>
                        </thead>
                        <tbody><?php $count=1;$dem=0; ?>
                            @foreach($nhanvien as $nv) 
                            <tr class="even gradeC" align="center">
                                <td>{{$count++}}</td>
                                <td>{{$nv->id_nhanvien}}</td>
                                <td>{{$nv->ho_ten}}</td>
                                <td>{{$nv->tbl_chucvu->ten_chuc_vu}}</td>
                                <td>{{$nv->tbl_chucvu->tbl_phongban->ten_phong_ban}}</td>
                                @if($num==2)
                                <td> <a class="btn btn-primary" href="{{url('private/chitietquyetdinh/'.$nv->id_nhanvien)}}" title="Xem"> <i class="fa fa-eye"></i> Xem lý do nghỉ</a></td>
                                @endif
                                <td> 
                                    <a class="btn btn-primary" href="{{url('private/quanly/thongtin/'.$nv->id_nhanvien)}}" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                    
                                   
                                   
                                   
                                    
                                    <a class="btn btn-danger" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân sự này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</div>
</div>


        <!-- /#page-wrapper -->
        <!-- ============================================================== -->
@endsection