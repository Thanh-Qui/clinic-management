<?php
ob_start();

$checklogin = '../../checklogin.php';
if (file_exists($checklogin)) {
  require_once $checklogin;
} else {
  require_once('../checklogin.php');
}

$boots = "../css/bootstrap.min.css";
if (file_exists($boots)) {
?>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
<?php
} else {
?>
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
<?php
}
?>

<?php
$patientCls = '../mod/patientCls.php';
if (file_exists($patientCls)) {
  require_once $patientCls;
} else {
  require_once("../../mod/patientCls.php");
}

$suppCls = '../mod/suppCls.php';
if (file_exists($suppCls)) {
  require_once $suppCls;
} else {
  require_once("../../mod/suppCls.php");
}

$medicineCls = '../mod/medicineCls.php';
if (file_exists($medicineCls)) {
  require_once $medicineCls;
} else {
  require_once("../../mod/medicineCls.php");
}

$medicineOrderCls = '../mod/medicineOrderCls.php';
if (file_exists($medicineOrderCls)) {
  require_once $medicineOrderCls;
} else {
  require_once("../../mod/medicineOrderCls.php");
}

$staffCls = '../mod/staffCls.php';
if (file_exists($staffCls)) {
  require_once $staffCls;
} else {
  require_once("../../mod/staffCls.php");
}

$appointmentCls = '../mod/appointmentCls.php';
if (file_exists($appointmentCls)) {
  require_once $appointmentCls;
} else {
  require_once("../../mod/appointmentCls.php");
}

$prescriptionCls = '../mod/prescriptionCls.php';
if (file_exists($prescriptionCls)) {
  require_once $prescriptionCls;
} else {
  require_once("../../mod/prescriptionCls.php");
}

$conn = "../mod/connect.php";
if (file_exists($conn)) {
  require_once $conn;
} else {
  require_once("../../mod/connect.php");
}

