
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
$id_not = $this->uri->segment(3);
$id = json_encode($id_not);

$id_nota_seleccionada;
$id_ficheiro_seleccionado;
$id_negocio_seleccionado;



$clienteNovoSim = 1;
$clienteNovoNao = 0;
$clienteNovo = null;
if($clienteNovo == null){
  $clienteNovo = $clienteNovoSim;
}

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
  <div class="col-lg-12 col-md-12 col-xs-12">
<nav>
  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-detalhes-tab" data-toggle="tab" href="#Detalhes" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-user"></i> Detalhes</a>
    <a class="nav-item nav-link" id="nav-notas-tab" data-toggle="tab" href="#Notas" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-sticky-note"></i> Notas</a>
    <!--<a class="nav-item nav-link" id="nav-tarefas-tab" data-toggle="tab" href="#Tarefas" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-tasks"></i> Tarefas</a>-->
    <a class="nav-item nav-link" id="nav-ficheiros-tab" data-toggle="tab" href="#Ficheiros" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-upload"></i> Ficheiros</a>
    <a class="nav-item nav-link" id="nav-negocios-tab" data-toggle="tab" href="#Negócios" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-briefcase"></i> Negócios</a>
    <a class="nav-item nav-link" id="nav-historico-tab" data-toggle="tab" href="#Histórico" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-history"></i> Histórico</a>
  </div>
</nav>
</div>
</div>
</div>



<!--TABS CONTENT START -->
  <div class="tab-content">
<br>
<br>
    <div id="Detalhes" class="tab-pane active">
    <div class="container">
  <div class="row">
<div class="col-lg-12 col-md-12 col-xs-12">
<button type="button" class="btn btn-outline-secondary buttonStyle pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash faButton"></i> Apagar Contacto</button>


<!-- DeleteContacto Modal -->
<div class="container">
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Deseja apagar o contacto?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-center">
          <p>Esta acção é irreversível</p>
        </div>
                <!-- Modal footer -->
                <div class="modal-footer text-center">
                <button type="button" id="apagarContacto" class="btn btn-secondary pull-center buttonStyle"data-dismiss="modal">Sim</button>
        <button type="button" class="btn btn-secondary buttonStyle" data-dismiss="modal">Não</button>
        </div>
      </div>
    </div>
  </div>
</div>




<button type="button" onClick="editContacto()" class="btn btn-outline-secondary buttonStyle pull-right"  data-toggle="modal" data-target="#editContactoModal"><i class="fa fa-edit faButton"></i> Editar Contacto</button>






<!-- EDIT Contacto -->

<div class="container">
<!-- The Modal -->
<div class="modal fade" id="editContactoModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Editar Contacto</h4>
          <button id="closeEditContactoModal" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div class="container">
  <div class="row">
  <div class="col-lg-12 col-md-12 col-xs-6">
<nav>
  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-editDadosPessoais-tab" data-toggle="tab" href="#editDadosPessoais" role="tab" aria-controls="nav-contact" aria-selected="true"><i class="fa fa-user"></i> Dados Pessoais</a>
    <a class="nav-item nav-link" id="nav-editOutrosDados-tab" data-toggle="tab" href="#editOutrosDados" role="tab" aria-controls="nav-home" aria-selected="false"><i class="fa fa-info"></i> Outros Dados</a>
  </div>
</nav>
</div>
</div>
</div>

<form id="editContactoForm" method="post">
<div class="tab-content"><!-- INICIO TABS -->

<div id="editDadosPessoais" class="tab-pane active"><!-- TAB DadosPessoais -->
<br>
<div class="form-group">
  <label>Nome</label>
  <input type="text" name="nomeEditContacto" id="nomeEditContacto" placeholder="nome" class="form-control"></input>
</div> 
<div class="form-group">
  <label>Pessoa De Contacto</label>
  <input type="text" name="pessoaDeContactoEditContacto" id="pessoaDeContactoEditContacto" placeholder="nomeContacto" class="form-control"></input>
</div> 
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-6">
<div class="form-group">
  <label for="telemovelCriarContacto">Telemóvel</label>
  <input type="text" name="telemovelEditContacto" id="telemovelEditContacto" placeholder="tlm" class="form-control inputShortCamps"></input>
