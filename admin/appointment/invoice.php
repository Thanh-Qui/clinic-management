<?php require_once("../menu.php"); ?>
<script src="../../JS/html2canvas.min.js"></script>
<div class="main-content">
    <div class="wrapper">
        <h3 class="pt-2 pl-20">HOÁ ĐƠN THANH TOÁN</h3>
        <hr style="border: 1px solid navy; opacity: 1;">

        <?php
        if (isset($_GET['id'])) {
            $id_appointment = $_GET['id'];

            $res = $appointment->GetAppointmentById($id_appointment);
            $id_patient = $res->id_patient;

            $res1 = $patients->GetPatientById($id_patient);

            $res2 = $prescription->GetPresByIdAppointment($id_appointment);
            $id_pres = $res2->id_pres;
        }
        ?>

        <div class="invoice-container" style="margin-top: 10px;">
            <div class="invoice-header">
                <h2>HOÁ ĐƠN Y TẾ <i style="float: right;" class="fa-solid fa-hospital"></i></h2>
            </div>

            <div class="invoice-details">
                <h4>Thông tin bệnh nhân:</h4>
                <p>Họ tên: <?php echo $res1->name; ?></p>
                <p>Ngày sinh: <?php echo $res1->dob; ?></p>
                <p>Lịch khám: <?= $res->appointment_date; ?></p>
            </div>
            
            <label for="" style="margin-bottom: 15px;"><em><b>Chi tiết các loại thuốc:</b></em></label>
            <table class="invoice-table">
                <thead>
                    <tr>
                        <th>Tên thuốc</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng cộng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $res3 = $prescription->GetPresDetailById($id_pres);
                    $total = 0;
                    foreach ($res3 as $row3) {
                        
                        $total += $row3->quantity * $row3->price;

                        $id_medicine = $row3->id_medicine;
                        $res4 = $medicine->getMedicineById($id_medicine);
                    ?>
                        <tr>
                            <td><?= $res4->name; ?></td>
                            <td><?= $row3->quantity; ?></td>
                            <td><?=  currency_format($row3->price,""); ?></td>
                            <td><?= currency_format($total,""); ?></td>
                        </tr>

                    <?php
                    }
                    ?>


            </table>

            <div class="invoice-total">
                <h3>Tổng cộng: <?= currency_format($res2->total_cost, "VND"); ?></h3>
            </div>


        </div>

        <button class="btn btn-primary">Xuất hoá đơn</button>
        <hr>
    </div>
</div>

<script>
    document.querySelector('.btn-primary').addEventListener('click', function () {
        const invoice = document.querySelector('.invoice-container');

        html2canvas(invoice).then(canvas => {
            // Chuyển canvas thành hình ảnh dưới dạng base64
            const imgData = canvas.toDataURL('image/png');
            
            // Tạo một thẻ link để tải xuống hình ảnh
            const link = document.createElement('a');
            link.href = imgData;
            link.download = 'invoice.png';
            link.click();
        });
    });
    
</script>