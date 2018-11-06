<?php if (!$this->session->userdata('username')) {

  redirect(base_url('login/log/'));

} else {
  ?>

<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/style_layout.css'); ?>">

  
</head>
<body>

<?php
$id_not = $this->uri->segment(3);
$id = json_encode($id_not);

$clienteNovoSim = 1;
$clienteNovoNao = 0;
$clienteNovo = null;
if ($clienteNovo == null) {
  $clienteNovo = $clienteNovoSim;
}

$ajudicadoSim = 1;
$ajudicadoNao = 0;
$ajudicacao = null;
if ($ajudicacao == null) {
  $ajudicacao = $ajudicadoNao;
}
?>


<div class="redStripe">
 
 <img src="/assets/images/logo_side_gp.png" alt="logo">
<!-- SESSION STUFF TEST-->
<div class="container loggedMessage">
<div class="d-flex justify-content-md-between">
<div class="col-10">
         <?php
        if ($this->session->userdata('username')) : ?>
            <p class="bemVindo">Bem vindo,</p>
            <p class="nomeUtilizador"><?php echo $this->session->userdata('id_comercial') ?> - <?php echo $this->session->userdata('username') ?></p>

  <?php endif; ?>
</div>
  <?php
  if ($this->session->userdata('username')) : ?>

     <a class="nav-link" href="<?php echo base_url('/login/logout'); ?>">Logout</a>
   <?php else : ?>
    <a class="nav-link" href="<?php echo base_url('/login/logout'); ?>">Registar <span class="sr-only">(current)</span></a>
    <a class="nav-link" href="<?php echo base_url('/login/log'); ?>">Login <span class="sr-only">(current)</span></a>
  <?php endif; ?>
        </div>
</div>
<!-- SESSION STUFF TEST END-->

</div>


<br>
<div class="container">
  <div class="row">
  <div class="col-lg-12 col-md-12 col-xs-6">
<nav>
  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-contactos-tab" data-toggle="tab" href="#contactos" role="tab" aria-controls="nav-contact" aria-selected="true"><i class="fa fa-users"></i> Contactos</a>
    <a class="nav-item nav-link" id="nav-negocios-tab" data-toggle="tab" href="#negocios" role="tab" aria-controls="nav-home" aria-selected="false"><i class="fa fa-briefcase "></i> Negócios</a>
    <a class="nav-item nav-link" id="nav-empresas-tab" data-toggle="tab" href="#empresas" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-sticky-note"></i> Empresas</a>
    <a class="nav-item nav-link" id="nav-tarefas-tab" data-toggle="tab" href="#tarefas" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-tasks"></i> Tarefas</a>
   <?php if ($this->session->userdata('nomePermissao') == 'Admin') { ?>
    <a class="nav-item nav-link" id="nav-administracao-tab" data-toggle="tab" href="#administracao" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-tasks"></i> Administração</a>
   <?php 
} else {
} ?>
  </div>
</nav>
</div>
</div>
</div>



<!-- INICIO TAB CONTAINER -->
  <div class="tab-content">
<br>
<br>

<!-- INICIO TAB NEGOCIOS -->
<div id="negocios" class="tab-pane fade in">
<div class="container">
  <div class="row">
<div class="col-lg-12 col-md-12 col-xs-12">
<div id="showNegociosMessage"></div>
<button type="button" class="btn btn-outline-secondary buttonStyle pull-right" onclick='createNegocioDropdowns()'  data-toggle="modal" data-target="#createNegocioModal"><i class="fa fa-plus faButton"></i> Criar Negócio</button>

</div>
</div>
</div>
<br>

<div class="container">
 <div class="table-responsive">
<table class="table table-striped table-bordered display nowrap" style="width:100%" id="negociosDatatable">
                    <thead>
                      <tr>
                           <th>Id</th>
                           <th>NomeNegócio</th>
                           <th>EstadoNegócio</th>
                           <th>Contacto</th>
                           <th>Proprietário</th>
</tr>
                    </thead>			
                    </table>

</div>
</div>


<!--Initialize NEGOCIOS datatable-->
<script>
    $(document).ready(function () {
        $('#negociosDatatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
		     "url": "<?php echo base_url('categorias/negocio_table_datatable') ?>",
		     "dataType": "json",
		     "type": "POST",
		     "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
		                   },
                       "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
            },
	    "columns": [
		          { "data": "id_negocio" },
		          { "data": "nomeNegocio" },
		          { "data": "estadoNegocio" },
		          { "data": "nome" },
              { "data": "username" },
		       ]	 

	    });
    });
</script>

<!-- on click reload-->
<script>
  $(document).ready(function() {
    $( "#nav-negocios-tab" ).on( "click", function() {
      $('#negociosDatatable').DataTable().ajax.reload();
    });
  });
</script>

