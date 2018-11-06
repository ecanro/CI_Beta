<?php

    include_once'header.php';

?>





<div class="container center menuCenter">
  <div class="row">
    <div class="col-lg-4 col-md-12 col-xs-12">
    <a class="menuLinks " href="<?php echo base_url('/contactos_controller/contactos');?>">
      <div class="bg">
      <h1>Contactos</h1>
      <img class="imgMenu" src="<?php echo base_url('/assets/images/Contactos.png')?>">
    </div>
    </div>
</a>
    <div class="col-lg-4 col-md-12 col-xs-12">
    <a class="menuLinks "href="#">
    <div class="bg">
    <h1>Negócios</h1>
      <img class="imgMenu" src="<?php echo base_url('/assets/images/negocio.png')?>">
      </div>
    </div>
    </a>
    <div class="col-lg-4 col-md-12 col-xs-12">
    <a class="menuLinks "href="#">
    <div class="bg">
    <h1>Tarefas</h1>
      <img class="imgMenu" src="<?php echo base_url('/assets/images/tarefas.png')?>">
      </div>
    </div>
    </a>
  </div>
</div>




<?php

include_once'footer.php';

?>

