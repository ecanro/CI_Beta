
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

						

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/style_layout.css');?>">

  
</head>
<body>

<?php

$id_negocio = $this->uri->segment(3);
$id_contacto;
$id_nota;
$id_ficheiro;
$i;
$numbers;

$ajudicadoSim = 1;
$ajudicadoNao = 0;
$ajudicacao = null;
if($ajudicacao == null){
  $ajudicacao = $ajudicadoNao;
}

?>



<div class="blueStripe">
  <h2>Grupo Safety</h2>
  <h2 class="lol">Protecção contra Incêncios</h2>
<!-- SESSION STUFF TEST-->
<div class="container loggedMessage">
         <?php
          if($this->session->userdata('username')) :?>
            <p>Bem vindo, <?php echo $this->session->userdata('id_comercial') ?><?php echo $this->session->userdata('username') ?><?php echo $this->session->userdata('nomePermissao') ?></p>
  <?php endif; ?>
  <?php
          if($this->session->userdata('username')) :?>
     <a class="nav-link" href="<?php echo base_url('/login/logout');?>">Logout</a>
   <?php else : ?>
    <a class="nav-link" href="<?php echo base_url('/login/logout');?>">Registar <span class="sr-only">(current)</span></a>
    <a class="nav-link" href="<?php echo base_url('/login/log');?>">Login <span class="sr-only">(current)</span></a>
  <?php endif; ?>
  </div>
<!-- SESSION STUFF TEST END-->

</div>

<div class="container">
  <div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12">
  <a <button type="button" href="<?php echo base_url('contactos/categorias/'); ?>" class="btn btn-outline-secondary buttonStyle buttonStyleBack "><i class="fa fa-chevron-circle-left faButton backbutton"></i> Categorias</button></a>
</div>
</div>
</div>

<br>
<div class="container">
  <div class="row">
  <div class="col-lg-12 col-md-12 col-xs-6">
<nav>
  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-detalhes-tab" data-toggle="tab" href="#detalhes" role="tab" aria-controls="nav-contact" aria-selected="true"><i class="fa fa-briefcase"></i> Detalhes</a>
    <a class="nav-item nav-link" id="nav-notas-tab" data-toggle="tab" href="#notas" role="tab" aria-controls="nav-home" aria-selected="false"><i class="fa fa-sticky-note "></i> Notas</a>
    <a class="nav-item nav-link" id="nav-tarefas-tab" data-toggle="tab" href="#tarefas" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-tasks"></i> Tarefas</a>
    <a class="nav-item nav-link" id="nav-ficheiros-tab" data-toggle="tab" href="#ficheiros" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-upload"></i> Ficheiros</a>
    <a class="nav-item nav-link" id="nav-contacto-tab" data-toggle="tab" href="#contacto" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-user"></i> Contacto</a>
    <a class="nav-item nav-link" id="nav-historico-tab" data-toggle="tab" href="#historico" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-history"></i> Histórico</a>
  </div>
</nav>
</div>
</div>
</div>




  <div class="tab-content"><!-- INICIO TAB CONTAINER -->
<br>
<br>

<div id="detalhes" class="tab-pane active"><!-- INICIO TAB NEGOCIOS -->

<div id="showNegociosMessage"></div>


<div class="container">
<div id="showMessages"></div>
<div class="row" id="showDetalhesNegocio"></div>
</div>







<!-- Edit NEGÓCIO -->

<div class="container">
<!-- The Modal -->
<div class="modal fade" id="editNegocioModalNegocios">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Editar Negócio</h4>
          <button id="closeEditNegocioModal" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div class="container">
  <div class="row">
  <div class="col-lg-12 col-md-12 col-xs-6">
<nav>
  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-geralEdit-tab" data-toggle="tab" href="#geralEdit" role="tab" aria-controls="nav-contact" aria-selected="true"><i class="fa fa-info"></i> Geral</a>
    <a class="nav-item nav-link" id="nav-dadosEditDoNegocio-tab" data-toggle="tab" href="#dadosEditDoNegocio" role="tab" aria-controls="nav-home" aria-selected="false"><i class="fa fa-briefcase"></i> Dados do Negócio</a>
    <a class="nav-item nav-link" id="nav-itensEditCompraDoNegocio-tab" data-toggle="tab" href="#itensEditCompraDoNegocio" role="tab" aria-controls="nav-home" aria-selected="false"><i class="fa fa-fire-extinguisher "></i> Itens-Compra</a>
  </div>
</nav>
</div>
</div>
</div>

<form id="editNegocioFormNegocios" method="post">
<div class="tab-content"><!-- INICIO TABS -->

<div id="geralEdit" class="tab-pane active"><!-- TAB GERAL -->
<br>
<div class="form-group">
<label>Contacto</label>
<select class='custom-select' id='id_contactoEditarNegocio' name='id_contactoEditarNegocio'>
</select>
</div> 
<div class="form-group">
  <label>Nome do Negócio</label>
  <input type="text" name="nomeDoNegocioEditarNegocio" id="nomeDoNegocioEditarNegocio" placeholder="" class="form-control"></input>
</div> 
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-6">
  <div class="form-group">
  <label>Etapa do Negócio</label>
  <select class='custom-select' id='etapaFunilEditarNegocio' name='etapaFunilEditarNegocio'>
</select>
</div> 
</div>
<div class="col-lg-6 col-md-6 col-xs-12">
<div class="form-group">
  <label>Estado do Negócio</label>
  <select class='custom-select' id='estadoNegocioEditarNegocio' name='estadoNegocioEditarNegocio'>
</select>
</div> 
</div>
</div>
<div class="form-group">
<label>Proprietário</label>
<select class='custom-select' id='id_comercialEditarNegocio' name='id_comercialEditarNegocio'>
</select>
</div>
 


</div><!-- FIM TAB GERAL -->


<div id="dadosEditDoNegocio" class="tab-pane fade in"><!-- TAB DADOS DO NEGOCIO -->
<br>  
<div class="form-group">
<label>Valor do Negócio</label>
<br>
<input id="valorNegocioEditarNegocio" type="number" name="valorNegocioEditarNegocio" value="" placeholder="€" step="0.01"/>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">
<div class="form-group">
<label>Numero do Orçamento</label>
    <input type="text" name="numeroOrcamentoEditarNegocio" id="numeroOrcamentoEditarNegocio" class="form-control"></input>
</div> 
</div>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">   
<div class="form-group">
<label>Ajudicado</label>
<select class='custom-select' id='ajudicadoEditarNegocio' name='ajudicadoEditarNegocio'>
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
<textarea name="motivosEditarNegocio" id="motivosEditarNegocio" placeholder="" class="form-control"></textarea>
</div>

</div><!-- Fim TAB DADOS DO NEGOCIO -->



