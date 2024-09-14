<?php require_once("../menu.php"); ob_start(); ?>

<div class="main-content">
    <div class="wrapper">
    <h3 class="pt-2 pl-20"><i class="fa-solid fa-user"></i> THÊM NHÀ CUNG CẤP</h3>
        <hr><br><br>

        <label for="" id="noteAddSuppier" style="color: red;"></label>
        <form action="" method="POST" id="formAddSupplier" onsubmit="return isAddSupplier();">

            <table class="tbl-30">

                <tr>
                    <td class="form-label"><label for="">Tên nhà cung cấp:</label></td>
                    <td><input class="form-control" type="text" name="name" id="" placeholder="Nhập tên nhà cung cấp"></td>
                </tr>
                
                <tr>
                    <td><label class="form-label" for="">Số điện thoại:</label></td>
                    <td>
                        <input class="form-control" type="text" name="contact" id="" placeholder="Nhập số điện thoại">
                    </td>
                </tr>

                <tr>
                    <td><label class="form-label" for="">Địa chỉ:</label></td>
                    <td>
                        <input class="form-control" type="text" name="address" id="" placeholder="Nhập địa chỉ">
                    </td>
                </tr>

                <tr>
                    <td><label class="form-label" for="">Email:</label></td>
                    <td>
                        <input class="form-control" type="text" name="email" id="" placeholder="Nhập email">
                    </td>
                    
                </tr>

                <tr>
                    <td>
                        <input class="btn btn-primary" type="submit" name="submit" id="" value="Lưu thông tin">
                    </td>
                </tr>

            </table>

        </form>

        <?php 
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $contact = $_POST['contact'];
                $address = $_POST['address'];
                $email = $_POST['email'];

                $res = $supp->insertSupp($name,$contact,$address,$email);
                if ($res == true) {
                    $_SESSION['add-supp'] = "<div class='success'> Thêm thông tin thành công! </div>";
                    header('location:'.SITEURL.'admin/suppliers/manage-suppliers.php'); 
                }else {
                    $_SESSION['add-supp'] = "<div class='error'> Thêm thông tin không thành công! </div>";
                    header('location:'.SITEURL.'admin/suppliers/manage-suppliers.php'); 
                }
            }
        ?>

        <hr>
    </div>
</div>


<?php ob_end_flush(); ?>