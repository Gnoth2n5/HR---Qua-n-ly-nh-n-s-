 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper" >
            <div class="container-fluid  dashboard-content">
                <div class="col-lg-12">
                    <h1 class="page-header">DANH SÁCH LOẠI Ý KIẾN</h1>
                    <a class="btn btn-outline-secondary btn-lg btn-block" href="{{url('private/loaiykien/them')}}">Thêm</a>
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
                                            {{-- <th>Ngày Thêm</th>
                                            <th>Ngày Cập Nhật</th> --}}
                                            <th>Tác vụ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($loaiykien as $lyk) 
                                        <tr class="even gradeC" align="center">
                                            <td>{{$lyk->loai_y_kien}}</td>
                                            {{-- <td>{{$lyk->created_at}}</td>
                                            <td>{{$lyk->updated_at}}</td> --}}
                                            <td>
                                                {{-- <a class="btn btn-outline-primary" href="{{url('private/loaiykien/sua/'.$lyk->id_ykien)}}" >Sửa</a> --}}
                                            @if($lyk->id_ykien == 2 || $lyk->id_ykien == 3 || $lyk->id_ykien == 5 || $lyk->id_ykien ==  7 || $lyk->id_ykien == 8 || $lyk->id_ykien == 11 )
                                                <a class="btn btn-outline-danger" href="{{url('private/loaiykien/xoa/'.$lyk->id_ykien)}}">Xóa</a>
                                            @endif
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