<!-- On click negocio jump to Negocio-->
<script>
  $(document).ready(function() {
    var table = $('#negociosDatatable').DataTable();
     
    $('#negociosDatatable tbody').on('click', 'tr', function () {
       var data = table.row( this ).data();
        //alert( 'You clicked on '+data.id_contacto+'\'s row' );
        var nome = data.nome;
        var id_negocio = data.id_negocio;
        $.ajax({
type:'POST',
data:{nome: nome},
url:'<?php echo base_url('categorias/getIdByNomeContacto') ?>',
success: function(result){

  var myresult = jQuery.parseJSON(result);
window.location = ' <?php echo base_url('negocios/negocios_detalhes/') ?>' + id_negocio;
          }

      });

    } );
} );
  </script>





<!-- Create NEGÓCIO -->

<div class="container">
<!-- The Modal -->
<div class="modal fade" id="createNegocioModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Criar Negócio</h4>
          <button id="closeCreateNegocioModal" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div class="container">
  <div class="row">
  <div class="col-lg-12 col-md-12 col-xs-6">
<nav>
  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-geral-tab" data-toggle="tab" href="#geral" role="tab" aria-controls="nav-contact" aria-selected="true"><i class="fa fa-info"></i> Geral</a>
    <a class="nav-item nav-link" id="nav-dadosDoNegocio-tab" data-toggle="tab" href="#dadosDoNegocio" role="tab" aria-controls="nav-home" aria-selected="false"><i class="fa fa-briefcase"></i> Dados do Negócio</a>
    <a class="nav-item nav-link" id="nav-itensCompraDoNegocio-tab" data-toggle="tab" href="#itensCompraDoNegocio" role="tab" aria-controls="nav-home" aria-selected="false"><i class="fa fa-fire-extinguisher "></i> Itens-Compra</a>
  </div>
</nav>
</div>
</div>
</div>

<form id="criarNegocioForm" method="post">
<div class="tab-content"><!-- INICIO TABS -->

<div id="geral" class="tab-pane active"><!-- TAB GERAL -->
<br>
<div class="form-group">
<label>Contacto</label>
<select class='custom-select' id='id_contactoCriarNegocio' name='id_contactoCriarNegocio'>
</select>
</div> 
<div class="form-group">
  <label>Nome do Negócio</label>
  <input type="text" name="nomeDoNegocioCriarNegocio" id="nomeDoNegocioCriarNegocio" placeholder="" class="form-control"></input>
</div> 
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-6">
  <div class="form-group">
  <label>Etapa do Negócio</label>
  <select class='custom-select' id='etapaFunilCriarNegocio' name='etapaFunilCriarNegocio'>
</select>
</div> 
</div>
<div class="col-lg-6 col-md-6 col-xs-12">
<div class="form-group">
  <label>Estado do Negócio</label>
  <select class='custom-select' id='estadoNegocioCriarNegocio' name='estadoNegocioCriarNegocio'>
</select>
</div> 
</div>
</div>
<div class="form-group">
<label>Proprietário</label>
<select class='custom-select' id='id_comercialCriarNegocio' name='id_comercialCriarNegocio'>
</select>
</div>
</div>
<!-- FIM TAB GERAL -->




<!-- TAB DADOS DO NEGOCIO -->


<div id="dadosDoNegocio" class="tab-pane fade in">
<br>  
<div class="form-group">
<label>Valor do Negócio</label>
<br>
<input id="valorNegocioCriarNegocio" type="number" name="valorNegocioCriarNegocio" value="" min ="0" max="9999999" placeholder="€" step="0.01"/>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">
<div class="form-group">
<label>Numero do Orçamento</label>
    <input type="text" name="numeroOrcamentoCriarNegocio" id="numeroOrcamentoCriarNegocio" class="form-control"></input>
</div> 
</div>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">   
<div class="form-group">
<label>Ajudicado</label>
<select class='custom-select' id='ajudicadoCriarNegocio' name='ajudicadoCriarNegocio'>
  <option value="<?php echo $ajudicadoSim ?>"<?php
                                            if ($ajudicacao == $ajudicadoSim) {
                                              ?> selected <?php

                                                        }
                                                        ?>>Sim</option>  
  <option value="<?php echo $ajudicadoNao ?>"<?php
                                            if ($ajudicacao == $ajudicadoNao) {
                                              ?> selected <?php

                                                        }
                                                        ?>>Não</option>  
  </select>
</div>
</div>
</div>

<div class="form-group">
<label>Motivos pelos quais não avançou:</label>
<textarea name="motivosCriarNegocio" id="motivosCriarNegocio" placeholder="" class="form-control"></textarea>
</div>

</div><!-- Fim TAB DADOS DO NEGOCIO -->



<div id="itensCompraDoNegocio" class="tab-pane"><!-- TAB ITENS-COMPRA -->
<h2>Aqui serão apresentadas as listas dos produtos a seleccionar...</h2>
</div><!-- FIM TAB ITENS-COMPRA -->

