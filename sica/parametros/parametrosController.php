<?php

class parametrosController extends Controller {

    public function __construct() {
        parent::__construct("sica", "parametros");
    }

    public function index() {
        $this->_view->titulo = 'Parametros Generales';
        $data = $this->loadModel('sica', 'parametros');
        $this->_view->turnos = $data->listturno();
        $this->_view->renderizar('inicio', 'sica');
    }

    public function viewtrimestre($argum = false) {

        $this->_view->titulo = 'Turnos Emprecefa';
        $this->_view->titulopanel = 'Agregar tipo de turnos';
        if ($argum != "") {
            $data = $this->loadModel('sica', 'parametros');
            $this->_view->unturno = $data->oneturno($argum);
            $this->_view->titulopanel = 'Modificar tipo de turno';
        } else {
            $this->_view->unturno = array(5);
        }
        $this->_view->renderizar('viewturno', 'sica');
    }

    public function savetrimestre() {
        if ($_POST) {
            $id = $_POST['txtId'];
        } else {
            $id = '';
        }
        $dbtrim = $this->loadModel('sica', 'parametros');
        $count = $dbtrim->editturno();
        if ($count > 0) {
            echo "<script>alert('Registro Guardado')</script>";
            $this->index();
        } else {
            echo "<script>alert('El Registro NO fue Guardado, Intente de Nuevo')</script>";
            $this->viewtrimestre($id);
        }
    }

    public function deltrimestre($argum = false) {
        if ($argum == false) {
            echo "<script>alert('No hay registro a Eliminar')</script>";
            $this->index();
        } else {
            $dbtrim = $this->loadModel('sica', 'parametros');
            $count = $dbtrim->deletetipoturno($argum);
            if ($count > 0) {
                echo "<script>alert('Registro Eliminado')</script>";
            } else {
                echo "<script>alert('El Registro NO fue Eliminado, Intente de Nuevo')</script>";
            }
            $this->index();
        }
    }

}
