<?php
 session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/GioHang.php';

// Require toàn bộ file Models
require_once './models/Student.php';
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';



// Require toàn bộ file Views

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {

    '/' => (new HomeController())->home(),
    // Trang chủ
    'chi-tiet-san-pham'=> (new HomeController())->chitietSanPham(),
    'lien-he' =>(new HomeController())->lienHe(),
   'gioi-thieu' =>(new HomeController())->gioiThieu(),
    'search' => (new HomeController())->timKiem(),


    // Giỏ hàng ,đơn hàng
    'them-gio-hang' => (new GioHangDonHangController())->addGioHang(),
    'gio-hang' => (new GioHangDonHangController())->gioHang(),
    'thanh-toan' => (new GioHangDonHangController())->thanhToan(),
    'xu-ly-thanh-toan' => (new GioHangDonHangController())->postThanhToan(),
    'xoa-san-pham-gio-hang' => (new GioHangDonHangController())->xoaSp(),
    'da-dat-hang' => (new HomeController())->daDatHang(),

    //authe
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postlogin(),
    'logout' => (new HomeController())->logout(),
    'quen-mat-khau' => (new HomeController())->quenMatKhau(),
    'lay-mat-khau' => (new HomeController())->layMatKhau(),


    'form-dang-ky' => (new HomeController())->formDangKy(),
    'dang-ky' => (new HomeController())->dangKy(),
    'tai-khoan' => (new HomeController())->taiKhoan(),
    'sua-mat-khau-ca-nhan' => (new HomeController())->postEditMatKhauCaNhan(),

    //sanpham
    "san-pham" => (new HomeController())->danhSachSanPham(),
    'san-pham-theo-danh-muc' =>(new HomeController())->sanPhamDanhMuc(),
};