<div id="itensEditCompraDoNegocio" class="tab-pane"><!-- TAB ITENS-COMPRA -->
<h2>Aqui serão apresentadas as listas dos produtos a seleccionar...</h2>
</div><!-- FIM TAB ITENS-COMPRA -->

</div><!-- FIM TABS -->

        <!-- Modal footer -->
        <div class="modal-footer text-center">
        <input type="submit"  id="submitEditarNegocioButton" name="submitEditarNegocioButton" value="Editar" class=" custom-close btn btn-secondary pull-center pull-right buttonStyle">
        </form>
        <button type="button" class="btn btn-secondary buttonStyle" data-dismiss="modal">Cancelar</button>
        </div>

      </div>
    </div>
  </div>
</div>
</div>


<!-- Delete Negocio Modal -->
<div class="container">
<!-- The Modal -->
<div class="modal fade" id="deleteNegocioModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Deseja apagar este Negócio?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-center">
        <p>Esta acção é irreversível</p>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer text-center">
        <button type="button"  onclick='negocioApagarConfirm()' class="btn btn-secondary pull-center buttonStyle"data-dismiss="modal">Sim</button>
        <button type="button" class="btn btn-secondary buttonStyle" data-dismiss="modal">Não</button>
        </div>
        
      </div>
    </div>
  </div>
</div>


</div><!-- FIM TAB NEGOCIOS -->



<div id="notas" class="tab-pane fade in"><!-- INICIO TAB NOTAS -->
<div class="container">
  <div class="row">
<div class="col-lg-12 col-md-12 col-xs-12">
<button type="button" class="btn btn-outline-secondary buttonStyle pull-right" onclick='createDropdowns()'  data-toggle="modal" data-target="#createNotaModal"><i class="fa fa-plus faButton" ></i> Criar Nota</button>
</div>
</div>
</div>
<br>
      <div class="container">
      <div class="row">
      <div class="col-lg-6 col-md-6 col-xs-12">
      <h3 class="bottomSeparator">Notas do Negócio</h3>
      <button type="button" class="btn btn-outline-secondary buttonStyle pull-left btn-sm"  onclick='createDropdowns()'  data-toggle="modal" data-target="#createNotaModal"><i class="fa fa-plus faButton"></i> Criar Nota</button>
      <br>
      <br>
      <h4>Notas</h4>
      <div id="showNotas"class="table-responsive"></div><!--mostrar tabela de notas do contacto -->
      <br>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">

      <h3 class="bottomSeparator">Visualizar Notas</h3>
      <div id="showNotaDetalhes"></div><!--mostrar detalhes da nota seleccionada -->
      <div class="naoClicouEmNotas"><!--Div para esconder quando é selecionada uma nota -->
      <h4>Nenhuma nota seleccionada</h4>
      <p>Seleccione uma nota para a poder visualizar...</p>

</div>
<div id="showIfDeleteNota"></div><!--mostrar os alertas de erro ou sucesso-->

</div>
</div>
</div>



<!-- Create Nota Modal -->

<div class="container">
<!-- The Modal -->
<div class="modal fade" id="createNotaModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Criar Nota</h4>
          <button id="closeCreateNota" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

        <form id="criarNotaForm" method="post">

        <div class="form-group" id="notaProprietario">
        <label>Proprietário</label>
        <select class='custom-select' id='nota_id_comercialForm' name='nota_id_comercialForm'>
        </select>
        </div> 

<div class="form-group">
  <label>Título</label>
  <input type="text" name="notaTitulo" id="notaTitulo" placeholder="notaTitulo" class="form-control"></input>
</div> 

<div class="form-group">
<label>Nota</label>
<textarea name="nota" id="nota" placeholder="nota" class="form-control"></textarea>
</div> 

<div class="form-group">
<label>Data</label>
    <input type="date" name="dataNota" id="dataNota" class="form-control"></input>
</div> 

<input type="hidden" name="notaNegocio" id="notaNegocio" value="<?php echo $id_negocio ?>" class="form-control"></input>

        </div>
        <!-- Modal footer -->
        <div class="modal-footer text-center">
        <input type="submit"  id="submitCriarNotaButton" name="submit" value="Criar" class=" custom-close btn btn-secondary pull-center pull-right buttonStyle">
        </form>
        <button type="button" class="btn btn-secondary buttonStyle" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
  </div>
</div>



<!-- EDIT Nota Modal -->

<div class="container">
<!-- The Modal -->
<div class="modal fade" id="editNotaModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Criar Nota</h4>
          <button id="closeEditNota" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

        <form id="editNotaForm" method="post">

        <div class="form-group" id="editNotaProprietario">
        <label>Proprietário</label>
        <select class='custom-select' id='edit_nota_id_comercialForm' name='edit_nota_id_comercialForm'>
        </select>
        </div> 

<div class="form-group">
  <label>Título</label>
  <input type="text" name="editNotaTitulo" id="editNotaTitulo" placeholder="notaTitulo" class="form-control"></input>
</div> 
<div class="form-group">
<label>Nota</label>
<textarea name="nota" id="editNota" placeholder="nota" class="form-control"></textarea>
</div> 

<div class="form-group">
<label>Data</label>
    <input type="date" name="editDataNota" id="editDataNota" class="form-control"></input>
</div> 

<input type="hidden" name="editNotaNegocio" id="editNotaNegocio" value="<?php echo $id_negocio ?>" class="form-control"></input>
<input type="hidden" name="edit_id_notas" id="edit_id_notas" class="form-control"></input>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer text-center">
        <input type="submit"  id="submitCriarNotaButton" name="submit" value="Editar" class=" custom-close btn btn-secondary pull-center pull-right buttonStyle">
        </form>
        <button type="button" class="btn btn-secondary buttonStyle" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
  </div>
</div>



<!-- Delete Nota Modal -->
<div class="container">
<!-- The Modal -->
<div class="modal fade" id="deleteNotaModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Deseja apagar esta nota?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-center">
        <p>Esta acção é irreversível</p>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer text-center">
        <button type="button"  onclick='notaApagarConfirm()' class="btn btn-secondary pull-center buttonStyle"data-dismiss="modal">Sim</button>
        <button type="button" class="btn btn-secondary buttonStyle" data-dismiss="modal">Não</button>
        </div>
        
      </div>
    </div>
  </div>
</div>


</div><!-- END NOTAS -->




<div id="tarefas" class="tab-pane fade in"><!-- INICIO TAB TAREFAS -->
<div class="container">
  <div class="row">
