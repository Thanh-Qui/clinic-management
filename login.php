<?php
require_once('mod/config.php');
require_once("mod/connect.php");
require_once("mod/adminCls.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập quản lý</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body class="bg-img">

    <div class="login row">
        <div class="col-4" style="margin: 5% auto; border-radius: 50px;">
            <h2 class="text-center text-form">ĐĂNG NHẬP <br> QUẢN TRỊ</h2>

            <?php
                if (isset($_SESSION['error-login'])) {
                    echo $_SESSION['error-login'];
                    unset($_SESSION['error-login']);
                }

                if (isset($_SESSION['admin-login'])) {
                    header('location:'.SITEURL.'admin/');
                }
            ?>

            <form action="" method="POST">
                <div class="form-group mg-form mb-15">
                    <label for="">Tài khoản</label>
                    <input class="form-control" type="text" name="username" id="" placeholder="Nhập tài khoản">
                </div>

                <div class="form-group mg-form mb-15">
                    <label for="">Mật khẩu</label>
                    <input class="form-control " type="password" name="password" id="" placeholder="Nhập mật khẩu">
                </div>

                <div class="form-group mg-form">
                    <input style="width: 100%;" class="btn btn-success mb-15" type="submit" name="submit" id="" value="Đăng nhập">
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $admin = new admin(); //Tạo lớp đối tượng cho admin
        $res = $admin->login($username, $password);

        if ($res == true) {
            $_SESSION['admin-login'] = $username;
            header("location:" . SITEURL . "admin/");
        } else {
            $_SESSION['error-login'] = "<div class='error'> Đăng nhập không thành công! </div>";
            header('location:' . SITEURL . 'login.php');
        }

    }
    ?>

</body>

</html>