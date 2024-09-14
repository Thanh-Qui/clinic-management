<?php require_once("../menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h3>THÊM LỊCH KHÁM</h3>
        <hr style="border: 1px solid navy; opacity: 1;">
        <br><br>

        <label for="" id="noteAppointment" style="color: red;"></label>
        <form class="row g-3" method="POST" id="formAppointment" onsubmit="return isAddAppointment();">

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Bệnh nhân</label>
                <select name="patient" class="form-select" id="">
                    <option value="" selected>Chọn bệnh nhân</option>
                    <?php
                    $res = $patients->GetAll();
                    if (count($res) > 0) {
                        foreach ($res as $row) {
                            ?>
                            <option value="<?php echo $row->id_patient; ?>"><?= $row->name; ?></option>
                            <?php
                        }
                    }else {
                        echo "<div class='error'> Không tìm thấy thông tin! </div>";
                    }
                    ?>
                    
                </select>
            </div>

            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Bác Sĩ</label>
                <select name="doctor" class="form-select" id="">
                    <option value="" selected>Chọn bác sĩ phụ trách</option>
                        
                    <?php
                    $res1 = $staff->GetAllStaff();
                    if (count($res1) > 0) {
                        foreach ($res1 as $row1) {
                            ?>
                            <option value="<?php echo $row1->id_staff; ?>"><?= $row1->name; ?></option>
                            <?php
                        }
                    }else {
                        echo "<div class='error'> Không tìm thấy thông tin! </div>";
                    }
                    ?>

                </select>
            </div>

            <div class="col-md-6">
                <label for="inputAddress" class="form-label">Chọn ngày khám</label>
                <input type="datetime-local" name="app_date" class="form-control" id="inputAddress">
            </div>

            <div class="col-md-6">
                <label for="inputAddress2" class="form-label">Trạng thái</label>
                <select name="status" class="form-select" id="">
                    <option value="" selected>Trạng thái hoạt động</option>
                    <option value="đã đặt lịch">đã đặt lịch</option>
                    <option value="chờ khám bệnh">chờ khám bệnh</option>
                    <option value="đã thanh toán">đã thanh toán</option>
                    <option value="huỷ lịch">đã huỷ</option>
                    <option value="đã xoá">đã xoá</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">Ghi chú</label>
                <textarea name="notes" cols="20" id="inputcity" class="form-control" placeholder="Ghi chú (nếu có)"></textarea>
            </div>

            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary">Lưu thông tin</button>
            </div>

        </form>

        <?php
            if (isset($_POST['submit'])) {
                $patient = $_POST['patient'];
                $doctor = $_POST['doctor'];
                $appointment_date = $_POST['app_date'];
                $status = $_POST['status'];
                $notes = $_POST['notes'];

                $insertAppointment = $appointment->insertAppointment($patient,$doctor,$appointment_date,$status,$notes);
                if ($insertAppointment == true) {
                    $_SESSION['add-appointment'] = "<div class='success'> Thêm thông tin thành công! </div>";
                    header('location:'.SITEURL.'admin/appointment/manage-appointment.php');
                }else {
                    $_SESSION['add-appointment'] = "<div class='error'> Thêm thông tin không thành công! </div>";
                    header('location:'.SITEURL.'admin/appointment/manage-appointment.php');
                }
            }
        ?>

        <hr style="border: 1px solid orange; opacity: 1;">
    </div>
</div>