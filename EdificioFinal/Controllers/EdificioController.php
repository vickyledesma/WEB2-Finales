<?
Class Edificiocontroller{
    private $modelE;
    private $viewE;
    function __construct()
    {
        $this->modelE = new ModelE();
        //$this->viewE = new viewE();
    }

    public function calculargastos() {
        $total = 0;
        $resultados = array();
    
        if(isset($_GET['piso'])){ 
            $edificios = $this->modelE->getedificiobypiso($_GET['piso']);
            foreach ($edificios as $edificio) {
                $unidades = $edificio->unidad;
                foreach ($unidades as $uni){
                    $pagos = $uni->pago;
                    foreach($pagos as $pago){
                        $total += $pago->monto;
                    }
                }
                $resultados[] = [
                    'id' => $edificio->id,
                    'nombre' => $edificio->nombre,
                    'direccion' => $edificio->direccion,
                    'pisos' => $edificio->pisos,
                    'recaudacion' => $total
                ];
            }
        } else {
            $edificios = $this->modelE->getedificio();
            foreach ($edificios as $edificio) {
                $unidades = $edificio->unidades;
                foreach ($unidades as $unidad) {
                    $pagos = $unidad->pagos;
                    foreach ($pagos as $pago) {
                        $total += $pago->monto;
                    }
                }
                $resultados[] = [
                    'id' => $edificio->id,
                    'nombre' => $edificio->nombre,
                    'direccion' => $edificio->direccion,
                    'pisos' => $edificio->pisos,
                    'recaudacion' => $total
                ];
            }
        }
    
        //$this->viewE->response($resultados, 200);
    }
}