<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tbl_hosonhanvien;
use App\Models\tbl_luuykien;
use App\Models\tbl_hoso;
use App\Models\tbl_lienhe;
use App\Models\tbl_trinhdo;
use App\Models\tbl_hopdong;
use App\Models\tbl_phuluc;
use App\Models\User;
use Illuminate\Support\Str;



class NhanVienController extends Controller
{
    public function getview()
    {

        $tongnhanvien = tbl_hosonhanvien::where('tinh_trang', 1)->count();

        $nhanviennam = tbl_hosonhanvien::where('gioi_tinh', 1)->count();
        $nhanviennu = tbl_hosonhanvien::where('gioi_tinh', 0)->count();



        $thuong = tbl_luuykien::where('id_ykien', 9)
            ->where('trang_thai', 2)
            ->get();
        $nhanvien = tbl_hosonhanvien::where('tinh_trang', 1)->get();
        return view('layout.content', ['tongnhanvien' => $tongnhanvien, 'nhanviennam' => $nhanviennam, 'nhanviennu' => $nhanviennu, 'thuong' => $thuong, 'nhanvien' => $nhanvien]);
    }



    public function getDangnhap()
    {
        return view('login');
    }
    public function postDangnhap(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('private');
        } else {
            return redirect('login')->with('thongbao', 'Tài khoảng hoặc mật khẩu không đúng, vui lòng đăng nhập lại');
        }
    }
    public function getHoSoNhanVien()
    {
        $ds_ho_so = tbl_hoso::all();
        // $user = User::find($id);
        $nhanvien = tbl_hosonhanvien::where('id_nhanvien', Auth::user()->id_nhanvien)->first();

        $lienhe = tbl_lienhe::where('id_nhanvien', $nhanvien->id_nhanvien)->get();

        $trinhdo = tbl_trinhdo::where('id_nhanvien', $nhanvien->id_nhanvien)->get();
        $user = User::where('id_nhanvien', $nhanvien->id_nhanvien)->first();

        $hopdong = tbl_hopdong::where([['id_nhanvien', Auth::user()->id_nhanvien], ['trang_thai', '1']])->first();
        $phuluc = tbl_phuluc::where([['id_hopdong', $hopdong->id_hopdong], ['id_loaiphuluc', '2']])->first();
        if (isset($phuluc)) {
            return view('pages.hosonhanvien', ['nhanvien' => $nhanvien, 'lienhe' => $lienhe, 'trinhdo' => $trinhdo, 'ds_ho_so' => $ds_ho_so, 'user' => $user, 'phuluc' => $phuluc]);
        }
        return view('pages.hosonhanvien', ['nhanvien' => $nhanvien, 'lienhe' => $lienhe, 'trinhdo' => $trinhdo, 'ds_ho_so' => $ds_ho_so, 'user' => $user]);
    }

    public function postThongtinTaikhoan(Request $request)
    {
        $nhanvien = tbl_hosonhanvien::where('id_nhanvien', Auth::user()->id_nhanvien)->first();
        $user = User::where('id_nhanvien', $nhanvien->id_nhanvien)->first();

        if ($request->hasFile('Hinh')) {

            $file = $request->file('Hinh');

            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . "_" . $name;
            $Hinh = Str::random(4) . "_" . $name;
            while (file_exists("upload/arvarta/" . $Hinh)) {
                $Hinh = Str::random(4) . "_" . $name;
            }
            $file->move("upload/arvarta", $Hinh);
            $nhanvien->anh_dai_dien = $Hinh;
        }
        $user->name = $request->name;
        $user->password = bcrypt($request->password);


        $user->save();
        $nhanvien->save();
        return redirect('private/thongtincanhan')->with('thongbao', 'Sửa đổi thông tin tài khoản thành công');
    }

    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('login');
    }

    public function getHopDongNhanVien($id)
    {
        $hopdong = tbl_hopdong::where('id_nhanvien', '=', $id)->get();
        return view('pages.hopdong', ['hopdong' => $hopdong]);
    }

    // public function getGiaDinh($id){
    //     $giadinh=tbl_giadinh::where('id_nhanvien','=',$id)->get();
    //     return view('pages.giadinh',['giadinh'=>$giadinh]);
    // }

    // public function getBaoHiem($id){
    //     $baohiem=tbl_baohiem::where('id_nhanvien','=',$id)->get();
    //     return view('pages.baohiem',['baohiem'=>$baohiem]);
    // }
}
