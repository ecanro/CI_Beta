<?php

    include_once'header.php';

?>



<?php 		


$username = $this->input->post('username');
$nome = $this->input->post('nome');
$sobrenome = $this->input->post('sobrenome'); 
$email = $this->input->post('email');
$tlm = $this->input->post('tlm');
$password = $this->input->post('password');
$password2 = $this->input->post('password2'); 

?>

<div class="text-center loginHeader errorMsg">
<h2>Regist</h2>
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

<form method="post" action="<?php echo base_url(); ?>login_controller/create_user">
<div><h1>Informações Pessoais</h1></div>
<div class="form-group">
<label>Nome</label>
<input type="text" name="nome" placeholder="Primeiro Nome" value="<?php echo $nome ?>" class="form-control" />
<span class="text-danger"><?php echo form_error('nome'); ?></span>
</div>
<div class="form-group">
<label>Sobrenome</label>
<input type="text" name="sobrenome" placeholder="Sobrenome" value="<?php echo $sobrenome ?>" class="form-control" />
<span class="text-danger"><?php echo form_error('sobrenome'); ?></span>
</div>
<div class="form-group">
<label>Telemóvel</label>
<input type="text" name="tlm" placeholder="Telemóvel" value="<?php echo $tlm ?>" class="form-control" />
<span class="text-danger"><?php echo form_error('tlm'); ?></span>
</div>
<div class="form-group">
<label>Email</label>
<input type="email" name="email" placeholder="Email" value="<?php echo $email ?>" class="form-control" />
<span class="text-danger"><?php echo form_error('email'); ?></span>
</div>
<div><h1>Dados de Conta</h1></div>
<div class="form-group">
<label>Username</label>
<input type="text" name="username" placeholder="username" value="<?php echo $username ?>" class="form-control" />
<span class="text-danger"><?php echo form_error('username'); ?></span>
</div>
<div class="form-group">
<label>Palavra-Passe</label>
<input type="password" name="password" placeholder="password" class="form-control" />
<span class="text-danger"><?php echo form_error('password'); ?></span>
</div>
<div class="form-group">
<label>Confirmar Palavra-Passe</label>
<input type="password" name="password2" placeholder="confirm password" class="form-control" />
<span class="text-danger"><?php echo form_error('password2'); ?></span>
</div>




<div class="form-group text-center">
<button type="submit" name="insert" value="regist" class="btn btn-default">Criar Nova Conta</button>

</div>
</form>
</div>
</div>






<?php

include_once'footer.php';

?>