<?php

    include_once'header.php';

?>





<a href="<?php echo base_url('/contactos_controller/create_contacto');?>">Criar Contacto</a>

<div class=" teste container">
<div class="row">                                                                                     
        <div class="table-responsive table-hover pointer">          
        <table id="example" class="table">
          <thead>
            <tr>
              <th>id</th>
              <th>Nome</th>
              <th>PessoaDeContacto</th>
              <th>Telemovel</th>
              <th>Telemovel2</th>
              <th>Email</th>
              <th>Proprietário</th>
            </tr>
          </thead>
          <tbody>

            <?php

              if($get_contactos->num_rows() > 0){

                foreach($get_contactos->result() as $row){
                  $proprietarioNome = $this->contactos_model->get_proprietario_by_id_comerciante($row->id_comerciante);
                  ?>

                  <tr class='clickable-row' data-href='<?php echo base_url(); ?>/contactos_controller/detalhes_contacto/<?php echo $row->id_contacto; ?>'>
                  <td><?php echo $row->id_contacto; ?></td>
                  <td><?php echo $row->nome; ?></td>
                  <td><?php echo $row->pessoaDeContacto; ?></td>
                  <td><?php echo $row->telemovel; ?></td>
                  <td><?php echo $row->telemovel2; ?></td>
                  <td><?php echo $row->email; ?></td>
                  <td><?php echo $proprietarioNome; ?></td>
                  </tr>

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
          </tbody>
        </table>
        </div>
      </div>
      </div>    





<?php

include_once'footer.php';

?>


<script>

jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});

</script>


<script>

$(document).ready(function() {
  $('#example').DataTable( {
      
      dom: 'Bfrtip',
      "bFilter": false,
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
      ],            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
            }
        
  } );

  
} );



</script>

