<?php
class MainModel {
    private $db;

    public function __construct() {
        $this->db = new PDO("CicloMenstrual", "root", "AAlleexxyyaaeell22770022");
    }

    public function getDataRows($tabla, $columnas) {
        $cols = implode(",", $columnas);
        $stmt = $this->db->prepare("SELECT $cols FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertCiclo($fecha_inicio, $fecha_fin) {
        $stmt = $this->db->prepare("INSERT INTO ciclos (fecha_inicio, fecha_fin) VALUES (?, ?)");
        return $stmt->execute([$fecha_inicio, $fecha_fin]);
    }

    public function getCicloById($id) {
        $stmt = $this->db->prepare("SELECT * FROM ciclos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