</div><!-- FIM TABS -->

        <!-- Modal footer -->
        <div class="modal-footer text-center">
        <input type="submit"  id="submitCriarNegocioButton" name="submit" value="Criar" class=" custom-close btn btn-secondary pull-center pull-right buttonStyle">
        </form>
        <button type="button" class="btn btn-secondary buttonStyle" data-dismiss="modal">Cancelar</button>
        </div>

      </div>
    </div>
  </div>
</div>

</div>





<!-- SHOW Dropdowns INFO IN CREATE NEGOCIO -->

<script>
function createNegocioDropdowns(){

  $("#criarNegocioForm").data('validator').resetForm();
  $('#criarNegocioForm')[0].reset();

$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('contactos/contactos_dropdown') ?>',
success: function(result){

$('#id_contactoCriarNegocio').html(result);

} 
});
$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('contactos/etapasFunil_dropdown') ?>',
success: function(result){

$('#etapaFunilCriarNegocio').html(result);

} 
});
$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('contactos/estadoDoNegocio_dropdown') ?>',
success: function(result){

$('#estadoNegocioCriarNegocio').html(result);

} 
});
$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('contactos/comerciais_dropdown') ?>',
success: function(result){

$('#id_comercialCriarNegocio').html(result);

} 
});
} 
</script>


<!-- Botao Criar Negocio -->
<script>
$(document).ready(function(value) {



  jQuery.validator.addMethod("contactoNotNull", function() {

var contacto = $('#id_contactoCriarNegocio').val();

if(contacto ==""|| contacto == null){

  return false;
}else{

  return true;
}


}, "Por favor adicione o contacto a que quer atribuir este negócio.");

  jQuery.validator.addMethod("etapaNotNull", function() {

var etapa = $('#etapaFunilCriarNegocio').val();

if(etapa ==""|| etapa == null){

  return false;
}else{

  return true;
}


}, "Indique a etapa em que se encontra o negócio a ser criado.");

  jQuery.validator.addMethod("comercialNotNull", function() {

var comercial = $('#id_comercialCriarNegocio').val();

if(comercial ==""|| comercial == null){

  return false;
}else{

  return true;
}


}, "Por favor atribua um comercial encarregue do negócio a ser criado.");



  jQuery.validator.addMethod("nomeNegocioCriarNegocioUniqueName", function() {

    var nomeDoNegocioCriarNegocio = $('#nomeDoNegocioCriarNegocio').val();
  $.ajax({
type:'POST',
data:{nomeDoNegocioCriarNegocio: nomeDoNegocioCriarNegocio},
url:'<?php echo base_url('contactos/nomeNegocioCriarNegocioUniqueName') ?>',
success: function(result){

  var myresult = jQuery.parseJSON(result);

  if(myresult.success==true){
test = false;

}else if(myresult.success==false){
test = true;
}
          }

      });

return test;

}, "O nome do contacto já se encontra em uso.");


$("#criarNegocioForm").validate({
	rules: {
		nomeDoNegocioCriarNegocio: {
      nomeNegocioCriarNegocioUniqueName: true,
			required: true,
			},
      id_contactoCriarNegocio: {
			required: true,
      contactoNotNull: true,
			},
      etapaFunilCriarNegocio: {
      etapaNotNull: true,
			required: true,
			},
      estadoNegocioCriarNegocio: {
      required:true,
			},
      id_comercialCriarNegocio: {
			required: true,
      comercialNotNull: true,
			},
      valorNegocioCriarNegocio: {
			number: true,
			},
      numeroOrcamentoCriarNegocio: {
			number: true,
			},
      ajudicadoCriarNegocio: {
			required: true,
			},
		},
    submitHandler: function(form) {
      if ($('#criarNegocioForm').valid()) {


        var id_contactoCriarNegocio = $('#id_contactoCriarNegocio').val();
        var nomeDoNegocioCriarNegocio = $('#nomeDoNegocioCriarNegocio').val();
        var etapaFunilCriarNegocio = $('#etapaFunilCriarNegocio').val();
        var estadoNegocioCriarNegocio = $('#estadoNegocioCriarNegocio').val();
        var id_comercialCriarNegocio = $('#id_comercialCriarNegocio').val();
        var valorNegocioCriarNegocio = $('#valorNegocioCriarNegocio').val();
        var numeroOrcamentoCriarNegocio = $('#numeroOrcamentoCriarNegocio').val();
        var ajudicadoCriarNegocio = $('#ajudicadoCriarNegocio').val();
        var motivosCriarNegocio = $('#motivosCriarNegocio').val();

//alert(origemCriarContacto);

$.ajax({
type:'POST',
data: {

id_contactoCriarNegocio: id_contactoCriarNegocio, 
nomeDoNegocioCriarNegocio:nomeDoNegocioCriarNegocio, 
etapaFunilCriarNegocio:etapaFunilCriarNegocio, 
estadoNegocioCriarNegocio:estadoNegocioCriarNegocio, 
id_comercialCriarNegocio: id_comercialCriarNegocio,
valorNegocioCriarNegocio: valorNegocioCriarNegocio,
numeroOrcamentoCriarNegocio: numeroOrcamentoCriarNegocio,
ajudicadoCriarNegocio: ajudicadoCriarNegocio,
motivosCriarNegocio: motivosCriarNegocio

},
url:'<?php echo base_url('categorias/create_negocio') ?>',
success: function(result){

var myresult = jQuery.parseJSON(result);

//console.log(myresult.success);
if(myresult.success==true){

$('#negociosDatatable').DataTable().ajax.reload();
$("#closeCreateNegocioModal").trigger("click");
$('#createNegocioModal')[0].reset();
$('#showNegociosMessage').fadeIn(1000).html(myresult.msg);
$('#showNegociosMessage').fadeOut(3000).html(myresult.msg);

}else{

$('#showNegociosMessage').fadeIn(1000).html(myresult.msg);
$('#showNegociosMessage').fadeOut(3000).html(myresult.msg);

}


            }
        });

       }
            
        }
});

}); 
</script>






