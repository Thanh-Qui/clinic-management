<?php
require_once('connect.php');

class medicineOrder extends DatabasePharmacy {

    function insertMedicineOrder($id_supp, $order_date, $total_cost, $status) {
        $sql = $this->conn->prepare("INSERT INTO medicineorders (id_supp, order_date, total_cost, status) VALUES(?,?,?,?)");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_supp,$order_date,$total_cost,$status));

        return $this->conn->lastInsertId();
    }

    function insertMedicineOrderDetail($id_order, $id_medicine, $quantity, $price) {
        $sql = $this->conn->prepare("INSERT INTO medicineorderdetails (id_order, id_medicine, quantity, price) VALUES(?,?,?,?)");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_order, $id_medicine, $quantity, $price));

        return $sql->rowCount();
    }

    function updateMedicineOrder($total_cost ,$id_order) {
        $sql = $this->conn->prepare("UPDATE medicineorders SET total_cost=? WHERE id_order=? ");
        $sql->execute(array($total_cost ,$id_order));

        return $sql->rowCount();
    }

    function deleteMedicineOrder($id_order) {
        $sql = $this->conn->prepare("DELETE FROM medicineorders WHERE id_order=?");
        $sql->execute(array($id_order));

        return $sql->rowCount();
    }

    function deleteMedicineOrderDetail($id_order) {
        $sql = $this->conn->prepare("DELETE FROM medicineorderdetails WHERE id_order=?");
        $sql->execute(array($id_order));

        return $sql->rowCount();
    }

    function searchMedicineOrder($id_supp) {
        $sql = $this->conn->prepare("SELECT * FROM medicineorders WHERE id_supp=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_supp));

        return $sql->fetchAll();
    }

    function GetAllMedicineOrder() {
        $sql = $this->conn->prepare("SELECT * FROM medicineorders");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute();

        return $sql->fetchAll();
    }
    
    function GetAllMedicineOrderDetail() {
        $sql = $this->conn->prepare("SELECT * FROM medicineorderdetails");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute();

        return $sql->fetchAll();
    }

    function GetMedicineOrderDetailsById($id_order) {
        $sql = $this->conn->prepare("SELECT * FROM medicineorderdetails WHERE id_order=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_order));

        return $sql->fetchAll();
    }
}
