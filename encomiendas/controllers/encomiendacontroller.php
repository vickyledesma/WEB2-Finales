<?
require_once 'models/comisionistamodel.php';
require_once 'models/encomiendamodel.php';
require_once 'views/encomiendaview.php';
 Class Encomiendacontroller{
    private $encomiendamodel;
    private $comisionistamodel;
    private $view;

    function __construct(){
        $this->comisionistamodel = new comisionistamodel();
        $this->encomiendamodel = new encomiendamodel();
        $this->view = new View();
    }

    public function mostrarlista() {
        $comisionistas = $this->comisionistamodel->comisionistas();
        $encomiendas = $this->encomiendamodel->encomiendas();

        $this->view->mostrarlista($comisionistas,$encomiendas);
    }
    public function GenerarIdTracking() {
        return bin2hex(random_bytes(16)); // Genera un ID de 32 caracteres hexadecimales
    }

    public function agregarencomienda(){
        $peso = $_POST['peso'];
        $destinatario = $_POST['destinatario'];
        $fecha =$_POST['fecha'];


        if (empty($peso)||empty($destinatario)||empty($fecha)) {
            $this->view->mostrarerror('Faltan datos obligatorios');
        } else { 
            $comisionistapeso = $this->comisionistamodel->comisionistaxpeso($peso);
            if(!empty($comisionistapeso)){
                $this->view->mostrarerror("no soporta el peso");
            }
            $comisionistalibre = $this->encomiendamodel->comisionistalibre($comisionistapeso->id_comisionista, $fecha);
            if(!empty($comisionistalibre)){
                $this->view->mostrarerror("no hay libres");
            }
            $id_traking = $this->GenerarIdTracking();
    
            $id = $this->encomiendamodel->agregarencomienda($peso,$destinatario,$comisionistapeso->id_comisionista,$id_traking,$fecha);
            if(!empty($id)){
                $this->view->mostrarerror("Errror");
            }}
    }
    public function actualizarEstadoEncomienda($idTracking, $nuevoEstado) {
        $this->encomiendamodel->actualizarEstadoEncomienda($idTracking, $nuevoEstado);
    }

    public function cantencomiendasxciudad(){
        $ciudad = $_POST['cuiudad'];
        $fecha = $_POST['fecha'];

        $cantentregadas = $this->encomiendamodel->encomiendasxciudad($ciudad,$fecha);
        if(empty($cantentregadas)){
            $this->view->mostrarerror('no hay entregas para ese dia');
        } else {
            $this->view->mostrarexito('se encontraron entregas' , $cantentregadas);       
        
        }
    }
 }
 