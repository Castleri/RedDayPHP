<?php
ini_set("display_errors", E_ALL);

require_once "config/global.php";

$querystring = isset($_GET["querystring"]) ? $_GET["querystring"] : RUTA_DEFAULT;
if (!str_ends_with($querystring, "/")) {
    $querystring = $querystring . "/"; // le falta diagonal
}
$peticion = explode("/", $querystring);

$controlador = count($peticion) > 0 ? $peticion[0] : "";
$accion = count($peticion) > 1 ? $peticion[1] : "";
$id = count($peticion) > 2 ? $peticion[2] : "";

switch ($controlador) {
    case "ciclos":
        if ($accion == "" || is_null($accion)) {
            require_once "_controller/ctrlListaCiclos.php";
            $ctrl = new ctrlListaCiclos();
        } else if ($accion == "agregar") {
            require_once "_controller/ctrlMtoCiclos.php";
            $ctrl = new ctrlMtoCiclos();
        } else if ($accion == "consultar") {
            require_once "_controller/ctrlConsultaCiclos.php";
            $ctrl = new ctrlConsultaCiclos();
        }
        break;
    default:
        echo "<h1>404</h1><p>Controlador inválido</p>";
        die();
        break;
}

include "_view/master.html";
