<?php

    include_once'header.php';

?>

<?php

$id = $this->uri->segment(3);

include_once'contactos_submenu.php';

if($detalhes_contacto->num_rows() >0){

foreach($detalhes_contacto->result() as $row){

    ?>

<div class="container centerAll">
<div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
        <h2>Dados Pessoais</h2>
          <h4>Nome</h4>
          <p><?php echo $row->nome;?></p>

          <h4>Pessoa de Contacto</h4>
          <p><?php echo $row->pessoaDeContacto;?></p>

          <h4>Telemóvel</h4>
          <p><?php echo $row->telemovel;?></p>

          <h4>Telemóvel2</h4>
          <?php if($row->telemovel2!=null){?>
  <p><?php echo $row->telemovel2; ?></p><?php
}else{ ?><p>Nenhum</p><?php } ?>


          <h4>Email</h4>
          <p><?php echo $row->email;?></p>

          <h4>Morada</h4>
          
<?php if($detalhes_morada->num_rows() >0)
$moradaCount = 1;
foreach($detalhes_morada->result() as $morada){?>

          <h6>morada <?php echo $moradaCount ?></h6>
          <p><?php echo $morada->cidade;?>, <?php echo $morada->rua;?>, <?php echo $morada->codigoPostal;?></p>
          <p></p>
          <p></p>
          <?php $moradaCount +=1;?>
<?php } ?>

          
          <h4>Observações</h4>
                    <?php if($row->observacoes ==NULL){
            ?><p>Nenhum</p><?php
          }else{?><p><?php echo $row->observacoes ?></p><?php } ?>
</div>
        <div class="col-lg-6 col-md-6 col-xs-12">
        <h2>Outros dados</h2>
          <h4>Proprietário</h4>
          <p><?php $deu = $this->contactos_model->get_proprietario_by_id_comerciante($row->id_comerciante)?></p>
          <p><?php echo $deu ?></p>

          <h4>Cliente Novo</h4>
          
          <?php if($row->clienteNovo ==1){
            ?><p>Sim</p><?php
          }else{?><p>Não</p><?php } ?>

          <h4>Necessidade</h4>
          <?php if($row->id_necessidade==null){
              ?><p>Nenhum</p><?php
            } else{?><p><?php $ness = $this->contactos_model->get_necessidade_by_id_necessidade($row->id_necessidade)?></p>
              <p><?php echo $ness;?></p><?php } ?>

            <h4>Origem</h4>
            <?php if($row->id_origem==null){
              ?><p>Nenhum</p><?php
            } else{?><p><?php $ori = $this->contactos_model->get_origem_by_id_origem($row->id_origem)?></p>
              <p><?php echo $ori;?></p><?php } ?>


            <h4>Canal</h4>
            <?php if($row->id_canal==null){
              ?><p>Nenhum</p><?php
            } else{?><p><?php $can = $this->contactos_model->get_canal_by_id_canal($row->id_canal)?></p>
              <p><?php echo $can;?></p><?php } ?>

            <h4>Empresa</h4>
            
            <?php if($row->id_empresas==null){
              ?><p>Nenhum</p><?php
            } else{?><p><?php $emps = $this->contactos_model->get_empresa_by_id_contacto($row->id_empresas)?></p>
              <p><?php echo $emps;?></p><?php } ?>
            



            <h4>Criado Em</h4>
          <p><?php echo $row->dataVisita;?></p>
        </div>
        </div>
        </div>
    <?php


}
}else{

  ?><p>Contacto não existe</p><?php
}

?>






<?php

include_once'footer.php';

?>