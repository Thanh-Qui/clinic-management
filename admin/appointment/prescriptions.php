<?php require_once("../menu.php"); ?>

<div class="main-content">
    <div class="wrapper">

        <h3 class="pt-2 pl-20"><i class="fa-solid fa-tablets"></i> KÊ ĐƠN THUỐC</h3>
        <hr style="border: 1px solid navy; opacity: 1;">
        <br>

        <h5>Tạo đơn thuốc mới</h5>
        <hr>

        <?php
        if (isset($_GET["id"]) && isset($_GET['id_staff'])) {
            $id_appointment = $_GET['id'];
            $id_staff = $_GET['id_staff'];
        }
        ?>

        <label for="" id="notePrescription" style="color: red;"></label>
        <form class="row g-3" method="POST" id="formPrescription" onsubmit="return isPrescription();">

            <div class="col-md-6">
                <label for="" class="form-label">Bác sĩ</label>
                <select class="form-select" aria-label="Default select example" name="staff">
                    <option value="" selected>Chọn bác sĩ</option>
                    <?php
                    //lấy bác sĩ hiện tại
                    $res2 = $staff->GetStaffById($id_staff);
                    $id_staff = $res2->id_staff;

                    //lấy tất cả bác sĩ
                    $res3 = $staff->GetAllStaff();
                    if (count($res3) > 0) {
                        foreach ($res3 as $row3) {
                            $selected = ($row3->id_staff == $id_staff) ? 'selected' : "";
                            echo "<option value='{$row3->id_staff}' {$selected}>{$row3->name}</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-6">
                <label for="" class="form-label">Ngày kê đơn</label>
                <input type="datetime-local" class="form-control" name="date">
            </div>


            <h5>Chi tiết đơn thuốc</h5>
            <hr>
            <div id="form-container">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="" class="form-label">Tên thuốc</label>
                        <select class="form-select" name="id_medicine[]" id="">
                            <option value="" selected>Chọn loại thuốc</option>
                            <?php
                            $res = $medicine->GetAll();
                            if (count($res) > 0) {
                                foreach ($res as $row) {
                                    if ($row->status == "còn thuốc") {
                                        ?>
                                            <option value="<?php echo $row->id_medicine; ?>"><?php echo $row->name; ?></option>
                                        <?php
                                    }
                            
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Số lượng</label>
                        <input class="form-control" type="text" name="quantity[]" id="" placeholder="Nhập số lượng">
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Liều lượng</label>
                        <input class="form-control" type="text" name="dosage[]" id="" placeholder="Nhập liệu lượng">
                    </div>

                </div>
            </div>

            <div class="col-12">
                <div class="text-end">
                    <button type="button" class="btn btn-primary" onclick="addForm()"><i class="fa fa-plus"></i></button>
                    <button type="button" class="btn btn-danger" onclick="deleteForm()"><i class="fa fa-trash"></i></button>
                </div>
            </div>

            <div class="col-12">
                <input type="hidden" name="id_appointment" id="" value="<?= $id_appointment; ?>">
                <input type="submit" name="submit" class="btn btn-primary" id="" value="Lưu đơn đặt">
            </div>
        </form>
        <hr style="border-top: 2px solid #d35400;">

        <?php
        if (isset($_POST["submit"])) {

            // insert vào bảng prescription
            $id_appointment = $_POST['id_appointment'];
            $staff = $_POST['staff'];
            $date = $_POST['date'];
            $total_cost = 0;

            $id_pres = $prescription->insertPrescription($id_appointment, $staff, $date, $total_cost);

            // insert vào bảng pres_detail
            $id_medicine = $_POST['id_medicine'];
            $quantity = $_POST['quantity'];
            $dosage = $_POST['dosage'];

            for ($i = 0; $i < count($id_medicine); $i++) {
                $id_medicines = $id_medicine[$i];
                $quantities = $quantity[$i];
                $dosages = $dosage[$i];

                $res4 = $medicine->getMedicineById($id_medicines);
                $price = $res4->price;

                $res5 = $prescription->insertPrescriptionDetail($id_pres, $id_medicines, $quantities, $price, $dosages);

                $total_cost += $quantities * $price;

                $soluong = $res4->quantity;  // Số lượng hiện tại của thuốc
                $total_quantity = $soluong - $quantities;  // Cập nhật số lượng sau khi trừ số lượng đã bán

                // Cập nhật số lượng thuốc dựa trên ID thuốc hiện tại trong vòng lặp
                $updateQuantity = $medicine->updateMedicineQuantity($total_quantity, $id_medicines);
            }

            $updatePres = $prescription->updatePrescription($total_cost, $id_pres);




            if ($updatePres == true) {
                $_SESSION['add-pres'] = "<div class='success'> Thêm thông tin thành công! </div>";
                header('location:' . SITEURL . 'admin/appointment/manage-appointment.php');
            } else {
                $_SESSION['add-pres'] = "<div class='error'> Thêm thông tin không thành công! </div>";
                header('location:' . SITEURL . 'admin/appointment/manage-appointment.php');
            }
        }

        ?>

        <br>
        <h5>Đơn thuốc tương ứng</h5>
        <hr>

        <table class="table table-hover table-bordered table-list">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Tên thuốc</th>
                    <th>Số lượng</th>
                    <th>Liều lượng</th>
                </tr>
            </thead>

            <?php


            $result = $prescription->GetPresByIdAppointment($id_appointment);
            if ($result) {
                $id_pres1 = $result->id_pres;
                $getPres = $prescription->GetPresDetailById($id_pres1);
                $sl = 1;
                foreach ($getPres as $getMedicine) {
            ?>
                    <tbody>
                        <tr>
                            <td><?= $sl++; ?></td>
                            <?php
                            $name = $medicine->getMedicineById($getMedicine->id_medicine);
                            ?>
                            <td><?= $name->name; ?></td>
                            <td><?= $getMedicine->quantity; ?></td>
                            <td><?= $getMedicine->dosage; ?></td>
                        </tr>
                    </tbody>
            <?php
                }
            } else {
                echo "<div class='error'> Chưa có đơn thuốc! </div>";
            }

            ?>

        </table>

        <hr style="border: 1px solid navy; opacity: 1;">
    </div>
</div>




<script>
    var formTemplate = `
    <div id="form-container">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="" class="form-label">Tên thuốc</label>
                        <select class="form-select" name="id_medicine[]" id="">
                            <option value="" selected>Chọn loại thuốc</option>
                            <?php
                            $res1 = $medicine->GetAll();
                            if (count($res1) > 0) {
                                foreach ($res1 as $row1) {
                            ?>
                                            <option value="<?php echo $row1->id_medicine; ?>"><?php echo $row1->name; ?></option>
                                       <?php
                                    }
                                }
                                        ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Số lượng</label>
                        <input class="form-control" type="text" name="quantity[]" id="" placeholder="Nhập số lượng">
                    </div>  

                    <div class="col-md-4">
                        <label for="" class="form-label">Liều lượng</label>
                        <input class="form-control" type="text" name="dosage[]" id="" placeholder="Nhập liệu lượng">
                    </div>

                </div>
            </div>
    `;
</script>