</div> 
</div>
<div class="col-lg-6 col-md-6 col-xs-12">
<div class="form-group">
  <label for="telemovel2CriarContacto">Telemóvel2</label>
  <input type="text" name="telemovel2EditContacto" id="telemovel2EditContacto" placeholder="tlm2" class="form-control inputShortCamps"></input>
</div> 
</div>
</div>
<div class="form-group">
  <label>Email</label>
  <input type="text" name="emailEditContacto" id="emailEditContacto" placeholder="mail" class="form-control"></input>
</div>
<div class="form-group">
<label>Observações</label>
<textarea name="observacoesEditContacto" id="observacoesEditContacto" placeholder="observacoes" class="form-control"></textarea>
</div>  
<label>Data</label>
    <input type="date" name="dataEditContacto" id="dataEditContacto" class="form-control"></input>
<div class="row">
  <div class="col-lg-3 col-md-3 col-xs-3">
  <div class="form-group">
    <br>
  <label>Cidade</label>
  <input type="text" name="cidadeEditContacto" id="cidadeEditContacto" placeholder="cidade" class="form-control inputShortCamps"></input>
</div> 
</div>
<div class="col-lg-6 col-md-6 col-xs-6">
<div class="form-group">
    <br>
  <label>rua</label>
  <input type="text" name="ruaEditContacto" id="ruaEditContacto" placeholder="rua" class="form-control inputShortCamps"></input>
</div> 
</div>
<div class="col-lg-3 col-md-3 col-xs-3">
<div class="form-group">
    <br>
  <label>cod-postal</label>
  <input type="text" name="codPostalEditContacto" id="codPostalEditContacto" placeholder="codPostal" class="form-control inputShortCamps"></input>
</div> 
</div>
</div>
</div><!-- FIM TAB DadosPessoais -->


<div id="editOutrosDados" class="tab-pane fade in"><!-- TAB OutrosDados -->
<br>
<div class="form-group">
<label>Empresa</label>
<select class='custom-select' id='empresaEditContacto' name='empresaEditContacto'>
</select>
</div> 
<div class="form-group">
<label>Proprietário</label>
<select class='custom-select' id='id_comercialEditContacto' name='id_comercialEditContacto'>
</select>
</div> 
<div class="form-group">
<label>Cliente Novo</label>
<select class='custom-select' id='clienteNovoEditContacto' name='clienteNovoEditContacto'>
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
<select class='custom-select' id='necessidadeEditContacto' name='necessidadeEditContacto'>
</select>
</div>
<label>Origem</label>
    <div id="origemEditContacto"></div>
    <label>Canal</label>
    <div id="canalEditContacto"></div>
</div><!-- Fim TAB OutrosDados -->


</div><!-- FIM TABS -->

        <!-- Modal footer -->
        <div class="modal-footer text-center">
        <input type="submit"  id="submitEditContactoButton" name="submit" value="Editar" class=" custom-close btn btn-secondary pull-center pull-right buttonStyle">
        </form>
        <button type="button" class="btn btn-secondary buttonStyle" data-dismiss="modal">Cancelar</button>
        </div>

      </div>
    </div>
  </div>
</div>
</div>


