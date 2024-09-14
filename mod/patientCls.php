<?php 
    require_once('connect.php');


class patients extends DatabasePharmacy {

    public function InsetPateints($name, $dob, $gender, $address, $phone_number, $email, $medical_history){
        $sql = $this->conn->prepare("INSERT INTO patients(name, dob, gender, address, phone_number, email, medical_history) VALUES (?,?,?,?,?,?,?) ");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($name, $dob, $gender, $address, $phone_number, $email, $medical_history));

        return $sql->rowCount();

    }

    public function UpdatePatient($name, $dob, $gender, $address, $phone_number, $email, $medical_history, $id_patient){
        $sql = $this->conn->prepare("UPDATE patients SET name=?, dob=?, gender=?, address=?, phone_number=?, email=?, medical_history=? WHERE id_patient=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($name, $dob, $gender, $address, $phone_number, $email, $medical_history, $id_patient));

        return $sql->rowCount();
    }

    public function DeletePatient($id_patient){
        $sql = $this->conn->prepare("DELETE FROM patients WHERE id_patient = ?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_patient));

        return $sql->rowCount();
    }

    public function GetAll(){
        $sql = $this->conn->prepare("SELECT * FROM patients");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute();

        return $sql -> fetchAll();
    }

    public function GetPatientById($id_patient){
        $sql = $this->conn->prepare("SELECT * FROM patients  WHERE id_patient=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_patient));

        return $sql->fetch();
    }

    public function searchPatient($name) {
        $sql = $this->conn->prepare("SELECT * FROM patients WHERE name LIKE ?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array("%$name%"));
        return $sql->fetchAll();
    }

}


?>
