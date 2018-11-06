<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model{


// USERS DATATABLE MODEL STUFF T_COMERCIAIS



function allposts_count()
    {         
    $this->db->select('t_comerciais.id_comercial, t_comerciais.username, t_comerciais.password,t_comerciais.email, t_comerciais.nome, t_comerciais.sobrenome, t_comerciais.telemovel, t_comerciais.nivel')
    ->from('t_comerciais');
   // ->join('t_comerciais', 't_contacto.id_comercial = t_comerciais.id_comercial','Left')
   // ->join('t_empresas', 't_contacto.id_empresas = t_empresas.id_empresas','Left');
  $query = $this->db->get();

  return $query->num_rows();    
    

    }
    
    function allposts($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->select('t_comerciais.id_comercial, t_comerciais.username, t_comerciais.password,t_comerciais.email, t_comerciais.nome, t_comerciais.sobrenome, t_comerciais.telemovel, t_comerciais.nivel')
                ->from('t_comerciais');
            //    ->join('t_comerciais', 't_contacto.id_comercial = t_comerciais.id_comercial','Left')
            //    ->join('t_empresas', 't_contacto.id_empresas = t_empresas.id_empresas','Left');
              $query = $this->db->get();
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    function posts_search($limit,$start,$search,$col,$dir)
    {
        $query = $this
                ->db
                ->select('t_comerciais.id_comercial, t_comerciais.username, t_comerciais.password,t_comerciais.email, t_comerciais.nome, t_comerciais.sobrenome, t_comerciais.telemovel, t_comerciais.nivel')
                ->from('t_comerciais')
              //  ->join('t_comerciais', 't_contacto.id_comercial = t_comerciais.id_comercial','Left')
              //  ->join('t_empresas', 't_contacto.id_empresas = t_empresas.id_empresas','Left')
                ->like('t_comerciais.nome',$search)
                ->or_like('t_comerciais.email',$search)
                ->or_like('t_comerciais.telemovel',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir);
                
              $query = $this->db->get();
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function posts_search_count($search)
    {
        $query = $this
                ->db
                ->like('t_comerciais.id_comerciais',$search)
                ->or_like('t_comerciais.nome',$search)
                ->select('t_comerciais.id_comercial, t_comerciais.username, t_comerciais.password,t_comerciais.email, t_comerciais.nome, t_comerciais.sobrenome, t_comerciais.telemovel, t_comerciais.nivel')
                ->from('t_comerciais')
              //  ->join('t_comerciais', 't_comerciais.id_comercial = t_comerciais.id_comercial','Left')
              //  ->join('t_empresas', 't_comerciais.id_empresas = t_empresas.id_empresas','Left');
              $query = $this->db->get();
    
        return $query->num_rows();
    } 



public function create_utilizador($data){

$this->db->insert('t_comerciais', $data);

if ($this->db->affected_rows() >= '1') {
    return true;
} else {

    return false;
}


}
//fin


public function criarUtilizadorUniqueName($utilizadorCriarUtilizador){

    $this->db->select('username');
    $this->db->where("username", $utilizadorCriarUtilizador);
    $query = $this->db->get("t_comerciais");
    
    if($query->num_rows()>0){
    
        return true;
    }else{
    
        return false;
    }
    
    
    }


public function can_login($username, $password){

    $this->db->where('username',$username);
    $this->db->where('password',md5($password));

    $query=$this->db->get('t_comerciais');

    if($query->num_rows()>0){

        return true;

    }else{

        return false;

    }

}

public function get_login_info($username){

$this->db->select('*');
$this->db->where('username', $username);
$this->db->from('t_comerciais');
$query = $this->db->get();
return $query;

}



public function get_login_permissions($permissoes_id){

    $this->db->select('*');
    $this->db->where('id', $permissoes_id);
    $this->db->from('t_permissoes');
    $query = $this->db->get();
    return $query;
    
    }

































}//class