<!-- Botao EDITAR Contacto -->
<script>
$(document).ready(function(value) {



  jQuery.validator.addMethod("notNull", function() {

var proprietario = $('#id_comercialEditContacto').val();

if(proprietario ==""|| proprietario == null){

  return false;
}else{

  return true;
}


}, "Nao pode estar vazio");



  jQuery.validator.addMethod("editContactoUniqueName", function() {
    var id = <?php echo $id; ?>;
    var nomeEditContacto = $('#nomeEditContacto').val();
  $.ajax({
type:'POST',
data:{nomeEditContacto: nomeEditContacto, id: id},
url:'<?php echo base_url('contactos/editContactoUniqueName') ?>',
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


$("#editContactoForm").validate({
	rules: {
		nomeEditContacto: {
      editContactoUniqueName: true,
			required: true,
			},
      pessoaDeContactoEditContacto: {
			required: true,
			},
      telemovelEditContacto: {
      number:true,
			required: true,
			},
      telemovel2EditContacto: {
      number:true,
			},
      emailEditContacto: {
      email:true,
			required: true,
			},
      dataEditContacto: {
      required: true,
			},
      id_comercialEditContacto: {
			required: true,
      notNull: true,
			},
      clienteNovoEditContacto: {
			required: true,
			},
		},
    submitHandler: function(form) {
      if ($('#editContactoForm').valid()) {

//alert('clicou');
        var idContacto = <?php echo $id; ?>;
        var nomeEditContacto = $('#nomeEditContacto').val();
        var pessoaDeContactoEditContacto = $('#pessoaDeContactoEditContacto').val();
        var telemovelEditContacto = $('#telemovelEditContacto').val();
        var telemovel2EditContacto = $('#telemovel2EditContacto').val();
        var emailEditContacto = $('#emailEditContacto').val();
        var observacoesEditContacto = $('#observacoesEditContacto').val();
        var dataEditContacto = $('#dataEditContacto').val();
        var cidadeEditContacto = $('#cidadeEditContacto').val();
        var ruaEditContacto = $('#ruaEditContacto').val();
        var codPostalEditContacto = $('#codPostalEditContacto').val();
        var empresaEditContacto = $('#empresaEditContacto').val();
        var id_comercialEditContacto = $('#id_comercialEditContacto').val();
        var clienteNovoEditContacto = $('#clienteNovoEditContacto').val();
        var necessidadeEditContacto = $('#necessidadeEditContacto').val();
        var origemEditContacto = $('input[name=editOrigem]:checked').val();
        var canalEditContacto = $('input[name=editCanal]:checked').val();
//alert(ruaEditContacto);

$.ajax({
type:'POST',
data: {

idContacto: idContacto,
nomeEditContacto: nomeEditContacto, 
pessoaDeContactoEditContacto:pessoaDeContactoEditContacto, 
telemovelEditContacto:telemovelEditContacto, 
telemovel2EditContacto:telemovel2EditContacto, 
emailEditContacto: emailEditContacto,
observacoesEditContacto: observacoesEditContacto,
dataEditContacto: dataEditContacto,
empresaEditContacto: empresaEditContacto,
id_comercialEditContacto: id_comercialEditContacto,
clienteNovoEditContacto: clienteNovoEditContacto,
necessidadeEditContacto: necessidadeEditContacto,
origemEditContacto: origemEditContacto,
canalEditContacto: canalEditContacto,

cidadeEditContacto: cidadeEditContacto,
ruaEditContacto: ruaEditContacto,
codPostalEditContacto: codPostalEditContacto

},
url:'<?php echo base_url('contactos/edit_contacto') ?>',
success: function(result){

var myresult = jQuery.parseJSON(result);

//console.log(myresult.success);
if(myresult.success==true){

$("#closeEditContactoModal").trigger("click");
$('#editContactoForm')[0].reset();
$('#t_contactos').DataTable().ajax.reload();

$('#showMessageEditContacto').fadeIn(1000).html(myresult.msg);
$('#showMessageEditContacto').fadeOut(3000).html(myresult.msg);

      var id = <?php echo $id; ?>;
      //alert('hello'+id);
$.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_t_contactos') ?>',
success: function(result){
$('#showFicheiro').html(result);

            }
        });

}else{

$('#t_contactos').DataTable().ajax.reload();
$('#showMessageEditContacto').fadeIn(1000).html(myresult.msg);
$('#showMessageEditContacto').fadeOut(3000).html(myresult.msg);

}


            }
        });

       }
            
        }
});

}); 
</script>


<!-- SHOW INFO IN EDIT CONTACTO -->

<script>
function editContacto(){
  var id = <?php echo $id; ?>;
//alert(id);

$.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('contactos/get_dados_editContacto') ?>',
success: function(values){

var data = jQuery.parseJSON(values);

var id_necessidade = data.id_necessidade;
$.ajax({
type:'POST',
data:{id_necessidade:id_necessidade},
url:'<?php echo base_url('contactos/necessidade_dropdown_edit') ?>',
success: function(result){

$('#necessidadeEditContacto').html(result);

} 
});

var id_empresas = data.id_empresas;
$.ajax({
type:'POST',
data:{id_empresas: id_empresas},
url:'<?php echo base_url('contactos/empresas_dropdown_edit') ?>',
success: function(result){

$('#empresaEditContacto').html(result);

} 
});

var id_comercial = data.id_comercial;
$.ajax({
type:'POST',
data:{id_comercial: id_comercial},
url:'<?php echo base_url('contactos/comerciais_dropdown_edit') ?>',
success: function(result){

$('#id_comercialEditContacto').html(result);
} 
});

var origem = data.id_origem;
$.ajax({
type:'POST',
data:{origem: origem},
url:'<?php echo base_url('contactos/origem_options_edit') ?>',
success: function(result){

$('#origemEditContacto').html(result);

} 
});

var canal = data.id_canal;
$.ajax({
type:'POST',
data:{canal: canal},
url:'<?php echo base_url('contactos/canal_options_edit') ?>',
success: function(result){

$('#canalEditContacto').html(result);

} 
});

$("#nomeEditContacto").val(data.nome);
$("#pessoaDeContactoEditContacto").val(data.pessoaDeContacto);
$("#telemovelEditContacto").val(data.telemovel);
$("#telemovel2EditContacto").val(data.telemovel2);
$("#emailEditContacto").val(data.email);
$("#dataEditContacto").val(data.dataVisita);
$("#clienteNovoEditContacto").val(data.clienteNovo);
$("#id_comercialEditContacto").val(data.id_comercial);
$("#empresaEditContacto").val(data.id_empresas);
$("#observacoesEditContacto").val(data.observacoes);
$("#origemEditContacto").val(data.id_origem);
$("#necessidadeEditContacto").val(data.id_necessidade);
$("#canalEditContacto").val(data.id_canal);

$("#cidadeEditContacto").val(data.cidade);
$("#ruaEditContacto").val(data.rua);
$("#codPostalEditContacto").val(data.codigoPostal);

} 
});
}
</script>





