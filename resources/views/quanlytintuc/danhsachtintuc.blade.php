 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH LOẠI TIN</h1>
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
                                        <a class="btn btn-info mb-3" href="{{url('private/tintuc/them')}}"><i class="fa fa-plus mr-2"></i>Thêm mới</a>
                                        
                                    </div>
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                                        <thead>
                                            <tr align="center">
                                                <th  style="width: 165px;">Tiêu đề</th>
                                                {{-- <th>Tóm tắt</th> --}}
                                                {{-- <th>Thể loại</th> --}}
                                                <th>Nội dung</th>
                                                <th>Nổi bật</th>
                                                <th style="width: 145px;" >Tác vụ</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tintuc as $tt)
                                            <tr class="odd gradeX" align="center">
                                                <td><p>{{$tt->TieuDe}}</p><img src="{{url('upload/tintuc/'.$tt->Hinh)}}" style="width: 100px;"></td>
                                                {{-- <td>{{$tt->TomTat}}</td> --}}
                                                {{-- <td>{{$tt->LoaiTin->TheLoai->Ten}}</td>--}}
                                                <td  style="display: block;overflow: scroll; height: 195px;">{!!$tt->NoiDung!!}</td> 
                                                <td>
                                                    @if($tt->NoiBat==0)
                                                    {{'Không'}}
                                                
                                                    @else {{'Có'}}
                                                    @endif
                                                    </td>   
                                                    <td><a class="btn btn-warning" href="{{url('private/tintuc/sua/'.$tt->id)}}"><i class="fa fa-edit mr-2"></i>Sửa</a>
                                                        <a class="btn btn-danger" href="{{url('private/tintuc/xoa/'.$tt->id)}}"><i class="fa fa-trash mr-2"></i>Xóa</a></td>
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