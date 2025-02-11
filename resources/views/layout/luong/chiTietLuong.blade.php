 
@extends('layout.index')
@section('content')
 
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">CHI TIẾT LƯƠNG</h2>
                    {{-- <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Validations</li>
                            </ol>
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
     
            <div class="row">
                <!-- ============================================================== -->
                <!-- validation form -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Chi Tiết Lương Tháng {{date('m',strtotime($luong->luong_thang))}} Của {{$luong->tbl_hosonhanvien->ho_ten}}</h5>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="ma_nv">Mã Nhân Viên</label>
                                                <span class="form-control" name="luong_tongma_nv">{{$nhanvien->id_nhanvien}}</span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="ho_ten">Họ Tên Nhân Viên</label>
                                                <span class="form-control" name="ho_ten">{{$nhanvien->ho_ten}}</span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="chucvu_phongban">Chức vụ / Phòng Ban</label>
                                                <span class="form-control" name="chucvu_phongban">{{$nhanvien->tbl_chucvu->ten_chuc_vu}} / {{$nhanvien->tbl_chucvu->tbl_phongban->ten_phong_ban}}</span>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="luong_tong">Tổng Lương</label>
                                                <span class="form-control" name="luong_tong">{{number_format($luong->tong_tien_luong)}}</span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="luong_co_ban">Lương Cơ Bản</label>
                                                <span class="form-control" name="luong_co_ban">{{number_format($luongcoban)}}</span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="so_gio_lam_viec">Số Giờ Làm Việc Trong Tháng</label>
                                                <span class="form-control" name="so_gio_lam_viec">{{round($luong->so_gio_lam_viec,2)}}</span>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <label>Phụ cấp</label>
                                            <div class="form-group col-md-3">
                                                <label for="an_trua">Ăn Trưa</label>
                                                <span class="form-control" name="an_trua">{{number_format($phucap->an_trua)}}</span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="xang_xe">Xăng Xe</label>
                                                <span class="form-control" name="">{{number_format($phucap->xang_xe)}}</span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="khac">Khác</label>
                                                <span class="form-control" name="khac">{{number_format($phucap->khac)}}</span>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="">Thời Gian Tăng Ca Trong Tháng</label>
                                                <span class="form-control" name="">{{$tongtangca}}</span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Tiền Lương Thêm Tương Ứng</label>
                                                <span class="form-control" name="">{{number_format($tientangca)}}</span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Tiền lương đã ứng</label>
                                                <span class="form-control" name="">{{number_format($ungluong)}}</span>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="thue_thu_nhap">Thuế Thu Nhập Phải Đóng</label>
                                                <span class="form-control" name="thue_thu_nhap">{{number_format($luong->thue_thu_nhap)}}</span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="thue_bao_hiem">Thuế Bảo Hiểm Y Tế</label>
                                                <span class="form-control" name="thue_bao_hiem">{{number_format($thuebhyt)}}</span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="thue_bao_hiem">Thuế Bảo Hiểm Xã Hội</label>
                                                <span class="form-control" name="thue_bao_hiem">{{number_format($thuebhxh)}}</span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="thue_bao_hiem">Thuế Bảo Hiểm Thất Nghiệp</label>
                                                <span class="form-control" name="thue_bao_hiem">{{number_format($thuebhtn)}}</span>
                                            </div>
                                            {{-- <div class="form-group col-md-3">
                                                <label for="luong_thuong">Tiền Thưởng</label>
                                                <span class="form-control" name="luong_thuong">{{number_format($thuong)}}</span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="ky_luat">Tiền Phạt</label>
                                                <span class="form-control" name="ky_luat">{{number_format($kyluat)}}</span>
                                            </div> --}}
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md 6">
                                                <label> Danh Sách Khen Thưởng</label>
                                                <table class="table table-striped table-bordered display">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>Ngày Khen Thưởng</th>
                                                            <th>Người đề xuất</th>
                                                            <th>Nội dung</th>
                                                            <th>Giá Trị</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        @foreach($khenthuong as $kt) 
                                                        <tr class="even gradeC" align="center">
                                                            <td>{{date('d-m-Y',strtotime($kt->updated_at))}}</td>
                                                            <td>{{$kt->tbl_hosonhanvien->ho_ten}}</td>
                                                            <td class="text-justify">{{$kt->ly_do}}</td>
                                                            <td>{{number_format($kt->gia_tri)}} VNĐ</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="form-group col-md 6">
                                                <label>Danh sách Kỷ Luật</label>
                                                <table class="table table-striped table-bordered display">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>Ngày Khen Thưởng</th>
                                                            <th>Người đề xuất</th>
                                                            <th>Nội dung</th>
                                                            <th>Giá Trị</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($kyluat as $kl) 
                                                        <tr class="even gradeC" align="center">
                                                            <td>{{date('d-m-Y',strtotime($kl->updated_at))}}</td>
                                                            <td>{{$kl->tbl_hosonhanvien->ho_ten}}</td>
                                                            <td>{{$kl->ly_do}}</td>
                                                            <td>{{number_format($kl->gia_tri)   }} VNĐ</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="luong_nhan">Lương Nhận</label>
                                                <span class="form-control" name="luong_nhan" aria-describedby="helper">
                                                    {{-- @if(isset($luong->tong_tien_luong) && isset($luong->thue_thu_nhap)) --}}
                                                        {{number_format($luongnhanduoc)}}
                                                    {{-- @endi  f --}}
                                                </span>
                                                <small id="helper" class="text-muted">Cập nhật lần cuối vào : {{date('H:i:s d/m/Y',strtotime($luong->updated_at))}}</small><div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <a class="btn btn-secondary" href="javascript:history.back()" >Quay Lại</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
            </div>
        </div>
            </div>
    </div>
</div>
 
@endsection
 
