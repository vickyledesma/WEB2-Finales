<? 
require_once 'models/profesional.model.php';
class ProfesionalController {
    private $model;
    private $view;
    private $helper;

    public function __construct() {
        $this->view = new TurnoView();
        $this->model = new ProfesionalModel();
        $this->helper = new AuthHelper();
    }

    public function agregarprofesional(){
        if ($this->helper->checkLoggedIn()){
            if ($this->helper->checkAdmin()){
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

