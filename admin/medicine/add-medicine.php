<?php include("../menu.php");
ob_start(); ?>

<div class="main-content">
    <div class="wrapper">

        <h3 class="pt-2 pl-20"><i class="fa-solid fa-user"></i> THÊM LOẠI THUỐC</h3>
        <hr style="border-top: 2px solid #004085;">
        <br><br><br>

        <label for="" id="noteAddMedicine" style="color: red;"></label>
        <form method="POST" id="formAddMedicine" onsubmit="return isAddMedicine();">
            <table class="tbl-30">
                <label id="note-addMedicine" style="color: red;"></label><br>

                <tr>
                    <td>Tên thuốc:</td>
                    <td>
                        <input class="form-control" type="text" name="name" id="" placeholder="Nhập đầy đủ tên thuốc">
                    </td>
                </tr>

                <tr>
                    <td>Giá bán lẻ:</td>
                    <td>
                        <input class="form-control" type="text" name="price" id="" placeholder="Nhập giá bán lẻ">
                    </td>
                </tr>

                <tr>
                    <td>Mô tả:</td>
                    <td>
                        <textarea class="form-control" cols="8" name="mota" id="" placeholder="Nhập mô tả về loại thuốc"></textarea>
                    </td>
                </tr>


                <tr>
                    <td>Nhà cung cấp:</td>
                    <td>
                        <select class="form-select" aria-label="Default select example" name="supp">
                            <option value="" selected>Chọn nhà cung cấp</option>
                            <?php
                            $res = $supp->GetAll();
                            $count = count($res);
                            if ($count > 0) {
                                foreach ($res as $row) {
                            ?>
                                
                                <option value="<?php echo $row->id_supp ?>"><?= $row->name; ?></option>
                            <?php
                                }
                            } else {
                                echo "Không có thông tin!";
                            }

                            ?>
                            
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Số lượng</td>
                    <td>
                        <input class="form-control" type="number" name="quantity" id="" placeholder="Nhập số lượng của thuốc">
                    </td>
                </tr>

                <tr>
                    <td>Ngày hết hạn:</td>
                    <td>
                        <input class="form-control" type="date" name="exp_day" id="">
                    </td>
                </tr>

                <tr>
                    <td>Trạng thái:</td>
                    <td>
                        <select class="form-select" name="status" id="">
                            <option value="" selected>Trạng thái thuốc</option>
                            <option value="thuốc hết hạn">Thuốc hết hạn</option>
                            <option value="hết thuốc">Hết thuốc</option>
                            <option value="còn thuốc">Còn thuốc</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input class="btn btn-success" type="submit" name="submit" id="" value="Lưu thông tin">
                    </td>
                </tr>

            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['mota'];
            $quantity = $_POST['quantity'];
            $exp_day = $_POST['exp_day'];
            $stats = $_POST['status'];
            $id_supp = $_POST['supp'];

            $insertMedice = $medicine->insertMedicine($id_supp, $name, $description, $price, $quantity, $exp_day, $stats);
            if ($insertMedice == true) {
                $_SESSION['add-medicine'] = "<div class='success'> Thêm loại thuốc thành công! </div>";
                header('location:'.SITEURL.'admin/medicine/manage-medicine.php');
            } else {
                $_SESSION['add-medicine'] = "<div class='error'> Thêm loại thuốc không thành công! </div>";
                header('location:'.SITEURL.'admin/medicine/manage-medicine.php');
            }
        }
        ?>


        <b>
            <hr style="border-top: 2px solid #d35400;">
        </b>
    </div>
</div>

<?php ob_end_flush(); ?>