<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\LoaiTinController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ThongtinController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\PhongbanController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\PhucapController;
use App\Http\Controllers\YKienController;
use App\Http\Controllers\LoaiYKienController;
use App\Http\Controllers\ChamCongController;
use App\Http\Controllers\BaoHiemController;
use App\Http\Controllers\LuongController;
use App\Http\Controllers\QLNhansuController;
use App\Http\Controllers\AjaxController;

//-------------------------- Login --------------------------------------
Route::get('login', [NhanVienController::class, 'getDangnhap'])->name('dangnhap');
Route::post('login', [NhanVienController::class, 'postDangnhap']);
Route::get('logout', [NhanVienController::class, 'getDangXuatAdmin']);
Route::get('quenmatkhau', [ForgotPasswordController::class, 'getQuenmk']);
Route::post('quenmatkhau', [ForgotPasswordController::class, 'sendResetLink']);
Route::get('cailaimatkhau', [ForgotPasswordController::class, 'showResetForm'])->name('cailaimatkhau');
Route::post('cailaimatkhau', [ForgotPasswordController::class, 'resetPassword'])->name('reset');

Route::middleware('Admin')->prefix('private')->group(function () {
    Route::get('/', [NhanVienController::class, 'getview']);

    //-------------------------- Tin tuc--------------------------------------
    Route::middleware('check:theloai')->prefix('theloai')->group(function () {
        Route::get('danhsach', [TheLoaiController::class, 'getDanhSach']);
        Route::get('sua/{id}', [TheLoaiController::class, 'getSua']);
        Route::post('sua/{id}', [TheLoaiController::class, 'postSua']);
        Route::get('them', [TheLoaiController::class, 'getThem']);
        Route::post('them', [TheLoaiController::class, 'postThem']);
        Route::get('xoa/{id}', [TheLoaiController::class, 'getXoa']);
    });

    Route::middleware('check:loaitin')->prefix('loaitin')->group(function () {
        Route::get('danhsach', [LoaiTinController::class, 'getDanhSach']);
        Route::get('sua/{id}', [LoaiTinController::class, 'getSua']);
        Route::post('sua/{id}', [LoaiTinController::class, 'postSua']);
        Route::get('them', [LoaiTinController::class, 'getThem']);
        Route::post('them', [LoaiTinController::class, 'postThem']);
        Route::get('xoa/{id}', [LoaiTinController::class, 'getXoa']);
    });

    Route::middleware('check:tintuc')->prefix('tintuc')->group(function () {
        Route::get('danhsach', [TinTucController::class, 'getDanhSach']);
        Route::get('sua/{id}', [TinTucController::class, 'getSua']);
        Route::post('sua/{id}', [TinTucController::class, 'postSua']);
        Route::get('them', [TinTucController::class, 'getThem']);
        Route::post('them', [TinTucController::class, 'postThem']);
        Route::get('xoa/{id}', [TinTucController::class, 'getXoa']);
        Route::get('danhsachtuyendung', [TinTucController::class, 'getDanhSachtuyendung']);
        Route::get('tuyendung/sua/{id}', [TinTucController::class, 'getSuatuyendung']);
        Route::post('tuyendung/sua/{id}', [TinTucController::class, 'postSuatuyendung']);
        Route::get('tuyendung/them', [TinTucController::class, 'getThemtuyendung']);
        Route::post('tuyendung/them', [TinTucController::class, 'postThemtuyendung']);
        Route::get('tuyendung/xoa/{id}', [TinTucController::class, 'getXoatuyendung']);
    });

    // Route::prefix('comment')->group(function () {
    //     Route::get('xoa/{id}/{idTinTuc}', [CommentController::class, 'getXoa']);
    // });

    Route::middleware('check:thongtincongty')->prefix('thongtin')->group(function () {
        Route::get('danhsachgioithieu', [ThongtinController::class, 'getDanhSachGioiThieu']);
        Route::get('gioithieu/sua/{id}', [ThongtinController::class, 'getSuagioithieu']);
        Route::post('gioithieu/sua/{id}', [ThongtinController::class, 'postSuagioithieu']);
        Route::get('gioithieu/them', [ThongtinController::class, 'getThemgioithieu']);
        Route::post('gioithieu/them', [ThongtinController::class, 'postThemgioithieu']);
        Route::get('gioithieu/xoa/{id}', [ThongtinController::class, 'getXoagioithieu']);
        Route::get('congty', [ThongtinController::class, 'getCongty']);
        Route::get('congty/sua', [ThongtinController::class, 'getSuaCongty']);
        Route::post('congty/sua', [ThongtinController::class, 'postSuaCongty']);
    });

    Route::get('danhsachnvpb', [DanhmucController::class, 'getDanhSachNVPB'])->middleware('check:qlnhanvienpb');

    //--------------------------- Phòng ban ---------------------------
    Route::middleware('check:phongban')->prefix('phongban')->group(function () {
        Route::get('danhsach', [DanhmucController::class, 'getDanhSachPB']);
        Route::get('them', [PhongbanController::class, 'getThemPB']);
        Route::post('them', [PhongBanController::class, 'postThemPB']);
        Route::get('sua/{id_phongban}', [PhongBanController::class, 'getSuaPB']);
        Route::post('sua/{id_phongban}', [PhongBanController::class, 'postSuaPB']);
        Route::get('xoa/{id_phongban}', [PhongBanController::class, 'getXoaPB']);
        Route::get('bab', [PhongBanController::class, 'tesT']);
    });

    //--------------------------- Chức vụ ---------------------------
    Route::middleware('check:chucvu')->prefix('chucvu')->group(function () {
        Route::get('danhsach', [DanhmucController::class, 'getDanhSachCV']);
        Route::get('them', [ChucVuController::class, 'getThemCV']);
        Route::post('them', [ChucVuController::class, 'postThemCV']);
        Route::get('sua/{id_chucvu}', [ChucVuController::class, 'getSuaCV']);
        Route::post('sua/{id_chucvu}', [ChucVuController::class, 'postSuaCV']);
        Route::get('xoa/{id_chucvu}', [ChucVuController::class, 'getXoaCV']);
    });

    Route::middleware('check:phucap')->prefix('phucap')->group(function () {
        Route::get('danhsach', [DanhmucController::class, 'getDanhSachPC']);
        Route::get('sua/{id}', [PhucapController::class, 'getSuaPC']);
        Route::post('sua/{id}', [PhucapController::class, 'postSuaPC']);
    });

    //--------------------------- Nhân Viên ---------------------------
    Route::middleware('check:dsnhanvien')->prefix('nhanvien')->group(function () {
        Route::get('danhsach', [DanhmucController::class, 'getDanhSachNV']);
        Route::get('{num}', [DanhmucController::class, 'getDanhSachNVLoai']);
    });

    //--------------------------- Hợp đồng ---------------------------
    Route::middleware('check:quanlyhopdong')->prefix('hopdong')->group(function () {
        Route::get('danhsach', [DanhmucController::class, 'getDanhSachHD']);
        Route::get('nhanvien/{id}', [DanhmucController::class, 'getDanhSachHDNV']);
        Route::get('them', [DanhmucController::class, 'getDanhSachCV']);
        Route::post('them', [DanhmucController::class, 'getDanhSachCV']);
        Route::get('sua', [PhongbanController::class, 'getFormPB']);
        Route::post('sua', [PhongbanController::class, 'addPhongBan']);
    });

    //--------------------------- Ý kiến ---------------------------
    Route::prefix('ykien')->group(function () {
        Route::get('danhsach', [DanhmucController::class, 'getDanhSachYK'])->middleware('check:quanlyykien');
        Route::get('danhsach/loai/{id}', [DanhmucController::class, 'getDanhSachYKL'])->middleware('check:quanlyykien');
        Route::get('danhsach/theodoi', [YKienController::class, 'getDSYKCaNhan'])->middleware('check:ykien');
        Route::get('danhsach/chitiet/{id_luuykien}', [YKienController::class, 'getChiTietYK'])->middleware('check:ykien');
        Route::post('danhsach/{id}/{id_luuykien}', [YKienController::class, 'postDuyetYK'])->middleware('check:quanlyykien');
        Route::get('them', [YKienController::class, 'getThemYK'])->middleware('check:ykien');
        Route::post('them', [YKienController::class, 'postThemYK'])->middleware('check:ykien');
        Route::get('sua/{id_luuykien}', [YKienController::class, 'getSuaYK'])->middleware('check:ykien');
        Route::post('sua/{id_luuykien}', [YKienController::class, 'postSuaYK'])->middleware('check:ykien');
        Route::get('xoa/{id_luuykien}', [YKienController::class, 'getXoaYK'])->middleware('check:ykien');
    });

    //--------------------------- Loại ý kiến ---------------------------
    Route::middleware('check:quanlyloaiykien')->prefix('loaiykien')->group(function () {
        Route::get('danhsach', [DanhmucController::class, 'getDanhSachLoaiYK']);
        Route::get('them', [LoaiYKienController::class, 'getThemLoaiYK']);
        Route::post('them', [LoaiYKienController::class, 'postThemLoaiYK']);
        Route::get('sua/{id_ykien}', [LoaiYKienController::class, 'getSuaLoaiYK']);
        Route::post('sua/{id_ykien}', [LoaiYKienController::class, 'postSuaLoaiYK']);
        Route::get('xoa/{id_ykien}', [LoaiYKienController::class, 'getXoaLoaiYK']);
    });

    //--------------------------- Chấm Công ---------------------------
    Route::prefix('chamcong')->group(function () {
        Route::get('/', [ChamCongController::class, 'getChamCong']);
        Route::post('checkin', [ChamCongController::class, 'checkin'])->name('checkin');
        Route::post('checkout', [ChamCongController::class, 'checkout'])->name('checkout');
        Route::get('danhsach', [DanhMucController::class, 'getDanhSachChamCong']);
        Route::get('tangca', [ChamCongController::class, 'getTangCa'])->name('tangca');
        Route::get('tangca/chitiet/{id_tangca}', [ChamCongController::class, 'getChiTietTangCa']);
        Route::post('checkin_tangca', [ChamCongController::class, 'checkinTangCa'])->name('checkin_tangca');
        Route::post('checkout_tangca', [ChamCongController::class, 'checkoutTangCa'])->name('checkout_tangca');
    });

    //--------------------------- thưởng ---------------------------
    Route::prefix('thuong')->group(function () {
        Route::get('danhsach', [DanhMucController::class, 'getDanhSachThuongAll']);
        Route::get('canhan', [DanhMucController::class, 'getDanhSachThuong']);
    });

    //--------------------------- kỷ luật ---------------------------
    Route::prefix('kyluat')->group(function () {
        Route::get('danhsach', [DanhMucController::class, 'getDanhSachKyLuatAll']);
        Route::get('canhan/{id_nhanvien}', [DanhMucController::class, 'getDanhSachKyLuat']);
    });

    Route::prefix('baohiem')->group(function () {
        Route::get('danhsach', [DanhMucController::class, 'getDanhSachBaoHiem']);
        Route::get('chitiet/{id_baohiem}', [BaoHiemController::class, 'getChiTietBH']);
        Route::get('them/{id_nhanvien}', [BaoHiemController::class, 'getThemBH']);
        Route::post('them/{id_nhanvien}', [BaoHiemController::class, 'postThemBH']);
        Route::get('sua/{id_baohiem}', [BaoHiemController::class, 'getSuaBH']);
        Route::post('sua/{id_baohiem}', [BaoHiemController::class, 'postSuaBH']);
        Route::get('xoa/{id_baohiem}', [BaoHiemController::class, 'postXoaBH']);
    });

    Route::middleware('check:quanlyluong')->prefix('luong')->group(function () {
        Route::get('danhsach', [DanhmucController::class, 'getDanhSachLuong']);
        Route::post('update', [LuongController::class, 'updateLuongAll'])->name('update');
    });

    Route::get('luong', [LuongController::class, 'getLuong']);
    Route::get('luong/chitiet/{id_bangluong}', [LuongController::class, 'chiTietLuong']);

    Route::get('quanly/thongtin/{id}', [QLNhansuController::class, 'getHoSoNhanVien'])->middleware('check:thongtinnhanvien');
    Route::get('quanly/suathongtin/{id}', [QLNhansuController::class, 'getSuaHoSoNhanVien'])->middleware('check:thongtinnhanvien');
    Route::post('quanly/suathongtin/{id}', [QLNhansuController::class, 'postSuaHoSoNhanVien'])->middleware('check:thongtinnhanvien');
    Route::get('quanly/xoathongtin/{id}', [QLNhansuController::class, 'getXoaNhanvien'])->middleware('check:thongtinnhanvien');

    Route::get('thongtincanhan', [NhanVienController::class, 'getHoSoNhanVien']);
    Route::post('thongtintaikhoan', [NhanVienController::class, 'postThongtinTaikhoan']);
    Route::get('{id}/hopdong', [NhanVienController::class, 'getHopDongNhanVien'])->middleware('check:hopdongcanhan');

    Route::get('laphoso', [QLNhansuController::class, 'getThemnhanvien'])->middleware('check:laphoso');
    Route::post('laphoso', [QLNhansuController::class, 'postThemnhanvien'])->middleware('check:laphoso');
    Route::get('laphopdong/{id}', [QLNhansuController::class, 'getLaphopdong'])->middleware('check:laphopdong');
    Route::post('laphopdong/{id}', [QLNhansuController::class, 'postLaphopdong'])->middleware('check:laphopdong');
    Route::get('laphopdong/pdf/{id}', [QLNhansuController::class, 'getPDFhopdong'])->middleware('check:laphopdong');
    Route::get('chitiethopdong/{id}', [QLNhansuController::class, 'getChitiethopdong'])->middleware('check:laphopdong');
    Route::get('phuluc/{id}', [QLNhansuController::class, 'getPhulucNV'])->middleware('check:lapphuluc');
    Route::get('chitietphuluc/{idhopdong}/{idphuluc}', [QLNhansuController::class, 'getchitietPhulucNV'])->middleware('check:lapphuluc');
    Route::get('lapphuluc/{id}', [QLNhansuController::class, 'getlapPhulucNV'])->middleware('check:lapphuluc');
    Route::post('lapphuluc/{id}', [QLNhansuController::class, 'postlapPhulucNV'])->middleware('check:lapphuluc');
    Route::get('lapphuluc/pdf/{id}', [QLNhansuController::class, 'getPDFphuluc'])->middleware('check:lapphuluc');
    Route::get('danhsachquyetdinh', [QLNhansuController::class, 'getDSquyetdinh'])->middleware('check:lapquyetdinh');
    Route::get('quyetdinhthoiviecNV/{id}', [QLNhansuController::class, 'getThoiviecNv'])->middleware('check:lapquyetdinh');
    Route::post('quyetdinhthoiviecNV/{id}', [QLNhansuController::class, 'postThoiviecNv'])->middleware('check:lapquyetdinh');
    Route::post('upanhkyluat/{id}', [QLNhansuController::class, 'postAnhkyluat'])->middleware('check:lapquyetdinh');
    Route::get('quyetdinh/{id}', [QLNhansuController::class, 'getquyetdinh'])->middleware('check:lapquyetdinh');
    Route::get('chitietquyetdinh/{id}', [QLNhansuController::class, 'getquyetdinhnv'])->middleware('check:lapquyetdinh');
    Route::get('quyetdinh/pdf/{id}', [QLNhansuController::class, 'getPDFquyetdinh'])->middleware('check:lapquyetdinh');
    Route::get('nghiviec/pdf/{id}', [QLNhansuController::class, 'getPDFnghiviec'])->middleware('check:lapquyetdinh');
    Route::get('huyquyetdinh/{id}', [QLNhansuController::class, 'huyquyetdinh'])->middleware('check:lapquyetdinh');
});

