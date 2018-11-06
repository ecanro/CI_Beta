<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos_controller extends CI_Controller {

	
	public function contactos()
	{	
        $this->load->model("contactos_model");
        $data["get_contactos"] = $this->contactos_model->get_contactos();

		$this->load->view('contactos_view',$data);
    }


public function detalhes_contacto(){

    $contacto_id = $this->uri->segment(3);
    $this->load->model('contactos_model');
    $data["detalhes_morada"] = $this->contactos_model->get_moradas_by_id_contacto($contacto_id);
    $data["detalhes_contacto"] = $this->contactos_model->get_contacto_by_id($contacto_id);
    $this->load->view('detalhes_contacto_view',$data);

}


public function create_contacto(){

    $this->load->model("contactos_model");
    $data["get_comerciantes"] = $this->contactos_model->get_all_comerciantes();
    $data["get_empresas"] = $this->contactos_model->get_all_empresas();
    $data["get_origem"] = $this->contactos_model->get_all_origem();
    $data["get_necessidade"] = $this->contactos_model->get_all_necessidade();
    $data["get_canal"] = $this->contactos_model->get_all_canal();



$this->load->view('create_contact_view',$data);

}


public function create_contacto_validation(){

$this->load->library('form_validation');
$this->form_validation->set_rules("nome","nome","required");
$this->form_validation->set_rules("pessoaDeContacto","pessoaDeContacto","required");
$this->form_validation->set_rules('telemovel','Telemovel','required|numeric|max_length[9]');
$this->form_validation->set_rules('telemovel2','Telemovel2','numeric|max_length[9]');
$this->form_validation->set_rules('email','email','required|valid_email');
$this->form_validation->set_rules("observacoes","observacoes","trim");
$this->form_validation->set_rules('id_origem', 'id_origem', 'trim');

$this->form_validation->set_rules('data', 'data', 'required');

$this->form_validation->set_rules('id_comerciante', 'id_comerciante', 'trim|required');
$this->form_validation->set_rules('id_canal', 'id_canal', 'trim');
$this->form_validation->set_rules('id_necessidade', 'id_canal', 'trim');
$this->form_validation->set_rules('id_empresas', 'id_empresas', 'trim');
$this->form_validation->set_rules('clienteNovo', 'clienteNovo', 'trim|required');

$this->form_validation->set_rules("cidade","cidade","required");
$this->form_validation->set_rules("rua","rua","required");
$this->form_validation->set_rules("codigoPostal","codigoPostal","required");



if($this->form_validation->run()){


    $emp = $this->input->post("id_empresas");
    if($emp=="")$emp=NULL;

    $can = $this->input->post("id_canal");
    if($can=="")$can=NULL;

    $ori = $this->input->post("id_origem");
    if($ori=="")$ori=NULL;

    $ness = $this->input->post("id_necessidade");
    if($ness=="")$ness=NULL;

    $tel2 = $this->input->post("telemovel2");
    if($tel2=="")$tel2=NULL;

$this->load->model("contactos_model");
$data = array(
    "nome" =>$this->input->post("nome"),
    "pessoaDeContacto" =>$this->input->post("pessoaDeContacto"),
    "telemovel" =>$this->input->post("telemovel"),
    "telemovel2" =>$tel2,
    "email" =>$this->input->post("email"),
    "observacoes" =>$this->input->post("observacoes"),
    "dataVisita" =>$this->input->post("observacoes"),
    "clienteNovo" =>$this->input->post("clienteNovo"),
    "id_comerciante" =>$this->input->post("id_comerciante"),
    "id_empresas"=>$emp,
    "id_canal"=>$can,
    "id_origem"=>$ori,
    "id_necessidade"=>$ness,
    "dataVisita" =>$this->input->post("data")
);


$this->contactos_model->insert_contacto($data);
$nome = $this->input->post("nome");
$data2 = $this->contactos_model->find_contacto_para_inserir_morada_by_nome($nome);


$data3 = array(

    "id_contacto" => $data2,
    "cidade" =>$this->input->post("cidade"),
    "rua" =>$this->input->post("rua"),
    "codigoPostal" =>$this->input->post("codigoPostal")

);

$this->contactos_model->insert_morada($data3);

redirect(base_url('contactos_controller/create_contacto'));

}else{



    $this->create_contacto();

}


}



public function notas_contacto_view(){

    $contacto_id = $this->uri->segment(3);
    $this->load->model('contactos_model');
    $data["notas_contacto"] = $this->contactos_model->get_notas_by_id_contacto($contacto_id);
    $this->load->view('notas_contacto_view',$data);

}

public function notas_view(){

    $contacto_id = $this->uri->segment(3);
    $this->load->model('contactos_model');
    $data["notas_contacto"] = $this->contactos_model->get_notas_by_id_contacto($contacto_id);
    $this->load->view('notas_view',$data);

}

public function sum(){

    $number1 = $this->input->post('number1');
    $number2 = $this->input->post('number2');
    echo 'hello'.($number1+$number2);
}


public function show_noteTitle(){

    $contacto_id = $this->uri->segment(3);
    $this->load->model('contactos_model');
    $data = $this->contactos_model->get_notas_by_id_contacto($contacto_id);

    if($data->num_rows() > 0){
    foreach($data->result() as $row){
   echo "<p>" . $row->id_notas . "</p>";
   echo "<p>" . $row->notaTitulo . "</p>";
   echo "<br>";
   echo $row->diaHoras;
   echo "<br>";
   echo  $row->nota;
   echo "<br>";
   echo "<br>";
    }
}else{

    echo "<p>Não existem notas para este contacto</p>";
}

}


public function nota_seleccionada(){

    $notaClicada = $_POST['notaClicada'];
    $this->load->model('contactos_model');
    $dadosNota = $this->contactos_model->get_nota_by_nota_id($notaClicada);

     if($dadosNota->num_rows()>0){
        foreach($dadosNota->result() as $row){

         }
        }
        echo $this->contactos_model->get_proprietario_by_id_comerciante($row->id_comerciante). ",       "  .$row->diaHoras;
        echo "<br>";
        echo "<br>";
        echo $row->nota;


}


public function notas_contacto_view_2(){

    $contacto_id = $this->uri->segment(3);
    $this->load->model('contactos_model');
    $data["notas_contacto"] = $this->contactos_model->get_notas_by_id_contacto($contacto_id);
    $this->load->view('notas_contacto_view_2',$data);

}














    
}