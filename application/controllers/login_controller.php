<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	
	public function login()
	{	
		$this->load->view('login_view');
	}

	public function login_validation(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run()){

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('login_model');
			if($this->login_model->can_login($username, $password)){

				$session_data = array(

					'username'=>$username

				);
				$this->session->set_userdata($session_data);
				redirect(base_url('/login_controller/enter'));

			}else{

				$this->session->set_flashdata('error','Username ou chave de acesso inválida');
				//redirect(base_url('/login_controller/login'));
				$this->login();
			}

		}
		else{

			$this->login();

		}

	}


	public function enter(){

		if($this->session->userdata('username')!=''){

			//echo '<h2>Welcome - '.$this->session->userdata('username').'</h2>';
			//echo '<label><a href="'.base_url().'login_controller/logout">Logout</a></label>';
			$this->load->view('menu_view');

		}else{

			redirect(base_url('login_controller/login'));

		}

	}

	public function logout(){

		$this->session->unset_userdata('username');
		redirect(base_url('login_controller/login'));

	}
	


	public function regist()
	{	

		$this->load->view('regist_view');
	}


	public function create_user(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nome','Nome','required');
		$this->form_validation->set_rules('sobrenome','Sobrenome','required');
		$this->form_validation->set_rules('tlm','Telemóvel','required|numeric|max_length[9]');
		$this->form_validation->set_rules('email','Email Adress','required|valid_email');
		$this->form_validation->set_rules('username','Username','required|min_length[4]');
		$this->form_validation->set_rules('password','Palavra Pass','required|min_length[4]');
		$this->form_validation->set_rules('password2','Confirmação Palavra Pass','required|matches[password]');

		if($this->form_validation->run()){

			$this->load->model('login_model');
			if($query = $this->login_model->create_member()){

				$this->session->set_flashdata('success','Registou uma conta com sucesso');

				//$this->load->view('regist_view');
				redirect(base_url('login_controller/regist'));




			}else{

				$this->load->view('regist_view');

			}

		}else{

			$this->session->set_flashdata('error2','altere os campos assinalados');
			$this->load->view('regist_view');

		}


		
	}























}
