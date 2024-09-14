<?php 
require_once("connect.php");

class doctor extends DatabasePharmacy {

    public function insertDoctor($name, $dob, $gender, $address, $phone_number, $email, $position, $salary) {
        $sql = $this->conn->prepare("INSERT INTO staff(name, dob, gender, address, phone_number, email, position, salary) VALUES (?,?,?,?,?,?,?,?)");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($name, $dob, $gender, $address, $phone_number, $email, $position, $salary));

        return $sql->rowCount();
    }

    public function deleteDoctor($id_staff) {
        $sql = $this->conn->prepare("DELETE FROM staff WHERE id_staff=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_staff));

        return $sql->rowCount();
    }

    public function updateDoctor($name, $dob, $gender, $address, $phone_number, $email, $position, $salary, $id_staff) {
        $sql = $this->conn->prepare("UPDATE staff SET name=?, dob=?, gender=?, address=?, phone_number=?, email=?, position=?, salary=? WHERE id_staff=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($name, $dob, $gender, $address, $phone_number, $email, $position, $salary ,$id_staff));

        return $sql->rowCount();
    }

    public function GetAllStaff() {
        $sql = $this->conn->prepare("SELECT * FROM staff");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function GetStaffById($id_staff) {
        $sql = $this->conn->prepare("SELECT * FROM staff WHERE id_staff=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_staff));

        return $sql->fetch();
    }

    public function searchDoctorByName($name) {
        $sql = $this->conn->prepare("SELECT * FROM staff WHERE name LIKE ?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array("%$name%"));

        return $sql->fetchAll();
    }
}