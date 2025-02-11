<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản lý nhân sự - Đăng nhập</title>
    <!-- Bootstrap CSS -->
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('admin_asset/assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin_asset/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- forgot password  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center"><img class="logo-img" src="https://data.kenhsinhvien.vn/hinhanh/2013/03/12/forgot-pass-659087-2548.gif" alt="logo" style="width: 140px;"><span class="splash-description">Vui lòng nhập địa chỉ email công ty của bạn để được lấy lại mật khẩu!!!</span></div>
            <div class="card-body">
                @if(session('loi'))
                <div class="alert alert-danger">
                            {{session('loi')}} 
                </div>
                        @endif
                        @if(session('thongbao'))
                <div class="alert alert-success">
                            {{session('thongbao')}} 
                </div>
                        @endif
                <form role="form" action="quenmatkhau" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{-- <p></p> --}}
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="Email" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Gửi</button>
                </form>
                {{-- <div class="form-group pt-1"><a class="btn btn-block btn-primary btn-xl" href="../index.html">Gửi</a></div> --}}
            </div>
            
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end forgot password  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{asset('admin_asset/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
</body>

 
</html>