<div class="col-lg-12 col-md-12 col-xs-12">
<button type="button" class="btn btn-outline-secondary buttonStyle pull-right" onclick='createDropdownsTarefas()'  data-toggle="modal" data-target="#criarTarefaModal"><i class="fa fa-plus faButton" ></i> Criar Tarefa</button>
</div>
</div>
</div>
<br>
      <div class="container">
      <div class="row">
      <div class="col-lg-6 col-md-6 col-xs-12">
      <h3 class="bottomSeparator">Notas do Negócio</h3>
      <button type="button" class="btn btn-outline-secondary buttonStyle pull-left btn-sm"  onclick='createDropdownsTarefas()'  data-toggle="modal" data-target="#criarTarefaModal"><i class="fa fa-plus faButton"></i> Criar Tarefa</button>
      <br>
      <br>
      <h4>Tarefas</h4>
      <div id="showTarefas"class="table-responsive"></div><!--mostrar tabela de tarefas do negocio -->
      <br>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">

      <h3 class="bottomSeparator">Visualizar Tarefas</h3>
      <div id="showTarefaDetalhes"></div><!--mostrar detalhes da Tarefa seleccionada -->
      <div class="naoClicouEmTarefas"><!--Div para esconder quando é selecionada uma tarefa -->
      <h4>Nenhuma tarefa seleccionada</h4>
      <p>Seleccione uma tarefa para a poder visualizar...</p>

</div>
<div id="showIfDeleteTarefas"></div><!--mostrar os alertas de erro ou sucesso-->

</div>
</div>
</div>

<!-- Criar Tarefa Modal -->

<div class="container">
<!-- The Modal -->
<div class="modal fade" id="criarTarefaModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Criar Tarefa</h4>
          <button id="closeCreateTarefa" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div class="container">
        <form id="criarTarefaForm" method="post">

        <div id="destinatariosInvalidos"></div>

        <div class="form-group" id="tarefaProprietario">
        <label>Proprietário</label>
        <select class='custom-select' id='tarefaComercial' name='tarefaComercial'>
        </select>
        </div> 

    <input type="checkbox" name="tarefaReceberNotificacao" id="tarefaReceberNotificacao" value="1">
    <label>Receber Notificações</label>


<div class="form-group">
  <label>Título da Tarefa</label>
  <input type="text" name="tarefaTitulo" id="tarefaTitulo" placeholder="" class="form-control"></input>
</div> 

<div class="form-group">
<label>Descrição</label>
<textarea name="tarefaDescricao" id="tarefaDescricao" placeholder="tarefa" class="form-control"></textarea>
</div> 

<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">
<div class="form-group">
<label>Data Criação da Tarefa</label>
    <input type="date" name="tarefaDataCriacao" id="tarefaDataCriacao" class="form-control"></input>
</div> 

</div>
<div class="col-lg-6 col-md-6 col-xs-12">

<div class="form-group">
<label>Data Término da Tarefa</label>
    <input type="date" name="tarefaDataTermino" id="tarefaDataTermino" class="form-control"></input>
</div> 

</div>
</div>



<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">

        <div class="form-group" id="tarefaProprietario">
        <label>Estado da Tarefa</label>
        <select class='custom-select' id='estadoTarefa' name='estadoTarefa'>
        </select>
        </div> 

</div>
<div class="col-lg-6 col-md-6 col-xs-12">

        <div class="form-group" id="tarefaProprietario">
        <label>Prioridade da Tarefa</label>
        <select class='custom-select' id='prioridadeTarefa' name='prioridadeTarefa'>
        </select>
        </div> 

</div>
</div>


<div class="row">
<div class="col-lg-12 col-md-12 col-xs-12">
<label>Destinatários:</label>
</div>
</div>


<div class="form-group" id="tarefaDestinatarios">
<div class="row">
        <div class="col-lg-6 col-md-6 col-xs-6">
        <select class='custom-select' id='tarefaDestinatario' name='tarefaDestinatario[]'></select>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-6">
        <button type="button" class="btn btn-outline-secondary buttonStyle" id="add" name="add" ><i class="fa fa-user faButton" ></i> 	&nbsp; Destinatário</button>
        </div>
        </div>
</div> 


<input type="hidden" name="tarefaNegocio" id="tarefaNegocio" value="<?php echo $id_negocio ?>" class="form-control"></input>


        <!-- Modal footer -->
        <div class="modal-footer text-center">
        <input type="submit"  id="submitCriarTarefaButton" name="submit" value="Criar" class=" custom-close btn btn-secondary pull-center pull-right buttonStyle">
        </form>
        <button type="button" class="btn btn-secondary buttonStyle" data-dismiss="modal">Cancelar</button>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
</div>

<!--TRATAR TAREFAS FORM -->

<script>
$(document).ready(function(){

//window.number = 1;
window.i = 0;
numbers = 0;
$('#add').click(function(){
  if(numbers < 4){
window.i++;
numbers++;
//alert(numbers);
$('#tarefaDestinatarios').append('<div class="row" id="row'+window.i+'"><div class="col-lg-6 col-md-6 col-xs-6"><select class="custom-select" id="tarefaDestinatario'+window.i+'" name="tarefaDestinatario[]"></select></div><div class="col-lg-6 col-md-6 col-xs-6"><button type="button" class="btn btn-outline-secondary buttonStyle btn_remove" id="'+window.i+'" name="remove" ><i class="fa fa-user-times  faButton" ></i> Destinatário</button></div></div>');
$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('contactos/comerciais_dropdown') ?>',
success: function(result){

$('#tarefaDestinatario'+i+'').html(result);

} 
});
}
});

$(document).on('click','.btn_remove',function(){

var button_id = $(this).attr("id");
$("#row"+button_id+"").remove();

numbers--;
//window.number--;

});



});
</script>

<!-- Gerar Dropdowns Tarefas and reset form -->
<script>

function createDropdownsTarefas(){


while(window.i>0){
$("#row"+window.i+"").remove();
window.numbers=0;
window.i--;
}

    $("#criarTarefaForm").data('validator').resetForm();
    $('#criarTarefaForm')[0].reset();

$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('contactos/comerciais_dropdown') ?>',
success: function(result){

$('#tarefaComercial').html(result);
$('#tarefaDestinatario').html(result);

} 
});

$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('negocios/estadoTarefa_dropdown') ?>',
success: function(result){

$('#estadoTarefa').html(result);

} 
});

$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('negocios/prioridadeTarefa_dropdown') ?>',
success: function(result){

$('#prioridadeTarefa').html(result);

} 
});
}
</script>


