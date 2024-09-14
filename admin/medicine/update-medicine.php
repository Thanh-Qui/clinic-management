<?php
require_once("../menu.php");
ob_start();
?>

<div class="main-content">
    <div class="wrapper">

        <h3 class="pt-2 pl-20"><i class="fa-solid fa-user"></i> CẬP NHẬT LOẠI THUỐC</h3>
        <hr style="border-top: 2px solid #004085;">
        <br><br><br>

        <?php
        if (isset($_GET['id'])) {
            $id_medicine = $_GET['id'];
        }

        $res = $medicine->getMedicineById($id_medicine);
        $current_supp = $res->id_supp;
        
        ?>

        <label for="" id="noteUpdateMedicine" style="color: red;"></label>
        <form method="POST" id="formUpdateMedicine" onsubmit="return isUpdateMedicine();">
            <table class="tbl-30">
                <label id="note-addMedicine" style="color: red;"></label><br>

                <tr>
                    <td>Tên thuốc:</td>
                    <td>
                        <input class="form-control" type="text" name="name" id="" placeholder="Nhập đầy đủ tên thuốc" value="<?= $res->name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Giá bán lẻ:</td>
                    <td>
                        <input class="form-control" type="text" name="price" id="" placeholder="Nhập giá bán lẻ" value="<?= currency_format($res->price,""); ?>">
                    </td>
                </tr>

                <tr>
                    <td>Mô tả:</td>
                    <td>
                        <textarea class="form-control" cols="8" name="mota" id="" placeholder="Nhập mô tả về loại thuốc"><?= $res->description; ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td>Nhà cung cấp:</td>
                    <td>
                        <select class="form-select" aria-label="Default select example" name="supp">
                            <option value="" selected>Chọn nhà cung cấp</option>
                            <?php
                            $res1 = $supp->GetAll();
                            $count = count($res1);
                            if ($count > 0) {
                                foreach ($res1 as $row) {
                                    $id_supp = $row->id_supp;
                            ?>

                                    <option <?php if($current_supp==$id_supp){echo "Selected";} ?> value="<?php echo $row->id_supp ?>"><?= $row->name; ?></option>
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
                        <input class="form-control" type="number" name="quantity" id="" placeholder="Nhập số lượng của thuốc" value="<?php echo $res->quantity; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Ngày hết hạn:</td>
                    <td>
                        <input class="form-control" type="date" name="exp_day" id="" value="<?php echo $res->exp_day; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Trạng thái:</td>
                    <td>
                        <select class="form-select" name="status" id="">
                            <option selected>Trạng thái thuốc</option>
                            <option <?php if($res->status == "thuốc hết hạn") {echo "Selected";} ?> value="thuốc hết hạn">Thuốc hết hạn</option>
                            <option <?php if($res->status == "hết thuốc") {echo "Selected";} ?> value="hết thuốc">Hết thuốc</option>
                            <option <?php if($res->status == "còn thuốc") {echo "Selected";} ?> value="còn thuốc">Còn thuốc</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id_medicine" id="" value="<?php echo $id_medicine; ?>">
                        <input class="btn btn-success" type="submit" name="submit" id="" value="Lưu thông tin">
                    </td>
                </tr>

            </table>
        </form>

        <?php
            if (isset($_POST['submit'])) {
                $id_medicine = $_POST['id_medicine'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $description = $_POST['mota'];
                $id_supp = $_POST['supp'];
                $quantity = $_POST['quantity'];
                $exp_day = $_POST['exp_day'];
                $status = $_POST['status'];

                $res2 = $medicine->updateMedicine($id_supp, $name, $description, $price, $quantity, $exp_day, $status ,$id_medicine);
                if ($res2 == true) {
                    $_SESSION['update-medicine'] = "<div class='success'> Cập nhật loại thuốc thành công! </div>";
                    header('location:'.SITEURL.'admin/medicine/manage-medicine.php');
                }else {
                    $_SESSION['update-medicine'] = "<div class='error'> Cập nhật loại thuốc không thành công! </div>";
                    header('location:'.SITEURL.'admin/medicine/manage-medicine.php');
                }
            }
        
        ?>

    </div>
</div>

<?php ob_end_flush(); ?>