<?php

class apiTurnosController
{
    private $turnosModel;
    private $profesionalesModel;

        function getTurnos()
        {
            $fecha = $_GET['fecha'];
            $turnos = $this->turnosModel->getTurnosPorFecha($_GET['fecha']);
            if (empty($turnos)) {
                return $this->view->responses("No se encontraron turnos", 404);
            }
            $turnosToReturn = array();
            foreach ($turnos as $turno) {
                $profesional = $this->profesionalesModel->getProfesional($turno->id_profesional_fk);
                if (!empty($profesional)) {
                    $info = array(
                        "id_turno" => $turno->id,
                        "fecha" => $turno->fecha,
                        "dnipaciente" => $turno->dnipaciente,
                        "idprofesional" => $profesional->id,
                        "nombre" => $profesional->nombre,
                        "especialidad" => $profesional->especialidad,                        
                    );
                }
                array_push($turnosToReturn, $info);
            }
            if (empty($turnosToReturn)) {
                return $this->view->responses("No se encontraron turnos", 404);
            }
            return $this->view->responses($turnosToReturn, 200);

        }
}