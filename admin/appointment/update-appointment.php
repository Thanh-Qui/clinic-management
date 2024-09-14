<?php require_once("../menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h3>CẬP NHẬT LỊCH KHÁM</h3>
        <hr style="border: 1px solid navy; opacity: 1;">
        <br><br>

        <?php
        if (isset($_GET['id'])) {
            $id_appointment = $_GET['id'];

            $getById = $appointment->GetAppointmentById($id_appointment);
        }

        if (isset($_SESSION['add-appointment'])) {
            echo $_SESSION['add-appointment'];
            unset($_SESSION['add-appointment']);
        }
        ?>

        <label for="" id="noteUpdateAppointment" style="color: red;"></label>
        <form class="row g-3" method="POST" id="formUpdateAppointment" onsubmit="return isUpdateAppointment();">

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Bệnh nhân</label>
                <select name="patient" class="form-select" id="">

                    <?php
                    //lấy bệnh nhân hiện tại
                        $res = $appointment->GetAppointmentById($id_appointment);
                        $id_patient = $res->id_patient;
                    
                    // lấy tất cả các bệnh nhân
                        $res3 = $patients->GetAll();

                    //lặp qua tất cả các bệnh nhân
                        foreach ($res3 as $row) {

                            $selected = ($row->id_patient == $id_patient) ? 'selected' : ""; //kiểm tra xem có bệnh nhân hiện tại không
                            echo "<option value='{$row->id_patient}' {$selected}>{$row->name}</option>";    
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Bác Sĩ</label>
                <select name="doctor" class="form-select" id="">

                    <?php
                    //lấy bác sĩ hiện tại
                    $res2 = $appointment->GetAppointmentById($id_appointment);
                    $id_staff = $res2->id_staff;

                    //lấy tất cả bác sĩ
                    $res1 = $staff->GetAllStaff();
                    
                    //lặp qua tất cả các bác sĩ
                        foreach ($res1 as $row1) {

                            $selected = ($row1->id_staff == $id_staff) ? 'selected' : ""; //kiểm tra xem có bac si hiện tại không
                            echo "<option value='{$row1->id_staff}' {$selected}>{$row1->name}</option>";
                        }
                    ?>

                </select>
            </div>

            <div class="col-md-6">
                <label for="inputAddress" class="form-label">Chọn ngày khám</label>
                <input type="datetime-local" name="app_date" class="form-control" id="inputAddress" value="<?php echo $getById->appointment_date; ?>">
            </div>

            <div class="col-md-6">
                <label for="inputAddress2" class="form-label">Trạng thái</label>
                <select name="status" class="form-select" id="">
                    <option value="" selected>Trạng thái hoạt động</option>
                    <option <?php if($getById->status == 'đã đặt lịch') {echo "selected";} ?> value="đã đặt lịch">đã đặt lịch</option>
                    <option <?php if($getById->status == 'chờ khám bệnh') {echo "selected";} ?> value="chờ khám bệnh">chờ khám bệnh</option>
                    <option <?php if($getById->status == 'đã thanh toán') {echo "selected";} ?> value="đã thanh toán">đã thanh toán</option>
                    <option <?php if($getById->status == 'huỷ lịch') {echo "selected";} ?> value="huỷ lịch">đã huỷ</option>
                    <option <?php if($getById->status == 'đã xoá') {echo "selected";} ?> value="đã xoá">đã xoá</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">Ghi chú</label>
                <textarea name="notes" cols="20" id="inputcity" class="form-control" placeholder="Ghi chú (nếu có)"><?= $getById->notes; ?></textarea>
            </div>

            <div class="col-12">
                <input type="hidden" name="id_appointment" id="" value="<?= $id_appointment; ?>">
                <button type="submit" name="submit" class="btn btn-primary">Lưu thông tin</button>
            </div>

        </form>

        <?php
        if (isset($_POST['submit'])) {
            $id_appointment = $_POST['id_appointment'];
            $patient = $_POST['patient'];
            $doctor = $_POST['doctor'];
            $appointment_date = $_POST['app_date'];
            $status = $_POST['status'];
            $notes = $_POST['notes'];

            $updateAppointment = $appointment->updateAppointment($patient, $doctor, $appointment_date, $status, $notes, $id_appointment);
            if ($updateAppointment == true) {
                $_SESSION['update-appointment'] = "<div class='success'> Thêm thông tin thành công! </div>";
                header('location:' . SITEURL . 'admin/appointment/manage-appointment.php');
            } else {
                $_SESSION['update-appointment'] = "<div class='error'> Thêm thông tin không thành công! </div>";
                header('location:' . SITEURL . 'admin/appointment/manage-appointment.php');
            }
        }
        ?>

        <hr style="border: 1px solid orange; opacity: 1;">
    </div>
</div>