$config = "../mod/config.php";
if (file_exists($config)) {
  require_once $config;
} else {
  require_once("../../mod/config.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/clinic-management/image/pharmacity.png" type="image/x-icon">
  <title>Management Page</title>
  <script type="text/javascript" src="/clinic-management/JS/menu.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <?php
  $menu = "../css/menu.css";
  if (file_exists($menu)) {
  ?>
    <link rel="stylesheet" href="../css/menu.css">
  <?php
  } else {
  ?>
    <link rel="stylesheet" href="../../css/menu.css">
  <?php
  }
  ?>

  <?php
  $style = "../css/style.css";
  if (file_exists($style)) {
  ?>
    <link rel="stylesheet" href="../css/style.css">
  <?php
  } else {
  ?>
    <link rel="stylesheet" href="../../css/style.css">
  <?php
  }
  ?>

  <?php
  $js = "../JS/IsInfo.js";
  if (file_exists($js)) {
  ?>
    <script src="../JS/IsInfo.js"></script>
  <?php
  } else {
  ?>
    <script src="../../JS/IsInfo.js"></script>
  <?php
  }
  ?>

  <?php
  $js = "../JS/searchAjax.js";
  if (file_exists($js)) {
  ?>
    <script src="../JS/searchAjax.js"></script>
  <?php
  } else {
  ?>
    <script src="../../JS/searchAjax.js"></script>
  <?php
  }
  ?>

</head>

<body>
  <div class="sidenav">
    <div class="card">
      <div class="card-body">

        <?php

        $patients = new patients();
        $supp = new suppCls();
        $medicine = new medicine();
        $medicineOrders = new medicineOrder();
        $staff = new doctor();
        $appointment = new appointment();
        $prescription = new prescription();
        ?>

        <div class="logo">
          <img src="/clinic-management/image/logoMedicine.png" class="profile" />
          <h2 class="logo-caption"><span class="tweak">Q</span>uản Lý <br> <span class="tweak"> P</span>hòng Khám</h2>
        </div> <!-- logo class -->

        <!-- dashboard start -->
        <div class="main-menu-item">
          <a href="<?php echo SITEURL; ?>admin/index.php"><i class="fa-solid fa-gauge"></i><span> Dashboard</span></a>
        </div>
        <!-- dashboard end -->

        <!-- quản lý lịch khám -->
        <div id="appointment" class="main-menu-item" onclick="showhide(this.id);">
          <a href="#">
            <i class="fa-regular fa-calendar-days"></i><span>Lịch khám bệnh</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class="treeview"><a href="<?php echo SITEURL; ?>admin/appointment/add-appointment.php">Thêm lịch khám</a></li>
            <li class="treeview"><a href="<?php echo SITEURL; ?>admin/appointment/manage-appointment.php">Quản lý các lịch khám</a></li>
          </ul>
        </div>
        <!-- quản lý lịch khám -->

        <!-- quản lý bác sĩ -->
        <div id="staff" class="main-menu-item" onclick="showhide(this.id);">
          <a href="#">
            <i class="fa-solid fa-user-doctor"></i><span>Bác sĩ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class="treeview"><a href="<?php echo SITEURL; ?>admin/staff/add-doctor.php">Thêm bác sĩ</a></li>
            <li class="treeview"><a href="<?php echo SITEURL; ?>admin/staff/manage-doctors.php">Quản lý bác sĩ </a></li>
          </ul>
        </div>
        <!-- quản lý bác sĩ -->

        <!-- quản lý BN -->
        <div id="first" class="main-menu-item" onclick="showhide(this.id);">
          <a href="#">
            <i class="fa-solid fa-hospital-user"></i><span>Bệnh nhân</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class="treeview"><a href="<?php echo SITEURL; ?>admin/user/addUser.php">Thêm bệnh nhân</a></li>
            <li class="treeview"><a href="<?php echo SITEURL; ?>admin/user/manage-patients.php">Quản lý bệnh nhân </a></li>
          </ul>
        </div>
        <!-- quản lý BN -->



        <!-- quản lý thuốc -->
        <div id="second" class="main-menu-item" onclick="showhide(this.id);">
          <a href="#">
            <i class="fa-solid fa-pills"></i><span>Thuốc</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class="treeview"><a href="<?php echo SITEURL; ?>admin/medicine/add-medicine.php">Thêm loại thuốc</a></li>
            <li class="treeview"><a href="<?php echo SITEURL; ?>admin/medicine/manage-medicine.php">Quản lý loại thuốc </a></li>
          </ul>
        </div>
        <!-- quản lý thuốc -->

        <!-- quản lý đơn đặt -->
        <div id="third" class="main-menu-item" onclick="showhide(this.id);">
          <a href="#">
            <i class="fa-solid fa-list"></i><span>Nhập hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class="treeview"><a href="<?php echo SITEURL; ?>admin/medicine_order/add-medicineOrder.php">Thêm đơn đặt</a></li>
            <li class="treeview"><a href="<?php echo SITEURL; ?>admin/medicine_order/manage-order.php">Quản lý đơn đặt </a></li>
          </ul>
        </div>
        <!-- quản lý đơn đặt -->


        <!-- Nhập thuốc -->
        <div id="fourt" class="main-menu-item" onclick="showhide(this.id);">
          <a href="#">
            <i class="fa-solid fa-truck-field"></i><span>Nhà cung cấp</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class="treeview"><a href="<?php echo SITEURL; ?>admin/suppliers/add-supplier.php">Thêm nhà cung cấp</a></li>
            <li class="treeview"><a href="<?php echo SITEURL; ?>admin/suppliers/manage-suppliers.php">Quản lý nhà cung cấp </a></li>
          </ul>
        </div>
        <!-- Nhập thuốc -->

        <!-- Nhập thuốc -->
        <div id="report" class="main-menu-item" onclick="showhide(this.id);">
          <a href="#">
            <i class="fa-solid fa-chart-line"></i><span>Báo cáo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class="treeview"><a href="<?php echo SITEURL; ?>admin/report/revenue.php">Báo cáo doanh thu</a></li>
            <li class="treeview"><a href="<?php echo SITEURL; ?>admin/report/aggregateExpenditure.php">Tổng chi tiêu</a></li>
          </ul>
        </div>  
        <!-- Nhập thuốc -->

        <!-- Đăng xuất -->
        <div class="main-menu-item">
          <a href="<?php echo SITEURL; ?>logout.php"><i class="fa-solid fa-gauge"></i><span> Đăng xuất</span></a>
        </div>

      </div>
    </div>
  </div>

</body>

</html>