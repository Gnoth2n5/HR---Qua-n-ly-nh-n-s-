<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Phụ lục hợp đồng</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            }
        </style>
</head>
<body>
<p>TPHCM ,ngày {{date('d')}} tháng {{date('m')}} năm 20{{date('y')}}</p>

<p>Tên công ty:{{$thongtinchinh->ten_cong_ty}}.</p>

<p>Số:{{$phuluc->id_phuluc}}</p>
<p style="text-align: center;font-size: 30px"><b>PHỤ LỤC HỢP ĐỒNG LAO ĐỘNG</b></p>


<b style="font-size: 25px">Chúng tôi, một bên là Ông/Bà: {{Auth::user()->tbl_hosonhanvien->ho_ten}}</b>

<p>Chức vụ: {{Auth::user()->tbl_hosonhanvien->tbl_chucvu->ten_chuc_vu}}</p>

<p>Đại diện cho: {{$thongtinchinh->ten_cong_ty}}. Điện thoại:{{$lienheql->sdt_ca_nhan}} </p>

<p>Địa chỉ: {{$lienheql->dia_chi_thuong_tru}}</p>

<b style="font-size: 25px">Và một bên là Ông/Bà: {{$nhanvien->ho_ten}}</b>
<?php
    $namsinh=date('d-m-Y',strtotime($nhanvien->ngay_sinh));
    ?>
<p> Ngày sinh: {{$namsinh}} tại {{$lienhenv->dia_chi_tam_tru}}</p>

<p>Nghề nghiệp: {{$nhanvien->tbl_chucvu->ten_chuc_vu}} {{$nhanvien->tbl_chucvu->tbl_phongban->ten_phong_ban}}</p>

<p>Địa chỉ thường trú: {{$lienhenv->dia_chi_thuong_tru}}</p>
<?php
    $namcapcmnd=date('d-m-Y',strtotime($nhanvien->ngay_cap_cmnd));
    ?>
<p>Số CMND: {{$nhanvien->so_cmnd}} cấp ngày {{$namcapcmnd}} tại {{$nhanvien->noi_cap_cmnd}}</p>
<?php
    $ngayky=date('d-m-Y',strtotime($hopdong->created_at));
?>
<p>Căn cứ Hợp đồng lao động số {{$hopdong->id_hopdong}} ký ngày {{$ngayky}} và nhu cầu sử dụng lao động, hai bên cùng nhau thỏa thuận thay đổi một số nội dung của hợp đồng mà hai bên đã ký kết như sau:</p>

<b style="font-size: 25px">Điều 1. Nội dung thay đổi :</b>


    @if(isset($chitiet->thay_doi_luong))
    <p>Điều chỉnh, bổ sung Điều 3 của hợp đồng lao động số {{$hopdong->id_hopdong}} như sau:</p>
    <p style="margin-left: 5px">-Điều chỉnh, tăng mức lương chính từ: {{number_format($hopdong->muc_luong_chinh)}} đ/tháng lên: {{number_format($chitiet->thay_doi_luong)}} đ/tháng </p>
    @elseif (isset($chitiet->id_chucvu_moi))
    <p>Điều chỉnh, bổ sung Điều 1 của hợp đồng lao động số {{$hopdong->id_hopdong}} như sau:</p>
    <p style="margin-left: 5px">-Điều chỉnh từ bộ phận công tác phòng: {{$nhanvien->tbl_chucvu->tbl_phongban->ten_phong_ban}}. Chức danh chuyên môn (vị trí công tác): {{$nhanvien->tbl_chucvu->ten_chuc_vu}}, đến bộ phận công tác phòng: {{$chitiet->tbl_chucvu->tbl_phongban->ten_phong_ban}}, chức danh chuyên môn( vị trí công tác): {{$chitiet->tbl_chucvu->ten_chuc_vu}}</p>
    <p style="margin-left: 5px">-Điều chỉnh phụ cấp theo chức vụ : {{$nhanvien->tbl_chucvu->ten_chuc_vu}} từ: {{number_format($hopdong->phu_cap)}} vnđ, thành phụ cấp theo chức vụ: {{$chitiet->tbl_chucvu->ten_chuc_vu}} là: {{number_format($chitiet->tbl_phucap->tong_tien_phu_cap)}} vnđ</p>
    @elseif(isset($chitiet->id_loaihopdong_moi))
    <p>Điều chỉnh, bổ sung Điều 1 của hợp đồng lao động số {{$hopdong->id_hopdong}} như sau:</p>
    <p style="margin-left: 5px">-Điều chỉnh loại hợp đồng lao động: {{$hopdong->tbl_loaihopdong->ten_hop_dong}} có thời hạn từ ngày {{$hopdong->ngay_bat_dau_hop_dong}} đến ngày {{$hopdong->ngay_ket_thuc_hop_dong}} ,
         thành loại hợp đồng: {{$chitiet->tbl_loaihopdong->ten_hop_dong}} có thời hạn từ ngày {{$chitiet->ngay_bat_dau}} đến ngày {{$chitiet->ngay_ket_thuc}}</p>
    @endif


    <b style="font-size: 25px">Điều 2. Thời gian thực hiện:</b>

<p>Những điều khoảng được ghi lại tại Điều 1 của Phụ lục hợp đồng này có hiệu lực từ ngày: {{$chitiet->ngay_bat_dau}}</p>

<p>Phụ lục này là bộ phận của hợp đồng lao động số {{$hopdong->id_hopdong}} , được làm thành hai bản có giá trị như nhau, mỗi bên giữ một bản và là cơ sở để giải quyết khi có tranh chấp lao động.</p>

 
<p style="text-align: center;margin-left: 35px">NGƯỜI LAO ĐỘNG <span style="margin-left: 22%">NGƯỜI SỬ DỤNG LAO ĐỘNG</span></p>
<p style="text-align: center;">(Ký, ghi rõ họ tên) <span style="margin-left: 28%;">(Ký, ghi rõ họ tên) </span></p>
</body>
</html>