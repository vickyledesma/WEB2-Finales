<?
require_once 'Clinicadelcerro/models/turno.model.php';
require_once 'Clinicadelcerro/views/turno.view.php';


class TurnoController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new TurnoModel();
        $this->view = new TurnoView();
        $this->modelP = new ProfesionalModel();
    }

    public function turnos(){
        $turnos = $this->model->turnos();
        $profesionales = $this->modelP->profesional();

        $this->view->mostrarlista($turnos, $profesionales);
    }
    public function agregarturno(){
        $fecha = $_POST['fecha'];
        $dnipaciente = $_POST['dnipaciente'];

        $profesional = $this->modelP->traerProfesional($dnipaciente); 
        if(empty($profesional)){
            $this->view->error();
        }

        $fechaturno = $this->model->traerxfecha($fecha, $profesional->id);

        if(!empty($fechaturno)){
            $this->view->ocupado();
        } else {
            $id = $this->model->agregarturno($fecha, $profesional->id, $dnipaciente);
        }
    }
}
    
