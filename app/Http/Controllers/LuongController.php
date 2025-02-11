<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\tbl_bangluong;
use App\Models\tbl_hopdong;
use App\Models\tbl_ykien;
use App\Models\tbl_mientrugiacanh;
use App\Models\tbl_tangca;
use App\Models\tbl_hosonhanvien;
use App\Models\tbl_luuykien;
use App\Models\tbl_phucap;
use App\Models\tbl_phuluc;
use App\Models\tbl_chitietphuluc;
use Illuminate\Support\Facades\Auth;
class LuongController extends Controller
{
    public function getLuong(){
        $luong = tbl_bangluong::where('id_nhanvien',Auth::user()->id_nhanvien)->get(); 
        return view('layout.luong.theoDoiLuong',compact('luong'));
    }
 
    public function updateLuongAll(){
        $nhanvien = tbl_hosonhanvien::all();      
        foreach($nhanvien as $nv){
            $thuecanhan = 11000000; //Thuế của bản thân updated 1.7.2020
            $thuemientru = 4400000; //Thuế miễn trừ gia cảnh 1 người updated 1.7.2020
            $sumtangca = 0; //Tổng giờ làm tăng ca trong tháng
            $sumthuong = 0; //Tổng tiền thưởng
            $sumkyluat = 0; //Tổng tiền kỉ luật
            $luongung = 0;  //Tiền ứng lương
            $thuedong = 0;  //thuế phải đóng
            $soluongmientru = 0; //so luong miễn trừ gia cảnh
            $luongcoban = 0;     //luong co ban khi lap hop dong
            $luonghopdong = tbl_hopdong::where('id_nhanvien',$nv->id_nhanvien)
                    ->orderBy('id_nhanvien','DESC')
                    ->first();     //lương cơ bản
            $phuluc = tbl_phuluc::where('id_hopdong',$luonghopdong->id_hopdong)
                    ->where('id_loaiphuluc',1)
                    ->orderBy('id_loaiphuluc','desc')
                    ->first();
            if(isset($phuluc)){
                $luonghopdong = tbl_chitietphuluc::where('id',$phuluc->id_chitiet)
                    ->orderBy('id','desc')
                    ->first();
                $luongcoban = $luonghopdong->thay_doi_luong;
            }else{
                $luongcoban = $luonghopdong->muc_luong_chinh;
            }
            $phucap = tbl_phucap::where('id_chucvu',$nv->id_chucvu)->first();
            $tangca = tbl_tangca::where('id_nhanvien',$nv->id_nhanvien)             //số giờ tăng ca
                    ->whereMonth('check_in',date('m'))
                    ->where('ghi_nhan',1)
                    ->get();
            if(isset($tangca)){
                foreach($tangca as $tc){                                                //Thời gian tăng ca
                    $sumtangca += $tc->thoi_gian_lam; 
                }
            }
            $luuykien = tbl_luuykien::where('id_nhanvien', $nv->id_nhanvien)        //Xét kỉ luật ứng lương thưởng
                    ->whereMonth('ngay_bat_dau',date('m'))
                    ->where('trang_thai',1)
                    ->where(function($q){
                        $q->where('id_ykien',9)
                        ->orwhere('id_ykien',10)
                        ->orwhere('id_ykien',5);
                    })        
                    ->get();
            foreach($luuykien as $lyk){
            if($lyk->id_ykien == 9)
                $sumthuong += $lyk->gia_tri;
            else if($lyk->id_ykien == 10)
                $sumkyluat += $lyk->gia_tri;
            else
                $luongung = $lyk->gia_tri;
            }
            $mientrugiacanh = tbl_mientrugiacanh::where('id_nhanvien',$nv->id_nhanvien)->first();
            if(isset($mientrugiacanh)){            //trường hợp miễn trừ gia cảnh
                $soluongmientru = $mientrugiacanh->so_luong_mien_tru;
            } 
            $luong = tbl_bangluong::where('id_nhanvien',$nv->id_nhanvien)                           //lương chính
                    ->where('luong_thang', date('Y-m-1'))        
                    ->orderBy('id_bangluong','desc')                                //note lai
                    ->first();
            if($luong == null) continue;
            $luongtong = ( ($luongcoban + $phucap->tong_tien_phu_cap) / 198 ) * $luong->so_gio_lam_viec;  //1 tháng làm 22 ngày mỗi ngày làm 9 tiếng từ 9h - 18h => 1 tháng làm tổng cộng 198 giờ.
            $luongtong = $luongtong + ($sumtangca*(($luongcoban / 198)));                  //cộng thêm tiền tăng ca phải tính thuế
            //echo "luong tong = ".$luongtong,"</br>";
            $thuebh = $luongtong * 10.5 / 100;
            if($luongtong >= (($thuemientru * $soluongmientru) + $thuecanhan))
            {
                $mientru =($thuemientru * $soluongmientru) + $thuecanhan + $thuebh;
                if($phucap->an_trua <= 700000){
                    $mientru +=$phucap->an_trua;
                }
                if($phucap->xang_xe <= 700000){
                    $mientru +=$phucap->xang_xe;
                }
                if($phucap->khac <= 700000){
                    $mientru +=$phucap->khac;
                }
                 //11tr la thue cua ban than
                $thunhapchiuthue = $luongtong - $mientru; 
                //echo "Tien Mien Tru ".$mientru."</br>";
                //echo "Phu cap ".$phucap->tong_tien_phu_cap."thue mien tru+ so luong".$thuemientru.$soluongmientru."thuế cá nhân".$thuecanhan."thue bao hiem".$thuebh."</br>";
                //echo "Thu nhap chiu thue ".$thunhapchiuthue."</br>";
            if($thunhapchiuthue <= 5000000){
                //$bac = 1;
            $thuedong = (0.05 * $thunhapchiuthue);
            }else if($thunhapchiuthue <= 10000000){
                //echo "thuộc bậc 2";
                $thuedong = (0.1 * $thunhapchiuthue) - 250000;
            }else if($thunhapchiuthue <= 18000000){
                //echo "thuộc bậc 3";
                $thuedong = 0.15 * $thunhapchiuthue - 750000;
            }else if($thunhapchiuthue <= 32000000){
                //echo "thuộc bậc 4";
                $thuedong = 0.2 * $thunhapchiuthue - 1650000;
            }else if($thunhapchiuthue <= 52000000){
                //echo "thuộc bậc 5";
                $thuedong = 0.25 * $thunhapchiuthue - 3250000;
            }else if($thunhapchiuthue <= 80000000){
                //echo "thuộc bậc 6";
                $thuedong = 0.3 * $thunhapchiuthue - 5850000;
            }else {
                //echo "thuộc bậc 7";
                $thuedong = 0.35 * $thunhapchiuthue - 9850000;
            }
            }
        //echo "thue dong ".$thuedong."</br>";
        $luong->tong_tien_luong = $luongtong;       //Lương tổng không tính lương thưởng và kỉ luật
        $luong->thue_thu_nhap = $thuedong;          //Thuế phải dđóng
        $luong->thue_bao_hiem = $thuebh;            //Thuế bảo hiểm
        //$luong->save();
        }
        // echo "Lương Tổng của tháng ".date('m')."là : ".number_format($luongtong);
        // echo "Tiền bảo hiểm phải đóng: ".number_format($thuebh);
        // echo "Thuế phải đóng= ".number_format($thuedong);
        // echo "Tiền nhận được: ".number_format($result);
        return redirect('private/luong/danhsach')->with('thongbao','đã cập nhật lương vào ' .date('H:i:s'));
    }
 
