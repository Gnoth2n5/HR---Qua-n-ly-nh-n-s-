 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper" >
            <div class="container-fluid  dashboard-content">
                    <div class="col-lg-12">
                    <h1 class="page-header">DANH SÁCH {{$loai->loai_y_kien}}</h1>
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
                    <table class="table table-striped table-bordered" id="data-tables-ykien">
                        <thead>
                            <tr align="center">
                                
                                <th>Người gửi ý kiến</th>
                                <th>Nội dung</th>
                                <th>Ngày ý kiến</th>
                                <th>Người duyệt</th>
                                <th>Chức Vụ</th>
                                <th>Ngày duyệt</th>
                                <th>Chi Tiết</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ykien as $yk) 
                            <tr class="even gradeC" align="center">
                                
                                <td>{{$yk->tbl_hosonhanvien->ho_ten}}</td>
                                <td>{{$yk->ly_do}}</td>
                                <td>
                                    @if(date('d-m-Y',strtotime($yk->created_at)) == date('d-m-Y'))
                                    Hôm nay lúc {{date('H:i',strtotime($yk->created_at))}}
                                    @else
                                    {{date('d-m-Y',strtotime($yk->created_at))}}
                                    @endif
                                </td>
                                <td>{{$yk->nguoi_duyet_1}}</td>
                                <td>{{$yk->chuc_vu_1}}</td>
                                <td>
                                    @if($yk->updated_at == $yk->created_at || $yk->nguoi_duyet_1 == null )
 
                                    @else
                                    {{date('d-m-Y',strtotime($yk->updated_at))}}
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-outline-primary" href="{{url('private/ykien/danhsach/chitiet/'.$yk->id_luuykien)}}">Xem Chi Tiết</a> 
                                </td>
                                <td>
                                @if(($yk->trang_thai == 0 && $duyet_1 == true) || ($yk->trang_thai == 1 && $duyet_2 == true) || ($yk->trang_thai == 0 && $duyet_2 == true))            
                                    @if($yk->id_ykien == 9 || $yk->id_ykien == 10)
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#accept-target">
                                            Duyệt
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="accept-target" tabindex="-1" role="dialog" aria-labelledby="accept-form" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="denied-form">Vui lòng nhập số tiền thưởng (nếu có)</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{url('private/ykien/danhsach/1/'.$yk->id_luuykien)}}" method="POST">
                                                            {{ csrf_field() }}
                                                            <input type="text" class="form-control" name="gia_tri" placeholder="Giá trị (nếu có)"> 
                                                    </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                                                            {{-- <input class="btn btn-outline-primary" type="submit" name="" value="Duyệt" /> --}}
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                    <form action="{{url('private/ykien/danhsach/1/'.$yk->id_luuykien)}}" method="POST">
                                    {{ csrf_field() }}
                                    <input class="btn btn-outline-primary" type="submit" name="" value="Duyệt" />
                                    </form>
                                    @endif
                                {{-- <a class="btn btn-outline-danger" href="#">Từ chối</a> --}}
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#denied-target">
                                    Từ chối
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="denied-target" tabindex="-1" role="dialog" aria-labelledby="denied-form" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="denied-form">Lý Do Từ Chối</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{url('private/ykien/danhsach/-1/'.$yk->id_luuykien)}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <textarea class="form-control" name="ly_do_tu_choi" placeholder="Lý do" value=""></textarea>
                                                    <input type="text" class="form-control" name="gia_tri" placeholder="Giá trị (nếu có)"> 
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                                    {{-- <input class="btn btn-outline-primary" type="submit" name="" value="Duyệt" /> --}}
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @elseif($yk->trang_thai == 1 && $duyet_1 == true)
                                <div class="btn btn-outline-warning disabled" >Chờ Giám Đốc Duyệt</div>
                                @elseif($yk->trang_thai == 2)
                                <div class="btn btn-outline-success disabled"> Đã duyệt</div>
                                @else
                                <div class="btn btn-outline-danger disabled"> Đã Từ Chối</div>
                                @endif
                                {{-- <a class="btn btn-outline-primary" href="{{url('private/ykien/sua/'.$yk->id_luuykien)}}">Sửa</div> --}}
                                </td>
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
 
 
