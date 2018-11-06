<?php

    include_once'header.php';

?>

<?php

$id = $this->uri->segment(3);
$nota_selecionada = $this->input->post('botaoNotas');


include_once'contactos_submenu.php';



?>

<script type="text/javascript">
    base_url = '<?=base_url()?>';
</script>
<script>

$(document).ready(function(){

$('#bttCalculate').click(function(){
    //alert('hello');
var number1 = $('#number1').val();
var number2 = $('#number2').val();
var number3 = $('#number3').val();

$.ajax({
type:'POST',
data:{number1: number1, number2: number2},
url:'<?php echo base_url('contactos_controller/sum') ?>',
success: function(result){
$('#result2').html(result);


            }
        });
    });
    setInterval(function () {
				$('#lolol').load('<?php echo base_url('contactos_controller/show_noteTitle/');echo $id ?>')
			}, 1000);
});

</script>




<div class="lolol" id="lolol"></div>
<div id="show"></div>

<form>
<h2>Notas Real Time</h2>
<table>
<tr>
<td>Number 1</td>
<td><input type="text" id="number1"</td>
</tr>
<tr>
<td>Number 2</td>
<td><input type="text" id="number2"</td>
</tr>
<tr>
<td>Result</td>
<td><span id="result2"></span></td>
</tr>
<tr>
<td><input type="button" id="bttCalculate" value="sum"></td>
</tr>
</table>
</form>


























<?php


include_once'footer.php';

?>