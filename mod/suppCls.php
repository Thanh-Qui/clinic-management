<?php
require_once("connect.php");

class suppCls extends DatabasePharmacy {

    public function insertSupp($name, $contact, $address, $email) {
        $sql = $this->conn->prepare(("INSERT INTO suppliers (name, contact, address, email) VALUES (?,?,?,?)"));
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($name,$contact,$address,$email));

        return $sql->rowCount();
    }

    public function deleteSupp($id_supp) {
        $sql = $this->conn->prepare("DELETE FROM suppliers WHERE id_supp=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_supp));

        return $sql->rowCount();
    }

    public function updateSupp($name, $contact, $address, $email, $id_supp) {
        $sql = $this->conn->prepare("UPDATE suppliers SET name=?, contact=?, address=?, email=? WHERE id_supp=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($name, $contact, $address, $email, $id_supp));

        return $sql->rowCount();
    }

    public function GetAll() {
        $sql = $this->conn->prepare("SELECT * FROM suppliers");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function GetSuppById($id_supp) {
        $sql = $this->conn->prepare("SELECT * FROM suppliers WHERE id_supp=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($id_supp));

        return $sql->fetch();
    }

    public function GetSuppByName($name) {
        $sql = $this->conn->prepare("SELECT * FROM suppliers WHERE name LIKE ?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array('%'.$name.'%'));
        
        return $sql->fetchAll();
    }

    public function searchSuppByName($name) {
        $sql = $this->conn->prepare("SELECT * FROM suppliers WHERE name LIKE ?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array("%$name%"));

        return $sql->fetchAll();
    }
}