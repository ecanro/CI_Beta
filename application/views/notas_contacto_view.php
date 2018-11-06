<?php

    include_once'header.php';

?>

<?php

$id = $this->uri->segment(3);
$nota_selecionada = $this->input->post('botaoNotas');


include_once'contactos_submenu.php';



?>





<div class=" teste container">
<div class="row">                                                                                     
        <div class="table-responsive col-lg-6 ">          
        <table id="example" class="table">
          <thead>
            <tr>
              <th>Notas</th>
            </tr>
          </thead>
          <tbody>

            <?php

              if($notas_contacto->num_rows() > 0){

                foreach($notas_contacto->result() as $row){
                  ?>

                  <tr>
                  <form method="post" action="" > 
                  <td><button type="submit" name="botaoNotas" value="<?php echo $row->id_notas ?>" class=" removeLinkButon"><?php echo $row->notaTitulo; ?></button>  </td>
                  </form>
                  </tr>

                  <?php

                }
                ?>

<?php
              }else{
?>
                <tr>
                <td colspan="3"> Não existem notas para este contacto</td>
                </tr> 
                
                <?php
              }


            ?>
          </tbody>
        </table>
        </div>
        <div class="col-lg-6 uglyBg">
        <div class="uglyBg">
        <p><?php $dadosNota = $this->contactos_model->get_nota_by_nota_id($nota_selecionada)?></p>
        <?php if($dadosNota->num_rows()>0){
            foreach($dadosNota->result() as $row){
              ?>
          <p><?php echo $this->contactos_model->get_proprietario_by_id_comerciante($row->id_comerciante); ?>, <?php echo $row->diaHoras ?></p>
          <p><?php echo $row->nota ?></p>
            <?php }}?>

        </div>
        </div>
      </div>
      
      </div>    






      
<?php

include_once'footer.php';

?>



<script>

$(document).ready(function() {
  $('#example').DataTable( {
      
      dom: 'Bfrtip',
      "bFilter": false,
      "lengthMenu": [[5, 25, 50, -1], [10, 25, 50, "All"]],
      buttons: [
          
      ],            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
            }
        
  } );

  
} );



</script>