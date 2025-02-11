<!-- left sidebar -->
<!-- ============================================================== -->
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Quản lý</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column" style="overflow-y: auto;">
                    <li class="nav-divider text-center">
                        Menu
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link " href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-1" aria-controls="submenu-1"><i
                                class="fa fa-fw fa-user-circle"></i>Quản lý danh mục<span
                                class="badge badge-success">6</span></a>
                        <div id="submenu-1"
                            class="collapse submenu {{ Request::is('private/phongban/danhsach') || Request::is('private/phucap/danhsach') || Request::is('private/chucvu/danhsach') || Request::is('private/nhanvien/danhsach') || Request::is('private/nhanvien/1') || Request::is('private/nhanvien/2') || Request::is('private/loaiykien/danhsach') || Request::is('private/hopdong/danhsach') || Request::is('private/chamcong/danhsach') ? 'show' : null }}"
                            style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/phongban/danhsach') ? 'active' : null }}"
                                        href="{{ url('private/phongban/danhsach') }}">Danh sách phòng ban</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/chucvu/danhsach') ? 'active' : null }}"
                                        href="{{ url('private/chucvu/danhsach') }}">Danh sách chức vụ</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-1-2" aria-controls="submenu-1-2">Danh sách nhân viên</a>
                                    <div id="submenu-1-2"
                                        class="collapse submenu {{ Request::is('private/nhanvien/danhsach') || Request::is('private/nhanvien/1') || Request::is('private/nhanvien/2') ? 'show' : null }}"
                                        style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link {{ Request::is('private/nhanvien/danhsach') ? 'active' : null }} "
                                                    href="{{ url('private/nhanvien/danhsach') }}">Tất cả nhân viên</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ Request::is('private/nhanvien/1') ? 'active' : null }}"
                                                    href="{{ url('private/nhanvien/1') }}">Nhân viên đang làm</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ Request::is('private/nhanvien/2') ? 'active' : null }}"
                                                    href="{{ url('private/nhanvien/2') }}">Nhân viên nghỉ việc</a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/hopdong/danhsach') ? 'active' : null }}"
                                        href="{{ url('private/hopdong/danhsach') }}">Danh sách hợp đồng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/chamcong/danhsach') ? 'active' : null }}"
                                        href="{{ url('private/chamcong/danhsach') }}">Danh sách chấm công</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/loaiykien/danhsach') ? 'active' : null }}"
                                        href="{{ url('private/loaiykien/danhsach') }}">Danh sách loại ý kiến</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/phucap/danhsach') ? 'active' : null }}"
                                        href="{{ url('private/phucap/danhsach') }}">Bảng phụ cấp</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Quản lý
                            nhân sự</a>
                        <div id="submenu-2"
                            class="collapse submenu {{ Request::is('private/laphoso') || Request::is('private/danhsachquyetdinh') || Request::is('private/kyluat/danhsach') || Request::is('private/thuong/danhsach') || Request::is('private/danhsachnvpb') || Request::is('private/ykien/danhsach') || Request::is('private/ykien/danhsach/loai/*') ? 'show' : null }}""
                            style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/laphoso') ? 'active' : null }}"
                                        href="{{ url('private/laphoso') }}">Lập hồ sơ nhân viên</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/danhsachquyetdinh') ? 'active' : null }}"
                                        href="{{ url('private/danhsachquyetdinh') }}">Theo dõi tình trạng nghỉ việc</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/kyluat/danhsach') ? 'active' : null }}"
                                        href="{{ url('private/kyluat/danhsach') }}">Danh sách nhân viên kỷ luật</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/thuong/danhsach') ? 'active' : null }}"
                                        href="{{ url('private/thuong/danhsach') }}">Danh sách nhân viên khen thưởng</a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/danhsachnvpb') ? 'active' : null }}"
                                        href="{{ url('private/danhsachnvpb') }}">Quản lý nhân viên phòng ban</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-11" aria-controls="submenu-11">Các ý kiến, đề xuất</a>
                                    <div id="submenu-11"
                                        class="collapse submenu  {{ Request::is('private/ykien/danhsach') || Request::is('private/ykien/danhsach/loai/*') ? 'show' : null }}"
                                        style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item"><a
                                                    class="nav-link {{ Request::is('private/ykien/danhsach') ? 'active' : null }}"
                                                    href="{{ url('private/ykien/danhsach') }}"> Tất cả ý kiến </a>
                                            </li>
                                            {{-- @foreach ($ykien as $yk)
                                                <li class="nav-item">
                                                    <a class="nav-link {{ Request::is('private/ykien/danhsach/loai/' . $yk->id_ykien) ? 'active' : null }}"
                                                        href="{{ url('private/ykien/danhsach/loai/' . $yk->id_ykien) }}">{{ $yk->loai_y_kien }}</a>
                                                </li>
                                            @endforeach --}}
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-3" aria-controls="submenu-3"><i
                                class="fas fa-fw fa-chart-pie"></i>Hồ sơ nhân viên</a>
                        <div id="submenu-3"
                            class="collapse submenu {{ Request::is('private/thongtincanhan') || Request::is('private/' . Auth::user()->id_nhanvien . '/hopdong') || Request::is('private/luong') || Request::is('private/chamcong') || Request::is('private/ykien/danhsach/theodoi') || Request::is('private/ykien/them') ? 'show' : null }}"
                            style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/thongtincanhan') ? 'active' : null }}"
                                        href="{{ url('private/thongtincanhan') }}">Thông tin cá nhân</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  {{ Request::is('private/' . Auth::user()->id_nhanvien . '/hopdong') ? 'active' : null }}"
                                        href="{{ url('private/' . Auth::user()->id_nhanvien . '/hopdong') }}">Hợp đồng</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link  {{ Request::is('private/luong') ? 'active' : null }}"
                                        href="{{ url('private/luong') }}">Lương & Thuế</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/chamcong') ? 'active' : null }}"
                                        href="{{ url('private/chamcong') }}">Chấm công</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse"
                                        data-target="#submenu-yk" aria-controls="submenu-yk">Ý Kiến / Đề xuất</a>
                                    <div id="submenu-yk"
                                        class="collapse submenu  {{ Request::is('private/ykien/danhsach/theodoi') || Request::is('private/ykien/them') ? 'show' : null }}"
                                        style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link {{ Request::is('private/ykien/danhsach/theodoi') ? 'active' : null }}"
                                                    href="{{ url('private/ykien/danhsach/theodoi') }}">Theo dõi ý
                                                    kiến</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ Request::is('private/ykien/them') ? 'active' : null }}"
                                                    href="{{ url('private/ykien/them') }}">Gửi ý kiến!</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-4" aria-controls="submenu-4"><i
                                class="fab fa-fw fa-wpforms"></i>Quản lý lương</a>
                        <div id="submenu-4"
                            class="collapse submenu {{ Request::is('private/luong/danhsach') ? 'show' : null }}"
                            style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link  {{ Request::is('private/luong/danhsach') ? 'active' : null }}"
                                        href="{{ url('private/luong/danhsach') }}">Lương nhân viên</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-file"></i>Giới
                            thiệu-Tin tức-Tuyển dụng</a>
                        <div id="submenu-5"
                            class="collapse submenu {{ Request::is('private/thongtin/danhsachgioithieu') || Request::is('private/tintuc/danhsach') || Request::is('private/tintuc/danhsachtuyendung') ? 'show' : null }}"
                            style="">
                            <ul class="nav flex-column">
                                <label>Giới thiệu</label>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/thongtin/danhsachgioithieu') ? 'active' : null }}"
                                        href="{{ url('private/thongtin/danhsachgioithieu') }}">Thông tin giới thiệu về
                                        công ty</a>
                                </li>
                                <label>Tuyển dụng</label>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/tintuc/danhsachtuyendung') ? 'active' : null }}"
                                        href="{{ url('private/tintuc/danhsachtuyendung') }}">Quản lý tin tuyển
                                        dụng</a>
                                </li>
                                <label>Tin tức</label>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('private/tintuc/danhsach') ? 'active' : null }}"
                                        href="{{ url('private/tintuc/danhsach') }}">Quản lý tin tức</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link ml-2 {{ Request::is('private/thongtin/congty') ? 'active' : null }}"
                            href="{{ url('private/thongtin/congty') }}">Thông tin công ty</a>
                    </li>
                    <li style="text-align: center"> <a href="{{ url('private/') }}"> <img
                                src="{{ url('upload/logo/' . $thongtinchinh->Hinh) }}"
                                style="margin-top: 40px;width: 70px;height: 70px;" class=""></a></li>
                    <li style="text-align: center"><a class="navbar-brand" href="{{ url('private/') }}"
                            style="color: #71748d;font-size: 15px;">{{ $thongtinchinh->ten_cong_ty }}</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->
