<? 
Class fixtureModel{
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=futbol10;charset=utf8', 'root', '');
    }

    public function chequearfecha($hora,$fecha,$idV,$idL){
        $query = $this->db->prepare("SELECT FROM fixture WHERE hora = ? AND fecha = ? AND (id_equipo_visitante = ? OR id_equipo_local = ?");
        $query->execute([$fecha,$hora,$idV,$idL]);
        $resultado = $query->fetchall(pdo::FETCH_OBJ);
        return $resultado;
    }

    public function chequearhora($hora, $id){
        $query = $this->db->prepare("SELECT FROM fixture WHERE hora = ? AND id_cancha = ?");
        $query->execute([$hora,$id]);
        $resultado = $query->fetch(PDO::FETCH_OBJ);
        return $resultado;

    }

    public function agregarturno($fecha,$hora,$golesL,$golesV,$jugado,$canchaid,$equipoV,$equipoL){
        $query = $this->db->prepare("INSERT INTO fixture (fecha,hora,golesL,golesV,jugado,canchaid,equipoV,equipoL) VALUES (?,?,?,?,?,?,?,?)");
        $query->execute([$fecha,$hora,$golesL,$golesV,$jugado,$canchaid,$equipoV,$equipoL]);
        return $this->db->lastInsertId();
    }
     
    public function getpartido($fecha){
        $query = $this->db->prepare("SELECT FROM Fixture 
                                    WHERE jugado = true AND fecha = ?");
        $query->execute([$fecha]);
        $resultado = $query->fetchAll(PDO::FETCH_OBJ);
        return $resultado;
    }
    public function cantPartidosJugados($id){
        $query = $this->db->prepare("SELECT COUNT(*) as cantidad jugados
                                    FROM fixture
                                    WHERE equipo_local_id = ? OR equipo_visitante_id = ?
                                    AND jugado = true");
         $query->execute([$id, $id]);
         $resultado = $query->fetchAll(PDO::FETCH_OBJ);
         return $resultado;
    }
}