    public function chiTietLuong($id_bangluong){
        $luong = tbl_bangluong::find($id_bangluong);
        $nhanvien = tbl_hosonhanvien::find($luong->id_nhanvien);
        $luongcoban = 0;     //luong co ban khi lap hop dong
        $thuong = 0; //Tiền Thưởng
        $kyluatt = 0; //tiền kỷ luật
        $tongtangca = 0; //tổng giờ tăng ca
        $thuebhxh = 0;   //Tiền bảo hiểm xã hội
        $thuebhyt = 0;   //tiền bảo hiểm y tế
        $thuebhtn = 0;   //tiền bảo hiểm thất nghiệp
        $luongnhanduoc = 0; //Lương nhận được
        $thuebhxh = $luong->tong_tien_luong * 0.08;
        $thuebhyt = $luong->tong_tien_luong * 0.015;
        $thuebhtn = $luong->tong_tien_luong * 0.01;
        $phucap = tbl_phucap::where('id_chucvu',$nhanvien->id_chucvu)->first();       //Phụ cấp
        $luonghopdong = tbl_hopdong::where('id_nhanvien',$nhanvien->id_nhanvien)
                ->orderBy('id_nhanvien','DESC')
                ->first();     //lương cơ bản
        $phuluc = tbl_phuluc::where('id_hopdong',$luonghopdong->id_hopdong)
                ->where('id_loaiphuluc',1)
                ->orderBy('id_loaiphuluc','desc')
                ->first();
        if(isset($phuluc)){
            $luonghopdong = tbl_chitietphuluc::where('id',$phuluc->id_chitiet)
                ->orderBy('id','desc')
                ->first();
               $luongcoban = $luonghopdong->thay_doi_luong; 
        }else{
            $luongcoban = $luonghopdong->muc_luong_chinh;
        }
        $khenthuong = tbl_luuykien::whereMonth('updated_at',date('m',strtotime($luong->luong_thang)))
                    ->where('id_nhanvien',$luong->id_nhanvien)
                    ->where('id_ykien',9)        
                    ->get();
        $kyluat = tbl_luuykien::whereMonth('updated_at',date('m',strtotime($luong->luong_thang)))
                    ->where('id_nhanvien',$luong->id_nhanvien)
                    ->where('id_ykien',10)       
                    ->get();
        $ungluong = tbl_luuykien::whereMonth('updated_at',date('m',strtotime($luong->luong_thang)))
                    ->where('id_nhanvien',$luong->id_nhanvien)
                    ->where('id_ykien',5)        
                    ->first();
        if($ungluong==null){
            $ungluong=0;
        }
        else $ungluong=$ungluong->gia_tri;
        foreach($khenthuong as $kt){
                $thuong += $kt->gia_tri;
        }
        foreach($kyluat as $kl){
            $kyluatt += $kl->gia_tri;
        }
        $tangca = tbl_tangca::whereMonth('check_in',date('m',strtotime($luong->luong_thang)))
                    ->where('id_nhanvien',$luong->id_nhanvien)
                    ->where('ghi_nhan',1)
                    ->get(); 
        foreach($tangca as $tc){
            $tongtangca += $tc->thoi_gian_lam;
        }
        $tientangca = ($luongcoban / 198)* $tongtangca * 1.5;    //Tăng ca nhân 1.5
        $luongnhanduoc = $luong->tong_tien_luong + $thuong - $kyluatt - $ungluong - $luong->thue_thu_nhap - $luong->thue_bao_hiem + (($luongcoban / 198)* $tongtangca * 1.5);  
        return view('layout.luong.chitietLuong',compact('luongcoban','ungluong','phucap','luong','thuebhxh','thuebhyt','thuebhtn','thuong','kyluatt','tongtangca','tientangca','luongnhanduoc','nhanvien','khenthuong','kyluat'));
    }
 
}
 
 
