<?
require_once 'Models/pago-model.php';
require_once 'Models/unidad-model.php';
Class PagoController{
    private $model;
    private $view;
    private $helper;
    private $modelU;

    function __construct(){
        $this->model = new ModelP();
        $this->helper = new AuthHelper();
       // $this->view = new PagoView();
        $this->modelU = new ModelU();
    }

    public function agregarpago(){
        if($this->helper->checkLoggedIn()){
            $id_unidad = $_GET['id_unidad'];
            $fecha = $_GET['fecha'];
            $monto = $_GET['monto'];
            $comprobante = $_GET['comprobante'];
    
            if(empty($id_unidad)||empty($fecha)||empty($monto)||empty($comprobante)){
                $this->view->error('faltan datos importantes');
            } else {
                $unidad = $this->modelU->unidad($id_unidad);
                if(empty($unidad)){
                    $this->view->error('no existe');
                } else {
                    $pago = $this->model->chequearpago($id_unidad, $fecha);
                    if(empty($pago)){
                        $id= $this->model->agregarpago($id_unidad,$fecha,$monto,$comprobante);
                        $this->view->exito('se agrego el pago');
                    }
                    else {
                        $this->view->error('ya hubo un pago ese mes');
                    }
                }
            }
        }
    }
}