</div><!-- FIM TAB NEGOCIOS -->


<!-- INICIO TAB EMPRESAS -->
<div id="empresas" class="tab-pane fade in">
<br>
<div class="container">
<p>Empresas..</p>


<!-- INICIO TAB TAREFAS -->
</div>
</div>

<div id="tarefas" class="tab-pane fade in">
<br>
<div class="container">
<p>Tarefas..</p>
</div>
</div>


<!-- INICIO TAB ADMINISTRACAO -->
<div id="administracao" class="tab-pane fade in">
<br>
<div class="container">
<p>Administração de Usuarios</p>
<button type="button" class="btn btn-outline-secondary buttonStyle pull-right" onclick='createUtilizadorButton()' data-toggle="modal" data-target="#createUtilizadorModal"><i class="fa fa-user faButton"></i> Criar Utilizador</button>
<div id="showOperationResults"></div>
</div>
<div class="container">
 <div class="table-responsive">
<table class="table table-striped table-bordered display nowrap" style="width:100%" id="userdatatable">
                    <thead>
                      <tr>
                           <th>Id</th>
                           <th>Usuario</th>
                           <th>Password</th>
                           <th>email</th>
                           <th>Nome</th>
                           <th>SobreNome</th>
                           <th>Telemovel</th>
                           <th>Nivel</th>
</tr>
                    </thead>			
                    </table>

</div>
</div>


<!-- Criar Utilizador BUTTON resetting form -->
<script>
  function createUtilizadorButton(){
    $("#createUtilizadorForm").data('validator').resetForm();
    $('#createUtilizadorForm')[0].reset();

$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('categorias/permissoes_dropdown') ?>',
success: function(result){

$('#permissoesCriarUtilizador').html(result);

} 
});

}
</script>

<!-- Criar Utilizador Modal -->

<div class="container">
<!-- The Modal -->
<div class="modal fade" id="createUtilizadorModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Criar Utilizador</h4>
          <button id="closeCreateUtilizadorModal" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

        <form id="createUtilizadorForm" method="post">

        <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
<div class="form-group">
  <label>Nome</label>
  <input type="text" name="nomeCriarUtilizador" id="nomeCriarUtilizador" placeholder="nome" class="form-control"></input>
</div> 
</div>
<div class="col-lg-6 col-md-6 col-xs-12">
<div class="form-group">
<label>Sobrenome</label>
<input type="text" name="sobrenomeCriarUtilizador" id="sobrenomeCriarUtilizador" placeholder="sobrenome" class="form-control"></input>
</div> 
</div>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">
<div class="form-group">
<label>Telemovel</label>
    <input type="text" name="telemovelCriarUtilizador" id="telemovelCriarUtilizador" class="form-control"></input>
</div> 
</div>

<div class="col-lg-6 col-md-6 col-xs-12">
<div class="form-group">
<label>Email</label>
    <input type="text" name="emailCriarUtilizador" id="emailCriarUtilizador" placeholder="example@gmail.com" class="form-control"></input>
</div> 
</div>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">
<div class="form-group">
<label>Nome de Utilizador</label>
    <input type="text" name="utilizadorCriarUtilizador" id="utilizadorCriarUtilizador" class="form-control"></input>
</div> 
</div>
<div class="col-lg-6 col-md-6 col-xs-12">
<div class="form-group">
<label>Permissões</label>
  <select class='custom-select' id='permissoesCriarUtilizador' name='permissoesCriarUtilizador'>
</select>
</div> 
</div>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">
<div class="form-group">
<label>Palavra-Passe</label>
    <input type="password" name="passwordCriarUtilizador" id="passwordCriarUtilizador" class="form-control"></input>
</div> 
</div>

<div class="col-lg-6 col-md-6 col-xs-12">
<div class="form-group">
<label>Confirmar Palavra-Passe</label>
    <input type="password" name="confirmPasswordCriarUtilizador" id="confirmPasswordCriarUtilizador" class="form-control"></input>
</div> 
</div>
</div>
    </div>

      <!-- Modal footer -->
      <div class="modal-footer text-center">
        <input type="submit"  id="submitCriarUtilizadorButton" name="submit" value="Criar Utilizador" class=" custom-close btn btn-secondary pull-center pull-right buttonStyle">
        </form>
        <button type="button" class="btn btn-secondary buttonStyle" data-dismiss="modal">Cancelar</button>
      </div>
      </div>
    </div>
  </div>
</div>


<!--Inicializa Users datatable -->
<script>
    $(document).ready(function () {
      $('#userdatatable').DataTable({
        "processing": true,
            "serverSide": true,
            "ajax":{
              "url": "<?php echo base_url('login/t_comerciais') ?>",
		     "dataType": "json",
		     "type": "POST",
		     "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
		                   },
                       "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
            },
	    "columns": [
		          { "data": "id_comercial" },
		          { "data": "username" },
		          { "data": "password" },
		          { "data": "email" },
              { "data": "nome" },
              { "data": "sobrenome" },
              { "data": "telemovel" },
              { "data": "nivel" },
              
		       ]	 
    
  });
  });
</script>
<!--fin-->


<!-- Botao Criar UTILIZADOR - JQUERY Validator plugin -->
<script>
$(document).ready(function(value) {

  jQuery.validator.addMethod("criarUtilizadorUniqueName", function() {

    var utilizadorCriarUtilizador = $('#utilizadorCriarUtilizador').val();
  $.ajax({
type:'POST',
data:{utilizadorCriarUtilizador: utilizadorCriarUtilizador},
url:'<?php echo base_url('login/criarUtilizadorUniqueName') ?>',
success: function(result){

  var myresult = jQuery.parseJSON(result);

  if(myresult.success==true){
test = false;

}else if(myresult.success==false){
test = true;
}
          }

      });

return test;

}, "O nome do contacto já se encontra em uso.");


$("#createUtilizadorForm").validate({
	rules: {
		nomeCriarUtilizador: {
			required: true,
			},
      permissoesCriarUtilizador: {
			required: true,
			},
      sobrenomeCriarUtilizador: {
			required: true,
			},
      telemovelCriarUtilizador: {
      number:true,
			required: true,
      minlength: 9,
      maxlength: 9,
			},
      emailCriarUtilizador: {
      email:true,
			required: true,
			},
      utilizadorCriarUtilizador: {
      criarUtilizadorUniqueName: true,
      required: true,
      minlength: 4,
			},
      passwordCriarUtilizador: {
			required: true,
      minlength: 4,
			},
      confirmPasswordCriarUtilizador: {
			required: true,
      equalTo: "#passwordCriarUtilizador",
			},
		},
    submitHandler: function(form) {
      if ($('#createUtilizadorForm').valid()) {

        var permissoesCriarUtilizador = $('#permissoesCriarUtilizador').val();
        var nomeCriarUtilizador = $('#nomeCriarUtilizador').val();
        var sobrenomeCriarUtilizador = $('#sobrenomeCriarUtilizador').val();
        var telemovelCriarUtilizador = $('#telemovelCriarUtilizador').val();
        var emailCriarUtilizador = $('#emailCriarUtilizador').val();
        var utilizadorCriarUtilizador = $('#utilizadorCriarUtilizador').val();
        var passwordCriarUtilizador = $('#passwordCriarUtilizador').val();
        var confirmPasswordCriarUtilizador = $('#confirmPasswordCriarUtilizador').val();

alert(confirmPasswordCriarUtilizador);

$.ajax({
type:'POST',
data: {

nomeCriarUtilizador:nomeCriarUtilizador, 
sobrenomeCriarUtilizador: sobrenomeCriarUtilizador,
telemovelCriarUtilizador: telemovelCriarUtilizador,
emailCriarUtilizador: emailCriarUtilizador,
utilizadorCriarUtilizador: utilizadorCriarUtilizador,
passwordCriarUtilizador: passwordCriarUtilizador,
confirmPasswordCriarUtilizador: confirmPasswordCriarUtilizador,
permissoesCriarUtilizador: permissoesCriarUtilizador

},
url:'<?php echo base_url('login/create_utilizador') ?>',
success: function(result){


var myresult = jQuery.parseJSON(result);

//console.log(myresult.success);
if(myresult.success==true){

$("#createUtilizadorModal").trigger("click");
$('#createUtilizadorForm')[0].reset();

$('#showOperationResults').fadeIn(1000).html(myresult.msg);
$('#showOperationResults').fadeOut(3000).html(myresult.msg);
$('#userdatatable').DataTable().ajax.reload();

}else{

$('#showOperationResults').fadeIn(1000).html(myresult.msg);
$('#showOperationResults').fadeOut(3000).html(myresult.msg);
$('#userdatatable').DataTable().ajax.reload();
}
            }
        });

       }
            
        }
});

}); 
</script>
</div>

<!-- END ADMINISTRAÇAO -->



<!-- INICIO CONTACTOS TAB -->

<div id="contactos" class="tab-pane active">
<div class="container">
  <div class="row">
<div class="col-lg-12 col-md-12 col-xs-12">
<div id="showContactosMessage"></div>
<button type="button" class="btn btn-outline-secondary buttonStyle pull-right" onclick='createContactoDropdowns()'  data-toggle="modal" data-target="#createContactoModal"><i class="fa fa-plus faButton"></i> Criar Contacto</button>

</div>
</div>
</div>
<br>

 <div class="container">
 <div class="table-responsive">
<table class="table table-striped table-bordered display nowrap" style="width:100%" id="t_contactos">
                    <thead>
                      <tr>
                           <th>Id</th>
                           <th>Nome</th>
                           <th>Pessoa de Contacto</th>
                           <th>Telemovel</th>
                           <th>Telemovel2</th>
                           <th>Email</th>
                           <th>Proprietário</th>
                           <th>Empresa</th>
</tr>
                    </thead>			
                    </table>

</div>



<!-- Create Contacto -->

<div class="container">
<!-- The Modal -->
<div class="modal fade" id="createContactoModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Criar Contacto</h4>
          <button id="closeCreateContactoModal" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div class="container">
  <div class="row">
  <div class="col-lg-12 col-md-12 col-xs-6">
<nav>
  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-dadosPessoais-tab" data-toggle="tab" href="#dadosPessoais" role="tab" aria-controls="nav-contact" aria-selected="true"><i class="fa fa-user"></i> Dados Pessoais</a>
    <a class="nav-item nav-link" id="nav-outrosDados-tab" data-toggle="tab" href="#outrosDados" role="tab" aria-controls="nav-home" aria-selected="false"><i class="fa fa-info"></i> Outros Dados</a>
  </div>
</nav>
</div>
</div>
</div>

<form id="criarContactoForm" method="post">
<div class="tab-content">
  
  
  <!-- INICIO TABS -->


  <!-- TAB DadosPessoais -->

<div id="dadosPessoais" class="tab-pane active">
<br>
<div class="form-group">
  <label>Nome</label>
  <input type="text" name="nomeCriarContacto" id="nomeCriarContacto" placeholder="nome" class="form-control"></input>
</div> 
<div class="form-group">
  <label>Pessoa De Contacto</label>
  <input type="text" name="pessoaDeContactoCriarContacto" id="pessoaDeContactoCriarContacto" placeholder="nomeContacto" class="form-control"></input>
</div> 
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-6">
<div class="form-group">
  <label for="telemovelCriarContacto">Telemóvel</label>
  <input type="text" name="telemovelCriarContacto" id="telemovelCriarContacto" placeholder="tlm" class="form-control inputShortCamps"></input>
</div> 
</div>
<div class="col-lg-6 col-md-6 col-xs-12">
<div class="form-group">
  <label for="telemovel2CriarContacto">Telemóvel2</label>
  <input type="text" name="telemovel2CriarContacto" id="telemovel2CriarContacto" placeholder="tlm2" class="form-control inputShortCamps"></input>
</div> 
</div>
</div>
<div class="form-group">
  <label>Email</label>
  <input type="text" name="emailCriarContacto" id="emailCriarContacto" placeholder="mail" class="form-control"></input>
</div>
<div class="form-group">
<label>Observações</label>
<textarea name="observacoesCriarContacto" id="observacoesCriarContacto" placeholder="observacoes" class="form-control"></textarea>
</div>  
<label>Data</label>
    <input type="date" name="dataCriarContacto" id="dataCriarContacto" class="form-control"></input>
<div class="row">
  <div class="col-lg-3 col-md-3 col-xs-3">
  <div class="form-group">
    <br>
  <label>Cidade</label>
  <input type="text" name="cidadeCriarContacto" id="cidadeCriarContacto" placeholder="cidade" class="form-control inputShortCamps"></input>
</div> 
</div>
<div class="col-lg-6 col-md-6 col-xs-6">
<div class="form-group">
    <br>
  <label>rua</label>
  <input type="text" name="ruaCriarContacto" id="ruaCriarContacto" placeholder="rua" class="form-control inputShortCamps"></input>
</div> 
</div>
<div class="col-lg-3 col-md-3 col-xs-3">
<div class="form-group">
    <br>
  <label>cod-postal</label>
  <input type="text" name="codPostalCriarContacto" id="codPostalCriarContacto" placeholder="codPostal" class="form-control inputShortCamps"></input>
</div> 
</div>
</div>
</div>
<!-- FIM TAB DadosPessoais -->