<!-- Botao Criar Tarefa -->
<script>
$(document).ready(function(value) {

  jQuery.validator.addMethod("tituloTarefaUniqueName", function() {

    var tarefaTitulo = $('#tarefaTitulo').val();
  $.ajax({
type:'POST',
data:{tarefaTitulo: tarefaTitulo},
url:'<?php echo base_url('negocios/tarefaTituloUniqueName') ?>',
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

}, "O nome da tarefa já se encontra em uso.");

  jQuery.validator.addMethod("comercialNotNull", function() {

var comercial = $('#tarefaDestinatario').val();

if(comercial ==""|| comercial == null){

  return false;
}else{

  return true;
}


}, "Por favor atribua um comercial encarregue do negócio a ser criado.");

$("#criarTarefaForm").validate({
	rules: {
		tarefaComercial: {
			required: true,
			},
      tarefaTitulo: {
      required: true,
      tituloTarefaUniqueName: true,
			},
      tarefaDescricao: {
			required: true,
			},
      tarefaDataCriacao: {
			required: true,
			},
      tarefaDataTermino: {
			required: true,
			},
      estadoTarefa: {
			required: true,
			},
      prioridadeTarefa: {
			required: true,
			},
      tarefaDestinatario: {
      comercialNotNull:true,
			required: true,
			},
		},
    submitHandler: function(form) {
      if ($('#criarTarefaForm').valid()) {

//alert('lol');
$.ajax({
type:'POST',
data: $('#criarTarefaForm').serialize(),
url:'<?php echo base_url('negocios/create_tarefa') ?>',
success: function(result){

var myresult = jQuery.parseJSON(result);

if(myresult.success==true){
var id = <?php echo $id_negocio ?>;
$.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('negocios/get_tarefas') ?>',
success: function(result){
$('#showTarefas').html(result);
$('#showTarefaDetalhes').hide();
  $('.naoClicouEmTarefas').show();
            }
        });

//alert(myresult.msg);
$('#showIfDeleteTarefas').fadeIn(1000).html(myresult.msg);
$('#showIfDeleteTarefas').fadeOut(3000).html(myresult.msg);
$('#criarTarefaForm')[0].reset();
$("#closeCreateTarefa").trigger("click");


//console.log(myresult.success);

}else{

$('#destinatariosInvalidos').fadeIn(1000).html(myresult.msg);
$('#destinatariosInvalidos').fadeOut(3000).html(myresult.msg);

}


            }
        });

       }
            
        }
});

}); 
</script>


<!-- Select and show tarefas info -->
<script>

function tarefaSeleccionada(id){
//alert(id);

$.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('negocios/tarefa_seleccionada_detalhes') ?>',
success: function(result){
$('#showTarefaDetalhes').html(result);
$('#showTarefaDetalhes').show();
$('.naoClicouEmTarefas').hide();
            }
        });

} 

</script>

<!-- Refresh tarefas on Click Tab -->
<script>
  $(document).ready(function() {
    $( "#nav-tarefas-tab" ).on( "click", function() {

      var id = <?php echo $id_negocio ?>;

      $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('negocios/get_tarefas') ?>',
success: function(result){
$('#showTarefas').html(result);
$('#showTarefaDetalhes').hide();
  $('.naoClicouEmTarefas').show();
            }
        });
    });
  });
</script>



</div><!-- END TAREFAS -->




<div id="ficheiros" class="tab-pane fade in"><!-- INICIO TAB FICHEIROS -->
<div class="container">
  <div class="row">
<div class="col-lg-12 col-md-12 col-xs-12">
<button type="button" class="btn btn-outline-secondary buttonStyle pull-right" onclick='createDropdownsFicheiros()'  data-toggle="modal" data-target="#uploadFicheiroModal"><i class="fa fa-plus faButton" ></i> Upload Ficheiro</button>
</div>
</div>
</div>
<br>
      <div class="container">
      <div class="row">
      <div class="col-lg-6 col-md-6 col-xs-12">
      <h3 class="bottomSeparator">Ficheiros do Contacto</h3>
      <button type="button" class="btn btn-outline-secondary buttonStyle pull-left btn-sm"  onclick='createDropdownsFicheiros()'  data-toggle="modal" data-target="#uploadFicheiroModal"><i class="fa fa-plus faButton"></i> Upload Ficheiro</button>
      <br>
      <br>
      <h4>Ficheiros</h4>
      <div id="showFicheiros"class="table-responsive"></div><!--mostrar tabela de notas do contacto -->
      <br>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">

      <h3 class="bottomSeparator">Visualizar Ficheiros</h3>
      <div id="showFicheiroDetalhes"></div><!--mostrar detalhes da nota seleccionada -->
      <div class="naoClicouEmFicheiros"><!--Div para esconder quando é selecionada uma nota -->
      <h4>Nenhum ficheiro seleccionado</h4>
      <p>Seleccione um ficheiro para o poder visualizar...</p>

</div>
<div id="showIfDeleteFicheiro"></div><!--mostrar os alertas de erro ou sucesso-->

</div>
</div>
</div>









<!-- Upload Ficheiro Modal -->
<div class="container">
<!-- The Modal -->
<div class="modal fade" id="uploadFicheiroModal" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Upload Ficheiro</h4>
          <button id="closeUploadModal" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form id="uploadFicheiroForm" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Nome do Ficheiro</label>
<input type="text" name="nomeFicheiro" id="nomeFicheiro" placeholder="nomeFicheiro" class="form-control"></input>
</div> 

<div class="form-group">
<label>Proprietário</label>
<select class='custom-select' id='id_comercialCriarFicheiro' name='id_comercialCriarFicheiro'>
</select>
</div>

<div class="form-group">
<label>Data</label>
    <input type="date" name="data" id="data" class="form-control"></input>
</div>
<input type="hidden" name="id_negocio" id="id_negocio" value="<?php echo $id_negocio ?>" class="form-control"></input>
<br>
<div class="form-group">
<label>Ficheiro</label>
<input type="file" name="userFile" id="userFile"/></input>
</div>
<br>
<div class="form-group">
<label>Descrição</label>
<textarea name="descricao" id="descricao" placeholder="descricao" class="form-control"></textarea>
</div> 
<br>
<div id="formError"></div>
        </div>
                <!-- Modal footer -->
                <div class="modal-footer text-center">
                <input type="submit"  id="submitButton" name="submit" value="Upload" class=" custom-close btn btn-secondary pull-center pull-right buttonStyle">
</form>
        <button type="button" class="btn btn-secondary buttonStyle" data-dismiss="modal">Cancelar</button>
        </div>
        
      </div>
    </div>
  </div>
</div>



<!-- DeleteFicheiro Modal -->
<div class="container">
<!-- The Modal -->
<div class="modal fade" id="deleteFicheiroModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Deseja apagar este ficheiro?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-center">
          <p>Esta acção é irreversível</p>
        </div>
                <!-- Modal footer -->
                <div class="modal-footer text-center">
                <button type="button"  onclick='ficheiroApagarConfirm()' class="btn btn-secondary pull-center buttonStyle"data-dismiss="modal">Sim</button>
        <button type="button" class="btn btn-secondary buttonStyle" data-dismiss="modal">Não</button>
        </div>
        
      </div>
    </div>
  </div>
</div>



