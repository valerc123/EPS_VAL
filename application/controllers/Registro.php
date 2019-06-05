<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller 
{
    function __construct()
    {
        parent:: __construct();

        // invocar el modelo para el login.
        $this->load->model("usuarios_model");
    }

    public function nuevo() {
        //Cargar vista.
      if (count($this->input->post())>0)// si hay datos, hace la inserccion 
       {
            
         $resp = $this->usuarios_model->ingresar();
        
         $data["mensaje"] = $resp;

         $this->load->view('login', $data);
      }
    }
}