<!--<button type="button" class="btn btn-outline-secondary buttonStyle pull-right"><i class="fa fa-plus faButton"></i> Criar Negócio</button>-->
</div>
</div>
</div>
<br>
      
<div class="container">
<div id="showMessageEditContacto"></div>
<div class="row" id="showFicheiro"></div>
<div id="showIfDelete" class="showIfDelete"></div> 


</div>
</div>
<div id="Notas" class="tab-pane fade in">
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
      <h3 class="bottomSeparator">Notas do Contacto</h3>
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

<input type="hidden" name="notaContacto" id="notaContacto" value="<?php echo $id_not ?>" class="form-control"></input>

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
        var notaContacto = $('#notaContacto').val();
        var nota_id_comercialForm = $('#nota_id_comercialForm').val();


$.ajax({
type:'POST',
data: {notaTitulo: notaTitulo, nota:nota, dataNota:dataNota, notaContacto:notaContacto, nota_id_comercialForm: nota_id_comercialForm},
url:'<?php echo base_url('contactos/create_nota') ?>',
success: function(result){

var myresult = jQuery.parseJSON(result);

//console.log(myresult.success);
if(myresult.success==true){
  var id = <?php echo $id; ?>;

$.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_notas') ?>',
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

<input type="hidden" name="editNotaContacto" id="editNotaContacto" value="<?php echo $id_not ?>" class="form-control"></input>
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



<!-- BOTAO EDITAR NOTA-->
<script>
$(document).ready(function(value) {


  jQuery.validator.addMethod("editNotaTituloUniqueName", function() {

    //var id = $('#edit_id_notas').val();
    window.id_nota_seleccionada = $('#edit_id_notas').val();
    var id = window.id_nota_seleccionada;
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
      if ($('#editFicheiroForm').valid()) {


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
  
  var id = <?php echo $id; ?>;
      //alert(id);
      $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_notas') ?>',
success: function(result){
$('#showNotas').html(result);
//$('.naoClicouEmFicheiros').show();
            }
        });

var id = myresult.id_notas;
//alert(id);
$.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('contactos/nota_seleccionada_detalhes') ?>',
success: function(result){
$('#showNotaDetalhes').html(result);


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




<!-- SHOW INFO IN EDIT NOTAS -->

<script>
function notaEditar(id){
//window.id_nota_seleccionada = id;
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

<div id="Tarefas" class="tab-pane fade in">
    <div class="container">
  <div class="row">
<div class="col-lg-12 col-md-12 col-xs-12">
<button type="button" class="btn btn-outline-secondary buttonStyle pull-right"><i class="fa fa-trash faButton"></i> Apagar</button>
<button type="button" class="btn btn-outline-secondary buttonStyle pull-right"><i class="fa fa-edit faButton"></i> Editar</button>
<button type="button" class="btn btn-outline-secondary buttonStyle pull-right"><i class="fa fa-plus faButton"></i> Criar Tarefa</button>
</div>
</div>
</div>
<br>
      <div class="container">
      <div class="row">
      <div class="col-lg-6 col-md-6 col-xs-12">
      <h3 class="bottomSeparator">Tarefas do Contacto</h3>
      <button type="button" class="btn btn-outline-secondary buttonStyle pull-left btn-sm"><i class="fa fa-plus faButton"></i> Criar Tarefa</button>
      <br>
      <br>
      <h4>Tarefas</h4>
      <p>não existem tarefas</p>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">
      <h3 class="bottomSeparator">Visualizar Tarefas</h3>
      <h4>Nenhuma tarefa seleccionada</h4>
      <p>Seleccione uma tarefa para a poder visualizar...</p>

    </div>
</div>
</div>
</div>
<div id="Ficheiros" class="tab-pane fade in">
    <div class="container">
  <div class="row">
<div class="col-lg-12 col-md-12 col-xs-12">
<button type="button" class="btn btn-outline-secondary buttonStyle pull-right"  data-toggle='modal' onclick="uploadFicheirosReset()" data-target='#uploadFicheiroModal'><i class="fa fa-upload faButton"></i> Upload Ficheiro</button> 
</div>
</div>
</div>
<br>
      <div class="container">
      <div class="row">
      <div class="col-lg-6 col-md-6 col-xs-12">
      <h3 class="bottomSeparator">Ficheiros do Contacto</h3>
      <button type="button" class="btn btn-outline-secondary buttonStyle pull-left btn-sm" data-toggle='modal' onclick="uploadFicheirosReset()" data-target='#uploadFicheiroModal'><i class="fa fa-upload faButton"></i> Upload Ficheiro</button>
      <br>
      <br>
      <h4>Ficheiros</h4>
      <div id="showFicheiros"class="table-responsive"></div><!--mostrar tabela de ficheiros do contacto -->
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">
      <h3 class="bottomSeparator">Visualizar Ficheiro</h3>
      <div id="showFicheiroDetalhes"></div><!--mostrar detalhes do ficheiro seleccionada -->
      <div class="naoClicouEmFicheiros"><!--Div para esconder quando é selecionada um ficheiro -->
      <h4>Nenhum ficheiro seleccionado</h4>
      <p>Seleccione um ficheiro para a poder visualizar...</p>
</div>
<div id="showIfDeleteFicheiro"></div><!--mostrar os alertas de erro ou sucesso-->

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
<input type="hidden" name="id_contacto" id="id_contacto" value="<?php echo $id_not ?>" class="form-control"></input>
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
<input type="hidden" name="id_contacto" id="edit_id_contacto" value="<?php echo $id_not ?>" class="form-control"></input>
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



<!-- Negócios Tab -->
<div id="Negócios" class="tab-pane fade in">
    <div class="container">
  <div class="row">
<div class="col-lg-12 col-md-12 col-xs-12">
<button type="button" class="btn btn-outline-secondary buttonStyle pull-right" data-toggle='modal' onclick="createNegocioDropdowns()" data-target='#createNegocioModal'><i class="fa fa-plus faButton"></i> Criar Negócio</button> 
</div>
</div>
</div>
<br>
      <div class="container">
      <div class="row">
      <div class="col-lg-6 col-md-6 col-xs-12">
      <h3 class="bottomSeparator">Negócios do Contacto</h3>
      <button type="button" class="btn btn-outline-secondary buttonStyle pull-left btn-sm" data-toggle='modal' onclick="createNegocioDropdowns()" data-target='#createNegocioModal'><i class="fa fa-plus faButton"></i> Criar Negócio</button> 
      <br>
      <br>

      <!--mostrar todos os negocios do contacto -->
      <h4>Negócios</h4>
      <div id="showNegocio" class="table-responsive"></div>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">
      <h3 class="bottomSeparator">Visualizar Negócios</h3>

      <!--mostrar detalhes da nota seleccionada -->
      <div id="showNegocioDetalhes"></div>

      <!--Div para esconder quando é selecionada uma nota -->
      <div class="naoClicouEmNegocio">
      <h4>Nenhum negócio seleccionado</h4>
      <p>Seleccione uma negócio para o poder visualizar...</p>

</div>
<div id="showIfDeletedNegocio"></div><!--mostrar notificacao apagar negocio -->
<div id="showNegociosMessage"></div><!--Mensagens criar editar delete -->

    </div>
</div>
</div>
</div>





<!-- Edit NEGÓCIO -->

<div class="container">
<!-- The Modal -->
<div class="modal fade" id="editNegocioModal">
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

<form id="editNegocioForm" method="post">
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
 </div>
 <!-- FIM TAB GERAL -->



<!-- TAB DADOS DO NEGOCIO -->

<div id="dadosEditDoNegocio" class="tab-pane fade in">
<br>  
<div class="form-group">
<label>Valor do Negócio</label>
<br>
<input id="valorNegocioEditarNegocio" type="number" name="valorNegocioEditarNegocio" value="" placeholder="€" min="0" max ="9999999" step="0.01"/>
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
</div>

<!-- Fim TAB DADOS DO NEGOCIO -->


<!-- TAB ITENS-COMPRA -->

<div id="itensEditCompraDoNegocio" class="tab-pane">
<h2>Aqui serão apresentadas as listas dos produtos a seleccionar...</h2>
</div>

<!-- FIM TAB ITENS-COMPRA -->

</div
><!-- FIM TABS -->

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





<!-- BOTAO EDITAR NEGOCIO-->
<script>
$(document).ready(function(value) {

  jQuery.validator.addMethod("nomeNegocioEditarNegocioUniqueName", function() {

var id = window.id_negocio_seleccionado;
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

$('#editNegocioForm').validate({

	rules: {
		id_contactoEditarNegocio: {
			required: true,
			},
      nomeDoNegocioEditarNegocio: {
      nomeNegocioEditarNegocioUniqueName: true,
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
      if ($('#editNegocioForm').valid()) {

        var id_contactoEditarNegocio = $('#id_contactoEditarNegocio').val();
        var nomeDoNegocioEditarNegocio = $('#nomeDoNegocioEditarNegocio').val();
        var etapaFunilEditarNegocio = $('#etapaFunilEditarNegocio').val();
        var estadoNegocioEditarNegocio = $('#estadoNegocioEditarNegocio').val();
        var id_comercialEditarNegocio = $('#id_comercialEditarNegocio').val();
        var valorNegocioEditarNegocio = $('#valorNegocioEditarNegocio').val();
        var numeroOrcamentoEditarNegocio = $('#numeroOrcamentoEditarNegocio').val();
        var ajudicadoEditarNegocio = $('#ajudicadoEditarNegocio').val();
        var motivosEditarNegocio = $('#motivosEditarNegocio').val();

        var id_negocio_seleccionado = window.id_negocio_seleccionado ;

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
  
  var id = <?php echo $id ?>;
      //alert(id);
      $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_negocios') ?>',
success: function(result){
$('#showNegocio').html(result);
            }
        });


$('#showNegociosMessage').fadeIn(1000).html(myresult.msg);
$('#showNegociosMessage').fadeOut(3000).html(myresult.msg);
//comentar se mantiver detalhes nota seleccionada.
//codar para meter cor  na nota ativa
$('#showNegocioDetalhes').hide();
$('.naoClicouEmNegocio').show();

$('#editNegocioForm')[0].reset();
$("#closeEditNegocioModal").trigger("click");
}

            }
        });

       }
            
        }
});

}); 
</script>


<!-- JUMP TO NEGOCIO BUTTON -->
<script>

function jumpToNegocio(id){

window.location = ' <?php echo base_url('negocios/negocios_detalhes/') ?>' + id;

}
</script>


<!-- SHOW INFO IN EDIT NEGOCIO -->

<script>
function negocioEditar(id){
window.id_negocio_seleccionado = id;
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
 


</div><!-- FIM TAB GERAL -->


<div id="dadosDoNegocio" class="tab-pane fade in"><!-- TAB DADOS DO NEGOCIO -->
<br>  
<div class="form-group">
<label>Valor do Negócio</label>
<br>
<input id="valorNegocioCriarNegocio" type="number" name="valorNegocioCriarNegocio" value="" placeholder="€" min="0" max="9999999" step="0.01"/>
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

  var id_contacto = <?php echo $id; ?>;

$.ajax({
type:'POST',
data:{id_contacto: id_contacto},
url:'<?php echo base_url('contactos/contactos_dropdown_edit') ?>',
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


      var id = <?php echo $id; ?>;
      $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_negocios') ?>',
success: function(result){
$('#showNegocio').html(result);
$('#showNegocioDetalhes').hide();
  $('.naoClicouEmNegocio').show();
  $('#showNegociosMessage').fadeIn(1000).html(myresult.msg);
$('#showNegociosMessage').fadeOut(3000).html(myresult.msg);
            }
        });

$("#closeCreateNegocioModal").trigger("click");
$('#createNegocioModal')[0].reset();



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



<!-- Refresh Negócios on Click Tab -->
<script>
  $(document).ready(function() {
    $( "#nav-negocios-tab" ).on( "click", function() {
      //alert('notas');
      var id = <?php echo $id; ?>;
      $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_negocios') ?>',
success: function(result){
$('#showNegocio').html(result);
$('#showNegocioDetalhes').hide();
  $('.naoClicouEmNegocio').show();
            }
        });
    });
  });
</script>

<!-- Select and show negocio info -->
<script>

function negocioSeleccionado(id){
//alert(id);

$.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('contactos/negocio_seleccionado_detalhes') ?>',
success: function(result){
$('#showNegocioDetalhes').html(result);
$('#showNegocioDetalhes').show();
$('.naoClicouEmNegocio').hide();
            }
        });

} 

</script>


<!-- BOTAO Apagar Negocio Seleccionado -->
<script>
function negocioApagar(id){
window.id_negocio_seleccionado = id;
}
function negocioApagarConfirm(){

  var id = id_negocio_seleccionado;
  $.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('contactos/negocio_seleccionado_apagar') ?>',
success: function(result){

  $('#showIfDeletedNegocio').fadeIn(1000).html(result);
  $('#showIfDeletedNegocio').fadeOut(3000).html(result);
  $('#showNegocioDetalhes').hide();
  $('.naoClicouEmNegocio').show();
  var id = <?php echo $id ?>;
  $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_negocios') ?>',
success: function(result){
$('#showNegocio').html(result);

            }
        });
}
        });
}
</script>


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



