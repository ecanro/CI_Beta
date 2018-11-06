<?php

    include_once'header.php';

?>



<?php 		


$nome = $this->input->post('nome');
$pessoaDeContacto = $this->input->post('pessoaDeContacto'); 
$telemovel = $this->input->post('telemovel');
$telemovel2 = $this->input->post('telemovel2');
$email = $this->input->post('email');
$dataVisita = $this->input->post('dataVisita');
$clienteNovo = $this->input->post('clienteNovo');
$clienteNovoSim = 1;
$clienteNovoNao = 0;
if($clienteNovo == null){
  $clienteNovo = $clienteNovoSim;
}
$id_comerciante = $this->input->post('id_comerciante');

if($id_comerciante == null){


  if($this->session->userdata('username')) :?>

<?php $id_comerciante = $this->contactos_model->get_comerciante_by_session_username($this->session->userdata('username')); ?>

<?php endif;

}

$id_empresas = $this->input->post('id_empresas');
$observacoes = $this->input->post('observacoes');
$id_origem = $this->input->post('id_origem');
$id_necessidade = $this->input->post('id_necessidade');
$id_canal = $this->input->post('id_canal');

$data = $this->input->post('data');

$cidade = $this->input->post('cidade');
$rua = $this->input->post('rua');
$codigoPostal = $this->input->post('codigoPostal');

?>

<div class="text-center loginHeader errorMsg">
<h2>Criar Contacto</h2>
<?php
echo $this->session->flashdata('error3');
?>
<br>
<?php
echo $this->session->flashdata('error2');
?>
<br>
<?php
echo $this->session->flashdata('success');


?>
</div>
<div class="container registCenter">
<div class="formregist">

<form method="post" action="<?php echo base_url(); ?>contactos_controller/create_contacto_validation">
<div><h1>Informações do Contacto</h1></div>

<label>Empresa</label>
  <select class="custom-select" name="id_empresas">
  <option value="">Nenhuma</option>
  <?php

if($get_empresas->num_rows() > 0){

  foreach($get_empresas->result() as $row){

    ?>
    <option value="<?php echo $row->id_empresas ?>"<?php
  if ($id_empresas == $row->id_empresas) {
  ?> selected <?php
  }
  ?>><?php echo $row->nomeEmpresa ?></option>  

    <?php

}


}else{
?>
<tr>
<td colspan="3"> Não existem resultados</td>
</tr> 
<?php
}

?>

  </select>
  <span class="text-danger"><?php echo form_error('id_empresas'); ?></span>


<div class="form-group">
<label>Nome(FALTA CHECAR SE JA EXISTE)</label>
<input type="text" name="nome" placeholder=" Nome" value="<?php echo $nome ?>" class="form-control" />
<span class="text-danger"><?php echo form_error('nome'); ?></span>
</div>
<div class="form-group">
<label>Pessoa De Contacto</label>
<input type="text" name="pessoaDeContacto" placeholder="pessoaDeContacto" value="<?php echo $pessoaDeContacto ?>" class="form-control" />
<span class="text-danger"><?php echo form_error('pessoaDeContacto'); ?></span>
</div>
<div class="form-group">
<label>Telemóvel</label>
<input type="text" name="telemovel" placeholder="Telemóvel" value="<?php echo $telemovel ?>" class="form-control" />
<span class="text-danger"><?php echo form_error('telemovel'); ?></span>
</div>
<div class="form-group">
<label>Telemóvel2</label>
<input type="text" name="telemovel2" placeholder="Telemóvel" value="<?php echo $telemovel2 ?>" class="form-control" />
<span class="text-danger"><?php echo form_error('telemovel2'); ?></span>
</div>
<div class="form-group">
<label>Email</label>
<input type="email" name="email" placeholder="Email" value="<?php echo $email ?>" class="form-control" />
<span class="text-danger"><?php echo form_error('email'); ?></span>
</div>
<div class="form-group">
<label>Rua</label>
<input type="text" name="rua" placeholder="Rua" value="<?php echo $rua ?>" class="form-control" />
<span class="text-danger"><?php echo form_error('rua'); ?></span>
</div>
<div class="form-group">
<label>Cod-Postal</label>
<input type="text" name="codigoPostal" placeholder="CodPostal" value="<?php echo $codigoPostal ?>" class="form-control" />
<span class="text-danger"><?php echo form_error('codigoPostal'); ?></span>
</div>
<div class="form-group">
<label>Cidade</label>
<input type="text" name="cidade" placeholder="Cidade" value="<?php echo $cidade ?>" class="form-control" />
<span class="text-danger"><?php echo form_error('cidade'); ?></span>
</div>
<div class="form-group">
<label>Observações</label>
<textarea name="observacoes" placeholder="observacoes" class="form-control"><?php echo $observacoes ?></textarea>
<span class="text-danger"><?php echo form_error('observacoes'); ?></span>
</div>




