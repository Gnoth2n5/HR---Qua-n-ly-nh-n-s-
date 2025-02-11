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
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><i class="fas fa-sign-in-alt" style="font-size: 60px; color: blue;"></i><span class="splash-description">Hãy nhập tài khoản và mật khẩu</span></div>
            <div class="card-body">
                @if(session('thongbao'))
                <div class="alert alert-danger">
                            {{session('thongbao')}} 
                </div>
                        @endif
                <form  role="form" action="login" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="email" type="email  " placeholder="Tài khoản" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Mật khẩu">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  " style=" text-align: center;">
                
                <div class="card-footer-item card-footer-item-bordered">
                <a href="{{url('quenmatkhau')}}" class="footer-link">Quên mật khẩu</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{asset('admin_asset/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
</body>
 
</html>