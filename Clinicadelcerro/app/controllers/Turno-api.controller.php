<?php

class Turnoapi {
    private $model;
    private $modelP;
    private $view;

    function __construct()
    {
        $this->model = new TurnosModel();
        $this->modelP = new ProfesionalModel();
        $this->view = new view();
    }

    public function listarturnos(){
        $lista = [];
        $turnos = $this->model->turnos();
        if(empty($turnos)){
            //$this->view->response(404,"error");
        } else {
            foreach($turnos as $turno){
                $profesional = $this->modelP->traerprofesional($turno->id_profesional_fk);
                $info = array (
                    'id' => $turno->id_turno,
                    'fecha' => $turno->fecha,
                    'dnipaciente' => $turno->dnipaciente,
                    'profesional' => $profesional->id,
                    'nombre' => $profesional->nombre,
                    'especialidad' => $profesional->especialidad,
                );
            }
        }
        array_push($lista, $info);
        if(!empty($lista)){
           // return $this->view->response($lista,200);
        } else {
           // $this->view->response(404,'error');
        }
    }
}
