<? 
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';
Class view{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }
    function mostrarlista($comisionistas, $encomiendas) {
        $this->smarty->assign('comisionistas',$comisionistas);
        $this->smarty->assign('encomiendas', $encomiendas);
        $this->smarty->display('lista.tpl');
    }
    public function mostrarFormulario() {
        // Mostrar el formulario para agregar turnos usando Smarty
        $this->smarty->display('formulario.tpl');
    }
  
    function mostrarerror($msg) {
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('error.tpl');
    }
}