</div>

















<div id="Histórico" class="tab-pane fade in">
<br>
      <div class="container">
      <div class="row">
      <div class="col-lg-6 col-md-6 col-xs-12">
      <br>
      <br>
      <h3 class="bottomSeparator">Histórico do Contacto</h3>
      <button type="button" class="btn btn-outline-secondary buttonStyle pull-left btn-sm"><i class="fa fa-history faButton"></i> Refresh</button>  
      <br>
      <br>
      <h4>Histórico</h4>
      <p id="lol">não existem alterações registadas no histórico deste contacto</p>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">

    </div>
</div>
</div>
</div>




<!-- Refresh detalhes on Click Tab -->
<script>
  $(document).ready(function() {
    $( "#nav-detalhes-tab" ).on( "click", function() {
      //alert('hello');
      var id = <?php echo $id; ?>;
      //alert('hello'+id);
      $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_t_contactos') ?>',
success: function(result){
$('#showFicheiro').html(result);

            }
        });
    });
  });
</script>
<!-- refresh detalhes on load page -->
<script>
 $(document).ready(function() {
      var id = <?php echo $id; ?>;
      var load = 1;
if(load ==1){
      $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_t_contactos') ?>',
success: function(result){
$('#showFicheiro').html(result);

            }
        });
        load--;
      }
  });
  </script>

