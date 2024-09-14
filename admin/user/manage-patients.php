<?php
// include('header.php');
// include('connect.php');
include('../menu.php');
?>


<div class="main-content" id="main-content">

  <div class="wrapper">

    <h3 class="pt-2 pl-20"><i class="fa-solid fa-user"></i> QUẢN LÝ NGƯỜI DÙNG</h3>
    <br>
    <hr style="border-top: 2px solid #d35400;">

    <?php

    if (isset($_SESSION['add-patients'])) {
      echo $_SESSION['add-patients'];
      unset($_SESSION['add-patients']);
    }

    if (isset($_SESSION['update-patient'])) {
      echo $_SESSION['update-patient'];
      unset($_SESSION['update-patient']);
    }

    if (isset($_SESSION['delete-patient'])) {
      echo $_SESSION['delete-patient'];
      unset($_SESSION['delete-patient']);
    }

    ?>

    <form action="" method="POST" class="row mb-3 tbl-30">
      <label for="search-patient" class="col-sm-2 col-form-label">Search:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="search-patient" name="search-patient" placeholder="Tìm kiếm thuốc" onkeyup="searchPatient()">
      </div>
    </form>

    <hr>

    <table class="table table-bordered table-list">
      <thead>
        <tr>
          <th scope="col">SL</th>
          <th scope="col">Họ tên</th>
          <th scope="col">Ngày sinh</th>
          <th scope="col">Giới tính</th>
          <th scope="col">Địa chỉ</th>
          <th scope="col">Số điện thoại</th>
          <th sorted="col">Email</th>
          <th scope="col">Tiền sử bệnh án</th>
          <th scope="col">Active</th>
        </tr>
      </thead>

      <tbody id="patient-list">
        <?php
        $res = $patients->GetAll();
        $count = count($res);
        $sn = 1;
        if ($count > 0) {
          foreach ($res as $row) {
        ?>

            <tr>
              <td><?php echo $sn++; ?></td>
              <td><?php echo $row->name; ?></td>
              <td><?php echo $row->dob; ?></td>
              <td><?php echo $row->gender; ?></td>
              <td><?php echo $row->address; ?></td>
              <td><?php echo $row->phone_number; ?></td>
              <td><?php echo $row->email; ?></td>
              <td><?php echo $row->medical_history; ?></td>
              <td>
                <a href="<?php echo SITEURL; ?>admin/user/update.php?id=<?php echo $row->id_patient ?>"><i class="fa-solid fa-pen" style="margin-right: 15px;"></i></a>
                <a href="<?php echo SITEURL; ?>admin/user/delete.php?id=<?php echo $row->id_patient ?>" onclick="return isDelete();"><i class="fa-solid fa-trash"></i></a>


              </td>
            </tr>

        <?php
          }
        } else {
          echo "<div class='eror'> Chưa có thông tin! </div>";
        }

        ?>

      </tbody>
    </table>
    <b>
      <hr style="border-top: 2px solid #d35400;">
    </b>

  </div>
</div>
