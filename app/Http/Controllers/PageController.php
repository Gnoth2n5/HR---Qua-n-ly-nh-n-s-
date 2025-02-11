<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LoaiTin;
use App\Models\TinTuc;
use App\Models\tbl_thongtinchinh;
use App\Models\tbl_thongtingioithieu;
use App\Models\tbl_tintuyendung;
use App\Models\User;

class PageController extends Controller
{
    protected $thongtinchinh;

    public function __construct()
    {
        $this->thongtinchinh = tbl_thongtinchinh::first();
        view()->share('thongtinchinh', $this->thongtinchinh);

        if (Auth::check()) {
            view()->share('nguoidung', Auth::user());
        }
    }

    public function tintucsukienall()
    {
        $tintuc = TinTuc::paginate(6);
        return view('pagestrangchinh.tintucsukienall', ['tintuc' => $tintuc]);
    }

    public function tintucsukien($id)
    {
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin', $id)->paginate(6);
        return view('pagestrangchinh.tintucsukien', ['loaitin' => $loaitin, 'tintuc' => $tintuc]);
    }

    public function trangchu()
    {
        $tintuc = TinTuc::all();
        $gioithieu = tbl_thongtingioithieu::orderBy('id', 'DESC')->first();
        return view('pagestrangchinh.trangchu', ['tintuc' => $tintuc, 'gioithieu' => $gioithieu]);
    }

    public function tintuc($id)
    {
        $tintuc = TinTuc::find($id);
        $tinlienquan = TinTuc::orderBy('id', 'DESC')->take(3)->get();
        return view('pagestrangchinh.tintuc', ['tintuc' => $tintuc, 'tinlienquan' => $tinlienquan]);
    }

    public function getDangnhap()
    {
        return view('page.dangnhap');
    }

    public function postDangnhap(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Bạn chưa nhập Email',
            'password.required' => 'Bạn chưa nhập Password',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('trangchu');
        } else {
            return redirect('dangnhap')->with('thongbao', 'Email hoặc mật khẩu không đúng, vui lòng đăng nhập lại');
        }
    }

    public function getDangXuat()
    {
        Auth::logout();
        return redirect('trangchu');
    }

    public function getNguoiDung()
    {
        $user = Auth::user();
        return view('page.nguoidung', ['nguoidung' => $user]);
    }

    public function postNguoiDung(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ], [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng quá ngắn',
        ]);

        $user = Auth::user();
        $user->name = $request->name;

        if ($request->changePassword == "on") {
            $this->validate($request, [
                'password' => 'required|min:3|max:35',
                'passwordAgain' => 'required|same:password',
            ], [
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu quá ngắn',
                'password.max' => 'Mật khẩu quá dài',
                'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same' => 'Mật khẩu nhập lại không đúng',
            ]);

            $user->password = bcrypt($request->password);
        }

        if ($user instanceof \App\Models\User) {
            $user->save();
        } else {
            dd($user);
        }
        return redirect('nguoidung')->with('thongbao', 'Sửa thành công');
    }

    public function getDangky()
    {
        return view('page.dangky');
    }

    public function postDangky(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:35',
            'passwordAgain' => 'required|same:password',
        ], [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng quá ngắn',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu quá ngắn',
            'password.max' => 'Mật khẩu quá dài',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu nhập lại không đúng',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;
        $user->save();

        return redirect('dangky')->with('thongbao', 'Đăng ký thành công');
    }

    public function getLienhe()
    {
        return view('pagestrangchinh.lienhe');
    }

    public function getGioithieuchung()
    {
        $gioithieu = tbl_thongtingioithieu::all();
        return view('pagestrangchinh.gioithieu', ['gioithieu' => $gioithieu]);
    }

    public function getTuyendung()
    {
        $tuyendung = tbl_tintuyendung::all();
        return view('pagestrangchinh.tintuyendung', ['tuyendung' => $tuyendung]);
    }

    public function getTinTuyendung($id)
    {
        $tuyendung = tbl_tintuyendung::find($id);
        return view('pagestrangchinh.tuyendung', ['tuyendung' => $tuyendung]);
    }
}
