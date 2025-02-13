<?php

namespace App\Http\Controllers;

use App\Models\tbl_hosonhanvien;
use App\Models\tbl_baohiem;
use App\Http\Requests\BHYTRequest;
use App\Repositories\Eloquents\BHYTRepository;
use App\Repositories\Eloquents\HoSoNhanVienRepository;

class BaoHiemController extends Controller
{

    public function getThemBH($id_nhanvien)
    {
        $nhanvien = tbl_hosonhanvien::findOrFail($id_nhanvien);
        return view('layout.baohiem.themBH', compact('nhanvien'));
    }

    public function postThemBH(BHYTRequest $request)
    {
        $request->validated();

        $nhanvien = tbl_hosonhanvien::findOrFail($request->id_nhanvien);
        $baohiem = tbl_baohiem::create([
            'so_bhyt' => $request->so_bhyt,
            'ngay_cap_bhyt' => $request->ngay_cap_bhyt,
            'noi_cap_bhyt' => $request->noi_cap_bhyt,
            'so_bhxh' => $request->so_bhxh,
            'ngay_cap_bhxh' => $request->ngay_cap_bhxh,
            'noi_cap_bhxh' => $request->noi_cap_bhxh,
        ]);

        $nhanvien->update(['id_baohiem' => $baohiem->id]);

        return redirect()->route('baohiem.danhsach')->with('thongbao', 'Thêm Thành Công');
    }

    public function getSuaBH($id_baohiem)
    {
        $nhanvien = tbl_hosonhanvien::where('id_baohiem', $id_baohiem)->firstOrFail();
        return view('layout.baohiem.suaBH', compact('nhanvien'));
    }

    public function postSuaBH(BHYTRequest $request, $id_baohiem)
    {
        $request->validated();

        $baohiem = tbl_baohiem::findOrFail($id_baohiem);
        $baohiem->update([
            'so_bhyt' => $request->so_bhyt,
            'ngay_cap_bhyt' => $request->ngay_cap_bhyt,
            'so_bhxh' => $request->so_bhxh,
            'ngay_cap_bhxh' => $request->ngay_cap_bhxh,
        ]);

        return redirect()->route('baohiem.danhsach')->with('thongbao', 'Cập Nhật Thành Công');
    }

    public function postXoaBH($id_baohiem)
    {
        $baohiem = tbl_baohiem::findOrFail($id_baohiem);
        $nhanvien = tbl_hosonhanvien::where('id_baohiem', $id_baohiem)->firstOrFail();
        $nhanvien->update(['id_baohiem' => null]);
        $baohiem->delete();

        return redirect()->route('baohiem.danhsach')->with('thongbao', 'Xóa Thành Công');
    }

    public function getChiTietBH($id_baohiem)
    {
        $nhanvien = tbl_hosonhanvien::where('id_baohiem', $id_baohiem)->firstOrFail();
        return view('layout.baohiem.chitietBH', compact('nhanvien'));
    }
}
