<?php
    class Usuarios_model extends CI_model {

        function __construct() {
            //Invocar el helper security
            $this->load->helper('security'); //PONERLO EN TODOS LOS MODELOS
        }

        function listar() {
            $query = $this->db->get("pacientes");
            return $query->result_array();  
        }

        function validar_acceso()
        {
           //obtengo valores de los inputs
            $id = $this->input->post('identificacion');
            $clave = $this->input->post('clave');

            //limpieza de codigo malicioso
            $id = $this->security->xss_clean($id);
            $clave = $this->security->xss_clean($clave);

            //Los nombres de las variables deben coincidir con los nombres de los campos.
            $vector = array('identificacion' => $id, 'clave' => md5($clave) );

            //busqueda en la tabla que exista los valores de $vector
            $query = $this->db->get_where('pacientes', $vector);

            return $query->result_array();
        }
    }
?>