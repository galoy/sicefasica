<?php

class procesosController extends Controller {

    public function __construct() {
        parent::__construct("sis","inicio");
    }

    public function index() {
        $this->_view->titulo = 'Pagina de Incio';
        $this->_view->renderizar('inicio', 'sis');
    }
}