//Route::get('test','YKienController@testtime');
// Route::get('testt', 'ChamCongController@checkout');
// Route::get('test', 'YKienController@testtime');


Route::get('/', [PageController::class, 'trangchu']);
Route::get('trangchu', [PageController::class, 'trangchu']);
Route::get('tintucsukienall', [PageController::class, 'tintucsukienall']);
Route::get('tintucsukien/{id}', [PageController::class, 'tintucsukien']);
Route::get('tintuc/{id}', [PageController::class, 'tintuc']);

Route::get('dangnhap', [PageController::class, 'getDangnhap']);
Route::post('dangnhap', [PageController::class, 'postDangnhap']);
Route::get('dangxuat', [PageController::class, 'getDangXuat']);
// Route::post('comment/{id}', [CommentController::class, 'postComment']);
Route::get('nguoidung', [PageController::class, 'getNguoiDung']);
Route::post('nguoidung', [PageController::class, 'postNguoiDung']);
Route::get('dangky', [PageController::class, 'getDangky']);
Route::post('dangky', [PageController::class, 'postDangky']);
Route::get('lienhe', [PageController::class, 'getLienhe']);
Route::get('gioithieuchung', [PageController::class, 'getGioithieuchung']);
Route::get('tintuyendung', [PageController::class, 'getTuyendung']);
Route::get('tuyendung/{id}', [PageController::class, 'getTinTuyendung']);

Route::prefix('ajax')->group(function () {
    Route::get('chucvu/{id_phongban}', [AjaxController::class, 'getChucvu']);
    Route::get('chucvu_moi/{id_phongban_moi}', [AjaxController::class, 'getChucvumoi']);
    Route::get('phucap_moi/{id_chucvu_moi}', [AjaxController::class, 'getPhucapmoi']);
    Route::get('nhanvien_ykien/{id_chucvu}', [AjaxController::class, 'getNhanvienykien']);
});
