<?
class AuthController{
    private $model;
    private $helper;
    private $view;

    public function __construct(){
        $this->model = new authmodel();
        $this->view = new view();
        $this->helper = new Helper();
    }

    public function login(){
       // $this->view->ingresarform();
    }

    public function validar(){
        $email = $_GET['email'];
        $contraseña = $_GET['contraseña'];
        $usuario = $this->model->getuserbyemail($email);

        if($usuario && password_verify($contraseña, $usuario->contraseña))
            $this->helper->login($usuario);
        else {
            //$this->view->ingresarform("El usuario o la contraseña no existe.");
        }

    }

    public function logout(){
        $this->helper->logout();
    }

}