<!-- Apagar Contacto -->
<script>
  $(document).ready(function() {
    $( "#apagarContacto" ).on( "click", function() {

      var id = <?php echo $id; ?>;

      $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/delete_contacto_by_id') ?>',
success: function(result){

  window.location = ' <?php echo base_url('categorias/categoria/') ?>';

            }
        });
    });
  });
</script>


<!-- Refresh notas on Click Tab -->
<script>
  $(document).ready(function() {
    $( "#nav-notas-tab" ).on( "click", function() {
      //alert('notas');
      var id = <?php echo $id; ?>;

      $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_notas') ?>',
success: function(result){
$('#showNotas').html(result);
$('#showNotaDetalhes').hide();
  $('.naoClicouEmNotas').show();
            }
        });
    });
  });
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


<!-- BOTAO Apagar Nota Seleccionada -->
<script>
function notaApagar(id){
window.id_nota_seleccionada = id;
}
function notaApagarConfirm(){

  var id = id_nota_seleccionada ;
  $.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('contactos/nota_seleccionada_apagar') ?>',
success: function(result){

  $('#showIfDeleteNota').fadeIn(1000).html(result);
  $('#showIfDeleteNota').fadeOut(3000).html(result);
  $('#showNotaDetalhes').hide();
  $('.naoClicouEmNotas').show();
  var id = <?php echo $id ?>;
  $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_notas') ?>',
success: function(result){
$('#showNotas').html(result);

            }
        });
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


