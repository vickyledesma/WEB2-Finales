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
        $fecha = $_GET ['fecha'];
        $turnos = $this->model->turnosbyfecha($fecha);
        if(empty($turnos)){
           // return $this->view->response($lista,200);
        } else {
           // $this->view->response(404,'error');
        }
    }
}
