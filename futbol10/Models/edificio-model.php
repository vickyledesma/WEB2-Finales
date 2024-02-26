<? 
Class ModelE{
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=futbol10;charset=utf8', 'root', '');
    }
    public function getedificio(){
        $query = $this->db->prepare("SELECT * FROM edificio");
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_OBJ);
        return $resultado;
    }

    public function getedificiobypiso($piso){
        $query = $this->db->prepare("SELECT * FROM edificio WHERE pisos = ?");
        $query->execute([$piso]);
        $resultado = $query->fetchAll(PDO::FETCH_OBJ);
        return $resultado;
    }
}