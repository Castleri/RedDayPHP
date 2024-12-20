<?php
require_once "_model/MainModel.php";

class ctrlConsultaCiclos {
    private $recurso = "_view/consulta_ciclo.html";
    private $ciclo;

    public function __construct() {
        $model = new MainModel();
        $querystring = isset($_GET["querystring"]) ? $_GET["querystring"] : "";
        if (!str_ends_with($querystring, "/")) {
            $querystring = $querystring . "/"; // le falta diagonal
        }
        $peticion = explode("/", $querystring);
        $id = count($peticion) > 2 ? $peticion[2] : "";

        if (isset($id) && is_numeric($id)) {
            $this->ciclo = $model->getCicloById($id);
        } else {
            $this->ciclo = null;
        }
    }

    public function renderContent() {
        include $this->recurso;
    }

    public function renderJS() {
       
    }
}