<?php 
require_once("connect.php");

class medicine extends DatabasePharmacy {

    public function insertMedicine($id_supp, $name, $description, $price, $quantity, $exp_day, $status) {
        $sql = $this->conn->prepare("INSERT INTO medicines(id_supp, name, description, price, quantity, exp_day, status) VALUES (?,?,?,?,?,?,?)");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_supp, $name, $description, $price, $quantity, $exp_day, $status));

        return $sql->rowCount();
    }

    public function updateMedicine($id_supp, $name, $description, $price, $quantity, $exp_day, $status ,$id_medicine) {
        $sql = $this->conn->prepare("UPDATE medicines SET id_supp=?, name=?, description=?, price=?, quantity=?, exp_day=?, status=?  WHERE id_medicine=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_supp, $name, $description, $price, $quantity, $exp_day, $status ,$id_medicine));
        
        return $sql->rowCount();
    }

    public function updateMedicineQuantity($quantity,$id_medicine) {
        $sql = $this->conn->prepare("UPDATE medicines SET quantity=? WHERE id_medicine=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($quantity, $id_medicine));
        
        return $sql->rowCount();
    }

    public function deleteMedicine($id_medicine) {
        $sql = $this->conn->prepare("DELETE FROM medicines WHERE id_medicine=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_medicine));
        
        return $sql->rowCount();
    }

    public function getMedicineById($id_medicine) {
        $sql = $this->conn->prepare("SELECT * FROM medicines WHERE id_medicine=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_medicine));

        return $sql->fetch();
    }

    public function GetAll() {
        $sql = $this->conn->prepare("SELECT * FROM medicines");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function searchByName($name) {
        $sql = $this->conn->prepare("SELECT * FROM medicines WHERE name LIKE ?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array("%$name%"));
        return $sql->fetchAll();
    }

    
}