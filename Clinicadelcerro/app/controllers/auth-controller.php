<?php

class authController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new AuthModel();
        //$this->view = new AuthView();
    }
    public function ingresar() {
        $this->view->ingresarform();
    }

    public function validar() {
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        $rol = $_POST['rol'];
        $usuario = $this->model->getUserByEmail($email);

        if ($usuario && password_verify($contraseña, $usuario->contraseña)) {

            session_start();
            $_SESSION['usuario'] =$usuario->id;
            $_SESSION['email'] =$usuario->email;
            $_SESSION['rol'] = $usuario->$rol;
            $_SESSION['IS_LOGGED'] = true;


            //header("Location: " . BASE_URL . 'lista'); 
        } else {
        
           $this->view->ingresarform("El usuario o la contraseña no existe.");
        } 
    }
    
}
   
