<?
class ProfesionalModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=clinica;charset=utf8', 'root', '');
    }
    function profesional() {  
        $query = $this->db->prepare("SELECT * FROM profesional");
        $query->execute();
        $profesionales = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $profesionales;
    }
    
    function traerprofesional($profesional){
        $query = $this->db->prepare("SELECT * FROM profesional");
        $query->execute();
        $profesionales = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $profesionales;
    }
}