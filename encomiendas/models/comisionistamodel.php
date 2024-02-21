<?
Class comisionistamodel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_encomiendas;charset=utf8;' , 'root' , '');
    }      

    function comisionistas() {  
        $query = $this->db->prepare("SELECT * FROM comisionista");
        $query->execute();
        $comisionistas = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $comisionistas;
    }
    function comisionistaxpeso($peso){
        $query = $this->db->prepare("SELECT * FROM comisionista WHERE capacidad > ? ");
        $query->execute([$peso]);
        $comisionistaxpeso = $query->fetch(PDO::FETCH_OBJ);
        return $comisionistaxpeso;
    }
}