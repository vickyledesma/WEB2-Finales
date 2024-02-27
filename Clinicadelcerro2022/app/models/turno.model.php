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
    function traerxfecha($fecha , $id_profesional_fk){
        $query = $this->db->prepare("SELECT * FROM turnos WHERE fecha = ? AND id_profesional_fk = ? ");
        $query->execute([$fecha, $id_profesional_fk]);
        $profesionales = $query->fetchAll(PDO::FETCH_OBJ); 
        return $profesionales;
    }

    public function agregarturno($fecha, $id_profesional_fk, $dnipaciente){
        $query = $this->db->prepare("INSERT INTO turnos (fecha,id_profesional_fk,dnipaciente) VALUES(?,?,?)");
        $query->execute([$fecha, $id_profesional_fk, $dnipaciente]);
        return $this->db->lastInsertId();
    }

    public function turnosbyfecha($fecha){
        $query = $this->db->prepare("SELECT * FROM turno t JOIN profesional p
                                    ON t.id_profesional_fk = p.id_profesional WHERE t.fecha = ?");
        $query->execute([$fecha]);
        $resultado = $query->fetchAll(PDO::FETCH_OBJ);
        return $resultado;
    }

}