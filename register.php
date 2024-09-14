<?php
require_once('mod/config.php');
require_once("mod/connect.php");
require_once("mod/adminCls.php");
?>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/login.css">


<div class="row">
    <div class="col-4" style="margin: 50px auto;">
        <h2 class="text-center text-uppercase">ĐĂNG KÝ USERS</h2>

        <form action="" method="post">

            <div class="form-group mg-form">
                <label for="">Họ tên</label>
                <input name="fullname" type="fullname" class="form-control" placeholder="Họ tên">

            </div>

            <div class="form-group mg-form">
                <label for="">Email</label>
                <input name="email" type="email" class="form-control" placeholder="Địa chỉ email">
            </div>

            <div class="form-group mg-form">
                <label for="">Số điện thoại</label>
                <input name="phone" type="number" class="form-control" placeholder="Số điện thoại">
            </div>

            <div class="form-group mg-form">
                <label for="">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
            </div>

            <div class="form-group mg-form mb-15">
                <label for="">Nhập lại Password</label>
                <input name="password_confirm" type="password" class="form-control" placeholder="Nhập lại mật khẩu">
            </div>

            <button type="submit" class="mg-btn mg-form btn btn-primary btn-block">Đăng ký</button>
            <hr>
            <p class="text-center"><a href="?module=auth&action=login">Đăng nhập tài khoản</a></p>
        </form>
    </div>
</div>