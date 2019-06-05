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

        function ingresar()
        {
           $identificacion = $this->input->post('identificacion');
           $clave      = $this->input->post('clave');
           $nombre     = $this->input->post('nombre');
           $apellidos   = $this->input->post('apellidos');
           $telefono   = $this->input->post('telefono');
           $email      = $this->input->post('email');
           $direccion  = $this->input->post('direccion');
           $ciudad     = $this->input->post('ciudad');

           $identificacion = $this->security->xss_clean($identificacion);
           $clave      = $this->security->xss_clean($clave);
           $nombre     = $this->security->xss_clean($nombre);
           $apellidos   = $this->security->xss_clean($apellidos);
           $telefono   = $this->security->xss_clean($telefono);
           $email      = $this->security->xss_clean($email);
           $direccion  = $this->security->xss_clean($direccion);
           $ciudad     = $this->security->xss_clean($ciudad);

           $query = $this->db->get_where('pacientes', array('identificacion'  => $identificacion));
           $result = $query->result_array();

           if(count($result) > 0)
           {
               $mensaje = 'Ya se encuentra registrado';
           }else{
            //guardo datos con el vector
                $vector = array(
                    "identificacion" => $identificacion,
                    "clave"      => md5($clave),
                    "nombre"     => $nombre,
                    "apellidos"   => $apellidos,
                    "telefono"   => $telefono,
                    "email"      => $email,
                    "direccion"  => $direccion,
                    "ciudad"     => $ciudad
                );

                //insertar datos a la bd en la tabla pacientes
                $this->db->insert("pacientes", $vector);
                $mensaje = "Se registró con éxito";
           }
           return $mensaje;
        }
    }
?>