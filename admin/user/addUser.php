<?php
include('../menu.php');
ob_start();
?>

<div class="main-content">
  <div class="wrapper">

    <h3 class="pt-2 pl-20"><i class="fa-solid fa-user"></i> THÊM BỆNH NHÂN</h3>
    <hr style="border-top: 2px solid #004085;">
    <br><br><br>

    <label for="" id="noteAddPatient" style="color: red;"></label>
    <form method="POST" id="formAddPatient" onsubmit="return isAddPatient();">
      <table class="tbl-30">
        <label id="note" style="color: red;"></label><br>

        <tr>
          <td>Họ tên BN:</td>
          <td>
            <input class="form-control" type="text" name="name" id="" placeholder="Nhập đầy đủ họ tên">
          </td>
        </tr>

        <tr>
          <td>Ngày sinh:</td>
          <td>
            <input class="form-control" type="date" name="dob" id="">
          </td>
        </tr>

        <tr>
          <td>Emai KH:</td>
          <td>
            <input class="form-control" type="email" name="email" id="" placeholder="Nhập email sử dụng">
          </td>
        </tr>

        <tr>
          <td>Địa chỉ:</td>
          <td>
            <input class="form-control" type="text" name="address" id="" placeholder="Nhập địa chỉ cư trú">
          </td>
        </tr>

        <tr>
          <td>Số điện thoại:</td>
          <td>
            <input class="form-control" type="text" name="phone_number" id="" placeholder="Nhập số điện thoại liên lạc">
          </td>
        </tr>

        <tr>
          <td>Tiền sử bệnh án:</td>
          <td>
            <textarea class="form-control" name="medical_history" id="" placeholder="Nhập tiền sử bệnh án (nếu có)" cols="5"></textarea>
          </td>
        </tr>

        <tr>
          <td>Giới tính:</td>
          <td>
            <input type="radio" class="btn-check" name="gender" id="success-outlined" autocomplete="off" checked value="Nam">
            <label class="btn btn-outline-success" for="success-outlined">Nam</label>

            <input type="radio" class="btn-check" name="gender" id="danger-outlined" autocomplete="off" value="Nữ">
            <label class="btn btn-outline-danger" for="danger-outlined">Nữ</label>
          </td>
        </tr>

      </table>


      <div class="row mb-3">
        <div class="col-cus">
          <input class="btn btn-success" type="submit" name="submit" id="" value="Lưu bệnh nhân">
        </div>
      </div>

    </form>

    <?php

    if (isset($_POST['submit'])) {

      $name = $_POST['name'];
      $dob = $_POST['dob'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $phone_number = $_POST['phone_number'];
      $medical_history = $_POST['medical_history'];
      $gender = $_POST['gender'];

      // $patients = new patients();
      $res = $patients->InsetPateints($name, $dob, $gender, $address, $phone_number, $email, $medical_history);
      
      if ($res == true) {
        // echo "Thành công";
        $_SESSION['add-patients'] = "<div class='success'> Thêm bệnh nhân thành công </div>";
        header('location:'.SITEURL.'admin/user/manage-patients.php');
      }else {
        // echo "Không thành công";
        $_SESSION['add-patients'] = "<div class='error'> Thêm bệnh nhân không thành công </div>";
        header('location:'.SITEURL.'admin/user/manage-patients.php');
      }
      
    }
    ?>

<b><hr style="border-top: 2px solid #d35400;"></b>
  </div>
</div>
<?php 
ob_end_flush();
 ?>