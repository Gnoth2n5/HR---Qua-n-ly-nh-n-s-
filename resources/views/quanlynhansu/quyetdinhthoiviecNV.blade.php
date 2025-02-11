 
@extends('layout.index')
@section('content')

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
       
        <div class="row">
            <div class="col-lg-12 ">
                <h1>QUYẾT ĐỊNH THÔI VIỆC
                </h1>

                <h4 style="margin-left:3% ">Bạn quyết đinh đuổi nhân viên: {{$nhanvien->ho_ten}}, xin hãy nhập lý do!!</h4>

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
                            <form class="needs-validation"  action="{{url('private/quyetdinhthoiviecNV/'.$nhanvien->id_nhanvien)}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">             
                                            <div class="form-row mb-3">
                                                <div class="form-group col-md-3 mb-3">
                                                    <label >Ngày lập quyết định</label>
                                                    <input type="date" class="form-control" name="ngay_quyet_dinh">
                                                </div>
                                                <div class="form-group col-md-3 mb-3">
                                                    <label >Ngày nghĩ việc</label>
                                                    <input type="date" class="form-control" name="ngay_nghi_viec">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Các lý do đã vi phạm:</label><br>
                                                    
                                                        @foreach($kyluat as $kl)
                                                        <span>+{!!$kl->ly_do!!}</span><br>
                                                        @endforeach 
                                                   
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Lý do khác (nếu có): </label>
                                                    <textarea class="form-control col-12 " id="ly_do" name="noi_dung"></textarea>
                                                       
                                                    
                                                </div>
                                               
                                                
                                                
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
                                            <button class="btn btn-primary mr-5" type="submit" formtarget="_blank">Đuổi</button>
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