<!-- EDIT Ficheiro Modal -->
<div class="container">
<!-- The Modal -->
<div class="modal fade" id="editFicheiroModal" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Editar Ficheiro</h4>
          <button id="closeEditModal" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form id="editFicheiroForm" method="post">

<div class="form-group" id="editProprietario">
<label>Proprietário</label>
<select class='custom-select' id='edit_id_comercialForm' name='edit_id_comercialForm'>
</select>
</div> 

<!--<div class="form-group">

<label>Nome do Ficheiro</label>
<input type="text" name="nomeFicheiro" id="editNomeFicheiro" placeholder="nomeFicheiro" class="form-control"></input>
</div> -->
<div class="form-group">
<label>Data</label>
    <input type="date" name="data" id="editData" class="form-control"></input>
</div> 
<div class="form-group">
<label>Descrição</label>
<textarea name="editDescricao" id="editDescricao" placeholder="descricao" class="form-control"></textarea>
</div> 
<input type="hidden" name="id_negocio" id="edit_id_negocio" value="<?php echo $id_negocio ?>" class="form-control"></input>
<!--<input type="hidden" name="id_comercialForm" id="edit_id_comercialForm" value="1" class="form-control"></input>-->
<input type="hidden" name="id_ficheiro" id="edit_id_ficheiro" class="form-control"></input>
<br>
<br>
<div id="formError"></div>
        </div>
                <!-- Modal footer -->
                <div class="modal-footer text-center">
                <input type="submit"  id="submitButton" name="submit" value="Editar" class=" custom-close btn btn-secondary pull-center pull-right buttonStyle">
</form>
        <button type="button" class="btn btn-secondary buttonStyle" data-dismiss="modal">Cancelar</button>
        </div>
        
      </div>
    </div>
  </div>
</div>



</div><!-- END Ficheiros -->


<div id="contacto" class="tab-pane fade in"><!-- INICIO CONTACTO  -->
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-xs-12">
<button type='button' id='$row->id_negocio' onclick='jumpToContacto(this.id)' class='btn btn-outline-secondary buttonStyle pull-right btn-md' ><i class='fa fa-user faButton'></i> Ir para Contacto</button>
</div>
</div>
<div class="row" id="showDetalhesContactoNegocio"></div>
</div> <!-- SHOW DETALHES CONTACTO-->
</div><!-- END CONTACTO -->


<div id="historico" class="tab-pane fade in"><!-- INICIO HISTORICO -->

<br>
      <div class="container">
      <div class="row">
      <div class="col-lg-6 col-md-6 col-xs-12">
      <h3 class="bottomSeparator">Histórico</h3>
      <button type="button" class="btn btn-outline-secondary buttonStyle pull-left btn-sm"  onclick='createDropdowns()'  data-toggle="modal" data-target="#createNotaModal"><i class="fa fa-history faButton"></i> Refresh</button>
      <br>
      <br>
      <h4>Histórico</h4>
      <p>não existem alterações registadas no histórico deste Negócio</p>
      <div id="showNotas"class="table-responsive"></div><!--mostrar tabela de notas do contacto -->
      <br>
    </div>
    <div id="showIfDeleteNota"></div><!--mostrar os alertas de erro ou sucesso-->


</div>
</div>
</div><!-- END HISTORICO -->



























<!-- SHOW INFO IN EDIT FICHEIRO -->

<script>
function ficheiroEditar(id){
window.id_ficheiro = id;
$.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('contactos/get_dados_editFicheiros') ?>',
success: function(values){

var data = jQuery.parseJSON(values);
//$("#editNomeFicheiro").val(data.nome);
$("#editData").val(data.dataHoras);
$("#editDescricao").val(data.descricao);
$("#edit_id_ficheiro").val(data.id_ficheiros);

var id_comercial = data.id_comercial;

$.ajax({
type:'POST',
data:{id_comercial: id_comercial},
url:'<?php echo base_url('contactos/comerciais_dropdown_edit') ?>',
success: function(result){

$('#edit_id_comercialForm').html(result);


} 
});

} 
});
}
</script>


<!-- BOTAO Aceitar EDITAR Ficheiro-->
<script>
$(document).ready(function(value) {

test = false;
  jQuery.validator.addMethod("uniqueName", function() {


    var editNomeFicheiro = $('#editNomeFicheiro').val();
    //alert(editNomeFicheiro);
  $.ajax({
type:'POST',
data:{editNomeFicheiro: editNomeFicheiro},
url:'<?php echo base_url('contactos/uniqueNameEdit') ?>',
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

}, "O nome do ficheiro já se encontra em uso.");


$("#editFicheiroForm").validate({
	rules: {
		data: {
			required: true,
			},
      edit_id_comercialForm: {
			required: true,
			},
      nomeFicheiro: {
			required: true,
      //uniqueName:true,
			},
      userFile: {
			required: true,
			},
		},
    submitHandler: function(form) {
      if ($('#editFicheiroForm').valid()) {


        //var editNomeFicheiro = $('#editNomeFicheiro').val();
        var editData = $('#editData').val();
        var edit_id_negocio = $('#edit_id_negocio').val();
        var edit_id_comercialForm = $('#edit_id_comercialForm').val();
        var editDescricao = $('#editDescricao').val();
        var edit_id_ficheiro = $('#edit_id_ficheiro').val();

        

$.ajax({
type:'POST',
data: {editData: editData, edit_id_negocio:edit_id_negocio, edit_id_comercialForm:edit_id_comercialForm, editDescricao:editDescricao, edit_id_ficheiro: edit_id_ficheiro},
url:'<?php echo base_url('negocios/edit_ficheiro') ?>',
success: function(result){

var myresult = jQuery.parseJSON(result);

if(myresult.success== true){
  
  var id_negocio = <?php echo $id_negocio ?>;

      $.ajax({
type:'POST',
data:{id_negocio:id_negocio},
url:'<?php echo base_url('negocios/get_ficheiros') ?>',
success: function(result){
$('#showFicheiros').html(result);
//$('.naoClicouEmFicheiros').show();
            }
        });

$('#showIfDeleteFicheiro').fadeIn(1000).html(myresult.msg);
$('#showIfDeleteFicheiro').fadeOut(3000).html(myresult.msg);
//comentar se mantiver detalhes nota seleccionada.
//codar para meter cor  na nota ativa
$('#showFicheiroDetalhes').hide();
$('.naoClicouEmFicheiros').show();

$('#editFicheiroForm')[0].reset();
$("#closeEditModal").trigger("click");
}

            }
        });

       }
            
        }
});

}); 
</script>


<!-- BOTAO Apagar Ficheiro Seleccionado -->
<script>
function ficheiroApagar(id){
window.id_ficheiro = id;
}
function ficheiroApagarConfirm(){

  var id = id_ficheiro;

  $.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('contactos/ficheiro_seleccionado_apagar') ?>',
success: function(result){

  $('#showIfDeleteFicheiro').fadeIn(1000).html(result);
  $('#showIfDeleteFicheiro').fadeOut(3000).html(result);
  $('#showFicheiroDetalhes').hide();
  $('.naoClicouEmFicheiros').show();

        var id_negocio = <?php echo $id_negocio ?>;
              $.ajax({
type:'POST',
data:{id_negocio:id_negocio},
url:'<?php echo base_url('negocios/get_ficheiros') ?>',
success: function(result){
$('#showFicheiros').html(result);
$('#showFicheiroDetalhes').hide();
$('.naoClicouEmFicheiros').show();
            }
        });
}
        });
}
</script>


