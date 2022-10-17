<?php
class CategoryModel{

    private $db;

    function __construct(){
        $this->db= $this->connect();
    }

    //abre la coneccion a la base de datos
    private function connect(){
    $db = new  PDO('mysql:host=localhost;' . 'dbname=lubricentro;charset=utf8' , 'root','');
    return $db;
}


//devuelve todos los productos de la BBDD 
function getAllCategory(){
    try{
        //envio la consulta
        $query = $this->db->prepare('SELECT * FROM category');
        $query->execute();
        //obtengo la respuesta con un fetchAll (porque son muchos)
        $categories = $query->fetchAll(PDO::FETCH_OBJ);//arreglo de tareas
        return $categories;
    }catch(PDOException $error){
        return false;
    }
}
function getCategoryById($id){
        $query = $this->db->prepare('SELECT * FROM category WHERE ID_Category = ?');
        $query->execute([$id]);
        $category = $query->fetchAll(PDO::FETCH_OBJ);
        return $category;
}

function getCategoryByName($id){
    $query = $this->db->prepare('SELECT nameCategory FROM category WHERE ID_Category = ?');
        $query->execute($id);
        $category = $query->fetch(PDO::FETCH_OBJ);
        return $category;
}



function insertCategory($name){
        $query = $this->db->prepare('INSERT INTO category (nameCategory) VALUES (?)');
        $query->execute([$name]);
    return $this->db->lastInsertId();
}
function deleteCategory($id){
    $query = $this->db->prepare("DELETE FROM category WHERE ID_Category =?");
    $query->execute([$id]);
}
function updateCategory($id){
    $query = $this->db->prepare('UPDATE  category SET nameCategory WHERE ID_Category=?');
    $query->execute([$id]);
}



}