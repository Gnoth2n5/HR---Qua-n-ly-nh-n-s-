<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản lý nhân sự - Đăng nhập</title>
    <!-- Bootstrap CSS -->
    <base href="{{ asset('') }}">
    <link rel="stylesheet" href="{{ asset('admin_asset/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('admin_asset/assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin_asset/assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_asset/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
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
            <div class="card-header text-center"><img class="logo-img"
                    src="https://data.kenhsinhvien.vn/hinhanh/2013/03/12/forgot-pass-659087-2548.gif" alt="logo"
                    style="width: 140px;"><span class="splash-description">Hãy nhập mật khẩu mới</span></div>
            <div class="card-body">
                @if (session('loi'))
                    <div class="alert alert-danger">
                        {{ session('loi') }}
                    </div>
                @endif
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif
                <form role="form" method="POST" action="{{ route('cailaimatkhau') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="inputPassword">Mật khẩu mới</label>
                        <input id="inputPassword" type="password" placeholder="Password" required=""
                            class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="inputRepeatPassword">Nhập lại mật khẩu mới</label>
                        <input id="inputRepeatPassword" data-parsley-equalto="#inputPassword" type="password"
                            required="" placeholder="Password" class="form-control" name="password_confirmation">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 pl-0">
                            <p class="text-center">
                                <button type="submit" class="btn btn-space btn-primary">Xác nhận</button>
                                <button class="btn btn-space btn-secondary">Hủy</button>
                            </p>
                        </div>
                    </div>
                </form>
                {{-- <div class="form-group pt-1"><a class="btn btn-block btn-primary btn-xl" href="../index.html">Gửi</a></div> --}}
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end forgot password  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{ asset('admin_asset/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('admin_asset/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>


</html>
