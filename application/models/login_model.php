<?php

class Login_model extends CI_Model{

    function can_login($username,$password){

    $this->db->where('username',$username);
    $this->db->where('password',md5($password));
    
    $query=$this->db->get('t_comerciante');

    if($query->num_rows()>0){

        return true;

    }else{

        return false;

    }
}


public function create_member(){

$insert_new_member_data = array(

    'nome' => $this->input->post('nome'),
    'sobrenome' => $this->input->post('sobrenome'),
    'tlm' => $this->input->post('tlm'),
    'email' => $this->input->post('email'),
    'username' => $this->input->post('username'),
    'password' => md5($this->input->post('password'))


);

$this->db->where('username',$this->input->post('username'));
$query=$this->db->get('t_comerciante');
if($query->num_rows()>0){

    $this->session->set_flashdata('error3','O registo falhou - Username já se encontra em uso');
    return false;
}else{

$insert = $this->db->insert('t_comerciante',$insert_new_member_data);
return $insert;

}


//$insert = $this->db->insert('t_comerciante',$insert_new_member_data);
//return $insert;

}


public function get_session_attributes($username){
    $this->db->where("username",$username);
    $query = $this->db->get("t_comerciante");
    $data = $query->result_array();

}















}
