<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pacientes extends CI_Controller {

    function __construct() {
        parent:: __construct(); 

        $this->load->model("usuarios_model");

        if (!$this->session->userdata('identificacion')) 
        {
            redirect('login');
        }
    }   

    public function index() {

        $data["nombre"]   = $this->session->userdata('nombre'); 
        $data["apellidos"] = $this->session->userdata('apellidos'); 

        //listar pacientes
        //almaceno los datos que me retornan listar() del modelo 
        $listar = $this->usuarios_model->listar();

        $data['listado']  = $listar;
        $data['titulo']   = "Listado de pacientes";

        //contadores de usuarios
      //   $resp = $this->usuarios_model->totalPacientes();
      //   $data["total_pacientes"] = $resp;

      //   $respMedicos = $this->usuarios_model->totalMedicos();
      //   $data["total_medicos"] = $respMedicos;

        $this->load->view('pacientes', $data);
    }

}
