 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH THỂ LOẠI</h1>
                    </div>
                    @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="btn-group">
                                        <a class="btn btn-info mb-3" href="{{url('private/theloai/them')}}"><i class="fa fa-plus mr-2"></i>Thêm mới</a>
                                        
                                    </div>
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                                        <thead>
                                            <tr align="center">
                                                <th>TÊN THỂ LOẠI</th>
                                                
                                                <th>TÁC VỤ</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($theloai as $tl)
                                            <tr class="even gradeC" align="center">
                                                <td>{{$tl->Ten}}</td>
                                                
                                                {{-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/theloai/xoa/{{$tl->id}}"> Xóa</a></td>
                                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/theloai/sua/{{$tl->id}}">Sửa</a></td> --}}
                                                <td><a class="btn btn-warning" href="{{url('private/theloai/sua/'.$tl->id)}}"><i class="fa fa-edit mr-2"></i>Sửa</a>
                                                     <a class="btn btn-danger" href="{{url('private/theloai/xoa/'.$tl->id)}}"><i class="fa fa-trash mr-2"></i>Xóa</a></td>
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