<div><h1>Outras Informações</h1></div>

 <label>Proprietário</label>
  <select class="custom-select" name="id_comerciante">
  <?php

if($get_comerciantes->num_rows() > 0){

  foreach($get_comerciantes->result() as $row){

    ?>
    <option value="<?php echo $row->id_comerciante ?>"<?php
  if ($id_comerciante == $row->id_comerciante) {
  ?> selected <?php
  }
  ?>><?php echo $row->username ?></option>  

    <?php

}


}else{
?>
<tr>
<td colspan="3"> Não existem resultados</td>
</tr> 
<?php
}

?>

  </select>
  <span class="text-danger"><?php echo form_error('id_comerciante'); ?></span>



 <label>Cliente Novo</label>
  <select class="custom-select" name="clienteNovo">
  <option value="<?php echo $clienteNovoSim ?>"<?php
  if ($clienteNovo == $clienteNovoSim) {
  ?> selected <?php
  }
  ?>>Sim</option>  
  <option value="<?php echo $clienteNovoNao ?>"<?php
  if ($clienteNovo == $clienteNovoNao) {
  ?> selected <?php
  }
  ?>>Não</option>  
  </select>



<label>Necessidade</label>
  <select class="custom-select" name="id_necessidade">
  <option value="">Nenhuma</option>

  <?php

if($get_necessidade->num_rows() > 0){

  foreach($get_necessidade->result() as $row){

    ?>
    <option value="<?php echo $row->id_necessidade ?>"<?php
  if ($id_necessidade == $row->id_necessidade) {
  ?> selected <?php
  }
  ?>><?php echo $row->necessidade ?></option>  

    <?php

}


}else{
?>
<tr>
<td colspan="3"> Não existem resultados</td>
</tr> 
<?php
}

?>

  </select>
  <span class="text-danger"><?php echo form_error('id_necessidade'); ?></span>


                    

<label>Origem</label>
<div class="radio">
  <label><input type="radio" name="id_origem" value="" <?php if($id_origem==null) ?>checked>Nenhum</label>
</div>
<?php

                if($get_origem->num_rows() > 0){
  
                  foreach($get_origem->result() as $row){
  
                    ?>
<div class="radio">
  <label><input type="radio" name="id_origem" value="<?php echo $row->id_origem ?>" <?php
  if ($id_origem == $row->id_origem) {
  ?> checked <?php
  }
  ?>
  ><?php echo $row->origem ?></label>
</div>

                    <?php
  
}


}else{
?>
<tr>
<td colspan="3"> Não existem resultados</td>
</tr> 
<?php
}

?>
  <span class="text-danger"><?php echo form_error('id_origem'); ?></span>



<label>Canal</label>
<div class="radio">
  <label><input type="radio" name="id_canal" value="" <?php if($id_canal==null) ?>checked>Nenhum</label>
</div>
<?php

                if($get_canal->num_rows() > 0){
  
                  foreach($get_canal->result() as $row){
  
                    ?>
<div class="radio">
  <label><input type="radio" name="id_canal" value="<?php echo $row->id_canal ?>" <?php
  if ($id_canal == $row->id_canal) {
  ?> checked <?php
  }
  ?>
  ><?php echo $row->canal ?></label>
</div>

                    <?php
  
}


}else{
?>
<tr>
<td colspan="3"> Não existem resultados</td>
</tr> 
<?php
}

?>
  <span class="text-danger"><?php echo form_error('id_canal'); ?></span>


<label>Data</label>


<div class="input-group date">
    <input type="date" name="data" value="<?php echo $data ?>" class="form-control">
</div>
<span class="text-danger"><?php echo form_error('data'); ?></span>

<br>



<div class="form-group text-center">
<button type="submit" name="insert" value="regist" class="btn btn-default">Criar Nova Conta</button>

</div>
</form>
</div>
</div>

<?php

include_once'footer.php';

?>

