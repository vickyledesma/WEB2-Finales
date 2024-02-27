<?php

class AuthHelper {
    public function __construct() {}


    public function login($usuario) {
        session_start();
        $_SESSION['usuario'] =$usuario->id;
        $_SESSION['email'] =$usuario->email;
        $_SESSION['IS_LOGGED'] = true;
    }
    public function logout() {
        session_start();
        session_destroy();
    }
    public function checkLoggedIn() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
           // header('Location: ' . LOGIN);
            die();
        }       
    } 

}