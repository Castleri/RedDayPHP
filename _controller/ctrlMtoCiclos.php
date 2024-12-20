<?php
require_once "_model/MainModel.php";

class ctrlMtoCiclos {
    private $recurso = "_view/formulario_ciclo.html";
    private $JS = "js/ctrlmtoproducto.js";

    public function renderContent() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $model = new MainModel();
            $fecha_inicio = $_POST["fecha_inicio"];
            $fecha_fin = $_POST["fecha_fin"];
            $model->insertCiclo($fecha_inicio, $fecha_fin);
            header("Location: /ciclos/");
        }
        include $this->recurso;
    }
    public function renderJS() {
		include self::JS;
	}
}
