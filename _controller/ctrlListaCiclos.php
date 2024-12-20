<?php
require_once "_model/MainModel.php";

class ctrlListaCiclos {
    private $recurso = "_view/lista_ciclos.html";
    private $datos;

    public function __construct() {
        $model = new MainModel();
        $this->datos = $model->getDataRows("ciclos", ["id", "fecha_inicio", "fecha_fin"]);
    }

    public function renderContent() {
        include $this->recurso;
    }
}
