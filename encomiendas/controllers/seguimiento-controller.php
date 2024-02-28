<?
class seguimientoController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new encomiendamodel();
        $this->view = new view();
    }

    public function getseguimiento(){
        $id_traking = $_GET['id_traking'];
        if(empty($id_traking)){
           // $this->view->response('dato obligatorio', 404);
        } else {
            $encomienda = $this->model->getencomienda($id_traking);
            if(empty($encomienda)){
              //  $this->view->response('no existe encomienda con ese id' , 404);
            } else {
               // $this->view->response($encomienda, 200);
            }
        }
    }
}