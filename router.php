<?php
require_once 'Controllers/productsController.php';
require_once 'Controllers/CategoryController.php';
require_once 'Controllers/authController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
define('LOGIN', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/login');
define('PRODUCTS', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/products');
// leo el parametro accion
$action = 'home'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];  // action => about/juan
}

$params = explode('/', $action); // genera un arreglo
    
switch ($params[0]) {
    case 'home':
        $controller = new productsController();
        $controller->showHome();
        break;
    case 'products':
        $controller = new productsController();
        $controller->showProducts();
        break;
    case 'product':
        $controller = new productsController();
        $id = $params[1];
        $controller->showProduct($id);
        break;
    case 'addProducts':
        $controller = new productsController();
        $controller->addProducts();
        break;
    case 'deleteProduct':
        $controller= new productsController();
        $id = $params[1];
        $controller->deleteProduct($id);
        break;
    case 'updateProduct':
        $controller = new productsController();
        $id = $params[1];
        $controller->updateProduct($id);
        break;
    case 'showAddProcuct':
        $controller = new productsController();
        $controller->showAddProcuct;
        break;
    case 'showEditProduct':
        $controller = new productsController();
        $id = $params[1];
        $controller->showFormEditProduct($id);
        break;
    case 'category':
        $controller = new productsController();
        $id = $params[1];
        $controller->showProductWhitInnerJoin($id);
        break;  
    case 'addCategory':
        $controller=new CategoryController();
        $controller->addCategory();
        break;
    case 'deleteCategory':
        $controller = new CategoryController();
        $id = $params[1];
        $controller->deleteCategory($id);
        break;
    case 'updateCategory':
        $controller=new CategoryController();
        $id = $params[1];
        $controller->updateCategory($id);
        break;
    case 'showUpdateCategory':
        $controller=new CategoryController();
        $id = $params[1];
        $controller->showUpdateCategory($id);
        break;
    case 'showCategory':
        $id = $params[1];
        $controller = new productsController();
        $controller->showCategory($id);
        break;
    case 'categories':
        $controller= new CategoryController();
        $controller->showCategoriesAndForm();
        break;
    case 'login':
        $controller= new authController();
        $controller->showLogin();
        break;
    case 'verifyUser':
        $controller = new authController();
        $controller->verifyUser();
        break;
    case 'logout':
        $controller= new authController();
        $controller->logout();
        break;

        /*case 'categoryInnerJoin':
        $controller->new 
        $controller = new CategoryController();
        $controller-> VER ESTO                  */
    default:
        echo "404 not found";
        # code...
        break;
}