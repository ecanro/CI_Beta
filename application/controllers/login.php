<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {



public function log(){

    $this->load->view('login');
}



public function create_utilizador(){

    $nomeCriarUtilizador = $this->input->post('nomeCriarUtilizador');
    $sobrenomeCriarUtilizador = $this->input->post('sobrenomeCriarUtilizador');
    $telemovelCriarUtilizador = $this->input->post('telemovelCriarUtilizador');
    $emailCriarUtilizador = $this->input->post('emailCriarUtilizador');
    $utilizadorCriarUtilizador = $this->input->post('utilizadorCriarUtilizador');
    $passwordCriarUtilizador = $this->input->post('passwordCriarUtilizador');
    $confirmPasswordCriarUtilizador = $this->input->post('confirmPasswordCriarUtilizador');
    $permissoesCriarUtilizador = $this->input->post('permissoesCriarUtilizador');


    $this->load->library('form_validation');
    $this->form_validation->set_rules('nomeCriarUtilizador','Nome','required');
    $this->form_validation->set_rules('sobrenomeCriarUtilizador','Sobrenome','required');
    $this->form_validation->set_rules('telemovelCriarUtilizador','Telemóvel','required|numeric|max_length[9]|min_length[9]');
    $this->form_validation->set_rules('emailCriarUtilizador','Email','required|valid_email');
    $this->form_validation->set_rules('utilizadorCriarUtilizador','Utilizador','required|min_length[4]');
    $this->form_validation->set_rules('passwordCriarUtilizador','Palavra Passe','required|min_length[4]');
    $this->form_validation->set_rules('confirmPasswordCriarUtilizador','Confirmação Palavra Passe','required|matches[passwordCriarUtilizador]');
    $this->form_validation->set_rules('permissoesCriarUtilizador','Permissões','required');

    if($this->form_validation->run()){

        $this->load->model('login_m');

        $data = array(

            'nome' => $this->input->post('nomeCriarUtilizador'),
            'sobrenome' => $this->input->post('sobrenomeCriarUtilizador'),
            'tlm' => $this->input->post('telemovelCriarUtilizador'),
            'email' => $this->input->post('emailCriarUtilizador'),
            'username' => $this->input->post('utilizadorCriarUtilizador'),
            'password' => md5($this->input->post('passwordCriarUtilizador')),
            'permissoes_id' => $this->input->post('permissoesCriarUtilizador')
        
        
        );

        if($this->login_m->create_utilizador($data)){

            $result['msg'] = "<div class='alert alert-success' role='alert'>
            Utilizador criado com sucesso!
          </div>";
            $result['success'] = true;
            echo json_encode($result);

    }else{

        $result['msg'] = "<div class='alert alert-success' role='alert'>
        Não foi possível realizar a operação!
      </div>";
        $result['success'] = false;
        echo json_encode($result);

    }
    }


}

//Check if USERNAME does exist in database
public function criarUtilizadorUniqueName(){


    $utilizadorCriarUtilizador = $this->input->post('utilizadorCriarUtilizador');
    $this->load->model('login_m');
    if($this->login_m->criarUtilizadorUniqueName($utilizadorCriarUtilizador)){
   $result['success'] = true;
      echo json_encode($result);
    }else{   
      $result['success'] = false;
      echo json_encode($result);
    }
  
  }


//Loggin in
public function login_validation(){

    $this->load->library('form_validation');
    $this->form_validation->set_rules('utilizador','Utilizador','required');
    $this->form_validation->set_rules('password','Password','required');

    if($this->form_validation->run()){

        $username = $this->input->post('utilizador');
        $password = $this->input->post('password');

        $this->load->model('login_m');
        if($this->login_m->can_login($username, $password)){


            //get login info to session
            $loginInfo = $this->login_m->get_login_info($username);

            if($loginInfo->num_rows() > 0){
            foreach($loginInfo->result() as $row){
            $username = $row->username;
            $id_comercial = $row->id_comercial;
            $permissoes_id = $row->permissoes_id;

                }
            }

            $loginPermissions = $this->login_m->get_login_permissions($permissoes_id);

            if($loginPermissions->num_rows() > 0){
                foreach($loginPermissions->result() as $row){
                $nomePermissao = $row->nomePermissao;
    
                    }
                }



            $session_data = array(

                'username'=>$username,
                'id_comercial'=>$id_comercial,
                'nomePermissao'=>$nomePermissao

            );
            $this->session->set_userdata($session_data);
            $result['success'] = true;
            //$result['msg'] = "<div class='alert alert-success' role='alert'>Bem-Vindo!</div>";
            echo json_encode($result);

        }else{

            $result['success'] = false;
            $result['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possível fazer Login!<br>Nome de utilizador ou palavra-passe errada!</div>";
            echo json_encode($result);

        }

    }
    else{

        $result['success'] = false;
        $result['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possível fazer Login!<br>Nome de utilizador ou palavra-passe errada!</div>";
        echo json_encode($result);

    }

  
  }

//LOADS CATEGORIAS VIEW LOGGED IN

public function categorias(){

    $this->load->view('categorias');
    //redirect(base_url('/contactos/categorias'));

}

// KILL SESSION
public function logout(){

    $this->session->unset_userdata('username');
    $this->session->unset_userdata('id_comercial');
    $this->session->unset_userdata('nomePermissao');
    redirect(base_url('login/log'));

}

//Get_Data_From_User_Session_Username

public function get_login_info(){

$this->load->model('login_m');
$loginInfo = $this->login_m->get_login_info($username);

}

//Datatable user_table_datatable

public function t_comerciais(){

    $columns = array( 
        0 =>'id_comercial', 
        1 =>'username',
        2=> 'password',
        3=> 'email',
        4=> 'nome',
        5=> 'sobrenome',
        6=> 'telemovel',
        7=> 'nivel',

    );

$limit = $this->input->post('length');
$start = $this->input->post('start');
$order = $columns[$this->input->post('order')[0]['column']];
$dir = $this->input->post('order')[0]['dir'];
$this->load->model('login_m');
$totalData = $this->categorias_m->allposts_count();

$totalFiltered = $totalData; 

if(empty($this->input->post('search')['value']))
{            
$posts = $this->categorias_m->allposts($limit,$start,$order,$dir);
}
else {
$search = $this->input->post('search')['value']; 

$posts =  $this->categorias_m->posts_search($limit,$start,$search,$order,$dir);

$totalFiltered = $this->categorias_m->posts_search_count($search);
}

$data = array();
if(!empty($posts))
{
foreach ($posts as $post)
{

$nestedData['id_comercial'] = $post->id_comercial;
$nestedData['username']     = $post->username;
$nestedData['password']     = $post->password;
$nestedData['email']        = $post->email;
$nestedData['nome']         = $post->nome;
$nestedData['sobrenome']    = $post->sobrenome;
$nestedData['telemovel']    = $post->telemovel;
$nestedData['nivel']        = $post->nivel;

$data[] = $nestedData;

}
}

$json_data = array(
"draw"            => intval($this->input->post('draw')),  
"recordsTotal"    => intval($totalData),  
"recordsFiltered" => intval($totalFiltered), 
"data"            => $data   
);

echo json_encode($json_data); 

}
//user__datatable Fin






















}//class