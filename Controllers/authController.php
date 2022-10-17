<?php

include_once 'Models/authModel.php';
include_once 'Views/authView.php';
class authController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new authModel();
        $this->view = new authView();
    }
public function showLogin(){
    $this->view->showLogin();
}

public function verifyUser(){
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->model->getAdmin($email);

        if($user&&password_verify($password, $user->password)){
            session_start();
            $_SESSION["ID_USER"] = $user->ID_Users;
            $_SESSION["EMAIL"] = $user->email;
            $_SESSION["IS_LOGGED"] = true;
            $this->view->showHome();
        }else{
            $this->view->showLogin('Acceso denegado');
        }
    }
}

public function logout(){
    session_start();
    session_destroy();
    $this->view->showLogin("Te deslogeaste!!");
}

}