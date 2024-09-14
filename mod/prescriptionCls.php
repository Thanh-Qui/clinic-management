<?php 
require_once("connect.php");

class prescription extends DatabasePharmacy {

    function insertPrescription($id_appointment, $id_staff, $date, $total_cost) {
        $sql = $this->conn->prepare("INSERT INTO prescriptions (id_appointment, id_staff, `date`, total_cost) VALUES (?,?,?,?)");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_appointment, $id_staff, $date, $total_cost));

        return $this->conn->lastInsertId();
    }
    
    function insertPrescriptionDetail($id_pres, $id_medicine, $quantity, $price, $dosage) {
        $sql = $this->conn->prepare("INSERT INTO prescriptiondetails (id_pres, id_medicine, quantity, price, dosage) VALUES (?,?,?,?,?)");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_pres, $id_medicine, $quantity, $price, $dosage));

        return $sql->rowCount();
    }

    function updatePrescription($total_cost, $id_pres) {
        $sql = $this->conn->prepare("UPDATE prescriptions SET total_cost=? WHERE id_pres=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($total_cost, $id_pres));

        return $sql->rowCount();
    }

    function deletePres($id_pres) {
        $sql = $this->conn->prepare("DELETE FROM prescriptions WHERE id_pres=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_pres));

        return $sql->rowCount();
    }

    function deletePresDetail($id_pres) {
        $sql = $this->conn->prepare("DELETE FROM prescriptiondetails WHERE id_pres=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_pres));

        return $sql->rowCount();
    }

    function GetPresByIdAppointment($id_appointment) {
        $sql = $this->conn->prepare("SELECT * FROM prescriptions WHERE id_appointment=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_appointment));

        return $sql->fetch();
    }

    function GetPresDetailById($id_pres) {
        $sql = $this->conn->prepare("SELECT * FROM prescriptiondetails WHERE id_pres=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_pres));

        return $sql->fetchAll();
    }

    function GetAllPresDetail() {
        $sql = $this->conn->prepare("SELECT * FROM prescriptiondetails");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute();

        return $sql->fetchAll();
    }

    function GetAllPres() {
        $sql = $this->conn->prepare("SELECT * FROM prescriptions");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute();

        return $sql->fetchAll();
    }
}

?>