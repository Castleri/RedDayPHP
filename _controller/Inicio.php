<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function index() {
        // Cargar la vista principal
        $this->load->view('inicio_view');
    }
}
