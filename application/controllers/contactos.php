<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos extends CI_Controller {



//carrega vista contactos
public function contactos_detalhes(){

    $this->load->view('contactos');
}



//carrega os detalhes do contacto
public function get_t_contactos(){

$id_contacto = $this->input->post('id');
$this->load->model('contactos_m');
$data = $this->contactos_m->get_t_contactos($id_contacto);
$data2 = $this->contactos_m->get_moradas_contacto($id_contacto);


if($data->num_rows() > 0){
    foreach($data->result() as $row){
        
        echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
        echo "<h3 class='bottomSeparator'>Dados Pessoais</h3>";
        echo "<h4>Nome</h4>";
        echo "<p>".$row->nome."</p>";
        echo "<h4>Pessoa de Contacto</h4>";
        echo "<p>$row->pessoaDeContacto</p>";
        echo "<h4>Telemóvel</h4>";
        echo "<p>$row->telemovel</p>";
        echo "<h4>Telemóvel 2</h4>";
        if($row->telemovel2 ==NULL){
            ?><p>Nenhum</p><?php
          }else{?><p><?php echo $row->telemovel2 ?></p><?php };
        echo "<h4>Email</h4>";
        echo "<p>$row->email</p>";
        echo "<h4>Morada</h4>";
        if($data2->num_rows() >0){
        $moradaCount = 1;
        foreach($data2->result() as $morada){?>
        
                  <h5>Morada <?php echo $moradaCount ?></h5>
                  <p><?php echo $morada->cidade;?>, <?php echo $morada->rua;?>, <?php echo $morada->codigoPostal;?></p>
                  <?php $moradaCount +=1;?>
        <?php }}else{ echo "<p>Nenhuma</p>";}
        echo "<h4>Observações</h4>";
        if($row->observacoes ==NULL){
            ?><p>Nenhuma</p><?php
          }else{?><p><?php echo $row->observacoes ?></p><?php };
        echo "</div>";
        echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
        echo "<h3 class='bottomSeparator'>Outros Dados</h3>";
        echo "<h4>Proprietário</h4>";
        echo "<p>$row->username</p>";
        echo "<h4>Cliente Novo</h4>";
         if($row->clienteNovo ==1){
            ?><p>Sim</p><?php
          }else{?><p>Não</p><?php };
        echo "<h4>Necessidade</h4>";
        if($row->necessidade ==NULL){
            ?><p>Nenhum</p><?php
          }else{?><p><?php echo $row->necessidade ?></p><?php };
        echo "<h4>Origem</h4>";
        if($row->origem ==NULL){
            ?><p>Nenhum</p><?php
          }else{?><p><?php echo $row->origem ?></p><?php };
        echo "<h4>Canal</h4>";
        if($row->canal ==NULL){
            ?><p>Nenhum</p><?php
          }else{?><p><?php echo $row->canal ?></p><?php };
        echo "<h4>Empresa</h4>";
        if($row->nomeEmpresa ==NULL){
            ?><p>Nenhuma</p><?php
          }else{?><p> <?php echo $row->nomeEmpresa?></p><?php };
        echo "<h4>Criado Em</h4>";
        echo" <p>$row->dataVisita</p>";
      echo "</div>";

    }
}else{
  echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
  echo "<h3 class='bottomSeparator'>Dados Pessoais</h3>";
  echo "<p>Por favor seleccione um contacto</p>";
  echo "</div>";
  echo "</div>";
  echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
  echo "<h3 class='bottomSeparator'>Outros Dados</h3>";
  echo "<p>Por favor seleccione um contacto</p>";
  echo "</div>";
  echo "</div>";
}

}

//apagar contacto pelo id do contacto seleccionado
public function delete_contacto_by_id(){
    $id_contacto = $this->input->post('id');
    //$id_contacto = $this->uri->segment(3);
    $this->load->model('contactos_m');
    if($this->contactos_m->delete_contacto_by_id($id_contacto)){

        echo "<div class='alert alert-success' role='alert'>
        O contacto foi removido com sucesso!
      </div>";
      
    }else{
        echo  "<div class='alert alert-danger' role='alert'>
        Não foi possível realizar a operação!
      </div>";
    }


}

//load categorias
public function categorias(){


    $this->load->view('categorias');

}


//GET Negócios

public function get_negocios(){

  $id_contacto = $this->input->post('id');
  $this->load->model('contactos_m');
  $data = $this->contactos_m->get_negocios($id_contacto);

  if($data->num_rows() > 0){
    echo "<table class='table table-borderless' id='tableNegocios'>";
    echo "<tbody>";

    foreach($data->result() as $row){

      echo "<tr onclick='changeColor(this)'>";
      echo "<td id='$row->id_negocio' onclick='negocioSeleccionado(this.id)'>$row->nomeNegocio, $row->estadoNegocio</td>";
      echo "</tr>";
    }

  echo "</tbody>";
  echo "</table>";
  }else{
    echo "<p>não existem notas</p>";
  }


}

//mostrar detalhes de negocio seleccionado
public function negocio_seleccionado_detalhes(){
  $id_negocio = $this->input->post('id');
  $this->load->model('contactos_m');
  $data = $this->contactos_m->negocio_seleccionado_detalhes($id_negocio);


  if($data->num_rows() > 0){
    foreach($data->result() as $row){
      echo "<button type='button' id='$row->id_negocio' onclick='negocioApagar(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-sm' data-toggle='modal' data-target='#deleteNegocioModal'><i class='fa fa-trash faButton'></i> Apagar</button>";
      echo "<button type='button' id='$row->id_negocio' onclick='negocioEditar(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-sm' data-toggle='modal' data-target='#editNegocioModal'><i class='fa fa-edit faButton'></i> Editar</button>";
      echo "<button type='button' id='$row->id_negocio' onclick='jumpToNegocio(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-sm' ><i class='fa fa-briefcase faButton'></i> Ir para Negócio</button>";
      echo "$row->nomeNegocio,  $row->estadoNegocio";
      echo "<br>";
      echo "<br>";
      echo "<div class='row'>";
      echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
      //echo "<h4>Id</h4>";
      //echo "<p>".$row->id_negocio."</p>";
      //echo $row->id_negocio;
      //echo "<br>";
      echo "<h3 class='bottomSeparator'>Geral</h3>"; 
      echo "<h4>Contacto</h4>";
      echo "<p>$row->nome</p>";
      echo "<h4>Nome do Negócio</h4>";
      echo "<p>$row->nomeNegocio</p>";
      echo "<h4>Etapa</h4>";
      echo "<p>$row->estadoFunil</p>";
      echo "<h4>Proprietário</h4>";
      echo "<p>$row->username</p>";
      echo "</div>";
      echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
      echo "<h3 class='bottomSeparator'>Dados Negócio</h3>";
      echo "<h4>Estado</h4>";
      echo "<p>$row->estadoNegocio</p>";
      echo "<h4>Número Orçamento</h4>";
      if($row->numeroOrcamento!==NULL){
      echo "<p>$row->numeroOrcamento</p>";
      }else{
        echo "<p>Nenhum</p>";
      }
      echo "<h4>Valor</h4>";
      if($row->valorNegocio!==NULL){
      echo "<p>$row->valorNegocio <h8>€</h8></p>";
      }else{
        echo "<p>Nenhum</p>";
      }
      echo "<h4>Ajudicado</h4>";
      if($row->ajudicado ==1){
        ?><p>Sim</p><?php
      }else{?><p>Não</p><?php };
      echo "<h4>Motivos pelos quais não avançou</h4>";
      if($row->motivosNaoAvancou!==NULL){
      echo "<p> ".$row->motivosNaoAvancou." </p>";
      }else{
        echo "<p>Nenhum</p>";
      }
      echo "</div>";
      echo "</div>";

      echo "<div class='row'>";
      echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
      echo "<h3 class='bottomSeparator'>ITEMS VENDA</h3>";
      echo "<h4>ITEMS PARA VENDA</h4>";
      echo "</div>";
      echo "<div class='col-lg-6 col-md-6 col-xs-12'>";
      echo "<h3 class='bottomSeparator'>ITEMS VENDA</h3>";
      echo "<h4>ITEMS PARA VENDA</h4>";
      echo "</div>";
      echo "</div>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      
    }
  }else{

  }
}

//apagar Negocio seleccionado
public function negocio_seleccionado_apagar(){

  $id_negocio = $this->input->post('id');
  $this->load->model('contactos_m');


  if( $this->contactos_m->negocio_seleccionado_apagar($id_negocio)){
    echo "<div class='alert alert-success' role='alert'>
    O negócio foi apagado com sucesso!
  </div>";

}else{
    echo  "<div class='alert alert-danger' role='alert'>
    Não foi possível realizar a operação!
  </div>";

}

}

//GET NOTAS

public function get_notas(){

  $id_contacto = $this->input->post('id');
  $this->load->model('contactos_m');
  $data = $this->contactos_m->get_notas($id_contacto);

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


//mostrar detalhes de nota seleccionada
public function nota_seleccionada_detalhes(){
  $id_notas = $this->input->post('id');
  $this->load->model('contactos_m');
  $data = $this->contactos_m->nota_seleccionada_detalhes($id_notas);


  if($data->num_rows() > 0){
    foreach($data->result() as $row){
      echo "<button type='button' id='$row->id_notas' onclick='notaApagar(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-sm' data-toggle='modal' data-target='#deleteNotaModal'><i class='fa fa-trash faButton'></i> Apagar</button>";
      echo "<button type='button' id='$row->id_notas' onclick='notaEditar(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-sm' data-toggle='modal' data-target='#editNotaModal'><i class='fa fa-edit faButton'></i> Editar</button>";
      //echo "<button type='button' id='$row->id_notas' onclick='notaEditar(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-sm'><i class='fa fa-edit faButton'></i> Editar</button>";
      //echo "<button type='button' id='$row->id_notas' onclick='notaApagar(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-sm'><i class='fa fa-trash faButton'></i> Apagar</button>";
      echo $this->contactos_m->get_proprietario_by_id_comercial($row->id_comercial). ",  $row->diaHoras";
      echo "<br>";
      echo "<br>";
      echo $row->nota;


    }
  }else{

  }


}


//apagar nota seleccionada
public function nota_seleccionada_apagar(){

  $id_notas = $this->input->post('id');
  $this->load->model('contactos_m');


  if( $this->contactos_m->nota_seleccionada_apagar($id_notas)){
    echo "<div class='alert alert-success' role='alert'>
    A nota foi apagada com sucesso!
  </div>";

}else{
    echo  "<div class='alert alert-danger' role='alert'>
    Não foi possível realizar a operação!
  </div>";

}

}



//GET FICHEIROS

public function get_ficheiros(){

  $id_contacto = $this->input->post('id');
  $this->load->model('contactos_m');
  $data = $this->contactos_m->get_ficheiros($id_contacto);

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

//mostrar detalhes de Ficheiro seleccionado
public function ficheiro_seleccionado_detalhes(){
  $id_ficheiro = $this->input->post('id');
  $this->load->model('contactos_m');
  $data = $this->contactos_m->ficheiro_seleccionado_detalhes($id_ficheiro);




  if($data->num_rows() > 0){
    foreach($data->result() as $row){

      $path = $this->contactos_m->get_path_ficheiro_by_id($id_ficheiro);
      $nome = $this->contactos_m->get_nome_ficheiro_by_id($id_ficheiro);
      $destiny = base_url('assets/uploadedFiles/'.$path.'');
      $popup = base_url('contactos/download_ficheiro/'.$row->id_ficheiros.'');




      echo "<button type='button' id='$row->id_ficheiros' onclick='ficheiroApagar(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-sm' data-toggle='modal' data-target='#deleteFicheiroModal'><i class='fa fa-trash faButton'></i> Apagar</button>";
      echo "<button type='button' id='$row->id_ficheiros' onclick='ficheiroEditar(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-sm' data-toggle='modal' data-target='#editFicheiroModal'><i class='fa fa-edit faButton'></i> Editar</button>";
      //echo "<button type='button' id='$row->id_notas' onclick='notaApagar(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-sm'><i class='fa fa-trash faButton'></i> Apagar</button>";
      //echo "<button type='button' id='$row->id_notas' onclick='notaEditar(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-sm'><i class='fa fa-edit faButton'></i> Editar</button>";
      echo $this->contactos_m->get_proprietario_by_id_comercial($row->id_comercial). ",  $row->dataHoras";
      echo "<br>";
      echo "<br>";
      echo $row->nome ."." .$row->path; echo " 	&nbsp; 	&nbsp;";
      echo "<a href='$popup'<button type='button' id='$row->id_ficheiros' class='btn btn-outline-secondary buttonStyle btn-sm'><i class='fa fa-download faButton'></i> </button></a>";
      echo "<br>";
      echo "<br>";  
      echo $row->descricao;
      echo "<br>";  
      echo "<br>";  

      echo "<br>";
    }
  }else{

  }


}


//apagar ficheiro seleccionado
public function ficheiro_seleccionado_apagar(){

  $id_ficheiro = $this->input->post('id');
  $this->load->model('contactos_m');
 



  $path = $this->contactos_m->get_path_ficheiro_by_id($id_ficheiro);
  $nome = $this->contactos_m->get_nome_ficheiro_by_id($id_ficheiro);
  // load download helder
  $this->load->helper('file');
  // read file contents

  $data = 'assets/uploadedFiles/'.$nome.'.'.$path;


unlink($data);


  if( $this->contactos_m->ficheiro_seleccionado_apagar($id_ficheiro)){


    echo "<div class='alert alert-success' role='alert'>
    O ficheiro foi apagado com sucesso!
  </div>";

}else{
    echo  "<div class='alert alert-danger' role='alert'>
    Não foi possível realizar a operação!
  </div>";

}

}


 //Download Ficheiro

 public function download_ficheiro(){
   $id_ficheiro = $this->uri->segment(3);
  //$id_ficheiro = $this->input->post('id');
  //$id_ficheiro = 65;
  $this->load->model('contactos_m');
  $path = $this->contactos_m->get_path_ficheiro_by_id($id_ficheiro);
  $nome = $this->contactos_m->get_nome_ficheiro_by_id($id_ficheiro);
  // load download helder
  $this->load->helper('download');
  // read file contents
  $this->load->helper(array('form', 'url'));
  $data = base_url().'assets/uploadedFiles/'.$nome.'.'.$path;
  //$data = file_get_contents(base_url('assets/uploadedFiles/'.$filename));
  //force_download($filename, $data);
  $this->load->helper('file');

    $mime = get_mime_by_extension($data);

    // Build the headers to push out the file properly.
    header('Pragma: public');     // required
    header('Expires: 0');         // no cache
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    //header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($data)).' GMT');
    header('Cache-Control: private',false);
    header('Content-Type: '.$mime);  // Add the mime type from Code igniter.
    header('Content-Disposition: attachment; filename="'.basename($nome).'"');  // Add the file name
    header('Content-Transfer-Encoding: binary');
    //header('Content-Length: '.filesize($data)); // provide file size
    header('Connection: close');
    readfile($data); // push it out
    //exit();
    force_download($data,NULL);
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
              'id_contacto' => $this->input->post('id_contacto'),
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





//Check if ficheiro name on create does exist in database
public function uniqueName(){


  $nomeFicheiro = $this->input->post('nomeFicheiro');
  $this->load->model('contactos_m');
  if($this->contactos_m->uniqueName($nomeFicheiro)){
 $result['success'] = true;
    echo json_encode($result);
  }else{   
    $result['success'] = false;
    echo json_encode($result);
  }

}


//Check if ficheiro name on edit does exist in database
public function uniqueNameEdit(){


  $nomeFicheiro = $this->input->post('editNomeFicheiro');
  $this->load->model('contactos_m');
  if($this->contactos_m->uniqueName($nomeFicheiro)){
 $result['success'] = true;
    echo json_encode($result);
  }else{   
    $result['success'] = false;
    echo json_encode($result);
  }

}



//Check if notaTitulo does exist in database
public function notaTituloUniqueName(){


  $notaTitulo = $this->input->post('notaTitulo');
  $this->load->model('contactos_m');
  if($this->contactos_m->notaTituloUniqueName($notaTitulo)){
 $result['success'] = true;
    echo json_encode($result);
  }else{   
    $result['success'] = false;
    echo json_encode($result);
  }

}


//Check if nomeContacto does exist in database
public function criarContactoUniqueName(){


  $nomeCriarContacto = $this->input->post('nomeCriarContacto');
  $this->load->model('contactos_m');
  if($this->contactos_m->criarContactoUniqueName($nomeCriarContacto)){
 $result['success'] = true;
    echo json_encode($result);
  }else{   
    $result['success'] = false;
    echo json_encode($result);
  }

}

//Check if nomeContacto does exist in database but can keep the same
public function editContactoUniqueName(){

  $nomeEditContacto = $this->input->post('nomeEditContacto');
  $id = $this->input->post('id');


  $this->load->model('contactos_m');
  if($this->contactos_m->editContactoUniqueName($nomeEditContacto, $id)){
 $result['success'] = true;
    echo json_encode($result);
  }else{   
    $result['success'] = false;
    echo json_encode($result);
  }

}


//Check if nomeNegocio does exist in database
public function nomeNegocioCriarNegocioUniqueName(){


  $nomeDoNegocioCriarNegocio = $this->input->post('nomeDoNegocioCriarNegocio');
  $this->load->model('contactos_m');
  if($this->contactos_m->nomeNegocioCriarNegocioUniqueName($nomeDoNegocioCriarNegocio)){
 $result['success'] = true;
    echo json_encode($result);
  }else{   
    $result['success'] = false;
    echo json_encode($result);
  }

}

//Check if nomeNegocio does exist in database but can keep the same
public function nomeNegocioEditarNegocioUniqueName(){

  $id = $this->input->post('id');
  $nomeDoNegocioEditarNegocio = $this->input->post('nomeDoNegocioEditarNegocio');
  $this->load->model('contactos_m');
  if($this->contactos_m->nomeNegocioEditarNegocioUniqueName($nomeDoNegocioEditarNegocio, $id)){
 $result['success'] = true;
    echo json_encode($result);
  }else{   
    $result['success'] = false;
    echo json_encode($result);
  }

}



//Apanhar dados para editar os detalhes ficheiro

public function get_dados_editFicheiros(){

  $id = $this->input->post('id');
  $this->load->model('contactos_m');

  $result = $this->contactos_m->get_dados_editFicheiros($id);
  $values = array();
  if($result->num_rows() > 0){
    foreach($result->result() as $res){


      $values['nome'] = $res->nome;
      $values['dataHoras'] = $res->dataHoras;
      $values['descricao'] = $res->descricao;
      $values['id_ficheiros'] = $res->id_ficheiros;
      $values['id_comercial'] = $res->id_comercial;

      //echo json_encode($values);
    }
}

echo json_encode($values);
}

//Apanhar todos os estados do negócio

public function estadoDoNegocio_dropdown(){

  $this->load->model('contactos_m');
  $query = $this->contactos_m->estadoDoNegocio_dropdown();

if($query->num_rows() > 0){

  foreach($query->result() as $row){
echo "<option value='$row->id_estadoNegocio'>  $row->estadoNegocio </option>";
  }
}
}


//Apanhar todos os estados do negócio para EDITAR

public function estadoNegocio_dropdown_edit(){

  $id_estadoNegocio = $this->input->post('id_estadoNegocio'); 
  $this->load->model('contactos_m');
  $query = $this->contactos_m->estadoDoNegocio_dropdown();

  echo "<option value='' selected> Nenhum </option>";
 if($query->num_rows() > 0){

  foreach($query->result() as $row){
$echo_html ="";
$echo_html ="<option value='$row->id_estadoNegocio'";
if($id_estadoNegocio==$row->id_estadoNegocio){
  $echo_html .='selected';
}
$echo_html .='>'.$row->estadoNegocio; '</option>';
echo $echo_html;
//echo "<option value='$row->id_comercial'>  $row->username </option>";

}
}
}


//Apanhar todas as Etapas Funil em dropdown

public function etapasFunil_dropdown(){

  $this->load->model('contactos_m');
  $query = $this->contactos_m->etapasFunil_dropdown();

//echo "<option value='' selected> Nenhum </option>";

if($query->num_rows() > 0){

  foreach($query->result() as $row){
echo "<option value='$row->id_funil'>  $row->estadoFunil </option>";
  }
}
}


//Apanhar todas as Etapas Funil em dropdown para EDITAR

public function etapasFunil_dropdown_edit(){

  $id_funil = $this->input->post('id_funil'); 
  $this->load->model('contactos_m');
  $query = $this->contactos_m->etapasFunil_dropdown();

  echo "<option value='' selected> Nenhum </option>";
 if($query->num_rows() > 0){

  foreach($query->result() as $row){
$echo_html ="";
$echo_html ="<option value='$row->id_funil'";
if($id_funil==$row->id_funil){
  $echo_html .='selected';
}
$echo_html .='>'.$row->estadoFunil; '</option>';
echo $echo_html;
//echo "<option value='$row->id_comercial'>  $row->username </option>";

}
}
}



//Apanhar todos os Contactos em dropdown

public function contactos_dropdown(){

  $this->load->model('contactos_m');
  $query = $this->contactos_m->get_all_contactos();

  echo "<option value='' selected> Nenhum </option>";

if($query->num_rows() > 0){

  foreach($query->result() as $row){
echo "<option value='$row->id_contacto'>  $row->nome </option>";
  }
}
}



//Apanhar todos os comerciais em dropdown

public function comerciais_dropdown(){

  $this->load->model('contactos_m');
  $query = $this->contactos_m->get_all_comerciais();


if(!$this->session->userdata('id_comercial')){
  echo "<option value='' selected> Nenhum </option>";
  if($query->num_rows() > 0){

    foreach($query->result() as $row){
  echo "<option value='$row->id_comercial'>  $row->username </option>";
    }
  }
}else{

  echo "<option value='' > Nenhum </option>";

 if($query->num_rows() > 0){

  foreach($query->result() as $row){


    $echo_html = "";
    $echo_html = "<option value='$row->id_comercial'";

    if ($this->session->userdata('id_comercial') == $row->id_comercial) {
    $echo_html .=' selected';
    }
    $echo_html .= '>'.$row->username;
    $echo_html .= '</option>';
    echo $echo_html;





//echo "<option value='$row->id_comercial'>  $row->username </option>";

}
}

}

}

//Apanhar todas as Necessidades em dropdown

public function necessidade_dropdown(){

  $this->load->model('contactos_m');
  $query = $this->contactos_m->get_all_necessidades();

  echo "<option value='' selected> Nenhum </option>";
 if($query->num_rows() > 0){

  foreach($query->result() as $row){

echo "<option value='$row->id_necessidade'>  $row->necessidade </option>";

}
}else{
  
  echo "<p> Não existem dados...</p>";
}

}

//Apanhar todas as Empresas em dropdown

public function empresas_dropdown(){

  $this->load->model('contactos_m');
  $query = $this->contactos_m->get_all_empresas();

  echo "<option value='' selected> Nenhum </option>";
 if($query->num_rows() > 0){

  foreach($query->result() as $row){

echo "<option value='$row->id_empresas'>  $row->nomeEmpresa </option>";

}
}else{
  
  echo "<p> Não existem dados...</p>";
}

}

//Apanhar todas as ORIGENS EM OPTION 

public function origem_options(){

  $this->load->model('contactos_m');
  $query = $this->contactos_m->get_all_origem_options();

  echo "<div class='form-check'>";
  echo "<label class='form-check-label'>";
    echo "<input type='radio' class='form-check-input' name='origem' value='' checked>Nenhum";
  echo "</label>";
echo "</div>";

 if($query->num_rows() > 0){

  foreach($query->result() as $row){


    echo "<div class='form-check'>";
    echo "<label class='form-check-label'>";
      echo "<input type='radio' class='form-check-input' value='$row->id_origem' name='origem'>$row->origem";
    echo "</label>";
  echo "</div>";

}
}else{
  
  echo "<div class='form-check'>";
  echo "<label class='form-check-label'>";
    echo "<input type='radio' class='form-check-input' name='origem' value='' checked>Nenhum";
  echo "</label>";
echo "</div>";
}

}

//Apanhar todos os CANAIS EM OPTION 

public function canal_options(){

  $this->load->model('contactos_m');
  $query = $this->contactos_m->get_all_canal_options();

  echo "<div class='form-check'>";
  echo "<label class='form-check-label'>";
    echo "<input type='radio' class='form-check-input' name='canal' value='' checked>Nenhum";
  echo "</label>";
echo "</div>";

 if($query->num_rows() > 0){

  foreach($query->result() as $row){


    echo "<div class='form-check'>";
    echo "<label class='form-check-label'>";
      echo "<input type='radio' class='form-check-input' value='$row->id_canal' name='canal'>$row->canal";
    echo "</label>";
  echo "</div>";

}
}else{
  
  echo "<div class='form-check'>";
  echo "<label class='form-check-label'>";
    echo "<input type='radio' class='form-check-input' name='canal' value='' checked>Nenhum";
  echo "</label>";
echo "</div>";
}

}


//Apanhar todas as ORIGENS EM OPTION para EDITAR

public function origem_options_edit(){

  $origem = $this->input->post('origem');

  $this->load->model('contactos_m');
  $query = $this->contactos_m->get_all_origem_options();


  echo "<div class='form-check'>";
  echo "<label class='form-check-label'>";
    echo "<input type='radio' class='form-check-input' name='editOrigem' value='' checked>Nenhum";
  echo "</label>";
echo "</div>";
  

 if($query->num_rows() > 0){

  foreach($query->result() as $row){

    $echo_html = "";
    $echo_html = "<div class='form-check'>";
    $echo_html .= "<label class='form-check-label'>";
    $echo_html .=  "<input type='radio' class='form-check-input' value='$row->id_origem' name='editOrigem'";

    if ($origem == $row->id_origem) {
    $echo_html .=' checked';
    }
    $echo_html .= '>'.$row->origem;
    $echo_html .= '</label>';
    $echo_html .= '</div>';
    echo $echo_html;
}
}

}

//Apanhar todos os CANAIS EM OPTION para EDITAR

public function canal_options_edit(){

  $canal = $this->input->post('canal');

  $this->load->model('contactos_m');
  $query = $this->contactos_m->get_all_canal_options();


  echo "<div class='form-check'>";
  echo "<label class='form-check-label'>";
    echo "<input type='radio' class='form-check-input' name='editCanal' value='' checked>Nenhum";
  echo "</label>";
echo "</div>";
  
 if($query->num_rows() > 0){

  foreach($query->result() as $row){


    $echo_html = "";
    $echo_html = "<div class='form-check'>";
    $echo_html .= "<label class='form-check-label'>";
    $echo_html .=  "<input type='radio' class='form-check-input' value='$row->id_canal' name='editCanal'";

    if ($canal == $row->id_canal) {
    $echo_html .=' checked';
    }
    $echo_html .= '>'.$row->canal;
    $echo_html .= '</label>';
    $echo_html .= '</div>';
    echo $echo_html;

}
}

}


//Apanhar todos os contactos em dropdown PARA EDITAR

public function contactos_dropdown_edit(){

  $id_contacto = $this->input->post('id_contacto'); 
  $this->load->model('contactos_m');
  $query = $this->contactos_m->get_all_contactos_edit($id_contacto);

  echo "<option value='' selected> Nenhum </option>";
 if($query->num_rows() > 0){

  foreach($query->result() as $row){
$echo_html ="";
$echo_html ="<option value='$row->id_contacto'";
if($id_contacto==$row->id_contacto){
  $echo_html .='selected';
}
$echo_html .='>'.$row->nome; '</option>';
echo $echo_html;
//echo "<option value='$row->id_comercial'>  $row->username </option>";

}
}
}


//Apanhar todos os comerciais em dropdown PARA EDITAR

public function comerciais_dropdown_edit(){

  $id_comercial = $this->input->post('id_comercial'); 
  $this->load->model('contactos_m');
  $query = $this->contactos_m->get_all_comerciais();

  echo "<option value='' selected> Nenhum </option>";
 if($query->num_rows() > 0){

  foreach($query->result() as $row){
$echo_html ="";
$echo_html ="<option value='$row->id_comercial'";
if($id_comercial==$row->id_comercial){
  $echo_html .='selected';
}
$echo_html .='>'.$row->username; '</option>';
echo $echo_html;
//echo "<option value='$row->id_comercial'>  $row->username </option>";

}
}
}


//Apanhar todas as Empresas em dropdown PARA EDITAR
public function empresas_dropdown_edit(){

  $id_empresas = $this->input->post('id_empresas'); 

  $this->load->model('contactos_m');
  $query = $this->contactos_m->get_all_empresas();

  echo "<option value='' selected> Nenhum </option>";
 if($query->num_rows() > 0){

  foreach($query->result() as $row){

$echo_html ="";
$echo_html ="<option value='$row->id_empresas'";
if($id_empresas==$row->id_empresas){
  $echo_html .='selected';
}
$echo_html .='>'.$row->nomeEmpresa; '</option>';
echo $echo_html;
//echo "<option value='$row->id_empresas'>  $row->nomeEmpresa </option>";

}
}else{
  
  echo "<p> Não existem dados...</p>";
}

}


//Apanhar todas as Necessidades em dropdown PARA EDITAR

public function necessidade_dropdown_edit(){

  $id_necessidade = $this->input->post('id_necessidade'); 
  $this->load->model('contactos_m');
  $query = $this->contactos_m->get_all_necessidades();

  echo "<option value='' selected> Nenhum </option>";
 if($query->num_rows() > 0){

  foreach($query->result() as $row){

    $echo_html ="";
    $echo_html ="<option value='$row->id_necessidade'";
    if($id_necessidade==$row->id_necessidade){
      $echo_html .='selected';
    }
    $echo_html .='>'.$row->necessidade; '</option>';
    echo $echo_html;
//echo "<option value='$row->id_necessidade'>  $row->necessidade </option>";

}
}else{
  
  echo "<p> Não existem dados...</p>";
}

}



//editar detalhes ficheiro

public function edit_ficheiro(){

$result = array();



$edit_id_ficheiro = $this->input->post('edit_id_ficheiro');
//$editNomeFicheiro = $this->input->post('editNomeFicheiro');
$editData = $this->input->post('editData');
$edit_id_contacto = $this->input->post('edit_id_contacto');
$edit_id_comercialForm = $this->input->post('edit_id_comercialForm');
$editDescricao = $this->input->post('editDescricao');

  $data = array(

  'id_ficheiros' => $edit_id_ficheiro,
  //'nome' => $editNomeFicheiro,
  'dataHoras' => $editData,
  'id_contacto' => $edit_id_contacto,
  'id_comercial' => $edit_id_comercialForm,
  'descricao' => $editDescricao
  
  );

  $this->load->model('contactos_m');
  if($this->contactos_m->edit_ficheiro($data)){

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

//CRIAR NOTA

public function create_nota(){
$result = array();


$notaTitulo = $this->input->post('notaTitulo');
$nota = $this->input->post('nota');
$dataNota = $this->input->post('dataNota');
$notaContacto = $this->input->post('notaContacto');
$nota_id_comercialForm = $this->input->post('nota_id_comercialForm');

  $data = array(

  'notaTitulo' => $notaTitulo,
  'nota' => $nota,
  'diaHoras' => $dataNota,
  'id_comercial' => $nota_id_comercialForm,
  'id_contacto' => $notaContacto
  
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




//Apanhar dados para editar os detalhes NOTAS

public function get_dados_editNotas(){

  $id = $this->input->post('id');
  $this->load->model('contactos_m');

  $result = $this->contactos_m->get_dados_editNotas($id);
  $values = array();
  if($result->num_rows() > 0){
    foreach($result->result() as $res){


      $values['notaTitulo'] = $res->notaTitulo;
      $values['diaHoras'] = $res->diaHoras;
      $values['nota'] = $res->nota;
      $values['id_comercial'] = $res->id_comercial;
      $values['id_notas'] = $res->id_notas;

      //echo json_encode($values);
    }
}

echo json_encode($values);
}



//Apanhar dados para editar os detalhes NEGOCIO

public function get_dados_editNegocio(){

  $id = $this->input->post('id');
  $this->load->model('contactos_m');

  $result = $this->contactos_m->get_dados_edit_negocio($id);
  $values = array();
  if($result->num_rows() > 0){
    foreach($result->result() as $res){


      $values['id_negocio'] = $res->id_negocio;
      $values['nomeNegocio'] = $res->nomeNegocio;
      $values['numeroOrcamento'] = $res->numeroOrcamento;
      $values['valorNegocio'] = $res->valorNegocio;
      $values['ajudicado'] = $res->ajudicado;
      $values['motivosNaoAvancou'] = $res->motivosNaoAvancou;
      $values['id_funil'] = $res->id_funil;
      $values['id_estadoNegocio'] = $res->id_estadoNegocio;
      $values['id_contacto'] = $res->id_contacto;
      $values['id_comercial'] = $res->id_comercial;

      //echo json_encode($values);
    }
}

echo json_encode($values);
}



//Check if nomeContacto does exist in database but can keep the same
public function editNotaTituloUniqueName(){

  $editNotaTitulo = $this->input->post('editNotaTitulo');
  $id = $this->input->post('id');


  $this->load->model('contactos_m');
  if($this->contactos_m->editNotaTituloUniqueName($editNotaTitulo, $id)){
 $result['success'] = true;
    echo json_encode($result);
  }else{   
    $result['success'] = false;
    echo json_encode($result);
  }

}




//editar NEGOCIO

public function edit_negocio(){

  $result = array();
  
  $id_contactoEditarNegocio = $this->input->post('id_contactoEditarNegocio');
  $nomeDoNegocioEditarNegocio = $this->input->post('nomeDoNegocioEditarNegocio');
  $etapaFunilEditarNegocio = $this->input->post('etapaFunilEditarNegocio');
  $estadoNegocioEditarNegocio = $this->input->post('estadoNegocioEditarNegocio');
  $id_comercialEditarNegocio = $this->input->post('id_comercialEditarNegocio');
  $valorNegocioEditarNegocio = $this->input->post('valorNegocioEditarNegocio');
  $numeroOrcamentoEditarNegocio = $this->input->post('numeroOrcamentoEditarNegocio');
  $ajudicadoEditarNegocio = $this->input->post('ajudicadoEditarNegocio');
  $motivosEditarNegocio = $this->input->post('motivosEditarNegocio');
  $id_negocio_seleccionado = $this->input->post('id_negocio_seleccionado');
  
if($id_contactoEditarNegocio==''){

    $id_contactoEditarNegocio = NULL;
}
if($etapaFunilEditarNegocio==''){

  $etapaFunilEditarNegocio = NULL;
}
if($estadoNegocioEditarNegocio==''){

  $estadoNegocioEditarNegocio = NULL;
}
if($id_comercialEditarNegocio==''){

  $id_comercialEditarNegocio = NULL;
}

if($numeroOrcamentoEditarNegocio==''){

  $numeroOrcamentoEditarNegocio = NULL;
}
if($valorNegocioEditarNegocio==''){

  $valorNegocioEditarNegocio = NULL;
}
if($motivosEditarNegocio==''){

  $motivosEditarNegocio = NULL;
}

  $this->load->library('form_validation');
  $this->form_validation->set_rules('id_contactoEditarNegocio','Contacto','required');
  $this->form_validation->set_rules('nomeDoNegocioEditarNegocio','NomeNegócio','required');
  $this->form_validation->set_rules('etapaFunilEditarNegocio','Etapa','required');
  $this->form_validation->set_rules('estadoNegocioEditarNegocio','EstadoNegócio','required');
  $this->form_validation->set_rules('id_comercialEditarNegocio','Proprietário','required');
  $this->form_validation->set_rules('valorNegocioEditarNegocio','ValorNegócio','numeric');
  $this->form_validation->set_rules('numeroOrcamentoEditarNegocio','Orçamento','numeric');
  $this->form_validation->set_rules('ajudicadoEditarNegocio','Ajudicado','required');
  if($this->form_validation->run()){

    $data = array(
  
    'id_negocio' => $id_negocio_seleccionado,
    'nomeNegocio' => $nomeDoNegocioEditarNegocio,
    'numeroOrcamento' => $numeroOrcamentoEditarNegocio,
    'valorNegocio' => $valorNegocioEditarNegocio,
    'ajudicado' => $ajudicadoEditarNegocio,
    'motivosNaoAvancou' => $motivosEditarNegocio,
    'id_funil' => $etapaFunilEditarNegocio,
    'id_estadoNegocio' => $estadoNegocioEditarNegocio,
    'id_contacto' => $id_contactoEditarNegocio,
    'id_comercial' => $id_comercialEditarNegocio
    
    );
  
    $this->load->model('contactos_m');
    if($this->contactos_m->edit_negocio($data)){
  
      //$result['id_negocio'] = $id_negocio_seleccionado;
      $result['msg'] = "<div class='alert alert-success' role='alert'>
      Os detalhes do Negócio foram editados com sucesso!
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
  }





//editar detalhes NOTA

public function edit_nota(){

  $result = array();
  
  
  
  $edit_nota_id_comercialForm = $this->input->post('edit_nota_id_comercialForm');
  $editNotaTitulo = $this->input->post('editNotaTitulo');
  $editNota = $this->input->post('editNota');
  $editDataNota = $this->input->post('editDataNota');
  $edit_id_notas = $this->input->post('edit_id_notas');
  
    $data = array(
  
    'id_comercial' => $edit_nota_id_comercialForm,
    'notaTitulo' => $editNotaTitulo,
    'nota' => $editNota,
    'diaHoras' => $editDataNota,
    'id_notas' => $edit_id_notas
    
    );
  
    $this->load->model('contactos_m');
    if($this->contactos_m->edit_nota($data)){
  
      $result['id_notas'] = $edit_id_notas;
      $result['msg'] = "<div class='alert alert-success' role='alert'>
      Os detalhes da nota foram editados com sucesso!
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




//Apanhar dados para editar os detalhes do CONTACTO

public function get_dados_editContacto(){

  $id = $this->input->post('id');
  $this->load->model('contactos_m');

  $result = $this->contactos_m->get_dados_editContacto($id);
  $values = array();
  if($result->num_rows() > 0){
    foreach($result->result() as $res){


      $values['id_contacto'] = $res->id_contacto;
      $values['nome'] = $res->nome;
      $values['pessoaDeContacto'] = $res->pessoaDeContacto;
      $values['telemovel'] = $res->telemovel;
      $values['telemovel2'] = $res->telemovel2;
      $values['email'] = $res->email;
      $values['dataVisita'] = $res->dataVisita;
      $values['clienteNovo'] = $res->clienteNovo;
      $values['id_comercial'] = $res->id_comercial;
      $values['id_empresas'] = $res->id_empresas;
      $values['observacoes'] = $res->observacoes;
      $values['id_origem'] = $res->id_origem;
      $values['id_necessidade'] = $res->id_necessidade;
      $values['id_canal'] = $res->id_canal;

    }
}

$result2 = $this->contactos_m->get_dados_morada_editContacto($id);
if($result2->num_rows() > 0){
  foreach($result2->result() as $res){


    $values['cidade'] = $res->cidade;
    $values['rua'] = $res->rua;
    $values['codigoPostal'] = $res->codigoPostal;

  }
}



echo json_encode($values);
}




//EDITAR DETALHES CONTACTO

public function edit_contacto(){

  $result = array();
  
  
  
  $nomeEditContacto = $this->input->post('nomeEditContacto');
  $pessoaDeContactoEditContacto = $this->input->post('pessoaDeContactoEditContacto');
  $telemovelEditContacto = $this->input->post('telemovelEditContacto');
  $telemovel2EditContacto = $this->input->post('telemovel2EditContacto');
  $emailEditContacto = $this->input->post('emailEditContacto');
  $observacoesEditContacto = $this->input->post('observacoesEditContacto');
  $dataEditContacto = $this->input->post('dataEditContacto');
  $empresaEditContacto = $this->input->post('empresaEditContacto');
  $id_comercialEditContacto = $this->input->post('id_comercialEditContacto');
  $clienteNovoEditContacto = $this->input->post('clienteNovoEditContacto');
  $necessidadeEditContacto = $this->input->post('necessidadeEditContacto');
  $origemEditContacto = $this->input->post('origemEditContacto');
  $canalEditContacto = $this->input->post('canalEditContacto');
  $idContacto = $this->input->post('idContacto');

  $cidadeEditContacto = $this->input->post('cidadeEditContacto');
  $ruaEditContacto = $this->input->post('ruaEditContacto');
  $codPostalEditContacto = $this->input->post('codPostalEditContacto');
  
if($telemovel2EditContacto==''){

    $telemovel2EditContacto = NULL;
}

if($empresaEditContacto==''){

    $empresaEditContacto = NULL;
}
if($canalEditContacto==''){

    $canalEditContacto = NULL;
}
if($origemEditContacto==''){

    $origemEditContacto = NULL;
}
if($necessidadeEditContacto==''){

    $necessidadeEditContacto = NULL;
}

    $data = array(
  
    'id_contacto' => $idContacto,  
    'nome' => $nomeEditContacto,
    'pessoaDeContacto' => $pessoaDeContactoEditContacto,
    'telemovel' => $telemovelEditContacto,
    'telemovel2' => $telemovel2EditContacto,
    'email' => $emailEditContacto,
    'dataVisita' => $dataEditContacto,
    'clienteNovo' => $clienteNovoEditContacto,
    'id_comercial' => $id_comercialEditContacto,
    'id_empresas' => $empresaEditContacto,
    'observacoes' => $observacoesEditContacto,
    'id_origem' => $origemEditContacto,
    'id_necessidade' => $necessidadeEditContacto,
    'id_canal' => $canalEditContacto
    
    );

    $data2 = array(
  
      'id_contacto' => $idContacto,
      'cidade' => $cidadeEditContacto,  
      'rua' => $ruaEditContacto,
      'codigoPostal' => $codPostalEditContacto
      
      );
  

    $this->load->model('contactos_m');

    $this->load->model('categorias_m');


    if($this->contactos_m->edit_contacto($data)){
  
      if($cidadeEditContacto==NULL||$ruaEditContacto==NULL||$codPostalEditContacto==NULL){
        $result['msg'] = "<div class='alert alert-success' role='alert'>
        Os detalhes do contacto foram editados, mas os detalhes da morada não foram editados!
      </div>";
        $result['success'] = true;
        echo json_encode($result);
    }else{
      if($this->categorias_m->se_existe_morada_id_contacto($data2)){
      if($this->contactos_m->edit_morada($data2)){

        $result['msg'] = "<div class='alert alert-success' role='alert'>
        Os detalhes do contacto foram editados com sucesso!
      </div>";
        $result['success'] = true;
        echo json_encode($result);

    }
    else
    {

      $result['msg'] = "<div class='alert alert-success' role='alert'>
      Os detalhes do contacto foram editados, mas os detalhes da morada não foram editados!
    </div>";
      $result['success'] = true;
      echo json_encode($result);

    }
    
  }else{
    if($cidadeEditContacto!=NULL && $ruaEditContacto!=NULL && $codPostalEditContacto!=NULL){
    if($this->categorias_m->insert_morada($data2)){
  
      $result['msg'] = "<div class='alert alert-success' role='alert'>
      Os detalhes do contacto foram editados com sucesso!
    </div>";
      $result['success'] = true;
      echo json_encode($result);
  
    }else{
      
      $result['msg'] =  "<div class='alert alert-danger' role='alert'>
      Os detalhes do contacto foram editados, mas os detalhes da morada não foram editados!
    </div>";
      $result['success'] = true;
      echo json_encode($result);
  
    }
  
  }else{

  $result['msg'] = "<div class='alert alert-success' role='alert'>
  Os detalhes do contacto foram editados, mas os detalhes da morada não foram editados!
</div>";
  $result['success'] = true;
  echo json_encode($result);
  }
  }
}
    }
else
{
  $result['msg'] =  "<div class='alert alert-danger' role='alert'>
  Não foi possível realizar a operação!
</div>";
  $result['success'] = false;
  echo json_encode($result);
}

  

}





//Apanhar todas as PERMISSOES EM OPTION 

public function permissoes_dropdown(){

  $this->load->model('contactos_m');
  $query = $this->contactos_m->permissoes_dropdown();


 if($query->num_rows() > 0){

  foreach($query->result() as $row){


    echo "<div class='form-check'>";
    echo "<label class='form-check-label'>";
      echo "<input type='radio' class='form-check-input' value='$row->id_origem' name='origem'>$row->origem";
    echo "</label>";
  echo "</div>";

}
}else{
  
  echo "<div class='form-check'>";
  echo "<label class='form-check-label'>";
    echo "<input type='radio' class='form-check-input' name='origem' value='' checked>Nenhum";
  echo "</label>";
echo "</div>";
}

}



















































}//end class