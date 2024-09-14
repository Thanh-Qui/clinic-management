<?php

require_once("connect.php");

class admin extends DatabasePharmacy {

    public function login($username, $password){
        $sql = $this->conn->prepare("SELECT * FROM `admin` WHERE username=? AND password=?");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute(array($username, $password));

        return $sql->fetch();
    }

}

?>