<?php
include('../menu.php');
?>


<div class="main-content" id="main-content">

  <div class="wrapper">

    <h3 class="pt-2 pl-20"><i class="fa-solid fa-user"></i> QUẢN LÝ THÔNG TIN BÁC SĨ</h3>
    <br>
    <hr style="border-top: 2px solid #d35400;">

    <?php

    if (isset($_SESSION['add-doctor'])) {
        echo $_SESSION['add-doctor'];
        unset($_SESSION['add-doctor']);
    }

    if (isset($_SESSION['delete-doctor'])) {
      echo $_SESSION['delete-doctor'];
      unset($_SESSION['delete-doctor']);
    }

    if (isset($_SESSION['update-doctor'])) {
      echo $_SESSION['update-doctor'];
      unset($_SESSION['update-doctor']);
    }

    ?>

    <form action="" method="POST" class="row mb-3 tbl-30">
      <label for="search-doctor" class="col-sm-2 col-form-label">Search:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="search-doctor" name="search-doctor" placeholder="Tìm kiếm bác sĩ" onkeyup="searchDoctor()">
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
          <th scope="col">Chức vụ</th>
          <th scope="col">Lương cơ bản</th>
          <th scope="col">Active</th>
        </tr>
      </thead>

      <tbody id="doctor-list">
        <?php
            $res = $staff->GetAllStaff();
            $count = count($res);
            $sn = 1;
            if ($count > 0) {
                foreach ($res as $row) {
                    $id_staff = $row->id_staff;
                    ?>
                        <tr>
                            <td><?= $sn++; ?></td>
                            <td><?= $row->name; ?></td>
                            <td><?= $row->dob; ?></td>
                            <td><?= $row->gender; ?></td>
                            <td><?= $row->address; ?></td>
                            <td><?= $row->phone_number; ?></td>
                            <td><?= $row->email; ?></td>
                            <td><?= $row->position; ?></td>
                            <td><?= currency_format($row->salary,"VND"); ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/staff/update-doctor.php?id=<?= $id_staff; ?>"><i class="fa-solid fa-pen" style="margin-right: 15px;"></i></a>
                                <a href="<?php echo SITEURL; ?>admin/staff/delete-doctor.php?id=<?= $id_staff; ?>" onclick="return isDelete();"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>

                    <?php
                }
                
            }else {
                echo "<div class='error'> Không tìm thấy! </div>";
            }
        ?>




      </tbody>
    </table>
    <b>
      <hr style="border-top: 2px solid #d35400;">
    </b>

  </div>
</div>
