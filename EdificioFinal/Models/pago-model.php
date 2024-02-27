<? 
Class ModelP{
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=futbol10;charset=utf8', 'root', '');
    }

    public function chequearpago($id_unidad,$fecha){
        $query=$this->db->prepare("SELECT * FROM pago WHERE id_unidad = ? AND 
                                    MONTH(fecha) = ? AND YEAR(fecha) = ?");
        $query->execute([$id_unidad,$fecha]);
        $resultado = $query->fetch(PDO::FETCH_OBJ);
        return $resultado;
    }

    public function agregarpago($id_unidad,$fecha,$monto,$comprobante){
        $query=$this->db->prepare("INSERT INTO pago (id_unidad,fecha,monto,comprobante) VALUES (?,?,?,?)");
        $query->execute([$id_unidad,$fecha,$monto,$comprobante]);
        return $this->db->lastInsertId();
    }
}