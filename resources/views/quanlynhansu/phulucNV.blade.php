@extends('layout.index')
@section('content')


        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                       
                    <h1 class="page-header">PHỤ LỤC HỢP ĐỒNG: {{$hopdong->id_hopdong}}</h1>
                       
                    </div>
                   
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="btn-group">
                                        
                                        <a class="btn btn-info mb-3" href="{{url('private/lapphuluc/'.$hopdong->id_hopdong)}}"><i class="fa fa-plus mr-2"></i>Thêm mới</a>
                                       
                                    </div>
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                                        <thead>
                                            <tr align="center">
                                                <th>SỐ PHỤ LỤC</th>
                                                <th>NGÀY LẬP PHỤ LỤC</th>
                                                <th>NGƯỜI LẬP PHỤ LỤC</th>
                                                <th>LOẠI PHỤ LỤC</th>
                                                <th style="">TÁC VỤ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @if(isset($phuluc))
                                            @foreach($phuluc as $pl)
                                            <tr class="even gradeC" align="center">
                                                <td>{{$pl->id_phuluc}}</td>
                                                <td>{{$pl->created_at}}</td>
                                                <td>{{$pl->nguoi_lap_phu_luc}}</td>
                                                <td>{{$pl->tbl_loaiphuluc->ten_phu_luc}}</td>
                                                <td>
                                                <a class="btn btn-primary " href="{{url('private/chitietphuluc/'.$hopdong->id_hopdong.'/'.$pl->id_phuluc)}}" title="Chi tiết phụ lục"> <i class="fa fa-edit"></i> Xem</a>
                                                <a class="btn btn-warning" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>      
                                                <a class="btn btn-danger" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân sự này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
                                            </td> 
                                            
                                           
                                            
                                            </tr>
                                            @endforeach 
                                            @else 
                                            
                                            <td valign="top" colspan="5" class="dataTables_empty">Nhân viên có hợp đồng chưa có phụ luc</td>
                                        @endif
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection