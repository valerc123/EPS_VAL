<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    function __construct()
    {
        parent:: __construct();

        // invocar el modelo para el login.
        $this->load->model("usuarios_model");
    }

    public function index() {
        //Cargar vista.
        $data["tituloLogin"] = "Salud total";

        $this->load->view('login', $data);
    }

    function acceso()
    {
       //traigo la funcion del modelo que retorna datos o nada
       $data = $this->usuarios_model->validar_acceso();

       if(sizeof($data) > 0)
       {
              //Cargar datos
              $data_session = array(
               "identificacion"=> $data[0]["identificacion"],
               "nombre"        => $data[0]["nombre"],
               "apellidos"      => $data[0]["apellidos"],
               "telefono"      => $data[0]["telefono"],
               "email"         => $data[0]["email"],
               "direccion"     => $data[0]["direccion"],
               "ciudad"        => $data[0]["ciudad"]
            );
            
            $this->session->set_userdata($data_session);
            redirect('Principal'); //controlador
       }else{
          $data["validacion"] = 'No se encontró registro';
          $this->load->view('login', $data);
       }


    }

}

