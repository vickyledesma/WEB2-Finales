<?php

class Profesionalapi {
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new profesionalModel();
        $this->view = new view();
    }

    public function obtenerprofesionales($params = null){
        $profesionales = $this->model->profesional();
        if(empty($profesionales)){
            //$this->view->response("error",404);
        } else {
           // $this->view->response($profesionales,200);
        }
        
    }

}