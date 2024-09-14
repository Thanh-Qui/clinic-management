<?php require_once("../menu.php");
ob_start(); ?>

<div class="main-content">
    <div class="wrapper">
        <h3>Cập nhật nhà cung cấp</h3>
        <hr><br><br>

        <label for="" id="noteUpdateSupplier" style="color: red;"></label>
        <form action="" method="POST" id="formUpdateSupplier" onsubmit="return isUpdateSupplier();">

            <table class="tbl-30">

                <?php
                if (isset($_GET['id'])) {
                    $id_supp = $_GET['id'];

                    $res = $supp->GetSuppById($id_supp);
                }
                
                ?>

                <tr>
                    <td class="form-label"><label for="">Tên nhà cung cấp:</label></td>
                    <td>
                        <input class="form-control" type="text" name="name" id="" placeholder="Nhập tên nhà cung cấp" value="<?php echo $res->name; ?>">
                    </td>
                </tr>

                <tr>
                    <td><label class="form-label" for="">Số điện thoại:</label></td>
                    <td>
                        <input class="form-control" type="text" name="contact" id="" placeholder="Nhập số điện thoại" value="<?php echo $res->contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td><label class="form-label" for="">Địa chỉ:</label></td>
                    <td>
                        <input class="form-control" type="text" name="address" id="" placeholder="Nhập địa chỉ" value="<?= $res->address; ?>">
                    </td>
                </tr>

                <tr>
                    <td><label class="form-label" for="">Email:</label></td>
                    <td>
                        <input class="form-control" type="text" name="email" id="" placeholder="Nhập email" value="<?= $res->email; ?>">
                    </td>

                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id_supp" id="" value="<?php echo $id_supp; ?>">
                        <input class="btn btn-primary" type="submit" name="submit" id="" value="Lưu thông tin">
                    </td>
                </tr>

            </table>

        </form>

        <?php
        if (isset($_POST['submit'])) {
            $id_supp = $_POST['id_supp'];
            $name = $_POST['name'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $email = $_POST['email'];

            $res1 = $supp->updateSupp($name,$contact,$address,$email,$id_supp);
            if ($res1 == true) {
                $_SESSION['update-supp'] = "<div class='success'> Cập nhật thông tin thành công! </div>";
                header('location:'.SITEURL.'admin/suppliers/manage-suppliers.php'); 
            }else {
                $_SESSION['update-supp'] = "<div class='error'> Cập nhật thông tin không thành công! </div>";
                header('location:'.SITEURL.'admin/suppliers/manage-suppliers.php'); 
            }
        }
        ?>

        <hr>
    </div>
</div>


<?php ob_end_flush(); ?>