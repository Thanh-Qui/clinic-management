<?php require_once("../menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
    <h3 class="pt-2 pl-20"><i class="fa-solid fa-user"></i> THÊM THÔNG TIN BÁC SĨ</h3>
    <hr><br><br>

        <label for="" id="noteFormUpdateDoctor" style="color: red;"></label>
        <form class="row g-3" method="POST" id="formUpdateDoctor" onsubmit="return isUpdateDoctor();">

        <?php 
        if (isset($_GET['id'])) {
            $id_staff = $_GET['id'];

            $res = $staff->GetStaffById($id_staff);
            $id_staff = $res->id_staff;
        }
        ?>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Họ tên</label>
                <input type="text" class="form-control" name="name" id="inputEmail4" value="<?= $res->name; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="address" id="inputPassword4" value="<?= $res->address; ?>">
            </div>

            <div class="col-6">
                <label for="inputAddress" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" name="dob" id="inputAddress" value="<?= $res->dob; ?>">
            </div>

            <div class="col-6">
                <label for="inputAddress" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="inputAddress" placeholder="Nhập email" value="<?= $res->email; ?>">
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" name="phone-number" id="inputCity" value="<?= $res->phone_number; ?>">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Giới tính</label>
                <select id="inputState" class="form-select" name="gender">
                    <option selected>chọn giới tính</option>
                    <option <?php if($res->gender == "Nam") {echo 'selected';} ?> value="Nam">Nam</option>
                    <option <?php if($res->gender == "Nữ") {echo 'selected';} ?> value="Nữ">Nữ</option>
                </select>
            </div>

            
            <div class="col-md-4">
                <label for="inputState" class="form-label">Chức vụ</label>
                <select id="inputState" class="form-select" name="position">
                    <option selected>chọn chức vụ</option>
                    <option <?php if($res->position == "bác sĩ đa khoa") {echo 'selected';} ?> value="bác sĩ đa khoa">bác sĩ đa khoa</option>
                    <option <?php if($res->position == "bác sĩ chuyên khoa") {echo 'selected';} ?> value="bác sĩ chuyên khoa">bác sĩ chuyên khoa</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputZip" class="form-label">Lương cơ bản</label>
                <input type="number" class="form-control" name="salary" id="inputZip" value="<?= $res->salary; ?>">
            </div>

            <div class="col-12">
                <input type="hidden" name="id_staff" id="" value="<?= $id_staff; ?>">
                <button type="submit" name="submit" class="btn btn-primary">Lưu thông tin</button>
            </div>
        </form>

        <?php
            if (isset($_POST['submit'])) {
                $id_staff = $_POST['id_staff'];
                $name = $_POST['name'];
                $address = $_POST['address'];
                $phone_number = $_POST['phone-number'];
                $dob = $_POST['dob'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $position = $_POST['position'];
                $salary = $_POST['salary'];

                $res1 = $staff->updateDoctor($name, $dob, $gender, $address, $phone_number, $email, $position, $salary, $id_staff);
                if ($res1 == true) {
                    $_SESSION['update-doctor'] = "<div class='success'> Cập nhật thông tin thành công! </div>";
                    header('location:'.SITEURL.'admin/staff/manage-doctors.php');
                }else {
                    $_SESSION['update-doctor'] = "<div class='error'> Cập nhật thông tin thành công! </div>";
                    header('location:'.SITEURL.'admin/staff/manage-doctors.php');
                }
            }
        ?>

        <hr>
    </div>
</div>