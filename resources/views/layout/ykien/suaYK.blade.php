 
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
                    <h2 class="pageheader-title">Sửa Ý Kiến </h2>
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
                        <h5 class="card-header">Sửa Ý Kiến</h5>
                        <div class="card-body">
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                            <form class="needs-validation" method="POST" action="{{url('private/ykien/sua/'.$ykien->id_luuykien)}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <!--<div class="valid-feedback">
                                            Looks good!
                                        </div> -->
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="id_ykien">Loại ý kiến</label>
                                                <input type="text" class="form-control" id="id_ykien" name="id_ykien" placeholder="{{$ykien->tbl_ykien->loai_y_kien}}" disabled>
                                            </div>
                                            @if($ykien->id_ykien == 3)
                                            <div class="form-group col-md-3">
                                                <label for="loai">Loại Nghỉ Phép riêng</label>
                                                @if($ykien->truong_hop == 1)
                                                    <input type="text" class="form-control" id="loai" name="loai" placeholder="Đám Cưới" disabled>
                                                @elseif($ykien->truong_hop == 2)
                                                    <input type="text" class="form-control" id="loai" name="loai" placeholder="Con Cái Kết Hôn" disabled>
                                                @else
                                                    <input type="text" class="form-control" id="loai" name="loai" placeholder="Người Thân Mất" disabled>
                                                @endif
                                                <div class="text-muted">*Người Thân Mất* được tính theo pháp luật gồm: Bố đẻ, mẹ đẻ, bố vợ, mẹ vợ hoặc bố chồng, mẹ chồng, vợ hoặc chồng, con</div>
                                            </div>
                                            @endif
                                            @if($ykien->id_ykien == 2)
                                            <div class="form-group col-md-3">
                                                <label for="truong_hop">Chọn Hình Thức Sinh</label>
                                            <select name="truong_hop" id="truong_hop" class="form-control" style="-webkit-appearance: auto;">
                                                <option selected> --Chọn--</option>
                                                        <option value="1">Sinh Thường</option>
                                                        <option value="2">Sinh Mổ / Sinh Non </option>
                                                        <option value="3">Sinh Đôi</option>
                                                        <option value="4">Sinh Ba</option>
                                                        <option value="5">sinh Tư</option>
                                                        <option value="6">Sinh Năm (Hơn Năm)</option>
                                                        <option value="7">Sinh Đôi Mổ</option>
                                            </select>
                                            </div>
                                            
                                            @endif
                                        </div>
                                        @if(isset($phongban))
                                        <label for="phong_ban_den">Phòng Ban Gừi Đến</label>
                                        <select name="phong_ban_den" class="form-control col-md-4 mb-3" style="-webkit-appearance: auto;" id="phong_ban_den">
                                            @foreach($phongban as $pb)
                                            @if($ykien->id_phongban == $pb->id_phongban)
                                                <option selected value="{{$pb->id_phongban}}">{{$pb->ten_phong_ban}}</option>
                                            @else
                                                <option value="{{$pb->id_phongban}}">{{$pb->ten_phong_ban}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @endif
                                        {{-- <div class="form-control"> --}}
                                            <label for="ly_do">Nội dung </label>
                                            <input type="text" class="form-control" id="ly_do" name="ly_do" value="{{$ykien->ly_do}}">
                                        {{-- </div>  --}}
                                        @if($ykien->id_ykien == 9 || $ykien->id_ykien == 10)
                                        <label for="nguoi_de_xuat">Người được đề xuất</label>
                                        <input type="text" class="form-control" name="nguoi_de_xuat" >
                                        @endif
                                        
                                        {{-- <label for="truong_hop" class="">Các Loại Nghỉ Phép Riêng</label>
                                        <select name="truong_hop" id="truong_hop" class="form-control col-md-3 " style="-webkit-appearance: auto;">
                                            <option selected> --Chọn--</option>
                                                    <option value="1">Kết Hôn</option>
                                                    <option value="2">Con Cái Kết Hôn</option>
                                                    <option value="3">Người Thân Mất</option>
                                        </select> --}}
                                        @if($ykien->id_ykien == 5)
                                        <label for="gia_tri">Số tiền</label>
                                        <input type="text" class="form-control " name="gia_tri" placeholder="{{$ykien->gia_tri}}">
                                        @endif
                                        @if($ykien->id_ykien == 8)
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="phong_ban_old">Phòng Ban Đã Chọn</label>
                                                <div class="form-control" disabled>{{$ykien->phong_ban_old}}</div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="chuc_vu_old">Chức Vụ Đã Chọn</label>
                                                <div class="form-control" disabled>{{$ykien->chuc_vu_old}}</div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="phong_ban_new">Chọn Lại Phòng Ban</label>
                                                <select name="phong_ban_new" id="phong_ban_new" class="form-control " style="-webkit-appearance: auto;">
                                                    <option >Chọn Phòng Ban</option>
                                                    @foreach($phongban as $pb)
                                                            <option value="{{$pb->id_phongban}}">{{$pb->ten_phong_ban}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="chuc_vu_new">Chọn Lại Chức vụ</label>
                                                <select name="chuc_vu_new" id="chuc_vu_new" class="form-control " style="-webkit-appearance: auto;">
                                                    <option >Chọn Chức vụ</option>
                                                    {{-- @foreach($phongban as $pb)
                                                            <option value="{{$pb->id_phongban}}">{{$pb->ten_phong_ban}}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                        @if($ykien->id_ykien == 1)
                                        <label for="thoi_gian_nghi">Thời gian nghỉ (ngày)</label>
                                        <input type="text" class="form-control " name="thoi_gian_nghi" value="{{$ykien->thoi_gian_nghi}}" >
                                        @endif
                                        @if($ykien->id_ykien == 1 || $ykien->id_ykien == 2 || $ykien->id_ykien == 3 || $ykien->id_ykien == 4 || $ykien->id_ykien == 7 )
                                            @if($ykien->id_ykien == 7)
                                               <label for="ngay_bat_dau">Ngày tăng ca</label>
                                            @else
                                                <label for="ngay_bat_dau">Bắt đầu từ ngày</label>    
                                            @endif
 
                                            <input type="date" class="form-control" name="ngay_bat_dau" value="{{date('Y-m-d',strtotime($ykien->ngay_bat_dau))}}">
                                        @endif
                                        @if(isset($hinhanh))
                                        <div class="form-row">
                                            <label>Hình ảnh minh chứng: </label>
                                        @foreach($hinhanh as $anh)
                                            <div class="img-thumbnail">
                                                <a href="{{url('upload/anhminhchung/'.$anh->ten_anh)}}" target="_blank" ><img src="{{url('upload/anhminhchung/'.$anh->ten_anh)}}" style="width: 255px;height: 265px;" class="magnify" ></a>
                                            </div>
                                        @endforeach
                                        </div> 
                                        @endif
                                        <label for="nop_minh_chung">Bổ Sung Minh Chứng (Hình Ảnh)</label>
                                        <input type="file" class="form-control" name="nop_minh_chung[]" accept="image/png, image/jpeg, image/jpg" multiple>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" type="submit">Lưu</button>
                                            <button class="btn btn-default" type="reset">Reset</button>
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
            </div>
    </div>
</div>
 
@endsection
 
