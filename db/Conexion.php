<?php
class Conexion extends mysqli {
    private $host = "localhost"; 
    private $user = "davidruizforza";
    private $pass = "admindavidruizforza";
    private $db = "forzaataxbd";
    
    
    public function __construct() {
        parent::__construct($this->host, $this->user, $this->pass, $this->db);
        if(mysqli_connect_errno()){
            echo mysqli_connect_error();
            exit;
        }
    }
}
?>