<!-- uploadFicheiros reset form -->
<script>
  function uploadFicheirosReset(){
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
      //alert('notas');
      var id = <?php echo $id; ?>;
      //alert(id);
      $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_ficheiros') ?>',
success: function(result){
$('#showFicheiros').html(result);
$('#showFicheiroDetalhes').hide();
$('.naoClicouEmFicheiros').show();
            }
        });
    });
  });
</script>


<!-- Select and show Ficheiros info -->
<script>

function ficheiroSeleccionado(id){
//alert(id);

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

<!-- BOTAO Apagar Ficheiro Seleccionado -->
<script>
function ficheiroApagar(id){
window.id_ficheiro_seleccionado = id;
}
function ficheiroApagarConfirm(){

  var id = id_ficheiro_seleccionado;
  $.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('contactos/ficheiro_seleccionado_apagar') ?>',
success: function(result){

  $('#showIfDeleteFicheiro').fadeIn(1000).html(result);
  $('#showIfDeleteFicheiro').fadeOut(3000).html(result);
  $('#showFicheiroDetalhes').hide();
  $('.naoClicouEmFicheiros').show();
  var id = <?php echo $id ?>;
  $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_ficheiros') ?>',
success: function(result){
$('#showFicheiros').html(result);

            }
        });
}
        });
}
</script>


