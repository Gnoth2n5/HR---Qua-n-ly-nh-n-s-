 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH NHÂN VIÊN KHEN THƯỞNG</h1>
                    </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                                        <thead>
                                            <tr align="center">
                                                <th>Ngày Quyết Định</th>
                                                <th>Họ Tên Nhân Viên</th>
                                                <th>Phòng Ban / Chức Vụ</th>
                                                <th>Người Đề Xuất</th>
                                                <th>Số Tiền</th>
                                                <th>Lý Do</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($thuong as $t) 
                                            <tr class="even gradeC" align="center">
                                                <td>{{$t->updated_at}}</td>
                                                <?php  
                                                // var_dump($t->gia_tri);
                                                // exit;
                                                ?>
                                                @foreach ($nhanvien as $nv)
                                            {{-- <td>{{$nv->id_nhanvien}}-{{$t->nguoi_huong}}</td> --}}
                                           
                                                @if($nv->id_nhanvien==$t->nguoi_huong)
                                                
                                        
                                          
                                                 <td>{{$nv->ho_ten}}</td>
                                                 <td>{{$nv->tbl_chucvu->ten_chuc_vu}}</td>
                                                 @endif
                                                @endforeach
                                                
                                                {{-- @foreach ($nhanvien as $nv)
                                              
                                           
                                                    @if($t->nguoi_huong==$nv->id_nhanvien)
                                                    
                                                    
                                              
                                                <td>{{$nv->tbl_chucvu->ten_chuc_vu}}-{{$nv->tbl_chucvu->tbl_phongban->ten_phong_ban}}</td>
                                                @endif
                                                @endforeach --}}
                                                <td>{{$t->tbl_hosonhanvien->ho_ten}}</td>
                                                
                                                
                                                <td>{{number_format($t->gia_tri)}} vnđ</td>
                                                <td>{{$t->ly_do}}</td>
                                            </tr> 
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

        <!-- /#page-wrapper -->
@endsection