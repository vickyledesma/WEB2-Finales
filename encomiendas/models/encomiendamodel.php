<?
Class encomiendamodel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_encomiendas;charset=utf8;' , 'root' , '');
    }    
    function encomiendas() {  
        $query = $this->db->prepare("SELECT * FROM encomienda");
        $query->execute();
        $encomiendas = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $encomiendas;
    }
    
    public function comisionistalibre($id_comisionista, $fecha){
        $query = $this->db->prepare("SELECT * FROM encomienda WHERE id_comisionista_fk = ? AND fecha = ?");
        $query->execute([$id_comisionista, $fecha]);
        $comisionistalibre =  $query->fetchAll(PDO::FETCH_OBJ);
        return $comisionistalibre;
    }

    public function agregarencomienda($peso,$destinatario,$id_comisionista,$id_traking,$fecha){
        $estado = 'matriz_incial';
        $query = $this->db->prepare("INSERT INTO encomienda(id_encomienda, peso, destinatario, id_comisionista_fk, id_traking, estado, fecha) VALUES(?,?,?,?,?,?,?)");
        $query->execute(array($peso,$destinatario,$id_comisionista,$id_traking, $estado,$fecha));
        return $this->db->lastInsertId();
    }
    public function actualizarEstadoEncomienda($idTracking, $nuevoEstado) {
        $query = $this->db->prepare("UPDATE encomiendas SET estado = ? WHERE idTracking = ?");
        $query->execute([$nuevoEstado, $idTracking]);
    }

    public function encomiendasxciudad($ciudad,$fecha){
        $query = $this->db->prepare("SELECT COUNT(*) as cant_entregadas 
        FROM encomiendas e  JOIN comisionistas c 
        ON e.id_comisionista_fK = c.id_comisionista
        WHERE c.ciudad = ? AND e.fecha = ?");
        $query->execute([$ciudad,$fecha]);
        $cantentregadas = $query->fetchAll(PDO::FETCH_OBJ);   
        return $cantentregadas;
    }

    public function getencomienda($id_tracking){
        $query = $this->db->prepare("SELECT * FROM encomienda WHERE id_tracking = ?");
        $query->execute(([$id_tracking]));
        $resultado = $query->fetch(PDO::FETCH_OBJ);
        return $resultado;
    }
}