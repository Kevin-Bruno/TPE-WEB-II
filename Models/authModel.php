<?php
class authModel{

    private $db;

    function __construct(){
        $this->db = $this->connect();
    }
    //abre la coneccion a la base de datos
    function connect(){
    $db = new  PDO('mysql:host=localhost;' . 'dbname=lubricentro;charset=utf8' , 'root','');
        return $db;
}
    
    public function getAdmin($email){
        $query = $this->db->prepare("SELECT * FROM user WHERE email=?");
        $query->execute([$email]);
        $users = $query->fetch(PDO::FETCH_OBJ);
        return $users;
    }


}