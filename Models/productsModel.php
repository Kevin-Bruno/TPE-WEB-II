<?php
class productsModel{

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
function getProducts(){
    //envio la consulta
    $query = $this->db->prepare('SELECT * FROM products');
    $query->execute();
    //obtengo la respuesta con un fetchAll (porque son muchos)
    $products = $query->fetchAll(PDO::FETCH_OBJ);//arreglo de tareas
    return $products;
}
/*
function getProductsById($id){
    $query = $this->db->prepare("SELECT * FROM products WHERE ID=?");
    $query->execute([$id]);
    $products = $query->fetchAll(PDO::FETCH_OBJ);
    return $products;
}*/


function insertProduct($name, $details, $price,$fk){
        $query = $this->db->prepare('INSERT INTO products ( name, details , price,ID_Category_FK) VALUES (?,?,?,?)');
        $query->execute([$name,$details, $price,$fk,]);
        return $this->db->lastInsertId();
}
function removeProduct($id){
    $query = $this->db->prepare('DELETE FROM products WHERE ID_Products =?');
    $query->execute([$id]);
}
function updateProduct($name,$details,$price,$category,$id,){
    $query = $this->db->prepare('UPDATE products SET name =?, details =?,price=?, ID_Category_FK = ? WHERE ID_Products=?');
    $query->execute([$name,$details,$price,$category,$id,]);
}
function innerJoinProductAndNameCategory($id){
    $query = $this->db->prepare("SELECT products.*, category.name FROM products JOIN category ON products.ID_Category_FK = category.ID_Category WHERE products.ID_Category_FK");
    $query->execute([$id]);
    $products= $query->fetch(PDO::FETCH_OBJ);
    return $products;
}
/*function getAllProductsByCategoryId($id){
    $query =  $this->db->prepare("SELECT * FROM products WHERE ID_Category_FK = $id");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_OBJ);
}*/
function getProductsByCategory($id){
    try{
        $query = $this->db->prepare("SELECT * FROM products WHERE ID_Category_FK = ?");
        $query->execute([$id]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }catch (PDOException $error) {
            echo $error;
    }
}
//para ver un producto detallado
public function getProductById($id){
    $query = $this->db->prepare("SELECT * FROM products WHERE ID_Products = ?");
    $query->execute([$id]);
    $product = $query->fetch(PDO::FETCH_OBJ);
    return $product;
  }
}