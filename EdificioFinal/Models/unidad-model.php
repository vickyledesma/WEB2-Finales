<? 
Class ModelU{
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=futbol10;charset=utf8', 'root', '');
    }

    public function unidad($id_unidad){
        $query = $this->db->prepare("SELECT * FROM unidad WHERE id_unidad = ?");
        $query->execute([$id_unidad]);
        $resultado = $query->fetch(PDO::FETCH_OBJ);
        return $resultado;
    }
}