<!-- Select and show Ficheiros info -->
<script>

function ficheiroSeleccionado(id){

$.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('contactos/ficheiro_seleccionado_detalhes') ?>',
success: function(result){
$('#showFicheiroDetalhes').html(result);
$('#showFicheiroDetalhes').show();
$('.naoClicouEmFicheiros').hide();
            }
        });

} 

</script>

<!-- Gerar Dropdowns and reset form -->
<script>

function createDropdownsFicheiros(){

    $("#uploadFicheiroForm").data('validator').resetForm();
    $('#uploadFicheiroForm')[0].reset();

$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('contactos/comerciais_dropdown') ?>',
success: function(result){

$('#id_comercialCriarFicheiro').html(result);


} 
});
}
</script>

<!-- Refresh Ficheiros on Click Tab -->
<script>
  $(document).ready(function() {
    $( "#nav-ficheiros-tab" ).on( "click", function() {
      var id_negocio = <?php echo $id_negocio ?>;
      $.ajax({
type:'POST',
data:{id_negocio:id_negocio},
url:'<?php echo base_url('negocios/get_ficheiros') ?>',
success: function(result){
$('#showFicheiros').html(result);
$('#showFicheiroDetalhes').hide();
$('.naoClicouEmFicheiros').show();
            }
        });
    });
  });
</script>


<!-- BOTAO Aceitar UPLOAD Ficheiro-->
<script>
$(document).ready(function(value) {
  jQuery.validator.addMethod("uniqueName", function() {
    var nomeFicheiro = $('#nomeFicheiro').val();
  $.ajax({
type:'POST',
data:{nomeFicheiro: nomeFicheiro},
url:'<?php echo base_url('contactos/uniqueName') ?>',
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

}, "O nome do ficheiro já se encontra em uso.");


$("#uploadFicheiroForm").validate({
	rules: {
		data: {
			required: true,
			},
      id_comercialCriarFicheiro: {
      required: true,
			},
      nomeFicheiro: {
      uniqueName: true,
			required: true,
			},
      userFile: {
			required: true,
			},
		},
    submitHandler: function(form) {
      if ($('#uploadFicheiroForm').valid()) {
                formData = new FormData();
        formData.append('userFile', $('#userFile')[0].files[0]);
        var nomeFicheiro = $('#nomeFicheiro').val();
        formData.append('nomeFicheiro', nomeFicheiro);
        var data = $('#data').val();
        formData.append('data', data);
        var id_negocio = $('#id_negocio').val();
        formData.append('id_negocio', id_negocio);
        var id_comercialCriarFicheiro = $('#id_comercialCriarFicheiro').val();
        formData.append('id_comercialCriarFicheiro', id_comercialCriarFicheiro);
        var descricao = $('#descricao').val();
        formData.append('descricao', descricao);

$.ajax({
type:'POST',
data: formData,
cache:false,
enctype: 'multipart/form-data',
contentType: false,
processData: false,
url:'<?php echo base_url('negocios/upload_ficheiro') ?>',
success: function(result){

var myresult = jQuery.parseJSON(result);

//console.log(result);
//alert(myresult.success);

if(myresult.success==true){

var id_negocio = <?php echo $id_negocio ?>;
$.ajax({
type:'POST',
data:{id_negocio:id_negocio},
url:'<?php echo base_url('negocios/get_ficheiros') ?>',
success: function(result){
$('#showIfDeleteFicheiro').fadeIn(1000).html(myresult.msg);
$('#showIfDeleteFicheiro').fadeOut(3000).html(myresult.msg);
$('#showFicheiros').html(result);
$('#showFicheiroDetalhes').hide();
$('.naoClicouEmFicheiros').show();
$('#uploadFicheiroForm')[0].reset();
$("#closeUploadModal").trigger("click");
            }

        });
}
            }
        });
       }
            
        }
});

}); 
</script>


























<!-- SHOW INFO IN EDIT NOTAS -->

<script>
function notaEditar(id){
  var id = id;
$.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('contactos/get_dados_editNotas') ?>',
success: function(values){

var data = jQuery.parseJSON(values);
$("#editDataNota").val(data.diaHoras);
$("#editNota").val(data.nota);
$("#edit_nota_id_comercialForm").val(data.id_comercial);
$("#editNotaTitulo").val(data.notaTitulo);
$("#edit_id_notas").val(data.id_notas);

window.id_nota = data.id_notas;

var id_comercial = data.id_comercial;
$.ajax({
type:'POST',
data:{id_comercial: id_comercial},
url:'<?php echo base_url('contactos/comerciais_dropdown_edit') ?>',
success: function(result){

$('#edit_nota_id_comercialForm').html(result);


} 
});

} 
});
}
</script>

<!-- BOTAO EDITAR NOTA-->
<script>
$(document).ready(function(value) {


  jQuery.validator.addMethod("editNotaTituloUniqueName", function() {

    //id = $('#edit_id_notas').val();
    var id = window.id_nota;

    var editNotaTitulo = $('#editNotaTitulo').val();

  $.ajax({
type:'POST',
data:{editNotaTitulo: editNotaTitulo, id: id},
url:'<?php echo base_url('contactos/editNotaTituloUniqueName') ?>',
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

}, "O nome da nota já se encontra em uso.");


$("#editNotaForm").validate({
	rules: {
		editDataNota: {
			required: true,
			},
      editNotaTitulo: {
			required: true,
      editNotaTituloUniqueName:true,
			},
      edit_nota_id_comercialForm: {
			required: true,
			},
		},
    submitHandler: function(form) {
      if ($('#editNotaForm').valid()) {


        //var editNomeFicheiro = $('#editNomeFicheiro').val();
        var edit_nota_id_comercialForm = $('#edit_nota_id_comercialForm').val();
        var editNotaTitulo = $('#editNotaTitulo').val();
        var editNota = $('#editNota').val();
        var editDataNota = $('#editDataNota').val();
        var edit_id_notas = $('#edit_id_notas').val();

        

$.ajax({
type:'POST',
data: {edit_nota_id_comercialForm: edit_nota_id_comercialForm, editNotaTitulo:editNotaTitulo, editNota:editNota, editDataNota:editDataNota, edit_id_notas: edit_id_notas},
url:'<?php echo base_url('contactos/edit_nota') ?>',
success: function(result){

var myresult = jQuery.parseJSON(result);

//console.log(myresult.success);
//alert(myresult.success);
if(myresult.success== true){

var id = <?php echo $id_negocio ?>;

$.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('negocios/get_notas') ?>',
success: function(result){
$('#showNotas').html(result);
$('#showNotaDetalhes').hide();
$('.naoClicouEmNotas').show();
      }
  });


$('#showIfDeleteNota').fadeIn(1000).html(myresult.msg);
$('#showIfDeleteNota').fadeOut(3000).html(myresult.msg);
//comentar se mantiver detalhes nota seleccionada.
//codar para meter cor  na nota ativa
$('#showNotaDetalhes').hide();
$('.naoClicouEmNotas').show();

$('#editNotaForm')[0].reset();
$("#closeEditNota").trigger("click");
}

            }
        });

       }
            
        }
});

}); 
</script>

