<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';
class productsView {
    
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }
    function showHome(){
        $this->smarty->display('templates/home.tpl');
    }
    function showProducts($products,$categories){
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('products',$products);
        $this->smarty->display('templates/productsList.tpl');

        
    }
    function showProductsByCategory($products,$category){
        $this->smarty->assign('products', $products);
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates/category.tpl');
    }
    function showProduct($product){
        var_dump($product);
        $this->smarty->assign('product', $product);
        $this->smarty->display('templates/product.tpl');
    }
    function showFormEditProduct($product,$categories,$id){
    $this->smarty->assign('action',"updateProduct/$id");
    $this->smarty->assign('product', $product);
    $this->smarty->assign('id', $id);
    $this->smarty->assign('categories', $categories);
    $this->smarty->display('templates/formEditProduct.tpl');
    }
    function showError($msg){
        echo '<h1> ERROR!</h1>';
        echo "<h2> $msg </h2>";
    }

}