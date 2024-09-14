<?php 
session_start();

class DatabasePharmacy {
    public $conn;
    public function __construct()
    {

        $servername = 'localhost';
        $dbname = 'clinicmanagement';
        $port = 3366; 
        $username = 'root';
        $password = '';

        $dsn = "mysql:host=$servername;dbname=$dbname;port=$port";
        $this->conn = new PDO($dsn, $username, $password);

        // try {
        //     $conn = new PDO($dsn, $username, $password);
        //     $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //     // echo "kết nối thành công";

        // } catch (PDOException $e) {
            
        //     // echo "kết nối không thành công". $e->getMessage();
        // }
    }

}


?>