<!-- BOTAO Apagar Nota Seleccionada -->
<script>
function notaApagar(id){
window.id_nota = id;
}
function notaApagarConfirm(){

  var id = id_nota ;
  $.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('contactos/nota_seleccionada_apagar') ?>',
success: function(result){

  $('#showIfDeleteNota').fadeIn(1000).html(result);
  $('#showIfDeleteNota').fadeOut(3000).html(result);
  $('#showNotaDetalhes').hide();
  $('.naoClicouEmNotas').show();
  var id = <?php echo $id_negocio ?>;
  $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('negocios/get_notas') ?>',
success: function(result){
$('#showNotas').html(result);

            }
        });
}
        });
}
</script>

<!-- Select and show notas info -->
<script>

function notaSeleccionada(id){
//alert(id);

$.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('contactos/nota_seleccionada_detalhes') ?>',
success: function(result){
$('#showNotaDetalhes').html(result);
$('#showNotaDetalhes').show();
$('.naoClicouEmNotas').hide();
            }
        });

} 

</script>

<!-- Refresh notas on Click Tab -->
<script>
  $(document).ready(function() {
    $( "#nav-notas-tab" ).on( "click", function() {

      var id = <?php echo $id_negocio ?>;

      $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('negocios/get_notas') ?>',
success: function(result){
$('#showNotas').html(result);
$('#showNotaDetalhes').hide();
  $('.naoClicouEmNotas').show();
            }
        });
    });
  });
</script>


<!-- Gerar Dropdowns and reset form -->
<script>

function createDropdowns(){

    $("#criarNotaForm").data('validator').resetForm();
    $('#criarNotaForm')[0].reset();

$.ajax({
type:'POST',
data:{},
url:'<?php echo base_url('contactos/comerciais_dropdown') ?>',
success: function(result){

$('#nota_id_comercialForm').html(result);


} 
});
}
</script>


<!-- Botao Criar Nota -->
<script>
$(document).ready(function(value) {

  jQuery.validator.addMethod("notaTituloUniqueName", function() {

    var notaTitulo = $('#notaTitulo').val();
  $.ajax({
type:'POST',
data:{notaTitulo: notaTitulo},
url:'<?php echo base_url('contactos/notaTituloUniqueName') ?>',
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

}, "O nome da nota já se encontra em uso.");


$("#criarNotaForm").validate({
	rules: {
		nota: {
			required: true,
			},
      notaTitulo: {
      required: true,
      notaTituloUniqueName: true,
			},
      dataNota: {
			required: true,
			},
		},
    submitHandler: function(form) {
      if ($('#criarNotaForm').valid()) {


        //var editNomeFicheiro = $('#editNomeFicheiro').val();
        var notaTitulo = $('#notaTitulo').val();
        var nota = $('#nota').val();
        var dataNota = $('#dataNota').val();
        var notaNegocio = $('#notaNegocio').val();
        var nota_id_comercialForm = $('#nota_id_comercialForm').val();


$.ajax({
type:'POST',
data: {notaTitulo: notaTitulo, nota:nota, dataNota:dataNota, notaNegocio:notaNegocio, nota_id_comercialForm: nota_id_comercialForm},
url:'<?php echo base_url('negocios/create_nota') ?>',
success: function(result){

var myresult = jQuery.parseJSON(result);

//console.log(myresult.success);
if(myresult.success==true){

      var id = <?php echo $id_negocio ?>;
      
      $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('negocios/get_notas') ?>',
success: function(result){
$('#showNotas').html(result);
$('#showNotaDetalhes').hide();
  $('.naoClicouEmNotas').show();
            }
        });

$('#showIfDeleteNota').fadeIn(1000).html(myresult.msg);
$('#showIfDeleteNota').fadeOut(3000).html(myresult.msg);
//$('#showFicheiroDetalhes').hide();
//$('.naoClicouEmFicheiros').show();
$('#criarNotaForm')[0].reset();
$("#closeCreateNota").trigger("click");

}else{


}


            }
        });

       }
            
        }
});

}); 
</script>



































<!-- GET DETALHES CONTACTO on click-->
<script>
  $(document).ready(function() {
    $( "#nav-contacto-tab" ).on( "click", function() {

        var id_negocio = <?php echo $id_negocio ?>;

$.ajax({
type:'POST',
data:{id_negocio:id_negocio},
url:'<?php echo base_url('negocios/get_id_contacto_negocio') ?>',
success: function(result){

var myresult = jQuery.parseJSON(result);

window.id_contacto = myresult.id_contacto_negocio;

var id = window.id_contacto;

$.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_t_contactos') ?>',
success: function(result){
$('#showDetalhesContactoNegocio').html(result);

            }
        });

            }
        });
    });
  });
</script>


<!-- JUMP TO NEGOCIO BUTTON -->
<script>

function jumpToContacto(){

window.location = ' <?php echo base_url('contactos/contactos_detalhes/') ?>' + window.id_contacto;

}
</script>






























<!-- Refresh detalhes on Click Tab -->
<script>
  $(document).ready(function() {
    $( "#nav-detalhes-tab" ).on( "click", function() {

      var id = <?php echo $id_negocio; ?>;

$.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('negocios/get_detalhes_negocio') ?>',
success: function(result){
$('#showDetalhesNegocio').html(result);

            }
        });
    });
  });
</script>

<!-- refresh detalhes on load page -->
<script>
 $(document).ready(function() {
      var id = <?php echo $id_negocio; ?>;
      var load = 1;
if(load ==1){
      $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('negocios/get_detalhes_negocio') ?>',
success: function(result){
$('#showDetalhesNegocio').html(result);

            }
        });
        load--;
      }
  });
  </script>


