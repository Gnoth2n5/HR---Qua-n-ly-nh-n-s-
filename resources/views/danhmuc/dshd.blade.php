@extends('layout.index')
@section('content')

        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH HỢP ĐỒNG</h1>
                       
                    </div>
                   
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                                        <thead>
                                            <tr align="center">
                                                <th>SỐ HỢP ĐỒNG</th>
                                                
                                                <th>TÊN NHÂN VIÊN</th>
                                                <th>NGÀY LẬP HỢP ĐỒNG</th>
                                                
                                                <th>LOẠI HỢP ĐỒNG</th>

                                                {{-- <th>NGÀY BẮT ĐẦU HỢP ĐỒNG</th>
                                                <th>MỨC LƯƠNG CƠ BẢN</th>
                                                <th>PHỤ CẤP</th>
                                                <th>NGÀY KẾT THÚC HỢP ĐỒNG</th> --}}
                                                <th>NGƯỜI LẬP HỢP ĐỒNG</th>
                                                <th>TRẠNG THÁI</th>
                                                 
                                                <th style="width:220px">TÁC VỤ</th> 
                                                <th>HÀNH ĐỘNG</th>                                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($hopdong as $hd)
                                            <tr class="even gradeC" align="center">
                                                <td>{{$hd->id_hopdong}}</td>
                                                
                                                <td>{{$hd->tbl_hosonhanvien->ho_ten}}</td>
                                                <td>{{date('d-m-Y',strtotime($hd->created_at))}}</td>
                                                
                                                <td>{{$hd->tbl_loaihopdong->ten_hop_dong}}</td>
                                                {{-- <td>{{$hd->ngay_bat_dau_hop_dong}}</td>
                                                <td>{{$hd->muc_luong_chinh}}</td>
                                                <td>{{$hd->phu_cap}}</td>
                                                <td>{{$hd->ngay_ket_thuc_hop_dong}}</td> --}}
                                                <td>{{$hd->nguoi_laphd}}</td>
                                                @if((date('m',strtotime($hd->ngay_bat_dau_hop_dong))-(date('m',strtotime($hd->ngay_ket_thuc_hop_dong))))<=2)
                                                <td class="label label-danger">Sắp hết hạn </td>
                                                @else
                                                <td class=" label label-success">Còn hạn</td>
                                                @endif
                                                {{-- <td><a class="btn btn-primary" href="" title="Lập phụ lục"> <i class="fa fa-edit"></i> Lập phụ lục</a></td> --}}
                                                <td>
                                                    {{-- <a class="btn btn-primary" href="{{url('private/hopdong/'.$hd->id_nhanvien)}}" title="Xem"> <i class="fa fa-eye"></i> Xem</a> --}}
                                    
                                    {{-- <a class="btn btn-info mb-2" href="{{url('private/phuluc/'.$hd->id_hopdong)}}" title="Lập phụ lục"> <i class="fa fa-edit"></i> Quản lý phụ lục</a>
                                                    <br> --}}
                                    <a class="btn btn-primary" href="{{url('private/chitiethopdong/'.$hd->id_hopdong)}}" title="Xem hợp đồng"> <i class="fa fa-edit"></i> Xem</a>
                                    <a class="btn btn-warning" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                   
                                    
                                    <a class="btn btn-danger" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân sự này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a></td></td>

                                    <td>
                                        {{-- <a class="btn btn-primary" href="{{url('private/hopdong/'.$hd->id_nhanvien)}}" title="Xem"> <i class="fa fa-eye"></i> Xem</a> --}}
                        
                        <a class="btn btn-info mb-2" href="{{url('private/phuluc/'.$hd->id_hopdong)}}" title="Lập phụ lục"> <i class="fa fa-edit"></i> Quản lý phụ lục</a>
                       
                                    </td>
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
@endsection