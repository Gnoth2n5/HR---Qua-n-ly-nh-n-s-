 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper" >
            <div class="container-fluid  dashboard-content">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH Ý KIẾN</h1>
                    </div>
                    @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                    <!-- /.col-lg-12 -->
                    <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            
                            <div class="card-body">
                    <table class="table table-striped table-bordered" id="data-tables">
                        <thead>
                            <tr align="center">
                                <th>Loại ý kiến</th>
                                <th>Nội dung {{date('l')}}</th>
                                <th>Ngày ý kiến</th>
                                <th>Trạng Thái</th>
                                <th>Ngày duyệt</th>
                                <th>Chi Tiết</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ykien as $yk) 
                            <tr class="even gradeC" align="center">
                                <td>{{$yk->tbl_ykien->loai_y_kien}}</td>
                                <td>{{$yk->ly_do}}</td>
                                <td>{{date('H:i:s d-m-Y',strtotime($yk->created_at))}}</td>
                                <td>
                                @if($yk->trang_thai == 0)
                                    <div class="btn btn-outline-dark disabled" >Đang Chờ</div>
                                @elseif($yk->trang_thai == 1)
                                    <div class="btn btn-outline-warning disabled" >Chờ Giám Đốc Duyệt</div>
                                @elseif($yk->trang_thai == 2)
                                    <div class="btn btn-outline-success disabled"> Đã duyệt</div>
                                @else
                                    <div class="btn btn-outline-danger disabled"> Đã Từ Chối</div>
                                @endif
                                </td>
                                <td>
                                    @if($yk->updated_at == $yk->created_at || $yk->nguoi_duyet_1 == null)
                                    @else
                                    {{date('H:i:s d-m-Y',strtotime($yk->updated_at))}}
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-outline-primary" href="{{url('private/ykien/danhsach/chitiet/'.$yk->id_luuykien)}}">Xem Chi Tiết</a> 
                                </td>
                                {{-- @if(((strtotime(date('Y-m-d H:i:s')) - strtotime($yk->created_at))/60) <= 30) --}}
                                <td>
                                @if($yk->trang_thai == 0)
                                    {{-- @if($yk->id_ykien == 2 || $yk->id_ykien == 3 || $yk->id_ykien == 4) --}}
                                        <a class="btn btn-outline-primary" href="{{url('private/ykien/sua/'.$yk->id_luuykien)}}">Bổ Sung</a> 
                                    {{-- @endif --}}
                                    <a class="btn btn-outline-danger" href="{{url('private/ykien/xoa/'.$yk->id_luuykien)}}">Xóa</a>
                                @endif
                                </td>
                                {{-- @else
                                <td> Đã hết thời gian chỉnh sửa</td>
                                @endif --}}
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                <!-- /.row -->
            </div>
                        </div>
                    </div>
                </div>
                   
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
 
 
