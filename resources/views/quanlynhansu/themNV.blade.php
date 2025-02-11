 
@extends('layout.index')
@section('content')

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">THÊM NHÂN VIÊN
                </h1>
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
                        
                        <div class="card-body">
                            <form class="needs-validation"  action="private/laphoso" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <h5 class="card-header mb-3" style="color: blueviolet;">Thông Tin Chính</h5>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <label for="validationCustom01">Họ Tên</label>
                                        <input type="text" class="form-control mb-3" name="ho_ten" placeholder="Nhập họ tên" value="" required>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-6">
                                              <label for="ngaysinh">Ngày Sinh</label>
                                              <input type="date" class="form-control" name="ngay_sinh">
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label>Giới tính</label>
                                                <br>
                                                <label class="radio-inline mr-5 ml-5 mt-2" >
                                                    <input type="radio" name="gioi_tinh" value="1" checked="" style="display: inline">Nam
                                                </label>
                                                <label class="radio-inline mr-5 ml-5 mt-2">
                                                    <input type="radio" name="gioi_tinh" value="0"  style="display: inline">Nữ
                                                </label>
                                                
                                            </div> 
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-6">
                                                <label >Dân tộc</label>
                                                <select name="dan_toc" class="form-control" style="-webkit-appearance: auto;">
                                                  <option selected value="0" ">Chọn dân tộc</option>
                                                    @foreach($dantoc as $dt)
                                                    <option value="{{$dt->id_dantoc}}">{{$dt->ten_dan_toc}}</option>
                                                     @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label >Tôn giáo</label>
                                                <input type="text" class="form-control" name="ton_giao" placeholder="Nhập tôn giáo">
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-4">
                                              <label>Số Chứng Minh Nhân Dân</label>
                                              <input type="text" class="form-control" name="so_cmnd" placeholder="Nhập số CMND">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="ngaycapcmnd">Ngày Cấp</label>
                                                <input type="date" class="form-control" name="ngay_cap_cmnd">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="noicapcmnd">Nơi Cấp</label>
                                                <input type="text" class="form-control" name="noi_cap_cmnd" placeholder="Nhập địa chỉ nơi cấp CMND">
                                            </div>
                                        </div>



                                        <h5 class="card-header mb-3" style="color: blueviolet;">Thông Tin Liên Hệ</h5>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-4">
                                              <label for="sdt_ca_nhan">Số Điện Thoại Cá Nhân</label>
                                              <input type="text" class="form-control" name="sdt_ca_nhan" placeholder="Nhập số điện thoại cá nhân">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label >Số Điện Thoại Nhà</label>
                                                <input type="text" class="form-control" name="sdt_nha" placeholder="Nhập số điện thoại nhà">
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label for="email">Email Cá Nhân</label>
                                                <input type="email" class="form-control" name="email" placeholder="Nhập email cá nhân">
                                              </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-6"> 
                                                <label >Địa chỉ thường trú</label>
                                                <input type="text" class="form-control mb-3" name="dia_chi_thuong_tru" placeholder="Nhập địa chỉ thường trú" value="" >
                                            </div>
                                            <div class="form-group col-md-6"> 
                                                <label >Tỉnh/ Thành phố</label>
                                                <select name="tinh_thuong_tru" class="form-control" style="-webkit-appearance: auto;">
                                                <option selected value="0" ">Chọn tỉnh</option>
                                                @foreach($tinh as $t)
                                                    <option value="{{$t->id_tinh}}">{{$t->ten_tinh}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-6"> 
                                                <label >Địa chỉ tạm trú</label>
                                                <input type="text" class="form-control mb-3" name="dia_chi_tam_tru" placeholder="Nhập địa chỉ tạm trú" value="" >
                                            </div>
                                            <div class="form-group col-md-6"> 
                                                <label >Tỉnh/ Thành phố</label>
                                                <select name="tinh_tam_tru" class="form-control" style="-webkit-appearance: auto;">
                                                <option selected value="0" ">Chọn tỉnh</option>
                                                @foreach($tinh as $t)
                                                <option value="{{$t->id_tinh}}">{{$t->ten_tinh}}</option>
                                            @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    
                                        

                                        <h5 class="card-header mb-3" style="color: blueviolet;">Thông Tin Trình Độ, Bằng Cấp</h5>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-2"> 
                                                <label >Bằng Cấp, Trình Độ</label>
                                                <select name="muc_trinh_do" class="form-control" style="-webkit-appearance: auto;">
                                                <option selected  ">Chọn trình độ</option>
                                                <option  value="Đại học" ">Đại Học</option>
                                                <option  value="Cao đẳng" ">Cao Đẳng</option>
                                                <option  value="Trung Cấp" ">Trung Cấp</option>
                                                <option  value="Khác" ">Khác</option>
                                                
                                            </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="sdt_ca_nhan">Nơi Đào Tạo</label>
                                              <input type="text" class="form-control" name="noi_dao_tao" placeholder="Nhập nơi đào tạo">
                                            </div>
                                            <div class="form-group col-md-2"> 
                                                <label >Xếp loại</label>
                                                <select name="xep_loai" class="form-control" style="-webkit-appearance: auto;">
                                                <option selected  ">Chọn xếp loại</option>
                                                <option  value="Giỏi" >Giỏi</option>
                                                <option  value="Khá">Khá</option>
                                                <option  value="Trung Bình Khá">Trung Bình Khá</option>
                                                <option  value="Khác">Khác</option>
                                                
                                            </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label >Năm Tốt Nghiệp</label>
                                                <input type="number" name="nam_tot_nghiep" class="form-control text-center" min="2010" max="2020" step="1" value="2020" />
                                                {{-- <input type="month"  name="nam_tot_nghiep" min="2010-01" value="2018-05">
                                                <input type="month" class="form-control" name="email_cong_ty" placeholder="Nhập email công ty"> --}}
                                              </div>
                                            
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-6">
                                                <label >Ngành Đào Tạo</label>
                                                <input type="text" class="form-control" name="nganh_dao_tao" placeholder="Nhập chuyên ngành đào tạo">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label >Chuyên Ngành</label>
                                                <input type="text" class="form-control" name="chuyen_nganh" placeholder="Nhập chuyên ngành đào tạo">
                                            </div>
                                            
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-12"> 
                                                <label > Tên các bằng cấp, chứng chỉ khác ( nếu có) </label>
                                                <input type="text" class="form-control mb-3" name="chung_chi_khac" placeholder="Nhập bằng cấp, chứng chỉ khác (cách nhau bằng dấu , hoặc dấu , )" value="" >
                                            </div>
                                        </div>


                                        <h5 class="card-header mb-3" style="color: blueviolet;">Thông Tin Chức Vụ Tại Công Ty</h5>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Phòng Ban</label>
                                                <select name="phong_ban" class="form-control" style="-webkit-appearance: auto;" id="phong_ban">
                                                  <option selected value="0">Chọn phòng ban</option>
                                                  @foreach($phongban as $pb)
                                                <option value="{{$pb->id_phongban}}">{{$pb->ten_phong_ban}}</option>
                                            @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Chức Vụ</label>
                                                <select name="chuc_vu" class="form-control" style="-webkit-appearance: auto;" id="chuc_vu">
                                                  <option selected value="0">Chọn chức vụ</option>
                                                  
                                                  @foreach($chucvu as $cv)
                                                <option value="{{$cv->id_chucvu}}">{{$cv->ten_chuc_vu}}</option>
                                            @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Vị trí</label>
                                                <select name="vi_tri" class="form-control" style="-webkit-appearance: auto;" id="phong_ban">
                                                  <option selected value="0">Chọn vị trí công việc</option>
                                                  @foreach($vitri as $vt)
                                                <option value="{{$vt->id_vitri}}">{{$vt->ten_vi_tri}}</option>
                                            @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <h5 class="card-header mb-3" style="color: blueviolet;">Thông Tin Tài Khoảng Tại Công Ty</h5>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-4">
                                              <label>Tên Người Dùng</label>
                                              <input type="text" class="form-control" name="name" placeholder="Nhập tên hoặc biệt danh">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label >Email Công Ty (Tài khoản)</label>
                                                <input type="email" class="form-control" name="email" placeholder="Nhập email" value="@cty.com.vn">
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label>PassWord</label>
                                                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                                              </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
                                            <button class="btn btn-primary mr-5" type="submit">Thêm</button>
                                            <button type="reset" class="btn btn-primary">Làm mới</button>
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

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#phong_ban").change(function(){
                var id_phongban=$(this).val();
                $.get("ajax/chucvu/"+id_phongban,function(data){
                    $("#chuc_vu").html(data);
                });
            });
        });
    </script>   
@endsection