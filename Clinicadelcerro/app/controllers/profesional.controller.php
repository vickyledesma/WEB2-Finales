<? 
class ProfesionalController {
    private $model;
    private $view;
    private $helper;

    public function __construct() {
        $this->view = new TurnoView();
        $this->model = new ProfesionalModel();
    }

    public function agregarprofesional(){
        if (isset($_SESSION['IS_LOGGED']) && $_SESSION['IS_LOGGED'] == true){
            if (isset($_SESSION['rol']) == 'admin'){
                $nombre = $_GET['nombre'];
                $especialidad = $_GET['especialidad'];
                if(empty($nombre)||empty($especialidad)){
                    $this->view->error('error');
                } else {
                    $id = $this->model->agregarprofesional($nombre,$especialidad);
                }
        }

    } 
}
}

