<?php
include_once 'Models/CategoryModel.php';
include_once 'Views/CategoryView.php';
include_once 'Models/productsModel.php';

class CategoryController{

    private $model;
    private $productsModel;
    private $view;

    function __construct(){
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
        $this->productsModel = new productsModel();
    }


    function addCategory(){
        $this->checkLoggedIn();
        $name = $_POST['name'];
        if(empty($name)){
            $this->view->showError('faltan datos obligatorios');
        }
        $id = $this->model->insertCategory($name);
        header("Location: " .BASE_URL . 'categories');
    }

    function deleteCategory($id){
        $this->checkLoggedIn();
        $this->model->deleteCategory($id);
        header("Location: " .BASE_URL);
    }

    function updateCategory($id){
        $this->checkLoggedIn();
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $id = $this->model->updateCategory($name);
            //header("Location: " .BASE_URL . 'categories');
        }

    }
    function showUpdateCategory($id){
        $this->checkLoggedIn();
        $category = $this->model->getCategoryById($id);
        $this->view->showUpdateCategory($category);


    }
    /*function showCategory($id){
        session_start();
        $category = $this->model->getAllProductsByCategoryId($id);
        $products = $this->productsModel->getProductsByCategory($id);
        $this->view->showCategory($category,$products);
    }*/
    
    function showCategoriesAndForm(){
        session_start();
        $categories = $this->model->getAllCategory();
        $this->view->showCategoriesAndForm($categories);
    }
    function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION["email"])){
            header("Location: " . LOGIN);
        }
    }
    
}

