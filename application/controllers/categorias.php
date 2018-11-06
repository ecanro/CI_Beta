<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {



//Datatable t_contactos -------------------

public function contact_table_datatable(){

    $columns = array( 
        0 =>'id_contacto', 
        1 =>'nome',
        2=> 'pessoaDeContacto',
        3=> 'telemovel',
        4=> 'telemovel2',
        5=> 'email',
        6=> 'username',
        7=> 'nomeEmpresa',

    );

$limit = $this->input->post('length');
$start = $this->input->post('start');
$order = $columns[$this->input->post('order')[0]['column']];
$dir = $this->input->post('order')[0]['dir'];
$this->load->model('categorias_m');
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

$nestedData['id_contacto'] = $post->id_contacto;
$nestedData['nome'] = $post->nome;
$nestedData['pessoaDeContacto'] = $post->pessoaDeContacto;
$nestedData['telemovel'] = $post->telemovel;
$nestedData['telemovel2'] = $post->telemovel2;
$nestedData['email'] = $post->email;
$nestedData['username'] = $post->username;
$nestedData['nomeEmpresa'] = $post->nomeEmpresa;

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

//Datatable t_contactos -------------------



//Datatable t_negocio -------------------

public function negocio_table_datatable(){

    $columns = array( 
        0 =>'id_negocio', 
        1 =>'nomeNegocio',
        2=> 'estadoNegocio',
        3=> 'nome',
        4=> 'username',

    );

$limit = $this->input->post('length');
$start = $this->input->post('start');
$order = $columns[$this->input->post('order')[0]['column']];
$dir = $this->input->post('order')[0]['dir'];
$this->load->model('categorias_m');
$totalData = $this->categorias_m->allposts_count_negocio();

$totalFiltered = $totalData; 

if(empty($this->input->post('search')['value']))
{            
$posts = $this->categorias_m->allposts_negocio($limit,$start,$order,$dir);
}
else {
$search = $this->input->post('search')['value']; 

$posts =  $this->categorias_m->posts_search_negocio($limit,$start,$search,$order,$dir);

$totalFiltered = $this->categorias_m->posts_search_count_negocio($search);
}

$data = array();
if(!empty($posts))
{
foreach ($posts as $post)
{

$nestedData['id_negocio'] = $post->id_negocio;
$nestedData['nomeNegocio'] = $post->nomeNegocio;
$nestedData['estadoNegocio'] = $post->estadoNegocio;
$nestedData['nome'] = $post->nome;
$nestedData['username'] = $post->username;

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



//CRIAR Contacto

public function create_contacto(){
    $result = array();
    
    
    $nomeCriarContacto = $this->input->post('nomeCriarContacto');
    $pessoaDeContactoCriarContacto = $this->input->post('pessoaDeContactoCriarContacto');
    $telemovelCriarContacto = $this->input->post('telemovelCriarContacto');
    $telemovel2CriarContacto = $this->input->post('telemovel2CriarContacto');
    $emailCriarContacto = $this->input->post('emailCriarContacto');
    $observacoesCriarContacto = $this->input->post('observacoesCriarContacto');
    $dataCriarContacto = $this->input->post('dataCriarContacto');
    $cidadeCriarContacto = $this->input->post('cidadeCriarContacto');
    $ruaCriarContacto = $this->input->post('ruaCriarContacto');
    $codPostalCriarContacto = $this->input->post('codPostalCriarContacto');
    $empresaCriarContacto = $this->input->post('empresaCriarContacto');
    $id_comercialCriarContacto = $this->input->post('id_comercialCriarContacto');
    $clienteNovoCriarContacto = $this->input->post('clienteNovoCriarContacto');
    $necessidadeCriarContacto = $this->input->post('necessidadeCriarContacto');
    $origemCriarContacto = $this->input->post('origemCriarContacto');
    $canalCriarContacto = $this->input->post('canalCriarContacto');
    
if($empresaCriarContacto==''){

    $empresaCriarContacto = NULL;
}
if($canalCriarContacto==''){

    $canalCriarContacto = NULL;
}
if($origemCriarContacto==''){

    $origemCriarContacto = NULL;
}
if($necessidadeCriarContacto==''){

    $necessidadeCriarContacto = NULL;
}
if($telemovel2CriarContacto==''){

    $telemovel2CriarContacto = NULL;
}


      $data = array(
    
      'nome' => $nomeCriarContacto,
      'pessoaDeContacto' => $pessoaDeContactoCriarContacto,
      'telemovel' => $telemovelCriarContacto,
      'telemovel2' => $telemovel2CriarContacto,
      'email' => $emailCriarContacto,
      'dataVisita' => $dataCriarContacto,
      'clienteNovo' => $clienteNovoCriarContacto,
      'id_comercial' => $id_comercialCriarContacto,
      'id_empresas' => $empresaCriarContacto,
      'observacoes' => $observacoesCriarContacto,
      'id_origem' => $origemCriarContacto,
      'id_necessidade' => $necessidadeCriarContacto,
      'id_canal' => $canalCriarContacto

      );

      $this->load->library('form_validation');
      $this->form_validation->set_rules('pessoaDeContactoCriarContacto','Nome','required');
      $this->form_validation->set_rules('telemovelCriarContacto','Telemóvel','required|numeric|min_length[9]|max_length[9]');
      $this->form_validation->set_rules('telemovelCriarContacto','Telemóvel','numeric|min_length[9]|max_length[9]');
      $this->form_validation->set_rules('emailCriarContacto','Email Adress','required|valid_email');
      $this->form_validation->set_rules('dataCriarContacto','Data','required');
      $this->form_validation->set_rules('id_comercialCriarContacto','Proprietario','required');
      $this->form_validation->set_rules('clienteNovoCriarContacto','ClienteNovo','required');
      if($this->form_validation->run()){
    
    $this->load->model('categorias_m');
    if($this->categorias_m->insert_contacto($data)){

        $id_contacto_inserido = $this->categorias_m->find_contacto_para_inserir_morada_by_nomeContacto($nomeCriarContacto);


        $data2 = array(
  
        'id_contacto' => $id_contacto_inserido,
        'cidade' => $cidadeCriarContacto,
        'rua' => $ruaCriarContacto,
        'codigoPostal' => $codPostalCriarContacto
  
        );

if($cidadeCriarContacto==NULL||$ruaCriarContacto==NULL||$codPostalCriarContacto==NULL){
    $result['msg'] = "<div class='alert alert-success' role='alert'>
    O contacto foi adicionado mas os dados da morada eram insuficientes. 
    Poderá complementar o contacto com uma nova morada ao editar o contacto!
  </div>";
    $result['success'] = true;
    echo json_encode($result);
}else{

if($this->categorias_m->insert_morada($data2)){

      $result['msg'] = "<div class='alert alert-success' role='alert'>
      Contacto criado com sucesso!
    </div>";
      $result['success'] = true;
      echo json_encode($result);
}else{
    $result['msg'] = "<div class='alert alert-success' role='alert'>
    O contacto foi adicionado mas os dados da morada eram insuficientes. 
    Poderá complementar o contacto com uma nova morada ao editar o contacto!
  </div>";
    $result['success'] = true;
    echo json_encode($result);
  }}
    }else{
      $result['msg'] = "<div class='alert alert-success' role='alert'>
      Não foi possível realizar a operação!
    </div>";
      $result['success'] = false;
      echo json_encode($result);
    }
      }

    }


//CRIAR Negócio

public function create_negocio(){
    $result = array();
    
    
    $id_contactoCriarNegocio = $this->input->post('id_contactoCriarNegocio');
    $nomeDoNegocioCriarNegocio = $this->input->post('nomeDoNegocioCriarNegocio');
    $etapaFunilCriarNegocio = $this->input->post('etapaFunilCriarNegocio');
    $estadoNegocioCriarNegocio = $this->input->post('estadoNegocioCriarNegocio');
    $id_comercialCriarNegocio = $this->input->post('id_comercialCriarNegocio');
    $valorNegocioCriarNegocio = $this->input->post('valorNegocioCriarNegocio');
    $numeroOrcamentoCriarNegocio = $this->input->post('numeroOrcamentoCriarNegocio');
    $ajudicadoCriarNegocio = $this->input->post('ajudicadoCriarNegocio');
    $motivosCriarNegocio = $this->input->post('motivosCriarNegocio');

    
if($valorNegocioCriarNegocio==''){

    $valorNegocioCriarNegocio = NULL;
}
if($numeroOrcamentoCriarNegocio==''){

    $numeroOrcamentoCriarNegocio = NULL;
}
if($motivosCriarNegocio==''){

    $motivosCriarNegocio = NULL;
}


      $data = array(
    
      'id_contacto' => $id_contactoCriarNegocio,
      'nomeNegocio' => $nomeDoNegocioCriarNegocio,
      'id_funil' => $etapaFunilCriarNegocio,
      'id_estadoNegocio' => $estadoNegocioCriarNegocio,
      'id_comercial' => $id_comercialCriarNegocio,
      'valorNegocio' => $valorNegocioCriarNegocio,
      'numeroOrcamento' => $numeroOrcamentoCriarNegocio,
      'ajudicado' => $ajudicadoCriarNegocio,
      'motivosNaoAvancou' => $motivosCriarNegocio

      );

      $this->load->library('form_validation');
      $this->form_validation->set_rules('nomeDoNegocioCriarNegocio','Nome','required');
      $this->form_validation->set_rules('id_contactoCriarNegocio','Contacto','required');
      $this->form_validation->set_rules('etapaFunilCriarNegocio','Etapa','required');
      $this->form_validation->set_rules('estadoNegocioCriarNegocio','Estado','required');
      $this->form_validation->set_rules('id_comercialCriarNegocio','Comercial','required');
      $this->form_validation->set_rules('valorNegocioCriarNegocio','ValorNegocio','numeric');
      $this->form_validation->set_rules('numeroOrcamentoCriarNegocio','NúmeroOrçamento','numeric');
      $this->form_validation->set_rules('ajudicadoCriarNegocio','Ajudicado','required');

      if($this->form_validation->run()){
    
    $this->load->model('categorias_m');

    if($this->categorias_m->insert_negocio($data)){

      $result['msg'] = "<div class='alert alert-success' role='alert'>
      Negócio criado com sucesso!
    </div>";
      $result['success'] = true;
      echo json_encode($result);
    }else{

        $result['msg'] = "<div class='alert alert-danger' role='alert'>
        Não foi possível realizar a operação!
      </div>";
        $result['success'] = false;
        echo json_encode($result);

    }
      }

    }


//Apanhar todas as PERMISSOES em dropdown

public function permissoes_dropdown(){

    $this->load->model('categorias_m');
    $query = $this->categorias_m->permissoes_dropdown();
  
  //echo "<option value='' selected> Nenhum </option>";
  
  if($query->num_rows() > 0){
  
    foreach($query->result() as $row){
  echo "<option value='$row->id'>  $row->nomePermissao </option>";
    }
  }
  }





//getIdByNomeContacto

public function getIdByNomeContacto(){
    $result = array();
   $nome = $this->input->post('nome');

    $this->load->model('categorias_m');
    $id_contacto = $this->categorias_m->getIdByNomeContacto($nome);

$result['id_contacto'] = $id_contacto;
echo json_encode($result);

}



public function categoria(){

$this->load->view('categorias');

}



























}//class