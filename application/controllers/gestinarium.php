<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestinarium extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	/*	

		Código para revisar los datos que contiene un array:

		echo '<pre>';
        print_r($value);
        echo '</pre>';
		die();
	*/

	public function __construct()
    {
            parent::__construct();
            $this->load->model('gestinarium_model');
            $this->load->helper('url_helper');
            $this->load->helper('form');
            $this->load->library('session');
            $method = $this->router->method;
            $route= base_url('gestinarium/'.$method);
            $this->session->set_userdata('route',$route);
            $is_logged = $this->session->userdata('is_logged');

            if(!$is_logged) {
            	redirect(base_url('login'));
            }
    }
	

	public function index()
	{
		$this->load->view('gestinarium/header');
		$this->load->view('gestinarium/home');
		$this->load->view('gestinarium/footer');
	}
	
	public function consultas($id_mascota = null, $id_consulta = null) {
		$this->load->library('table');
		
		$data['mascota']= $this->gestinarium_model->get_mascotas($id_mascota);
		$data['pruebas_medicas'] = $this->gestinarium_model->get_pruebas($id_consulta);

		if($id_consulta) {
			$data['consulta'] = $this->gestinarium_model->get_consulta($id_consulta);
		} else {
			$data['consulta'] = null;
			$data['historial'] = $this->gestinarium_model->get_historial($id_mascota);
			// $data['vista'] = "ficha";
			$this->table->set_heading('', 'Fecha','Mascota', 'Motivo de la visita', 'Atendid@ por');
			$template = array(
	        	'table_open'  => '<table id="fichas" class="table display pt-3">'
			);
			$this->table->set_template($template);

			foreach ($data['historial'] as $key => $value) {
				$link = base_url('gestinarium/consultas/'.$value['fk_mascota'].'/'.$value['id']);
				$this->table->add_row('<a href="'.$link.'">Ver consulta</a>',$value['fecha'], $value['nombre'], $value['motivo'], $value['veterinario']);
			}
			$data['datatable'] = $this->table->generate();
		}

		$this->load->view('gestinarium/header');
		if($id_consulta) {
			$this->load->view('gestinarium/consulta', $data);
		} else {
			$this->load->view('gestinarium/lista_consultas', $data);
		}
		$this->load->view('gestinarium/footer');
	}

	public function editar_consulta($id_consulta = null) {
		$data['id_consulta'] = $id_consulta;
		$data['consulta'] = $this->gestinarium_model->get_consulta($id_consulta);
		$data['mascotas']= $this->gestinarium_model->get_mascotas($data['consulta']['fk_mascota']);
		$data['especies']= $this->gestinarium_model->get_especies();
		$data['pruebas_medicas'] = $this->gestinarium_model->get_pruebas($id_consulta);

		$this->load->view('gestinarium/header');
		$this->load->view('gestinarium/editar_consulta', $data);
		$this->load->view('gestinarium/footer');
	}

	public function post_consulta() {
		$this->load->library('form_validation');

		$data=$this->input->post();
		$data['fk_empleado']=$this->session->userdata['user_data']['id'];
		unset($data['mysubmit']);

		$this->gestinarium_model->set_consulta($data);

		if(isset($data['id'])) {
			redirect('/gestinarium/consultas/'.$data['fk_mascota'].'/'.$data['id']);
		} else {
			redirect('/gestinarium/consultas');
		}
	}

	public function fichas() {
		$this->load->library('table');
		$data['table_content'] = $this->gestinarium_model->get_mascotas();
		// $data['vista'] = "fichas";

		$this->table->set_heading('', 'Nombre', 'Especie', 'Raza','Genero', 'Propietario');
		foreach ($data['table_content'] as $key => $value) {
			$link = base_url('gestinarium/ficha/'.$value['id']);
			$this->table->add_row('<a href="'.$link.'">Ver ficha</a>',$value['nombre'], ucfirst($value['especie']), $value['raza'], $value['genero'], $value['propietario']);
		}

		$template = array(
        	'table_open'  => '<table id="fichas" class="table display">'
		);

		$this->table->set_template($template);
		$data['datatable'] = $this->table->generate();

		$this->load->view('gestinarium/header');
		$this->load->view('gestinarium/lista_fichas_mascotas',$data);
		$this->load->view('gestinarium/footer');
	}

	public function ficha($id_mascota) {
		$this->load->library('table');

		$data['mascota']= $this->gestinarium_model->get_mascotas($id_mascota);
		$data['historial'] = $this->gestinarium_model->get_consultas($id_mascota);

		$this->table->set_heading('', 'Fecha', 'Motivo de la visita', 'Atendid@ por');
		$template = array(
        	'table_open'  => '<table id="fichas" class="table display pt-3">'
		);
		$this->table->set_template($template);

		foreach ($data['historial'] as $key => $value) {
			$link = base_url('gestinarium/consultas/'.$value['fk_mascota'].'/'.$value['id']);
			$this->table->add_row('<a href="'.$link.'">Ver consulta</a>',$value['fecha'], $value['motivo'], $value['veterinario']);
		}
		$data['datatable'] = $this->table->generate();

		$this->load->view('gestinarium/header');
		$this->load->view('gestinarium/ficha',$data);
		$this->load->view('gestinarium/footer');
	}

	public function editar_ficha($id_mascota = null) {
		$data['id_mascota'] = $id_mascota;
		$data['mascota'] 	= $this->gestinarium_model->get_mascotas($id_mascota);
		$data['especies'] 	= $this->gestinarium_model->get_especies();
		$data['clientes'] 	= $this->gestinarium_model->get_clientes();

		$this->load->view('gestinarium/header');
		$this->load->view('gestinarium/editar_ficha',$data);
		$this->load->view('gestinarium/footer');
	}

	public function post_ficha() {
		$this->load->library('form_validation');

		$data=$this->input->post();
		$calling_function = $data['calling_function'];
		unset($data['mysubmit']);
		unset($data['calling_function']);

		if($calling_function == "editar_ficha") {
			$this->gestinarium_model->set_mascota($data);
		} else {
			$this->gestinarium_model->set_cliente($data);
		}

		if($calling_function == "editar_ficha") {
			if(isset($data['id'])) {
				redirect('/gestinarium/ficha/'.$data['id']);
			} else {
				redirect('/gestinarium/fichas');
			}
		} else {
			if(isset($data['id'])) {
				redirect('/gestinarium/clientes/'.$data['id']);
			} else {
				redirect('/gestinarium/clientes');
			}
		}
	}

	public function clientes($id_cliente = null) {
		$this->load->library('table');

		$data['mascota']= $this->gestinarium_model->get_mascotas(null,$id_cliente);
		$data['cliente'] = $this->gestinarium_model->get_clientes($id_cliente);
		// echo '<pre>';
  //       print_r($data['cliente']);
  //       echo '</pre>';
		// die();
		
		if(!$id_cliente) {
			$this->table->set_heading('', 'Nombre', 'Domicilio', 'CP', 'email', 'telefono');
			$template = array(
	        	'table_open'  => '<table id="fichas" class="table display pt-3">'
			);
			$this->table->set_template($template);

			foreach ($data['cliente'] as $key => $value) {
				$link = base_url('gestinarium/clientes/'.$value['id']);
				$this->table->add_row('<a href="'.$link.'">Ver ficha</a>',$value['nombre'].' '.$value['apellidos'], $value['domicilio'], $value['cp'], $value['email'], $value['telefono']);
			}
			$data['datatable'] = $this->table->generate();
		} else {
			$this->table->set_heading('', 'Nombre', 'Especie', 'Raza','Genero', 'Propietario');
			foreach ($data['mascota'] as $key => $value) {
				$link = base_url('gestinarium/ficha/'.$value['id']);
				$this->table->add_row('<a href="'.$link.'">Ver ficha</a>',$value['nombre'], ucfirst($value['especie']), $value['raza'], $value['genero'], $value['propietario']);
			}

			$template = array(
	        	'table_open'  => '<table id="fichas" class="table display">'
			);

			$this->table->set_template($template);
			$data['datatable'] = $this->table->generate();
		}

		$this->load->view('gestinarium/header');
		if($id_cliente) {
			$this->load->view('gestinarium/ficha_cliente',$data);
		} else {
			$this->load->view('gestinarium/lista_fichas_clientes',$data);
		}
		$this->load->view('gestinarium/footer');
	}

	public function editar_cliente($id = null) {
		$data['id_cliente'] = $id;
		$data['cliente'] 	= $this->gestinarium_model->get_clientes($id);

		$this->load->view('gestinarium/header');
		$this->load->view('gestinarium/editar_ficha_cliente',$data);
		$this->load->view('gestinarium/footer');
	}

	
}