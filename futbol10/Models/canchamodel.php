<? 
Class CanchaModel{
    
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=futbol10;charset=utf8', 'root', '');
    }

    public function traercancha($id){
        $query = $this->db->prepare("SELECT FROM cancha WHERE id = ? ");
        $query->execute([$id]);
        $resultado = $query->fetch(PDO::FETCH_OBJ);
        return $resultado;
    }
}