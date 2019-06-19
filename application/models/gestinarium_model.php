<?php
class Gestinarium_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function validate_login($username, $pwd) {
                $query=$this->db->get_where('empleado', array('username' => $username));
                $query=$this->db->get_where('empleado', array('password' => $pwd));
                $result=$query->row_array();

                return $result;
        }

        public function get_pruebas($id_consulta = null) {

                $result = array();
                $result['pruebas_realizadas'] = array();
                $query=$this->db->get('prueba_medica');
                $data = $query->result_array();
                foreach ($data as $value) {
                        $result['pruebas_medicas'][$value['id']] = $value['nombre'];
                }

                if($id_consulta){
                        // $this->db->select('consulta_pruebamedica.fk_prueba_medica as "id"');
                        // $this->db->select('prueba_medica.nombre');
                        // $this->db->from('consulta_pruebamedica');
                        // $this->db->where('consulta_pruebamedica.fk_prueba_medica',$id_consulta);
                        // $this->db->join('prueba_medica', 'consulta_pruebamedica.fk_prueba_medica = prueba_medica.id');
                        $this->db->select('fk_prueba_medica as "id"');
                        $query=$this->db->get_where('consulta_pruebamedica',array('fk_consulta' => $id_consulta));
                        $data = $query->result_array();
                        foreach ($data as $value) {
                                array_push($result['pruebas_realizadas'], $value['id']);
                        }
                }
                return $result;
        }

        public function get_mascotas($id = null, $id_cliente = null) {

                $result = array();

                $this->db->select('mascota.*');
                $this->db->select('especie.nombre as "especie"');
                $this->db->select('genero.nombre as "genero"');
                $this->db->select('concat(cliente.nombre,\' \', cliente.apellidos) as "propietario"');
                $this->db->from('mascota');
                if($id) {
                        $this->db->where('mascota.id', $id);
                } else if($id_cliente) {
                        $this->db->where('mascota.fk_cliente', $id_cliente);
                }
                $this->db->join('especie','mascota.fk_especie = especie.id');
                $this->db->join('genero','mascota.fk_genero = genero.id');
                $this->db->join('cliente','mascota.fk_cliente = cliente.id');

                $query=$this->db->get();

                if($id) {
                        $result=$query->row_array();
                } else {
                        $result = $query->result_array();
                }
                

                return $result;
        }

        public function set_mascota($data) {
                if (isset($data['id'])) {
                        $this->db->where('id', $data['id']);
                        $this->db->update('mascota', $data); 
                } else {
                        $this->db->insert('mascota',$data);
                }
        }

        public function check_mascota($id) {

                $this->db->where('id',$id);
                $query = $this->db->get('mascota');
                if ($query->num_rows() > 0){
                        return true;
                } else {
                        return false;
                }
        }
        
        public function get_clientes($id = null) {
                $result = array();

                if($id) {
                        $query=$this->db->get_where('cliente', array('id' => $id));
                        $result=$query->row_array();
                } else {
                        $query=$this->db->get('cliente');
                        $result = $query->result_array();
                }

                return $result;
        }

        public function set_cliente($data) {
                if (isset($data['id'])) {
                        $this->db->where('id', $data['id']);
                        $this->db->update('cliente', $data); 
                } else {
                        $this->db->insert('cliente',$data);
                }
        }

        public function get_especies($id = FALSE) {

                $result = array();
                if($id) {
                        $query=$this->db->get_where('especie', array('id' => $id));
                        $result=$query->row_array();
                } else {
                        $query=$this->db->get('especie');
                        $result = $query->result_array();
                }

                return $result;
        }

        public function get_consulta($id_consulta = 0) {

                $result = array();

                $query=$this->db->get_where('consulta', array('id' => $id_consulta));
                $result=$query->row_array();

                return $result;
        }

        public function set_consulta($data) {
                $pruebas_medicas = $data['pruebas_medicas'];
                unset($data['pruebas_medicas']);
                if (isset($data['id'])) {
                        $id = $data['id'];
                        $this->db->where('id', $data['id']);
                        $this->db->update('consulta', $data); 
                } else {
                        $this->db->insert('consulta',$data);
                        $id = $this->db->insert_id();
                }
                
                if (isset($pruebas_medicas)) {
                        $exists=$this->check_pruebas($id);

                        if($exists){
                                $this->db->where('fk_consulta', $id);
                                $this->db->delete('consulta_pruebamedica');
                        }

                        foreach($pruebas_medicas as $key => $value) {
                                $values['fk_consulta'] = $id;
                                $values['fk_mascota'] = $data['fk_mascota'];
                                $values['fk_prueba_medica'] = $value;
                                $this->db->insert('consulta_pruebamedica', $values);
                        }
                }
        }

        public function check_pruebas($id_consulta) {

                $this->db->where('fk_consulta',$id_consulta);
                $query = $this->db->get('consulta_pruebamedica');
                if ($query->num_rows() > 0){
                        return true;
                } else {
                        return false;
                }
        }

        public function get_historial($id_mascota = null)
        {
                $this->db->select('consulta.id');
                $this->db->select('consulta.fk_mascota');
                $this->db->select('mascota.nombre');
                $this->db->select('consulta.fecha');
                $this->db->select('consulta.motivo_visita as "motivo"');
                $this->db->select('consulta.diagnostico');
                $this->db->select('empleado.nombre as "veterinario"');

                $this->db->from('consulta');
                if($id_mascota) {
                        $this->db->where('consulta.fk_mascota',$id_mascota);
                }
                $this->db->order_by("consulta.fecha", "asc"); 
                $this->db->join('mascota','consulta.fk_mascota = mascota.id');
                $this->db->join('empleado','consulta.fk_empleado = empleado.id');

                $query=$this->db->get();
                $result=$query->result_array();

                return $result;
        }

        public function get_datatable() {

                $this->db->select('mascota.*');
                $this->db->select('especie.nombre as "especie"');
                $this->db->select('genero.nombre as "genero"');
                $this->db->select('concat(cliente.nombre,\' \', cliente.apellidos) as "propietario"');
                
                $this->db->from('mascota');
                $this->db->join('especie','mascota.fk_especie = especie.id');
                $this->db->join('genero','mascota.fk_genero = genero.id');
                $this->db->join('cliente','mascota.fk_cliente = cliente.id');

                $query=$this->db->get();
                $result=$query->result_array();

                return $result;
        }
}       