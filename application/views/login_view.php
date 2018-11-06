<?php

    include_once'header.php';

?>

<?php 		

            $username = $this->input->post('username');
            $password = $this->input->post('password'); 

?>


<div class="container text-center loginHeader2">
<h2>Login</h2>
<?php


echo $this->session->flashdata('error');

?>
</div>
<div class="container loginCenter">
<form method="post" action="<?php echo base_url(); ?>login_controller/login_validation">
<div class="form-group">
<label>Nome de Utilizador</label>
<input type="text" name="username" placeholder="username" value="<?php echo $username ?>" class="form-control" />
<span class="text-danger"><?php echo form_error('username'); ?></span>
</div>
<div class="form-group">
<label>Palavra-Passe</label>
<input type="password" name="password" placeholder="password" class="form-control" />
<span class="text-danger"><?php echo form_error('password'); ?></span>
</div>

<div class="form-group text-center">
<button type="submit" name="insert" value="login" class="btn btn-default">Login</button>

</div>
</form>
</div>







<?php

include_once'footer.php';

?>