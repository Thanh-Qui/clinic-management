<?php 
    require_once('../mod/UserCls.php');
    require_once('../mod/connect.php');
    require_once('../mod/config.php');
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
    
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">


</head> 

<body>
  <!-- Menu Section Start -->
<div class="menu text-center">
    <div class="wrapper">
      
      <ul>
        <a href="<?php echo SITEURL; ?>admin" class="back-home">
          <li><img class="cus-logo" src="../img/logo.png" alt=""></li>
          <li class="cus-name">HaWaii Restaurent</li>
        </a>
        
        <li><a href="index.php">Home</a></li>
        <li><a href="Listuser.php">Admin</a></li>
        <li><a href="">Loại món</a></li>
        <li><a href="">Món ăn</a></li>
        <li><a href="">Đặt món</a></li>
        <li><a href="">Đăng xuất</a></li>
      </ul>
    </div>
  </div>
  <!-- Menu Section End -->
</body>
</html>