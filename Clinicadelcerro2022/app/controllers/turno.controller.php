<?
require_once 'Clinicadelcerro/models/turno.model.php';
require_once 'Clinicadelcerro/views/turno.view.php';


class TurnoController {
    private $model;
    private $view;
    private $modelP;

    public function __construct() {
        $this->model = new TurnosModel();
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
        $id_profesional_fk = $_POST['id_profesional_fk'];

        $profesional= $this->modelP->traerProfesional($id_profesional_fk); 
        if(empty($profesional)){
            $this->view->error('no existe');
        }

        $fechaturno = $this->model->traerxfecha($fecha, $profesional->id);

        if(!empty($fechaturno)){
            $this->view->ocupado('esta ocupado');
        } else {
            $id = $this->model->agregarturno($fecha, $profesional->id, $dnipaciente);
        }
    }
}
    
