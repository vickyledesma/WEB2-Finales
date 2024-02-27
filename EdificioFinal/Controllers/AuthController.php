<?php

class AuthController {
    private $model;
    private $helper;
    private $view;

    public function __construct() {
        $this->model = new AuthModel();
        //$this->view = new AuthView();
        $this->helper = new AuthHelper();
    }
    public function ingresar() {
        $this->view->ingresarform();
    }

    public function validar() {
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        $usuario = $this->model->getUserByEmail($email);

        if ($usuario && password_verify($contraseña, $usuario->contraseña)) {
            $this->helper->login($usuario);
        } else {
           $this->view->ingresarform("El usuario o la contraseña no existe.");
        } 
    }
    public function logout() {
        $this->helper->logout();
    }

    
}
   
