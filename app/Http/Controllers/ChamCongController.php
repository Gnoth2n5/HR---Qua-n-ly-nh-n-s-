<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\tbl_chamcong;
use App\Models\tbl_bangluong;
use App\Models\tbl_tangca;
use App\Models\tbl_luuykien;
use App\Models\tbl_hosonhanvien;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Eloquents\ChamCongRepository;
use App\Repositories\Eloquents\TangCaRepository;

class ChamCongController extends Controller
{
    protected $chamCongRepository;
    protected $tangCaRepository;

    public function __construct(ChamCongRepository $chamCongRepository, TangCaRepository $tangCaRepository)
    {
        $this->chamCongRepository = $chamCongRepository;
        $this->tangCaRepository = $tangCaRepository;
    }


    public function getChamCong(){
        // $cac=tbl_bangluong::where('id_nhanvien',Auth::user()->id_nhanvien)
        //         ->where('luong_thang',date('Y-m-1'))->exists(); var_dump($cac);exit;
        $idNhanVien = Auth::user()->id_nhanvien;
        $thang = date('m');

        $bangluong = $this->chamCongRepository->getBangLuongThang($idNhanVien, $thang);

        if(!$bangluong){
            $attributes = [
                'luong_thang' => date('Y-m-1'),
                'id_nhanvien' => $idNhanVien
            ];
            $this->chamCongRepository->createBangLuong($attributes);
        }

        $lichsu = $this->chamCongRepository->getChamCongTheoBangLuong($bangluong->id_bangluong);


        $chamcong = $this->chamCongRepository->getChamCongHomNay($bangluong->id_bangluong);

        $tangca = $this->tangCaRepository->getTangCaHomNay($idNhanVien);

        $ngaynghi = getNgayNghi();
        
        return view('layout.chamcong.frmchamcong', compact('lichsu','chamcong','bangluong','ngaynghi','tangca'));
    }
 
//     public function checkin(){
//         // $checkin = new tbl_chamcong;
//         // $checkin->ngay_cham_cong = date("Y-m-d");
//         // $checkin->check_in = date("H:i");
//         // $checkin->id_nhanvien = Auth::user()->id_nhanvien;
//         // $checkin->save();
//         // return redirect('private/chamcong')->with('thongbao','Đã checkin');
 
//         // $bangluong = tbl_bangluong::where('id_nhanvien',Auth::User()->id_nhanvien)
//         //         ->whereMonth('luong_thang', date('m'))
//         //         ->first();
//         // $checkin = new tbl_chamcong;
//         // $checkin->ngay_cham_cong = date("Y-m-d");
//         // $checkin->check_in = date("H:i");
//         // $checkin->id_bangluong = $bangluong->id_bangluong;
//         // $checkin->save();
//         // return redirect('private/chamcong')->with('thongbao','Đã checkin');
//         $mac = getMACAddr();
//         if($mac != Auth::user()->mac_ip){
//                 return redirect('private/chamcong')->with('thongbaoloi','Bạn Đang Đăng Nhập Vào Máy Khác Không Thuộc Hệ Thống Nên Không Được Checkin');
//         }else{
//         $bangluong = tbl_bangluong::where('id_nhanvien',Auth::User()->id_nhanvien)
//                 ->whereMonth('luong_thang', date('m'))
//                 ->first();
//         $tangca = tbl_tangca::where('id_nhanvien',Auth::User()->id_nhanvien)
//                 ->where('check_in',date('Y-m-d'))
//                 ->first();
//         $checkin = new tbl_chamcong;
//         if(isset($tangca)){
//                 $checkin->id_tangca = $tangca->id_tangca;
//         }
//         $checkin->check_in = date('Y-m-d H:i:s');
//         $checkin->id_bangluong = $bangluong->id_bangluong;
//         $checkin->save();
//         return redirect('private/chamcong')->with('thongbao','Đã checkin');
//         }
//     }
 
//     public function checkout(){
//         $bangluong = tbl_bangluong::where('id_nhanvien',Auth::User()->id_nhanvien)
//                 ->whereMonth('luong_thang', date('m'))
//                 ->first();
//         $checkout = tbl_chamcong::where('id_bangluong',$bangluong->id_bangluong)
//                 ->where('check_in','like', date('Y-m-d').'%')
//                 ->first();
//         //$nhanvien = tbl_hosonhanvien::where('id_nhanvien',Auth::user()->id_nhanvien)->first();
//         $checkout->thoi_gian_lam = (strtotime(date('Y-m-d H:i:s')) - strtotime($checkout->check_in)) / 3600;
//         //$hour = (strtotime($checkout->check_out) - strtotime($checkout->check_in) ) / 3600;
//         $min = ($checkout->thoi_gian_lam-intval($checkout->thoi_gian_lam))*60;
//         $checkout->tbl_bangluong->so_gio_lam_viec += $checkout->thoi_gian_lam;
//         $checkout->save();
//         $checkout->tbl_bangluong->save();
//         return redirect('private/chamcong')->with('thongbao','Đã checkout. hôm nay bạn đã làm được '.intval($checkout->thoi_gian_lam).' tiếng '.intval($min)." phút");
//     }
 
    public function getTangCa(){

        if(!$this->tangCaRepository->getTangCaHomNay(Auth::user()->id_nhanvien))
                return redirect('private/chamcong')->with('thongbao','Không Có Tăng Ca Hôm Nay');

        $tangca = tbl_tangca::where('id_nhanvien',Auth::user()->id_nhanvien)
                ->orderBy('id_tangca','DESC')
                ->first();

        $lichsu = $this->tangCaRepository->getAllByIdNhanVien(Auth::user()->id_nhanvien);

        return view('layout.chamcong.frmtangca',compact('tangca','lichsu'));
    }
    
    public function checkinTangCa()
    {
        $tangca = $this->tangCaRepository->getByNhanVienAndDate(Auth::user()->id_nhanvien, date('Y-m-d'));
        $this->tangCaRepository->updateCheckIn($tangca, date('Y-m-d H:i:s'));

        return redirect('private/chamcong/tangca')->with('thongbao', 'Đã checkin');
    }

    public function checkoutTangCa()
    {
        $tangca = $this->tangCaRepository->getByNhanVienAndDate(Auth::user()->id_nhanvien, date('Y-m-d'));
        $this->tangCaRepository->updateCheckoutTime($tangca, date('Y-m-d H:i:s'));

        $thoiGianLam = $tangca->thoi_gian_lam;
        $min = ($thoiGianLam - intval($thoiGianLam)) * 60;

        return redirect('private/chamcong/tangca')->with(
            'thongbao',
            'Đã checkout. Hôm nay bạn đã tăng ca được ' . intval($thoiGianLam) . ' tiếng ' . intval($min) . ' phút'
        );
    }

    public function getChiTietTangCa($id_tangca)
    {
        $tangca = $this->tangCaRepository->getById($id_tangca);
        return view('layout.chamcong.chitietTangCa', compact('tangca'));
    }
}
 
