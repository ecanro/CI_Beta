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
<div class="blueStripe text-center">
  <h2>Grupo Safety</h2>
  <h2 class="lol">Protecção contra Incêncios</h2>
</div>

<div class="loginBox">
<form id="login" method="post">
  <div class="container centeredContent">
  <div id="showLoginMessages"></div>
    <div class="row justify-content-lg-center justify-content-md-center justify-content-sm-center justify-content-xs-center">
      <div class="col-lg-6 col-md-6 col-xs-12">
        <div class="form-group text-center">
          <label>Utilizador</label>
          <div class="input-group">
            <div class="input-group-addon"> <i class='fa fa-user faloginImage'></i> </div>
            <input class="form-control" id="utilizador" name="utilizador" type="text"/>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-lg-center justify-content-md-center justify-content-sm-center justify-content-xs-center">
      <div class="col-lg-6 col-md-6 col-xs-12">
        <div class="form-group text-center">
          <label>Palavra-Passe</label>
          <div class="input-group">
            <div class="input-group-addon"> <i class='fa fa-lock faloginImage'></i> </div>
            <input class="form-control" id="password" name="password" type="password"/>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-lg-center justify-content-md-center justify-content-sm-center justify-content-xs-center">
      <div class="col-lg-6 col-md-6 col-xs-12 text-center">
        <input type="submit"  id="submitLogin" name="submit" value="Entrar" class=" custom-close btn btn-secondary buttonStyle">
      </div>
    </div>
  </div>
</form>
</div>



<!-- Botao Fazer Login -->
<script>
$(document).ready(function(value) {

$("#login").validate({
	rules: {
		utilizador: {
			required: true,
			},
      password: {
			required: true,
			},
		},
    submitHandler: function(form) {
      if ($('#login').valid()) {


        var utilizador = $('#utilizador').val();
        var password = $('#password').val();

$.ajax({
type:'POST',
data: {

utilizador: utilizador, 
password: password

},
url:'<?php echo base_url('login/login_validation') ?>',
success: function(result){

var myresult = jQuery.parseJSON(result);

if(myresult.success==true){
//$('#showLoginMessages').fadeIn(1000).html(myresult.msg);
//$('#showLoginMessages').fadeOut(3000).html(myresult.msg);
//window.location.href = 'categorias';
window.location = ' <?php echo base_url('categorias/categoria/') ?>';
}else{

$('#showLoginMessages').fadeIn(1000).html(myresult.msg);
$('#showLoginMessages').fadeOut(3000).html(myresult.msg);

}


            }
        });

       }
            
        }
});

}); 
</script>



<?php include_once'footer.php'; ?>
</body>
</html>




