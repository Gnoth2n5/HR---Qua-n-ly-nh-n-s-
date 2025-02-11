 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH NHÂN VIÊN KỶ LUẬT</h1>
                    </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover" id="data-tables2">
                                        <thead>
                                            <tr align="center"> 
                                                
                                                <th>Mã nhân viên</th>
                                                <th>Tên nhân viên</th>
                                                <th>Chức vụ</th>
                                                <th>Phòng ban</th>
                                                <th>Số lần kỹ luật</th>
                                                <th style="width:230px">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  $count=0; $stt=1 ?>
                                            @foreach($nhanvien as $nv) 
                                            <tr class="even gradeC" align="center">
                                                
                                                <td>{{$nv->id_nhanvien}}</td>
                                                <td><p>{{$nv->ho_ten}}</p> 
                                                 
                                            </td>
                                                <td>{{$nv->tbl_chucvu->ten_chuc_vu}}</td>
                                                <td>{{$nv->tbl_chucvu->tbl_phongban->ten_phong_ban}}</td>   
                                        @foreach($kyluat as $kl) 
                                        
                                            {{-- <tr class="even gradeC" align="center">
                                                <td>{{$kl->updated_at}}</td>
                                                <td>{{$kl->nguoi_huong}}</td>
                                                <td>{{$kl->chuc_vu_2}}</td>
                                                <td>{{$kl->tbl_hosonhanvien->ho_ten}}</td>
                                                <td>{{$kl->nguoi_duyet_2}}</td>
                                                <td>{{$kl->gia_tri}}</td>
                                                <td>{{$kl->ly_do}}</td>
                                            </tr>  --}}
                                            <?php  
                                           
                                            if($kl->nguoi_huong==$nv->id_nhanvien)
                                             $count++;
                                            else {
                                                $count=0;
                                            }
                                            ?>
                                       
                                      
                                        @endforeach
                                        <td  >{{$count}}</td> 
                                        <td>

                                            <a class="btn btn-primary" href="{{url('private/kyluat/canhan/'.$nv->id_nhanvien)}}" title="Xem chi tiết"> <i class="fa fa-eye"></i> Chi tiết</a>
                                            <a class="btn btn-danger" href="{{url('private/quyetdinhthoiviecNV/'.$nv->id_nhanvien)}}" title="Lập quyết định"> <i class="fa fa-eye"></i> Lập quyết định</a>
                                        </td>
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