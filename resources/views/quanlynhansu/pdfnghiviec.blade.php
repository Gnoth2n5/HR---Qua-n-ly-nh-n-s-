<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Quyết định cho thôi việc</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            }
        </style>
</head>
<body>

    <p style="text-align: center;"> <b style="font-size: 25px;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></p>
    <p style="text-align: center;"><u >Độc lập - Tự do - Hạnh phúc </u></p>
    <br>
    <br>
<p style="text-align: center;font-size: 30px"><b>QUYẾT ĐỊNH</b></p>


<p style="text-align: center;">V/v: Cho thôi việc/nghỉ việc</p>
<p style="text-align: center;font-size: 30px; text-transform:uppercase"><b>TỔNG GIÁM ĐỐC CÔNG TY : {{$thongtinchinh->ten_cong_ty}}</b></p>
<br>
<i>-  Căn cứ Bộ Luật Lao động;</i>
<br>
<i>-   Hợp đồng lao động đã ký ngày: {{$hopdong->ngay_ket_thuc_hop_dong}}</i>
<br>
<i>-    Xét Đơn xin nghỉ việc của Ông (Bà): {{$nhanvien->ho_ten}}</i>
<br>
<br>


<p style="text-align: center;font-size: 30px; text-transform:uppercase"><b>QUYẾT ĐỊNH</b></p>
<br>
<br>
<p><b style="">Điều 1:</b> Nay cho Ông (Bà): {{$nhanvien->ho_ten}}, giữ chức vụ: {{$nhanvien->tbl_chucvu->ten_chuc_vu}} được nghỉ việc kể từ ngày {{$quyetdinh->ngay_nghi_viec}}.</p>


<p><b style="">Điều 2: </b>Ông (Bà) {{$nhanvien->ho_ten}} và các Ông (Bà) phó giám đốc hành chính, và các bộ phận có liên quan chịu trách nhiệm thi hành Quyết định này. </p>


{{-- <p style="font-size: 25px; text-transform:uppercase"><b>CÔNG TY: {{$thongtinchinh->ten_cong_ty}}</b></p> --}}
<p style="font-size: 25px; text-transform:uppercase"><b>GIÁM ĐỐC: {{$thongtinchinh->ten_cong_ty}}</b><b style="margin-left:30% ">NGƯỜI XIN NGHỈ</b></p>
<i style="margin-left: 120px">(Ký, đóng dấu)</i><i style="margin-left: 50%">(Ký tên)</i>
</body>
</html>

