<?php


require_once(dirname(dirname(__FILE__)) .'/interface/interceLogin.php');
require_once('../../models/Database.php');

class  ServiceLogin implements InterceLogin{
    
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection(); 
    }
    public function fetch($username){
        $pdo = $this->db;

        $sql = "SELECT * FROM user WHERE username = :username";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username',$username);
        
        $stmt->execute();
        $fetchUsername = $stmt->fetch(PDO::FETCH_ASSOC);

        return  $fetchUsername;
    }
   

}



?>