<!-- TAB OutrosDados -->

<div id="outrosDados" class="tab-pane fade in">
<br>
<div class="form-group">
<label>Empresa</label><button type='button' id='createEmpresaButton' class='btn btn-outline-secondary buttonStyle btn-sm' data-toggle='modal' data-target='#createEmpresaModal'><i class='fa fa-briefcase faButton'></i> Criar Empresa</button>
<select class='custom-select' id='empresaCriarContacto' name='empresaCriarContacto'>
</select>
</div> 
<div class="form-group">
<label>Proprietário</label>
<select class='custom-select' id='id_comercialCriarContacto' name='id_comercialCriarContacto'>
</select>
</div> 
<div class="form-group">
<label>Cliente Novo</label>
<select class='custom-select' id='clienteNovoCriarContacto' name='clienteNovoCriarContacto'>
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
</div>
<div class="form-group">
<label>Necessidade</label>
<select class='custom-select' id='necessidadeCriarContacto' name='necessidadeCriarContacto'>
</select>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-xs-6">
<label>Origem</label>
    <div id="origemCriarContacto"></div>
    </div>
<div class="col-lg-6 col-md-6 col-xs-6">
    <label>Canal</label>
    <div id="canalCriarContacto"></div>
    </div>
    </div>
</div>

<!-- Fim TAB OutrosDados -->


</div><!-- FIM TABS -->

        <!-- Modal footer -->
        <div class="modal-footer text-center">
        <input type="submit"  id="submitCriarContactoButton" name="submit" value="Criar" class=" custom-close btn btn-secondary pull-center pull-right buttonStyle">
        </form>
        <button type="button" class="btn btn-secondary buttonStyle" data-dismiss="modal">Cancelar</button>
        </div>

      </div>
    </div>
  </div>
</div>




<!-- Botao Criar Contacto -->
<script>
$(document).ready(function(value) {



  jQuery.validator.addMethod("notNull", function() {

var proprietario = $('#id_comercialCriarContacto').val();

if(proprietario ==""|| proprietario == null){

  return false;
}else{

  return true;
}


}, "Nao pode estar vazio");



  jQuery.validator.addMethod("criarContactoUniqueName", function() {

    var nomeCriarContacto = $('#nomeCriarContacto').val();
  $.ajax({
type:'POST',
data:{nomeCriarContacto: nomeCriarContacto},
url:'<?php echo base_url('contactos/criarContactoUniqueName') ?>',
success: function(result){

  var myresult = jQuery.parseJSON(result);

  if(myresult.success==true){
test = false;

}else if(myresult.success==false){
test = true;
}
          }

      });

return test;

}, "O nome do contacto já se encontra em uso.");

jQuery.validator.addMethod("zipcode", function(value, element) {
  return this.optional(element) || /^\d{4}(?:-\d{3})?$/.test(value);
}, "Please provide a valid zipcode. ex: xxxx-xxx");

$("#criarContactoForm").validate({
	rules: {
		nomeCriarContacto: {
      criarContactoUniqueName: true,
			required: true,
			},
      pessoaDeContactoCriarContacto: {
			required: true,
			},
      telemovelCriarContacto: {
      number:true,
			required: true,
      minlength: 9,
      maxlength: 9,
			},
      telemovel2CriarContacto: {
      number:true,
      minlength: 9,
      maxlength: 9,
			},
      emailCriarContacto: {
      email:true,
			required: true,
			},
      dataCriarContacto: {
      required: true,
			},
      id_comercialCriarContacto: {
			required: true,
      notNull: true,
			},
      clienteNovoCriarContacto: {
			required: true,
			},
      codPostalCriarContacto: {
			zipcode: true,
			},
		},
    submitHandler: function(form) {
      if ($('#criarContactoForm').valid()) {


        var nomeCriarContacto = $('#nomeCriarContacto').val();
        var pessoaDeContactoCriarContacto = $('#pessoaDeContactoCriarContacto').val();
        var telemovelCriarContacto = $('#telemovelCriarContacto').val();
        var telemovel2CriarContacto = $('#telemovel2CriarContacto').val();
        var emailCriarContacto = $('#emailCriarContacto').val();
        var observacoesCriarContacto = $('#observacoesCriarContacto').val();
        var dataCriarContacto = $('#dataCriarContacto').val();
        var cidadeCriarContacto = $('#cidadeCriarContacto').val();
        var ruaCriarContacto = $('#ruaCriarContacto').val();
        var codPostalCriarContacto = $('#codPostalCriarContacto').val();
        var empresaCriarContacto = $('#empresaCriarContacto').val();
        var id_comercialCriarContacto = $('#id_comercialCriarContacto').val();
        var clienteNovoCriarContacto = $('#clienteNovoCriarContacto').val();
        var necessidadeCriarContacto = $('#necessidadeCriarContacto').val();
        var origemCriarContacto = $('input[name=origem]:checked').val();
        var canalCriarContacto = $('input[name=canal]:checked').val();
//alert(origemCriarContacto);

$.ajax({
type:'POST',
data: {

nomeCriarContacto: nomeCriarContacto, 
pessoaDeContactoCriarContacto:pessoaDeContactoCriarContacto, 
telemovelCriarContacto:telemovelCriarContacto, 
telemovel2CriarContacto:telemovel2CriarContacto, 
emailCriarContacto: emailCriarContacto,
observacoesCriarContacto: observacoesCriarContacto,
dataCriarContacto: dataCriarContacto,
cidadeCriarContacto: cidadeCriarContacto,
ruaCriarContacto: ruaCriarContacto,
codPostalCriarContacto: codPostalCriarContacto,
empresaCriarContacto: empresaCriarContacto,
id_comercialCriarContacto: id_comercialCriarContacto,
clienteNovoCriarContacto: clienteNovoCriarContacto,
necessidadeCriarContacto: necessidadeCriarContacto,
origemCriarContacto: origemCriarContacto,
canalCriarContacto: canalCriarContacto

},
url:'<?php echo base_url('categorias/create_contacto') ?>',
success: function(result){

var myresult = jQuery.parseJSON(result);

//console.log(myresult.success);
if(myresult.success==true){

$("#closeCreateContactoModal").trigger("click");
$('#criarContactoForm')[0].reset();
$('#t_contactos').DataTable().ajax.reload();

$('#showContactosMessage').fadeIn(1000).html(myresult.msg);
$('#showContactosMessage').fadeOut(3000).html(myresult.msg);

}else{

$('#t_contactos').DataTable().ajax.reload();
$('#showContactosMessage').fadeIn(1000).html(myresult.msg);
$('#showContactosMessage').fadeOut(3000).html(myresult.msg);

}


            }
        });

       }
            
        }
});

}); 
</script>