<!-- BOTAO Aceitar UPLOAD Ficheiro-->
<script>
$(document).ready(function(value) {
  jQuery.validator.addMethod("uniqueName", function() {
    var nomeFicheiro = $('#nomeFicheiro').val();
    //alert(nomeFicheiro);
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
        var id_contacto = $('#id_contacto').val();
        formData.append('id_contacto', id_contacto);
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
url:'<?php echo base_url('contactos/upload_ficheiro') ?>',
success: function(result){

var myresult = jQuery.parseJSON(result);

//console.log(result);
//alert(myresult.success);

if(myresult.success==true){

var id = <?php echo $id; ?>;
$.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_ficheiros') ?>',
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




<!-- SHOW INFO IN EDIT FICHEIRO -->

<script>
function ficheiroEditar(id){
window.id_ficheiro_seleccionado = id;
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
        var edit_id_contacto = $('#edit_id_contacto').val();
        var edit_id_comercialForm = $('#edit_id_comercialForm').val();
        var editDescricao = $('#editDescricao').val();
        var edit_id_ficheiro = $('#edit_id_ficheiro').val();

        

$.ajax({
type:'POST',
data: {editData: editData, edit_id_contacto:edit_id_contacto, edit_id_comercialForm:edit_id_comercialForm, editDescricao:editDescricao, edit_id_ficheiro: edit_id_ficheiro},
url:'<?php echo base_url('contactos/edit_ficheiro') ?>',
success: function(result){

var myresult = jQuery.parseJSON(result);

//console.log(myresult.success);
//alert(myresult.success);
if(myresult.success== true){
  
  var id = <?php echo $id; ?>;
      //alert(id);
      $.ajax({
type:'POST',
data:{id:id},
url:'<?php echo base_url('contactos/get_ficheiros') ?>',
success: function(result){
$('#showFicheiros').html(result);
//$('.naoClicouEmFicheiros').show();
            }
        });

var id = myresult.id_ficheiro;

$.ajax({
type:'POST',
data:{id: id},
url:'<?php echo base_url('contactos/ficheiro_seleccionado_detalhes') ?>',
success: function(result){
$('#showFicheiroDetalhes').html(result);


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

















































</div><!--TABS CONTENT END -->

<?php include_once'footer.php'; ?>

</body>
</html>

