<!-- SHOW INFO IN EDIT NEGOCIO -->

<script>
function negocioEditar(){

var id =  <?php echo $id_negocio ?>;

$.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('contactos/get_dados_editNegocio') ?>',
success: function(values){

var data = jQuery.parseJSON(values);
var id_funil = data.id_funil;
$.ajax({
type:'POST',
data:{id_funil: id_funil},
url:'<?php echo base_url('contactos/etapasFunil_dropdown_edit') ?>',
success: function(result){

$('#etapaFunilEditarNegocio').html(result);

} 
});

var id_estadoNegocio = data.id_estadoNegocio;
$.ajax({
type:'POST',
data:{id_estadoNegocio: id_estadoNegocio},
url:'<?php echo base_url('contactos/estadoNegocio_dropdown_edit') ?>',
success: function(result){

$('#estadoNegocioEditarNegocio').html(result);

} 
});

var id_contacto = data.id_contacto;
$.ajax({
type:'POST',
data:{id_contacto: id_contacto},
url:'<?php echo base_url('contactos/contactos_dropdown_edit') ?>',
success: function(result){

$('#id_contactoEditarNegocio').html(result);

} 
});

var id_comercial = data.id_comercial;
$.ajax({
type:'POST',
data:{id_comercial: id_comercial},
url:'<?php echo base_url('contactos/comerciais_dropdown_edit') ?>',
success: function(result){

$('#id_comercialEditarNegocio').html(result);

} 
});

$("#nomeDoNegocioEditarNegocio").val(data.nomeNegocio);
$("#numeroOrcamentoEditarNegocio").val(data.numeroOrcamento);
$("#valorNegocioEditarNegocio").val(data.valorNegocio);
$("#ajudicadoEditarNegocio").val(data.ajudicado);
$("#motivosEditarNegocio").val(data.motivosNaoAvancou);
$("#etapaFunilEditarNegocio").val(data.id_funil);
$("#estadoNegocioEditarNegocio").val(data.id_estadoNegocio);
$("#id_contactoEditarNegocio").val(data.id_contacto);
$("#id_comercialEditarNegocio").val(data.id_comercial);

} 
});
}
</script>

<!-- BOTAO EDITAR NEGOCIO-->
<script>
$(document).ready(function(value) {
    
    test = false;

  jQuery.validator.addMethod("negocioNameUnique", function() {

var id = <?php echo $id_negocio ?>;

var nomeDoNegocioEditarNegocio = $('#nomeDoNegocioEditarNegocio').val();

$.ajax({

type:'POST',
data:{nomeDoNegocioEditarNegocio: nomeDoNegocioEditarNegocio, id: id},
url:'<?php echo base_url('contactos/nomeNegocioEditarNegocioUniqueName') ?>',
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

$('#editNegocioFormNegocios').validate({

	rules: {
		id_contactoEditarNegocio: {
			required: true,
			},
      nomeDoNegocioEditarNegocio: {
        negocioNameUnique: true,
			required: true,
			},
      etapaFunilEditarNegocio: {
			required: true,
			},
      estadoNegocioEditarNegocio: {
			required: true,
			},
      id_comercialEditarNegocio: {
			required: true,
			},
      valorNegocioEditarNegocio: {
			number: true,
			},
      numeroOrcamentoEditarNegocio: {
			number: true,
			},
      ajudicadoEditarNegocio: {
			required: true,
			},
		},
    submitHandler: function(form) {

      if ($('#editNegocioFormNegocios').valid()) {

        var id_contactoEditarNegocio = $('#id_contactoEditarNegocio').val();
        var nomeDoNegocioEditarNegocio = $('#nomeDoNegocioEditarNegocio').val();
        var etapaFunilEditarNegocio = $('#etapaFunilEditarNegocio').val();
        var estadoNegocioEditarNegocio = $('#estadoNegocioEditarNegocio').val();
        var id_comercialEditarNegocio = $('#id_comercialEditarNegocio').val();
        var valorNegocioEditarNegocio = $('#valorNegocioEditarNegocio').val();
        var numeroOrcamentoEditarNegocio = $('#numeroOrcamentoEditarNegocio').val();
        var ajudicadoEditarNegocio = $('#ajudicadoEditarNegocio').val();
        var motivosEditarNegocio = $('#motivosEditarNegocio').val();
        var id_negocio_seleccionado = <?php echo $id_negocio ?>;
        
$.ajax({
type:'POST',
data: {
id_contactoEditarNegocio: id_contactoEditarNegocio, 
nomeDoNegocioEditarNegocio: nomeDoNegocioEditarNegocio, 
etapaFunilEditarNegocio: etapaFunilEditarNegocio,
estadoNegocioEditarNegocio: estadoNegocioEditarNegocio,
id_comercialEditarNegocio: id_comercialEditarNegocio,
valorNegocioEditarNegocio: valorNegocioEditarNegocio,
numeroOrcamentoEditarNegocio: numeroOrcamentoEditarNegocio,
ajudicadoEditarNegocio: ajudicadoEditarNegocio,
motivosEditarNegocio: motivosEditarNegocio,
id_negocio_seleccionado: id_negocio_seleccionado
},
url:'<?php echo base_url('contactos/edit_negocio') ?>',
success: function(result){

var myresult = jQuery.parseJSON(result);

if(myresult.success== true){

var id = <?php echo $id_negocio ?>;

$.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('negocios/get_detalhes_negocio') ?>',
success: function(result){
$('#showDetalhesNegocio').html(result);

            }
        });

$('#showMessages').fadeIn(1000).html(myresult.msg);
$('#showMessages').fadeOut(3000).html(myresult.msg);

$('#editNegocioFormNegocios')[0].reset();
$("#closeEditNegocioModal").trigger("click");
}

            }
        });

       }
            
        }
});

}); 
</script>


<!-- BOTAO Apagar Negocio Seleccionado -->
<script>

function negocioApagarConfirm(){

  var id = <?php echo $id_negocio ?>;

  $.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('contactos/negocio_seleccionado_apagar') ?>',
success: function(result){

$.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('negocios/get_detalhes_negocio') ?>',
success: function(result){
$('#showDetalhesNegocio').html(result);

            }
        });

  //$('#showMessages').fadeIn(1000).html(result);
  //$('#showMessages').fadeOut(3000).html(result);
  //setTimeout(
  //function() 
  //{
   //mycodehere
  //}, 2000);
  window.location = ' <?php echo base_url('categorias/categoria/') ?>';

}
        });
}
</script>






<!-- Color-Select Nota Seleccionada -->
<script>

function changeColor(o){    

    $('table tr').css('background','');
		o.style.backgroundColor=('rgb(165, 212, 250)');

	}

  </script>






</div><!-- FIM TAB CONTAINER -->

<?php include_once'footer.php'; ?>

</body>
</html>