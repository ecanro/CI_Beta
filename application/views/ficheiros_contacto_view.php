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
var ficheiroClicado = id;
//alert(notaClicada);

$.ajax({
type:'POST',
data:{ficheiroClicado: ficheiroClicado},
url:'<?php echo base_url('ficheiros_controller/ficheiro_clicado') ?>',
success: function(result){
$('#showFicheiro').html(result);


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
              <th>Ficheiros</th>
            </tr>
          </thead>
          <tbody>

            <?php

              if($ficheiros_contacto->num_rows() > 0){

                foreach($ficheiros_contacto->result() as $row){
                  ?>

                  <tr>
                  <td><button onclick="myFunction(this.id)" id="<?php echo $row->id_ficheiros ?>" class=" removeLinkButon"><?php echo $row->nome; ?></button>  </td>
                  </tr>

                  <?php
                }
                ?>
<?php
              }else{
?>
                <tr>
                <td colspan="3"> Não existem ficheiros para este contacto</td>
                </tr> 
                
                <?php
              }

            ?>
          </tbody>
        </table>
        </div>
   
        <div class="col-lg-6 uglyBg">
        <div id="showFicheiro" class="uglyBg">
       

        </div>
        </div>
      </div>
      <h1>FALTA CHECAR SE EXISTE NOME DE FILE NA DB OU NOME DADO NA DB E HIDDEN(ID_COMERCIANTE)</h1>



<form id="myForm" method="post" enctype="multipart/form-data">

<div class="form-group">
<label>Nome do Ficheiro</label>
<input type="text" name="nomeFicheiro" id="nomeFicheiro" placeholder="nomeFicheiro" class="form-control"></input>
</div> 
<label>Data</label>
<div class="input-group date">
    <input type="date" name="data" id="data" class="form-control">
</div>
<input type="hidden" name="id_contacto" id="id_contacto" value="<?php echo $id ?>" class="form-control"></input>
<input type="hidden" name="id_comerciante" id="id_comerciante" value="1" class="form-control"></input>
<br>
<h6>Selecione o ficheiro</h6>
<input type="file" name="userFile" id="userFile"/></input>
<br>
<br>
<input type="submit" onclick="submitForm" name="submit" value="Upload">
</form>


</div>    



<script>
$(document).ready(function() {
$("#myForm").validate({
	rules: {
		data: {
			required: true,
			},
      nomeFicheiro: {
			required: true,
			},
      userFile: {
			required: true,
			},
		},
    submitHandler: function(form) {

      if ($('#myForm').valid()) {
        formData = new FormData();
        formData.append('userFile', $('#userFile')[0].files[0]);
        var nomeFicheiro = $('#nomeFicheiro').val();
        formData.append('nomeFicheiro', nomeFicheiro);
        var data = $('#data').val();
        formData.append('data', data);
        var id_contacto = $('#id_contacto').val();
        formData.append('id_contacto', id_contacto);
        var id_comerciante = $('#id_comerciante').val();
        formData.append('id_comerciante', id_comerciante);




$.ajax({

type:'POST',
data: formData,
cache:false,
enctype: 'multipart/form-data',
contentType: false,
processData: false,
url:'<?php echo base_url('ficheiros_controller/upload_ficheiro') ?>',
success: function(result){
$('#showFicheiro').html(result);
$("#myForm")[0].reset();

            }
        });
       }
            
        }
});

}); 
</script>

      
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