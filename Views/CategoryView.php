<?php

require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';
class CategoryView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showCategoriesAndForm($categories){
        //include 'templates/header.tpl';
        $this->smarty->assign('categories', $categories);
        //var_dump($categories);
        $this->smarty->display('templates/formCategories.tpl');
    }
    function showUpdateCategory($category){
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates/editCategory.tpl');
    }
    function showCategory($categories,$products){
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('products', $products);
        $this->smarty->display('templates/category.tpl');
    }

    
    function showError($msg){
        echo '<h1> ERROR!</h1>';
        echo "<h2> $msg </h2>";
    }
}