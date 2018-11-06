<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ficheiros_model extends CI_Model {


    public function get_ficheiros_by_id_contacto($contacto_id){

        $this->db->where("id_contacto",$contacto_id);
        $query = $this->db->get("t_ficheiros");
        return $query;
        
        }


    public function get_ficheiro_by_ficheiro_id($ficheiroClicado){



            $this->db->where("id_ficheiros",$ficheiroClicado);
            $query = $this->db->get("t_ficheiros");
            return $query;
    
    


    }



public function insert_ficheiro($data){

$this->db->insert('t_ficheiros', $data);


}





function file_name_exists($data)
{
    $this->db->where('nome',$data);
    $query = $this->db->get('t_ficheiros');
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
}






public function checkNomeFicheiro($value){

    
    $this->db->where("nomeFicheiro",$value);
    $query = $this->db->get("t_ficheiros");
    
    if($query->num_rows()>0){
        return false;
    }else{return true;}
}


















}