<!-- CRIAR EMPRESA QUESTION Modal -->
<div class="container">
<!-- The Modal -->
<div class="modal fade" class="createEmpresaQuestionModal" id="createEmpresaQuestionModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Registar Empresa?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-center">
          <p>Deseja registar uma Empresa para o novo contacto a ser registado?</p>
          <p>Poderá registar a Empresa e associar o contacto mais tarde*</p>
        </div>
                <!-- Modal footer -->
                <div class="modal-footer text-center">
                <button type="button" class="btn btn-secondary buttonStyle" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- SHOW Dropdowns INFO IN CREATE CONTACTO -->

<script>
function createContactoDropdowns(){
  $("#criarContactoForm").data('validator').resetForm();
  $('#criarContactoForm')[0].reset();

$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('contactos/comerciais_dropdown') ?>',
success: function(result){

$('#id_comercialCriarContacto').html(result);

} 
});
$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('contactos/necessidade_dropdown') ?>',
success: function(result){

$('#necessidadeCriarContacto').html(result);

} 
});
$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('contactos/origem_options') ?>',
success: function(result){

$('#origemCriarContacto').html(result);

} 
});
$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('contactos/canal_options') ?>',
success: function(result){

$('#canalCriarContacto').html(result);

} 
});
$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('contactos/empresas_dropdown') ?>',
success: function(result){

$('#empresaCriarContacto').html(result);

} 
});
} 
</script>


<!--Initialize contactos datatable-->
<script>
    $(document).ready(function () {
        $('#t_contactos').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
		     "url": "<?php echo base_url('categorias/contact_table_datatable') ?>",
		     "dataType": "json",
		     "type": "POST",
		     "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
		                   },
                       "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
            },
	    "columns": [
		          { "data": "id_contacto" },
		          { "data": "nome" },
		          { "data": "pessoaDeContacto" },
		          { "data": "telemovel" },
              { "data": "telemovel2" },
              { "data": "email" },
              { "data": "username" },
              { "data": "nomeEmpresa" },
		       ]	 

	    });
    });
</script>


<!--Click on table row to jump to contact details-->

<script>
  $(document).ready(function() {
    var table = $('#t_contactos').DataTable();
     
    $('#t_contactos tbody').on('click', 'tr', function () {
       var data = table.row( this ).data();
        //alert( 'You clicked on '+data.id_contacto+'\'s row' );
        window.location = ' <?php echo base_url('contactos/contactos_detalhes/') ?>' + data.id_contacto;
    } );
} );
  </script>

<!-- on click reload-->
<script>
  $(document).ready(function() {
    $( "#nav-contactos-tab" ).on( "click", function() {
      $('#t_contactos').DataTable().ajax.reload();
    });
  });
</script>

<!--Click on table row to jump to contact details-->


</div>
</div><!-- CONTACTOS TAB -->

</div><!-- FIM TAB CONTAINER -->

<?php include_once 'footer.php'; ?>

</body>
</html>

<?php 
} ?>