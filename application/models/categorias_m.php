<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_m extends CI_Model {



// CONTACTOS DATATABLE MODEL STUFF T_CONTACTOS



function allposts_count()
    {         
    $this->db->select('t_comerciais.username, t_empresas.nomeEmpresa, t_contacto.nome, t_contacto.email, t_contacto.id_contacto, t_contacto.pessoaDeContacto, t_contacto.telemovel, t_contacto.telemovel2')
    ->from('t_contacto')
    ->join('t_comerciais', 't_contacto.id_comercial = t_comerciais.id_comercial','Left')
    ->join('t_empresas', 't_contacto.id_empresas = t_empresas.id_empresas','Left');
  $query = $this->db->get();

  return $query->num_rows();    
    

    }
    
    function allposts($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->select('t_comerciais.username, t_empresas.nomeEmpresa, t_contacto.nome, t_contacto.email, t_contacto.id_contacto, t_contacto.pessoaDeContacto, t_contacto.telemovel, t_contacto.telemovel2')
                ->from('t_contacto')
                ->join('t_comerciais', 't_contacto.id_comercial = t_comerciais.id_comercial','Left')
                ->join('t_empresas', 't_contacto.id_empresas = t_empresas.id_empresas','Left');
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
                ->select('t_comerciais.username, t_empresas.nomeEmpresa, t_contacto.nome, t_contacto.email, t_contacto.id_contacto, t_contacto.pessoaDeContacto, t_contacto.telemovel, t_contacto.telemovel2')
                ->from('t_contacto')
                ->join('t_comerciais', 't_contacto.id_comercial = t_comerciais.id_comercial','Left')
                ->join('t_empresas', 't_contacto.id_empresas = t_empresas.id_empresas','Left')
                ->like('t_contacto.nome',$search)
                ->or_like('t_contacto.email',$search)
                ->or_like('t_contacto.pessoaDeContacto',$search)
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
                ->like('t_contacto.id_contacto',$search)
                ->or_like('t_contacto.nome',$search)
                ->select('t_comerciais.username, t_empresas.nomeEmpresa, t_contacto.nome, t_contacto.email, t_contacto.id_contacto, t_contacto.pessoaDeContacto, t_contacto.telemovel, t_contacto.telemovel2')
                ->from('t_contacto')
                ->join('t_comerciais', 't_contacto.id_comercial = t_comerciais.id_comercial','Left')
                ->join('t_empresas', 't_contacto.id_empresas = t_empresas.id_empresas','Left');
              $query = $this->db->get();
    
        return $query->num_rows();
    } 



// CONTACTOS DATATABLE MODEL STUFF T_CONTACTOS




// CONTACTOS DATATABLE MODEL STUFF T_NEGOCIO



function allposts_count_negocio()
    {         
    $this->db->select('t_negocio.id_negocio, t_negocio.nomeNegocio, t_estadonegocio.estadoNegocio, t_contacto.nome,t_comerciais.username ')
    ->from('t_negocio')
    ->join('t_comerciais', 't_negocio.id_comercial = t_comerciais.id_comercial','Left')
    ->join('t_contacto', 't_negocio.id_contacto = t_contacto.id_contacto','Left')
    ->join('t_estadonegocio', 't_negocio.id_estadoNegocio = t_estadonegocio.id_estadoNegocio','Left');
  $query = $this->db->get();

  return $query->num_rows();    
  //var_dump($query->result());

    }
    
    function allposts_negocio($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->select('t_negocio.id_negocio, t_negocio.nomeNegocio, t_estadonegocio.estadoNegocio, t_contacto.nome,t_comerciais.username ')
                ->from('t_negocio')
                ->join('t_comerciais', 't_negocio.id_comercial = t_comerciais.id_comercial','Left')
                ->join('t_contacto', 't_negocio.id_contacto = t_contacto.id_contacto','Left')
                ->join('t_estadonegocio', 't_negocio.id_estadoNegocio = t_estadonegocio.id_estadoNegocio','Left');
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
   
    function posts_search_negocio($limit,$start,$search,$col,$dir)
    {
        $query = $this
                ->db
                ->select('t_negocio.id_negocio, t_negocio.nomeNegocio, t_estadonegocio.estadoNegocio, t_contacto.nome,t_comerciais.username ')
                ->from('t_negocio')
                ->join('t_comerciais', 't_negocio.id_comercial = t_comerciais.id_comercial','Left')
                ->join('t_contacto', 't_negocio.id_contacto = t_contacto.id_contacto','Left')
                ->join('t_estadonegocio', 't_negocio.id_estadoNegocio = t_estadonegocio.id_estadoNegocio','Left')
                ->like('t_negocio.nomeNegocio',$search)
                ->or_like('t_comerciais.username',$search)
                ->or_like('t_contacto.nome',$search)
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

    function posts_search_count_negocio($search)
    {
        $query = $this
                ->db
                ->like('t_negocio.nomeNegocio',$search)
                ->or_like('t_comerciais.username',$search)
                ->or_like('t_contacto.nome',$search)
                ->select('t_negocio.id_negocio, t_negocio.nomeNegocio, t_estadonegocio.estadoNegocio, t_contacto.nome,t_comerciais.username ')
                ->from('t_negocio')
                ->join('t_comerciais', 't_negocio.id_comercial = t_comerciais.id_comercial','Left')
                ->join('t_contacto', 't_negocio.id_contacto = t_contacto.id_contacto','Left')
                ->join('t_estadonegocio', 't_negocio.id_estadoNegocio = t_estadonegocio.id_estadoNegocio','Left');
              $query = $this->db->get();
    
        return $query->num_rows();
    } 



// CONTACTOS DATATABLE MODEL STUFF T_NEGOCIO




function insert_contacto($data){

        $this->db->insert("t_contacto",$data);
    
        if ($this->db->affected_rows() >= '1') {
            return true;
        } else {
    
            return false;
        }
        

}


public function find_contacto_para_inserir_morada_by_nomeContacto($nomeCriarContacto){

    $this->db->where("nome",$nomeCriarContacto);
    $query = $this->db->get("t_contacto");
    $data = $query->result_array();
    return ($data[0]['id_contacto']);
    
    }





    public function insert_morada($data2){

        $this->db->insert("t_morada",$data2);
        
        if ($this->db->affected_rows() >= '1') {
            return true;
        } else {
    
            return false;
        }
        }



        public function se_existe_morada_id_contacto($data2){

            $this->db->select('*');
            $this->db->where("id_contacto", $data2['id_contacto']);
            $query = $this->db->get("t_morada");
            
            if($query->num_rows()>0){
            
                return true;
            }else{
            
                return false;
            }
            
            
            }



            public function permissoes_dropdown(){

                $this->db->select('nomePermissao, id');
                $this->db->from('t_permissoes');
                $this->db->order_by("ordem", "asc");
            
            $query = $this->db->get();
            
            return $query;
            
            
            }




            public function insert_negocio($data){

                $this->db->insert("t_negocio",$data);
                
                if ($this->db->affected_rows() >= '1') {
                    return true;
                } else {
            
                    return false;
                }
                }


                public function getIdByNomeContacto($nome){

                    $this->db->select('id_contacto');
                    $this->db->where("nome",$nome);
                    $query = $this->db->get("t_contacto");
                    $data = $query->result_array();
                    return ($data[0]['id_contacto']);
                    
                    }


















































}//class