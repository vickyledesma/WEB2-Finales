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



    public function agregarencomienda(){
        $id_tracking = $_POST['id_traking'];
        $peso = $_POST['peso'];
        $destinatario = $_POST['destinatario'];
        $fecha =$_POST['fecha'];


        if (empty($id_tracking)||empty($peso)||empty($destinatario)||empty($fecha)) {
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
    
            $id = $this->encomiendamodel->agregarencomienda($id_tracking,$peso,$destinatario,$comisionistapeso->id_comisionista,$fecha);
            if(!empty($id)){
                $this->view->mostrarerror("Errror");
            }}
    }

    public function cantencomiendasxciudad(){
        $ciudad = $_POST['cuiudad'];
        $fecha = $_POST['fecha'];

        $cantentregadas = $this->encomiendamodel->encomiendasxciudad($ciudad,$fecha);
        if(empty($cantentregadas)){
            $this->view->mostrarerror('no hay entregas para ese dia');
        } else {
           // $this->view->mostrarexito('se encontraron entregas' , $cantentregadas);       
        
        }
    }
 }
 