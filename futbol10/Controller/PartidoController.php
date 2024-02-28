<?
class PartidoController{
    private $modelE;
    private $model;
    private $view;

     function __construct(){
        $this->model = new fixtureModel();
        $this->modelE = new equipoModel();
        $this->view = new View();
     }

     public function listapartidos() {
        $fecha = $_GET['fecha'];
        if (!isset($fecha)) {
            //$this->view->response('No se ingresó fecha', 404);
        } else {
            $partidos = $this->model->getpartido($fecha);
            if (empty($partidos)) {
                //$this->view->response('No hay partidos en esa fecha');
            } else {
                $resultado = array();
                foreach ($partidos as $partido) {
                    $equipolocal = $this->modelE->traerequipo($partido->id_local);
                    $cantPartidosLocal = $this->model->cantPartidosJugados($equipolocal->id);
    
                    $equipovisitante = $this->modelE->traerequipo($partido->id_visitante);
                    $cantPartidosVisitante = $this->model->cantPartidosJugados($equipovisitante->id);
    
                    $resultado[] = [
                        'id' => $partido->id,
                        'fecha' => $partido->fecha,
                        'equipolocal' => $equipolocal,
                        'cantPartidosLocal' => $cantPartidosLocal,
                        'equipovisitante' => $equipovisitante,
                        'cantPartidosVisitante' => $cantPartidosVisitante,
                    ];
                }
                //$this->view->response($resultado, 200);
            }
        }
    }
}
    