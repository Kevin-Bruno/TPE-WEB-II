<?php

include_once 'Models/productsModel.php';
include_once 'Models/categoryModel.php';
include_once 'Views/productsView.php';
include_once './helpers/authHelper.php';
class productsController{

    private $model;
    private $view;
    private $categoryModel;
    private $authHelper;

    function __construct(){
        $this->model = new productsModel();
        $this->view = new productsView();
        $this->categoryModel = new CategoryModel();
        $this->authHelper = new authHelper();
    }
    function showHome(){
        session_start();
        $this->view->showHome();
    }
    function showProducts(){
        session_start();
        $products = $this->model->getProducts();
        $categories = $this->categoryModel->getAllCategory();
        $this->view->showProducts($products,$categories);
    }
    function showProductsByCategory($id){
        session_start();
        $products = $this->model->getProductsByCategory($id);
        $category = $this->categoryModel->getAllCategory();
        $this->view->showProducts($products,$category);
    }
    function showProduct($id){
        session_start();
        $product = $this->model->getProductById($id);
        $categories = $this->categoryModel->getAllCategory();
        $this->view->showProduct($product, $categories);
    }
    function showProductWhitInnerJoin($id){
        session_start();
        $product = $this->model->innerJoinProductAndNameCategory($id);        
        $this->view->showProduct($product);
        
    }
    function addProducts(){
        $this->authHelper->checkLoggedIn();
        if(isset($_POST["name"]) && isset($_POST["price"])){
                $name = $_POST['name'];
                $details = $_POST['detail'];
                $price = $_POST['price'];
                $fk = $_POST['category'];
                $this->model->insertProduct($name,$details,$price,$fk);
                header("Location: " .PRODUCTS);
            }
                $this->view->showError('Faltan datos obligatorios');
            }
    function deleteProduct($id){
        $this->authHelper->checkLoggedIn();
        $this->model->removeProduct($id);
        header("Location: " .PRODUCTS);
    }
    function updateProduct($id){
        $this->authHelper->checkLoggedIn();
        if(isset($_POST['name']) || isset($_POST['detail']) || isset($_POST['price']) || isset($_POST['category'])){
                $name = $_POST['name'];
                $details = $_POST['detail'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                $id = $this->model->updateProduct($name,$details,$price,$category,$id);
                header("Location: " .PRODUCTS);
            }
            $this->view->showError('Faltan datos obligatorios');
        }
    function showFormEditProduct($id){
        $this->authHelper->checkLoggedIn();
        $product = $this->model->getProductById($id);
        $categories = $this->categoryModel->getAllCategory();
        $this->view->showFormEditProduct($product,$categories,$id);
    }
    function showCategory($id){
        session_start();
        $category = $this->categoryModel->getCategoryById($id);
        $products = $this->model->getProductsByCategory($id);
        $this->view->showProductsByCategory($products,$category);
    }

}



