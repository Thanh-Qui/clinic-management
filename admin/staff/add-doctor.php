<?php require_once("../menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
    <h3 class="pt-2 pl-20"><i class="fa-solid fa-user"></i> THÊM THÔNG TIN BÁC SĨ</h3>
    <hr><br><br>

        <label for="" id="noteFormAddDoctor" style="color: red;"></label>
        <form class="row g-3" method="POST" id="formAddDoctor" onsubmit="return isAddDoctor();">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Họ tên</label>
                <input type="text" class="form-control" name="name" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="address" id="inputPassword4">
            </div>

            <div class="col-6">
                <label for="inputAddress" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" name="dob" id="inputAddress">
            </div>

            <div class="col-6">
                <label for="inputAddress" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="inputAddress" placeholder="Nhập email">
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" name="phone-number" id="inputCity">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Giới tính</label>
                <select id="inputState" class="form-select" name="gender">
                    <option value="" selected>chọn giới tính</option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>

            
            <div class="col-md-4">
                <label for="inputState" class="form-label">Chức vụ</label>
                <select id="inputState" class="form-select" name="position">
                    <option value="" selected>chọn chức vụ</option>
                    <option value="bác sĩ đa khoa">bác sĩ đa khoa</option>
                    <option value="bác sĩ chuyên khoa">bác sĩ chuyên khoa</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputZip" class="form-label">Lương cơ bản</label>
                <input type="number" class="form-control" name="salary" id="inputZip" min="0">
            </div>

            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary">Lưu thông tin</button>
            </div>
        </form>

        <?php
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $phone_number = $_POST['phone-number'];
                $dob = $_POST['dob'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $position = $_POST['position'];
                $salary = $_POST['salary'];

                $res = $staff->insertDoctor($name, $dob, $gender, $address, $phone_number, $email, $position, $salary);
                if ($res == true) {
                    $_SESSION['add-doctor'] = "<div class='success'> Thêm thông tin thành công! </div>";
                    header('location:'.SITEURL.'admin/staff/manage-doctors.php');
                }else {
                    $_SESSION['add-doctor'] = "<div class='error'> Thêm thông tin thành công! </div>";
                    header('location:'.SITEURL.'admin/staff/manage-doctors.php');
                }
            }
        ?>

        <hr>
    </div>
</div>