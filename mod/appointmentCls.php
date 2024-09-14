<?php
require_once("connect.php");

class appointment extends DatabasePharmacy {

    function insertAppointment($id_patient, $id_staff, $appointment_date, $status, $notes) {
        $sql = $this->conn->prepare("INSERT INTO appointment (id_patient, id_staff, appointment_date, status, notes) VALUES (?,?,?,?,?)");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_patient, $id_staff, $appointment_date, $status, $notes));

        return $sql->rowCount();
    }
    
    function updateAppointment($id_patient, $id_staff, $appointment_date, $status, $notes, $id_appointment) {
        $sql = $this->conn->prepare("UPDATE appointment SET id_patient=?, id_staff=?, appointment_date=?, status=?, notes=? WHERE id_appointment=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_patient, $id_staff, $appointment_date, $status, $notes, $id_appointment));

        return $sql->rowCount();
    }

    function deleteAppointment($status, $id_appointment) {
        $sql = $this->conn->prepare("UPDATE appointment SET status=? WHERE id_appointment=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($status, $id_appointment));

        return $sql->rowCount();
    }

    function GetAllAppointment() {
        $sql = $this->conn->prepare("SELECT * FROM appointment");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute();

        return $sql->fetchAll();
    }

    function GetAppointmentById($id_appointment) {
        $sql = $this->conn->prepare("SELECT * FROM appointment WHERE id_appointment=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_appointment));

        return $sql->fetch();
    }

    function searchAppointment($id_patient) {
        $sql = $this->conn->prepare("SELECT * FROM appointment WHERE id_patient=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_patient));

        return $sql->fetchAll();
    }
}
?>