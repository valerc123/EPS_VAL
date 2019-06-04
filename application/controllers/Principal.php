<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller 
{
    function __construct() {

        parent:: __construct();

        $this->load->model("usuarios_model");

        if (!$this->session->userdata('identificacion')) {
            redirect('login');
        }
    }

    public function index() {
        $data["nombre"]   = $this->session->userdata('nombre'); 
        $data["apellidos"] = $this->session->userdata('apellidos');
        
        $data["titulo"]   = "Principal";

      
        
        $this->load->view('index', $data);
    }
}