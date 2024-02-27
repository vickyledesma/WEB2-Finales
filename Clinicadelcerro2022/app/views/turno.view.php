<?php
require_once 'C:\xampp\htdocs\Clinicadelcerro\libs\smarty-4.2.1\libs\Smarty.class.php';
class TurnoView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir('views/templates/');
        $this->smarty->setCompileDir('views/templates_c/');
        $this->smarty->setCacheDir('views/cache/');
        $this->smarty->setConfigDir('views/configs/');
    }

    public function mostrarlista($turnos, $profesionales) {
        // Renderizar la lista de turnos y profesionales usando Smarty
        $this->smarty->assign('turnos', $turnos);
        $this->smarty->assign('profesionales', $profesionales);
        $this->smarty->display('mostrar_lista.tpl');
    }

    public function mostrarFormulario() {
        // Mostrar el formulario para agregar turnos usando Smarty
        $this->smarty->display('agregar_turno.tpl');
    }

    public function error($mensaje) {
        // Mostrar un mensaje de error usando Smarty
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('error.tpl');
    }

    public function ocupado($mensaje) {
        // Mostrar un mensaje de ocupado usando Smarty
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('ocupado.tpl');
    }

    public function success($mensaje) {
        // Mostrar un mensaje de éxito usando Smarty
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('success.tpl');
    }
}
