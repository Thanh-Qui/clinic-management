<?php require_once("../menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h3>QUẢN LÝ LỊCH KHÁM</h3>
        <hr style="border-top: 2px solid navy; opacity: 1;">
        <br><br>

        <?php 

            if (isset($_SESSION['add-appointment'])) {
                echo $_SESSION['add-appointment'];
                unset($_SESSION['add-appointment']);
            }

            if (isset($_SESSION['delete-appointment'])) {
                echo $_SESSION['delete-appointment'];
                unset($_SESSION['delete-appointment']);
            }

            if (isset($_SESSION['update-appointment'])) {
                echo $_SESSION['update-appointment'];
                unset($_SESSION['update-appointment']);
            }

            if (isset($_SESSION['add-pres'])) {
                echo $_SESSION['add-pres'];
                unset($_SESSION['add-pres']);
            }
        ?>

        <form action="" method="POST" class="row mb-3 tbl-30">
            <label for="search-appointment" class="col-sm-2 col-form-label">Search:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="search-appointment" name="search-appointment" placeholder="Tìm kiếm lịch khám" onkeyup="searchAppointment()">
            </div>
        </form>
        <hr>

        <table class="table table-hover table-bordered table-list">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Tên bệnh nhân</th>
                    <th>Bác sĩ</th>
                    <th>Lịch khám</th>
                    <th>Trạng thái</th>
                    <th>Ghi chú</th>
                    <th>Active</th>
                </tr>
            </thead>

            <tbody id="appointment-list">
                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search-appointment'])) {
                    $id_patient = $_POST['search-appointment'];
                    $res = $appointment->searchAppointment($id_patient);
                }else {
                    $res = $appointment->GetAllAppointment();
                }
                
                $sn = 1;
                if (count($res) > 0) {
                    foreach ($res as $row) {
                        $id_appointment = $row->id_appointment;
                        $status = $row->status;

                        $patient = $patients->GetPatientById($row->id_patient);
                        $staffs = $staff->GetStaffById($row->id_staff);
                        if ($status == "đã xoá") {
                            
                        } else {
                            ?>
                            <tr>
                            <td><?= $sn++; ?></td>
                            <td><?= $patient->name; ?></td>
                            <td><?= $staffs->name; ?></td>
                            <td><?= $row->appointment_date; ?></td>

                            <?php
                                if ($status == "đã xoá") {
                                    echo "";
                                }else {
                                    ?>
                                   <td><?= $row->status; ?></td> 
                                   <?php
                                }
                            ?>
                            
                            <td><?= $row->notes; ?></td>
                            <td style="text-align: center; width: 150px;">
                                <a href="<?php echo SITEURL; ?>admin/appointment/update-appointment.php?id=<?php echo $id_appointment; ?>"><i class="fa-solid fa-pen" style="margin-right: 10px;"></i></a>
                                <a href="<?php echo SITEURL; ?>admin/appointment/delete-appointment.php?id=<?php echo $id_appointment; ?>" onclick="return isDelete();"><i class="fa-solid fa-trash" style="margin-right: 10px;"></i></a>
                                <a href="<?php echo SITEURL; ?>admin/appointment/prescriptions.php?id=<?php echo $id_appointment; ?>&id_staff=<?php echo $row->id_staff; ?>"><i class="fa-solid fa-tablets" style="margin-right: 10px;"></i></a>
                                <a href="<?php echo SITEURL; ?>admin/appointment/invoice.php?id=<?php echo $id_appointment; ?>"><i class="fa-solid fa-receipt"></i></a>
                            </td>
                        </tr>

                        <?php
                        }
                    }
                } else {
                    echo "<div class='error'> Không tìm thấy thông tin! </div>";
                }
                ?>

            </tbody>

        </table>

        <hr style="border: 1px solid orange; opacity: 1;">
    </div>
</div>