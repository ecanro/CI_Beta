<?php

    include_once'header.php';

?>

<?php

$id = $this->uri->segment(3);


include_once'contactos_submenu.php';



?>



<script>
function myFunction(id){
//alert('hello');
var notaClicada = id;
//alert(notaClicada);

$.ajax({
type:'POST',
data:{notaClicada: notaClicada},
url:'<?php echo base_url('contactos_controller/nota_Seleccionada') ?>',
success: function(result){
$('#showNota').html(result);


            }
        });

}
</script>


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
                  <td><button onclick="myFunction(this.id)" id="<?php echo $row->id_notas ?>" class=" removeLinkButon"><?php echo $row->notaTitulo; ?></button>  </td>
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
        <div id="showNota" class="uglyBg">
       

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