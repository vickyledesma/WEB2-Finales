<?
class TurnosModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=clinica;charset=utf8', 'root', '');
    }
    function turnos() {  
        $query = $this->db->prepare("SELECT * FROM turnos");
        $query->execute();
        $turno= $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $turno;
    }
    function traerxprofesional($profesional){
        $query = $this->db->prepare("SELECT * FROM turnos WHERE id_profesional_fk = ? ");
        $query->execute([$id_profesional]);
        $profesionales = $query->fetchAll(PDO::FETCH_OBJ); 
        return $profesionales;
    }
    function traerxfecha( $fecha , $profesional){
        $query = $this->db->prepare("SELECT * FROM turnos WHERE fecha = ? AND id_profesional_fk = ? ");
        $query->execute([$fecha, $id_profesional]);
        $profesionales = $query->fetchAll(PDO::FETCH_OBJ); 
        return $profesionales;
    }

    
        
}