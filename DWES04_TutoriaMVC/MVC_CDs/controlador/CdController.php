<?php
class CdController {
    private $view;
	
    function __construct() {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
 
    public function listar() {
        //Incluye el modelo que corresponde
        require 'modelo/CdModelo.php';
        //Creamos una instancia de nuestro "modelo"
        $items = new CdModelo();
        //Le pedimos al modelo todos los items
        $listado = $items->devuelveTodosCds();
        $parametrosParaVista = array();
        //Pasamos a la vista toda la informaci�n que se desea representar
        $parametrosParaVista['listado'] = $listado;
        //Finalmente presentamos nuestra plantilla
        $this->view->show("listado.php", $parametrosParaVista);
    }
 
    public function agregar() {
        echo 'Aquí incluiremos nuestro formulario para insertar items';
    }
	
    public function eliminar() {
        $idCd = $_REQUEST['id'];
        require 'modelo/CdModelo.php';
        $modelo = new CdModelo();
        $cabecera = generaCabecera($usuario);
        $pie = generaPie(array('alta', 'listado'));
        $contenido = generoContenido();
        $platillaPagina->show(array('estilo.css', 'fondos.css'), 
                              array(),$cabecera,$contenido,$pie);
        echo 'ELIMINAR CD ' . $idCd;
    }
	
    public function modificar() {
      // recuperar el Cd del modelo
      // llamar a la vista
    }
}
?>