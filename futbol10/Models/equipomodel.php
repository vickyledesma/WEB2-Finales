<? 
Class equipoModel{
    
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=fixture;charset=utf8', 'root', '');
    }
    public function traerequipo($id){
        $query = $this->db->prepare("SELECT FROM equipo WHERE id = ? ");
        $query->execute([$id]);
        $resultado = $query->fetch(PDO::FETCH_OBJ);
        return $resultado;
    }

}