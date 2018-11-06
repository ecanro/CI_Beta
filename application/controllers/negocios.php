<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Negocios extends CI_Controller {

public function negocios_detalhes(){

$this->load->view('negocios');

}


//carrega os detalhes do negocio
public function get_detalhes_negocio(){

    $id_negocio = $this->input->post('id');
    $this->load->model('negocios_m');
    $data = $this->negocios_m->get_detalhes_negocio($id_negocio);
    
    
    if($data->num_rows() > 0){
        foreach($data->result() as $row){
            echo "<div class='container'>";
            echo "<div class='row'>";
            echo "<div class='col-lg-12 col-md-12 col-xs-12'>";
            echo "<button type='button' class='btn btn-outline-secondary buttonStyle pull-right btn-md' data-toggle='modal' data-target='#deleteNegocioModal'><i class='fa fa-trash faButton'></i> Apagar Negócio</button>";
            echo "<button type='button' onclick='negocioEditar()' class='btn btn-outline-secondary buttonStyle pull-right btn-md' data-toggle='modal' data-target='#editNegocioModalNegocios'><i class='fa fa-edit faButton'></i> Editar Negócio</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class='container'>";
            echo "<div class='row'>";
            echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
            echo "<h3 class='bottomSeparator'>Geral</h3>";
            echo "<h4>Contacto</h4>";
            echo "<p>$row->nome</p>";
            echo "<h4>Nome do Negócio</h4>";
            echo "<p>".$row->nomeNegocio."</p>";
            echo "<h4>Etapa do Negócio</h4>";
            echo "<p> $row->estadoFunil </p>";
            echo "<h4>Proprietário</h4>";
            echo "<p>$row->username</p>";
            echo "</div>";
            echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
            echo "<h3 class='bottomSeparator'>Dados do Negócio</h3>";
            echo "<h4>Estado do Negócio</h4>";
            echo "<p>$row->estadoNegocio</p>";
            echo "<h4>Número Orçamento</h4>";
            if($row->numeroOrcamento==NULL){
                echo "<p>Nenhum</p>";
            }else{
            echo "<p>$row->numeroOrcamento</p>";
            }
            echo "<h4>Valor do Negócio</h4>";
            if($row->valorNegocio==Null){
                echo "<p>Nenhum</p>";
            }else{
            echo "<p>$row->valorNegocio €</p>";
            }
            echo "<h4>Ajudicado</h4>";
            if($row->ajudicado ==1){
                ?><p>Sim</p><?php
              }else{?><p>Não</p><?php };
              echo "<h4>Motivos pelos quais não avançou</h4>";
              if($row->motivosNaoAvancou==Null){
              echo "<p>Nenhum</p>"; 
              }else{
              echo "<p>$row->motivosNaoAvancou</p>";
              }

            echo "</div>";
            echo "</div>";

            echo "<div class='row'>";
            echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
            echo "<h3 class='bottomSeparator'>ITEMS PARA VENDA</h3>";
            echo "<h4>ITEMS PARA VENDA</h4>";
            echo "</div>";
            echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
            echo "<h3 class='bottomSeparator'>ITEMS PARA VENDA</h3>";
            echo "<h4>ITEMS PARA VENDA</h4>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "</div>";
    
        }
    }else{
      echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
      echo "<h3 class='bottomSeparator'>Geral</h3>";
      echo "<p>Por favor seleccione um contacto</p>";
      echo "</div>";
      echo "</div>";
      echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
      echo "<h3 class='bottomSeparator'>Dados do Negócio</h3>";
      echo "<p>Por favor seleccione um contacto</p>";
      echo "</div>";
      echo "</div>";
    }
    
    }


public function get_id_contacto_negocio(){

    $id_negocio = $this->input->post('id_negocio');

    $this->load->model('negocios_m');

    $id_contacto_negocio = $this->negocios_m->get_id_contacto_negocio($id_negocio);


            $result = array();
            $result['id_contacto_negocio'] = $id_contacto_negocio;
            echo json_encode($result);

}




//CRIAR NOTA

public function create_nota(){
    $result = array();
    
    
    $notaTitulo = $this->input->post('notaTitulo');
    $nota = $this->input->post('nota');
    $dataNota = $this->input->post('dataNota');
    $notaNegocio = $this->input->post('notaNegocio');
    $nota_id_comercialForm = $this->input->post('nota_id_comercialForm');
    
      $data = array(
    
      'notaTitulo' => $notaTitulo,
      'nota' => $nota,
      'diaHoras' => $dataNota,
      'id_comercial' => $nota_id_comercialForm,
      'id_negocio' => $notaNegocio
      
      );
    
    
    $this->load->model('contactos_m');
    if($this->contactos_m->insert_nota($data)){
      $result['msg'] = "<div class='alert alert-success' role='alert'>
      A nota foi criada com sucesso!
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

//GET Tarefas

public function get_tarefas(){

  $id_negocio = $this->input->post('id');
  $this->load->model('negocios_m');
  $data = $this->negocios_m->get_tarefas($id_negocio);

  if($data->num_rows() > 0){
    echo "<table class='table table-borderless' id='tableNotas'>";
    echo "<tbody>";

    foreach($data->result() as $row){

      echo "<tr onclick='changeColor(this)'>";
      echo "<td id='$row->id_tarefas' onclick='tarefaSeleccionada(this.id)'>$row->tituloTarefa, agendada para $row->dataTerminaTarefa</td>";
      echo "</tr>";
    }

  echo "</tbody>";
  echo "</table>";
  }else{
    echo "<p>não existem tarefas</p>";
  }
}

//GET NOTAS

public function get_notas(){

    $id_negocio = $this->input->post('id');
    $this->load->model('negocios_m');
    $data = $this->negocios_m->get_notas($id_negocio);
  
    if($data->num_rows() > 0){
      echo "<table class='table table-borderless' id='tableNotas'>";
      echo "<tbody>";
  
      foreach($data->result() as $row){
  
        echo "<tr onclick='changeColor(this)'>";
        echo "<td id='$row->id_notas' onclick='notaSeleccionada(this.id)'>$row->notaTitulo, $row->diaHoras</td>";
        echo "</tr>";
      }
  
    echo "</tbody>";
    echo "</table>";
    }else{
      echo "<p>não existem notas</p>";
    }
  }


//GET FICHEIROS

public function get_ficheiros(){

    $id_negocio = $this->input->post('id_negocio');
    $this->load->model('negocios_m');
    $data = $this->negocios_m->get_ficheiros($id_negocio);
  
    if($data->num_rows() > 0){
      echo "<table class='table table-borderless' id='tableFicheiros'>";
      echo "<tbody>";
  
      foreach($data->result() as $row){
  
        echo "<tr onclick='changeColor(this)'>";
        echo "<td id='$row->id_ficheiros' onclick='ficheiroSeleccionado(this.id)'>$row->nome."."$row->path - $row->dataHoras</td>";
        echo "</tr>";
      }
  
    echo "</tbody>";
    echo "</table>";
    }else{
      echo "<p>não existem ficheiros</p>";
    }
  
  
  }

  
 //Upload Ficheiro

 public function upload_ficheiro(){

    $result = array();
  
  
  
  $config['upload_path']          = './assets/uploadedFiles';
  $config['allowed_types']        = '*';
  $config['max_size']             = 100000000000000000000000000000;
  
  $filename= $_FILES["userFile"]["name"];
  $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
  //$config['file_name']= $_FILES['userFile']['name'];
  
  $new_name = $this->input->post('nomeFicheiro');
  $config['file_name'] = $new_name;
  
  //$this->load->model('ficheiros_model');
  //$ok = $this->ficheiros_model->role_exists($new_name);
  $this->load->library('form_validation');
  $this->form_validation->set_rules('nomeFicheiro', 'NomeFicheiro', 'trim|is_unique[t_ficheiros.nome]');
  //$this->form_validation->set_rules('nomeFicheiro', 'NomeFicheiro', 'trim|is_unique[t_ficheiros.nome]');
  if ($this->form_validation->run() == TRUE){
  //if($this->ficheiros_model->file_name_exists($new_name)==false){
  
  $this->load->library('upload', $config);
  //$this->load->model('ficheiros_model');
  if ( $this->upload->do_upload('userFile'))
        {
            
            $data = array(
  
                'nome' => $this->input->post('nomeFicheiro'),
                'dataHoras' => $this->input->post('data'),
                'path' => $file_ext,
                //'path' => $_FILES['userFile']['name'],
                'id_negocio' => $this->input->post('id_negocio'),
                'id_comercial' => $this->input->post('id_comercialCriarFicheiro'),
                'descricao' => $this->input->post('descricao')
    
    
            );
  
    $this->load->model('ficheiros_model');
  $this->ficheiros_model->insert_ficheiro($data);
  
  
  
    $result['success'] = true;
    $result['msg'] = "<div class='alert alert-success' role='alert'>
    Fez upload do ficheiro com sucesso!
  </div>";
    echo json_encode($result);
  
        }
        else
        {
  
          $result['msg'] =  "<div class='alert alert-danger' role='alert'>
          Não foi possível realizar a operação!
        </div>";
    $result['success'] = false;
    echo json_encode($result);
        }
  
    }else
    {
        
      $result['msg'] ="<div class='alert alert-danger' role='alert'>
      Não foi possível realizar a operação. Por favor altere o nome do ficheiro!
    </div>";
      $result['success'] = false;
      echo json_encode($result);
    }
  
  
  }




//editar detalhes ficheiro

public function edit_ficheiro(){

  $result = array();
  
  
  
  $edit_id_ficheiro = $this->input->post('edit_id_ficheiro');
  //$editNomeFicheiro = $this->input->post('editNomeFicheiro');
  $editData = $this->input->post('editData');
  $edit_id_negocio = $this->input->post('edit_id_negocio');
  $edit_id_comercialForm = $this->input->post('edit_id_comercialForm');
  $editDescricao = $this->input->post('editDescricao');
  
    $data = array(
  
    'id_ficheiros' => $edit_id_ficheiro,
    //'nome' => $editNomeFicheiro,
    'dataHoras' => $editData,
    'id_negocio' => $edit_id_negocio,
    'id_comercial' => $edit_id_comercialForm,
    'descricao' => $editDescricao
    
    );
  
    $this->load->model('negocios_m');
    if($this->negocios_m->edit_ficheiro($data)){
  
      $result['id_ficheiro'] = $edit_id_ficheiro;
      $result['msg'] = "<div class='alert alert-success' role='alert'>
      Os detalhes do ficheiro foram editados com sucesso!
    </div>";
    $result['success'] = true;
    echo json_encode($result);
  
    }else{
      $result['msg'] =  "<div class='alert alert-danger' role='alert'>
      Não foi possível realizar a operação!
    </div>";
      $result['success'] = false;
      echo json_encode($result);
    }
    
  }


//Check if tarefaTitulo does exist in database
public function tarefaTituloUniqueName(){


  $tarefaTitulo = $this->input->post('tarefaTitulo');
  $this->load->model('negocios_m');
  if($this->negocios_m->tarefaTituloUniqueName($tarefaTitulo)){
 $result['success'] = true;
    echo json_encode($result);
  }else{   
    $result['success'] = false;
    echo json_encode($result);
  }

}

//Apanhar todos os estados da tarefa em dropdown

public function estadoTarefa_dropdown(){

  $this->load->model('negocios_m');
  $query = $this->negocios_m->estadoTarefa_dropdown();

//echo "<option value='' selected> Nenhum </option>";

if($query->num_rows() > 0){

  foreach($query->result() as $row){
echo "<option value='$row->id_estadoTarefa'>  $row->estadoTarefa </option>";
  }
}
}


//Apanhar todas as prioridades da tarefa em dropdown

public function prioridadeTarefa_dropdown(){

  $this->load->model('negocios_m');
  $query = $this->negocios_m->prioridadeTarefa_dropdown();

//echo "<option value='' selected> Nenhum </option>";

if($query->num_rows() > 0){

  foreach($query->result() as $row){
echo "<option value='$row->id_prioridade'>  $row->prioridade </option>";
  }
}
}




//Criar tarefa e adicionar destinatários

public function create_tarefa(){
  $result = array();
  $noDestinatario = false;
  $inseriu=false;
  $tarefaTitulo = $_POST["tarefaTitulo"];
  $number = count($_POST["tarefaDestinatario"]);
  $tarefaComercial = $_POST["tarefaComercial"];
  $descricao = $_POST["tarefaDescricao"];
  $tarefaDataCriacao = $_POST["tarefaDataCriacao"];
  $oks = "";
  $destShowMails = NULL;
  
$tarefaReceberNotificacao = $this->input->post('tarefaReceberNotificacao');

if($tarefaReceberNotificacao!=1){
  $tarefaReceberNotificacao = 0;
}

  if($number >0 ){
  
    for($i=0; $i<$number; $i++){
  
      if(trim($_POST["tarefaDestinatario"][$i])!=''){ 
  
        $noDestinatario = true;
  
      }
  
    }
  }
  
  
  if($noDestinatario==false){
  
    $result['success']=false;
    $result['msg'] = "<div class='alert alert-danger' role='alert'>
    Por favor insira destinatários para a tarefa a ser criada!
  </div>";
  echo json_encode($result);
  }else{
  //criar tarefa pois tem destinatários válidos
  
  
    $data = array(
    
      'id_comercial' => $tarefaComercial,
      'tituloTarefa' => $tarefaTitulo,
      'descricao' => $descricao,
      'dataCriacaoTarefa' => $tarefaDataCriacao,
      'dataTerminaTarefa' => $_POST["tarefaDataTermino"],
      'id_negocio' => $_POST["tarefaNegocio"],
      'id_estadoTarefa' => $_POST["estadoTarefa"],
      'id_prioridade' => $_POST["prioridadeTarefa"],
      'alertaInstantaneo'=>$tarefaReceberNotificacao
      
      );
  
      $this->load->model('negocios_m');
  //check if nome tarefa nao existe já
  if($this->negocios_m->tarefaTituloUniqueName($tarefaTitulo)==false){

      $this->negocios_m->criar_tarefa($data);
  }
      $id_tarefa_inserida = $this->negocios_m->find_tituloTarefa_para_inserir_destinatarios_by_nomeTarefa($tarefaTitulo);

        //adicionar os destinatários
  
    $number = count($_POST["tarefaDestinatario"]);
    if($number >0 ){
      for($i=0; $i<$number; $i++){ 

        if(trim($_POST["tarefaDestinatario"][$i])!=''){
          $id_comercial = $_POST["tarefaDestinatario"][$i]; 
          
          $this->load->model('negocios_m');
  
          $data_d = array(
            'id_tarefas'=>$id_tarefa_inserida,
            'id_comercial'=>$id_comercial
          );
  
          if($this->negocios_m->comercial_tem_tarefa($data_d)==true){
  
            //nao adiciona já está adicionado
  
          }else{
  
            //adiciona na base de dados porque ainda não está
  
            $this->negocios_m->insert_destinatarioTarefas($data_d);
            $mails[] = $id_comercial;
            $inseriu = true;
          }
    
        }
    
      }
    }
    //EMAIL PARA DESTINATARIOS E PROPRIETARIO
    if($tarefaReceberNotificacao ==1 && $inseriu==true){
      $this->load->library('email');
    
      $config =array(
        'bbc_batch_mode' => TRUE,
        'protocol'=>'smtp',
        'smtp_host'=>'smtp.gruposafety.pt',
        'newline'    => "\r\n",
        'charset'    => 'utf-8',
        'smtp_user'=>'plataforma@gruposafety.pt',
        'smtp_pass'=>'eOox380%',
        //'smtp_crypto'=>'',
        'smtp_port'=>25,
        'mailtype'=>"html"
    
      );
      $oks = "";
      $emailProprietario = $this->negocios_m->get_proprietario_mail($tarefaComercial);
      $usernameProprietario = $this->negocios_m->get_proprietario_username($tarefaComercial);
      if($mails>0){
      foreach($mails as $mail){
        $lol = $mail;
        $dis = $this->negocios_m->get_proprietario_mail($lol);
        //$oks .="$mail <br>";
        //$este = $dis;
        //$oks .=" $este <br>";
        $oks .="$dis,";
        $destShowMails.="$dis <br>";
      }
      }

    $this->email->initialize($config);
    
    $this->email->from('plataforma@gruposafety.pt','GrupoSafety');
    $this->email->to("$oks $emailProprietario");
    $this->email->subject("Nova Tarefa - $tarefaTitulo");
    $ok = base_url('assets/images/gslogo.png');
    $this->email->message('
    <p>Boa tarde, <br> de seguida o certificado de criação da tarefa <b>'.$tarefaTitulo.'</b>  por <b>'.$usernameProprietario.'</b> através da plataforma GrupoSafety,</p>
    
    <p><b>Tarefa:</b>  &nbsp; '.$tarefaTitulo.'</p>
    <p><b>Data Término:</b>  &nbsp; '.$tarefaDataCriacao.'</p>
    <p><b>Data de envio do aviso:</b>  &nbsp; 1 dia antes</p>
    <p><b>Descrição:</b>  &nbsp; '.$descricao.'</p>
    <p><b>Para os seguintes destinatários:</b>  &nbsp; 
    <br>
    '.$destShowMails.'
    
    </p>

    <p>Para mais detalhes por favor aceda á plataforma(link) e veja as suas tarefas.</p>
    
    <img class="teste" src=" '.$ok.' ">
    
    <style>
    .teste {
    width:350px;
    heigth:350px;
    }
    p  {
      color: black;
      font-size: 20px;
    }
    h6  {
    color: black;
    font-family: courier;
    font-size: 30px;
    }
    </style>
    
    ');

    if($this->email->send()){

      $result['success']=true;
      $result['msg'] = "<div class='alert alert-success' role='alert'>
      A tarefa foi criada com sucesso!
    </div>";
    echo json_encode($result);
    
    }else{

      $result['success']=true;
      $result['msg'] = "<div class='alert alert-danger' role='alert'>
      Houve um problema com o envio dos mails para os destinatários!
      </div>";
    echo json_encode($result);

    }

    }else{
//ENVIAR MAIL SO A DESTINATARIOS
$this->load->library('email');
    
      $config =array(
        'bbc_batch_mode' => TRUE,
        'protocol'=>'smtp',
        'smtp_host'=>'smtp.gruposafety.pt',
        'newline'    => "\r\n",
        'charset'    => 'utf-8',
        'smtp_user'=>'plataforma@gruposafety.pt',
        'smtp_pass'=>'eOox380%',
        //'smtp_crypto'=>'',
        'smtp_port'=>25,
        'mailtype'=>"html"
    
      );

      $emailProprietario = NULL;
      $usernameProprietario = $this->negocios_m->get_proprietario_username($tarefaComercial);

      if($mails>0){
      foreach($mails as $mail){
        $lol = $mail;
        $dis = $this->negocios_m->get_proprietario_mail($lol);
        //$oks .="$mail <br>";
        //$este = $dis;
        //$oks .=" $este <br>";
        $oks .="$dis,";
        $destShowMails.="$dis <br>";
      }
      }

    $this->email->initialize($config);
    
    $this->email->from('plataforma@gruposafety.pt','GrupoSafety');
    $this->email->to("$oks $emailProprietario");
    $this->email->subject("Nova Tarefa - $tarefaTitulo");
    $ok = base_url('assets/images/gslogo.png');
    $this->email->message('
    <p>Boa tarde, <br> a seguinte tarefa tarefa <b>'.$tarefaTitulo.'</b> foi-lhe atribuída por <b>'.$usernameProprietario.'</b> através da plataforma GrupoSafety,</p>
    
    <p><b>Tarefa:</b>  &nbsp; '.$tarefaTitulo.'</p>
    <p><b>Data Término:</b>  &nbsp; '.$tarefaDataCriacao.'</p>
    <p><b>Data de envio do aviso:</b>  &nbsp; 1 dia antes</p>
    <p><b>Descrição:</b>  &nbsp; '.$descricao.'</p>
    <p><b>Para os seguintes destinatários:</b>  &nbsp; 
    <br>
    '.$destShowMails.'
    
    </p>
    
    <p>Para mais detalhes por favor aceda á plataforma(link) e veja as suas tarefas.</p>
    
    <img class="teste" src=" '.$ok.' ">
    
    <style>
    .teste {
    width:350px;
    heigth:350px;
    }
    p  {
      color: black;
      font-size: 20px;
    }
    h6  {
    color: black;
    font-family: courier;
    font-size: 30px;
    }
    </style>
    
    ');

    if($this->email->send()){

      $result['success']=true;
      $result['msg'] = "<div class='alert alert-success' role='alert'>
      A tarefa foi criada com sucesso!
    </div>";
    echo json_encode($result);
    
    }else{

      $result['success']=true;
      $result['msg'] = "<div class='alert alert-danger' role='alert'>
      Houve um problema com o envio dos mails para os destinatários!
      </div>";
    echo json_encode($result);

    }
    $result['success']=true;
    $result['msg'] = "<div class='alert alert-success' role='alert'>
    A tarefa foi criada com sucesso!
  </div>";
  echo json_encode($result);
    }

  }

}




  function mail(){

    $this->load->library('email');

    $config =array(
      'bbc_batch_mode' => TRUE,
      'protocol'=>'smtp',
      'smtp_host'=>'smtp.gruposafety.pt',
      'newline'    => "\r\n",
      'charset'    => 'utf-8',
      'smtp_user'=>'plataforma@gruposafety.pt',
      'smtp_pass'=>'eOox380%',
      //'smtp_crypto'=>'',
      'smtp_port'=>25,
      'mailtype'=>"html"

    );

$this->email->initialize($config);

$this->email->from('Skylo_Mixes@hotmail.com','GrupoSafety');
$this->email->to('Skylo_Mixes@hotmail.com');
$this->email->subject('GrupoSafety');
$ok = base_url('assets/images/gslogo.png');
$this->email->message('
<p>Boa tarde, <br> a seguinte tarefa foi agendada para si, por XXXX através da plataforma GrupoSafety,</p>

<p><b>Tarefa:</b>  &nbsp; teste1</p>
<p><b>Data Término:</b>  &nbsp; dd/mm/yyyy</p>
<p><b>Aviso será enviado a:</b>  &nbsp; 1 dia antes</p>
<p><b>Descrição:</b>  &nbsp; Manutenção aos extintores da gasolineira XXXX</p>

<p>Para mais detalhes por favor aceda á plataforma(link) e veja as suas tarefas.</p>

<img class="teste" src=" '.$ok.' ">

<style>
.teste {
width:350px;
heigth:350px;
}
p  {
    color: black;
    font-size: 20px;
}
h6  {
  color: black;
  font-family: courier;
  font-size: 30px;
}
</style>

');


//$this->email->attach('D:\Wamp64\www\GrupoSafety\assets\images\gslogo.png');

if($this->email->send()){

echo "enviou";
echo "<br>";
echo $ok;

}else{

  echo $this->email->print_debugger();
}

  }


//mostrar detalhes de tarefa seleccionada
public function tarefa_seleccionada_detalhes(){
  $id_tarefa = $this->input->post('id');
  $this->load->model('negocios_m');
  $this->load->model('contactos_m');
  $data = $this->negocios_m->tarefa_seleccionada_detalhes($id_tarefa);


  if($data->num_rows() > 0){
    foreach($data->result() as $row){
      echo "<button type='button' id='$row->id_tarefas' onclick='notaApagar(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-sm' data-toggle='modal' data-target='#deleteNotaModal'><i class='fa fa-trash faButton'></i> Apagar</button>";
      echo "<button type='button' id='$row->id_tarefas' onclick='notaEditar(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-sm' data-toggle='modal' data-target='#editNotaModal'><i class='fa fa-edit faButton'></i> Editar</button>";
      //echo "<button type='button' id='$row->id_notas' onclick='notaEditar(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-sm'><i class='fa fa-edit faButton'></i> Editar</button>";
      //echo "<button type='button' id='$row->id_notas' onclick='notaApagar(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-sm'><i class='fa fa-trash faButton'></i> Apagar</button>";
      echo "$row->username ,  $row->dataTerminaTarefa";
      echo "<br>";
      echo "<br>";
      echo "<div class='row'>";
      echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
      echo "<h4>Título da Tarefa</h4>";
      echo "<p>$row->tituloTarefa</p>";
      echo "<h4>Criação da Tarefa</h4>";
      echo "<p>$row->dataCriacaoTarefa</p>";
      echo "<h4>Término da Tarefa</h4>";
      echo "<p>$row->dataTerminaTarefa</p>";
      echo "<h4>Descrição da Tarefa</h4>";
      echo "<p>$row->descricao</p>";
      echo "</div>";
      echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
      echo "<h4>Proprietário da Tarefa</h4>";
      echo "<p>$row->username</p>";
      echo "<h4>Negócio da Tarefa</h4>";
      echo "<p>$row->nomeNegocio</p>";
      echo "<h4>Estado da Tarefa</h4>";
      echo "<p>$row->estadoTarefa</p>";
      echo "<h4>Prioridade da Tarefa</h4>";
      echo "<p>$row->prioridade</p>";
      echo "</div>";
      echo "</div>";
    }
  }else{

  }


}





public function AutoMails(){
  $this->load->helper('date');

  //$datestring = 'Year: %Y Month: %m Day: %d - %h:%i %a';
  //$time = time();
  //echo mdate($datestring, $time);
  
$today = date('y-m-d');

$this->load->model('negocios_m');
$timestamp = $this->negocios_m->getDatasTerminoTarefas();
if($timestamp->num_rows()>0){
  foreach($timestamp->result() as $time){



    $date1=date_create($today);
    $date2=date_create($time->dataTerminaTarefa);
    $diff=date_diff($date1,$date2);

    $days = $diff->format("%a")+1;

    if($days == 2){
//dia anterior ao da data send mail

$this->load->library('email');

    $config =array(
      'bbc_batch_mode' => TRUE,
      'protocol'=>'smtp',
      'smtp_host'=>'smtp.gruposafety.pt',
      'newline'    => "\r\n",
      'charset'    => 'utf-8',
      'smtp_user'=>'plataforma@gruposafety.pt',
      'smtp_pass'=>'eOox380%',
      //'smtp_crypto'=>'',
      'smtp_port'=>25,
      'mailtype'=>"html"

    );
    $oks = "";
    $tarefaComercial = $time->id_comercial;
    $usernameProprietario = $this->negocios_m->get_proprietario_username($tarefaComercial);

    $id_tarefas = $time->id_tarefas;
    $dests = $this->negocios_m->getDestinatariosTarefaAutoMail($id_tarefas);

    if($dests->num_rows() > 0){
      foreach($dests->result() as $dest){

        $lol = $dest->id_comercial;
        $mail = $this->negocios_m->get_proprietario_mail($lol);
        $oks .="$mail,";
      }
    }



$this->email->initialize($config);

$this->email->from('plataforma@gruposafety.pt','GrupoSafety');
$this->email->to("$oks");
$this->email->subject('GrupoSafety');
$ok = base_url('assets/images/gslogo.png');
$this->email->message('
<p>Bom dia, <br> tem a seguinte tarefa <b>'.$time->tituloTarefa.' </b> para fechar amanhã, por <b> '.$usernameProprietario.' </b> através da plataforma GrupoSafety,</p>

<p><b>Tarefa:</b>  &nbsp; '.$time->tituloTarefa.'</p>
<p><b>Descrição:</b>  &nbsp; '.$time->descricao.'</p>

<p>Para mais detalhes por favor aceda á plataforma(link) e veja as suas tarefas.</p>

<img class="teste" src=" '.$ok.' ">

<style>
.teste {
width:350px;
heigth:350px;
}
p  {
    color: black;
    font-size: 20px;
}
h6  {
  color: black;
  font-family: courier;
  font-size: 30px;
}
</style>

');


//$this->email->attach('D:\Wamp64\www\GrupoSafety\assets\images\gslogo.png');

if($this->email->send()){

echo "enviou";
echo "<br>";
echo $ok;
echo "<br>";

}else{

  echo $this->email->print_debugger();
}

    }



  }
  }
}





















































}//class