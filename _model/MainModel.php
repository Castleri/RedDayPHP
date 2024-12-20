<?php
class MainModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host='. DB_HOST .';dbname='. DB_BASE . ';charset=utf8', DB_USR, DB_PASS);
    }

    public function getDataRows($tabla, $columnas) {
        $cols = implode(",", $columnas);
        $stmt = $this->db->prepare("SELECT $cols FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertCiclo($fecha_inicio, $fecha_fin) {
        $stmt = $this->db->prepare("INSERT INTO ciclos (fecha_inicio, fecha_fin, Duracion) VALUES (?, ?, ?)");
        $duracion = (strtotime($fecha_fin) - strtotime($fecha_inicio)) / 86400; 
        echo $duracion;
        return $stmt->execute([$fecha_inicio, $fecha_fin, $duracion]);
    }

    public function getCicloById($id) {
        $stmt = $this->db->prepare("SELECT * FROM ciclos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
