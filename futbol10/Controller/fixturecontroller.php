<?
Class fixturecontroller {
    private $fixtureModel;
    private $equipoModel;
    private $canchaModel;

    function __construct()
    {
        $this->fixtureModel = new fixtureModel();
        $this->canchaModel = new canchaModel();
        $this->equipoModel = new equipoModel();
    }

    public function agregoturno(){
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $golesL = $_POST['golesL'];
        $golesV = $_POST['golesV'];
        $jugado = $_POST['jugado'];
        $equipoL = $_POST['equipoL'];
        $equipoV = $_POST['equipoV'];
        $canchaid = $_POST['canchaid'];
         

        if(empty($fecha)||empty($hora)||empty($hora)||empty( $golesL)||empty( $golesV)||empty($equipoV)||empty($jugado)||empty($ $equipoL)||empty($equipoV)||empty($ $equipoL)||empty($canchaid)){
            //this->view->error;
        }
        if(!($hora<10 && $hora <23)){
            //$this->view->error;
        }
        $cancha = $this->canchaModel->traercancha($canchaid);
        $equipoL = $this->equipoModel->traerequipo($equipoL);
        $equipoV = $this->equipoModel->traerequipo($equipoV);
        if(empty($cancha)||empty($equipoL)||empty($equipoV)){
            //this->view->error;
        }
        $fechalibre = $this->fixtureModel->chequearfecha($hora,$fecha,$equipoL->id,$equipoV->id);
        $horalibre = $this->fixtureModel->chequearhora($hora, $cancha->id);
        if(empty($fechalibre) && empty($horalibre)) {
            $id = $this->fixtureModel->agregarturno($fecha,$hora,$golesL,$golesV,$jugado,$canchaid,$equipoV,$equipoL);
        } else {
            //$this->view->error  
        }

       
    }

}