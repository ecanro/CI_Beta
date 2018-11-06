<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos_model extends CI_Model {


    public function get_contactos(){

        $query = $this->db->get("t_contacto");
        return $query;
        
        
        
        }


public function get_contacto_by_id($id){

$this->db->where("id_contacto",$id);
$query = $this->db->get("t_contacto");
return $query;

}


public function insert_contacto($data){

$this->db->insert("t_contacto",$data);


}


public function insert_morada($data){

$this->db->insert("t_morada",$data);


}


public function find_contacto_para_inserir_morada_by_nome($nome){

    $this->db->where("nome",$nome);
    $query = $this->db->get("t_contacto");
    $data = $query->result_array();
    return ($data[0]['id_contacto']);
    
    }


public function get_all_comerciantes(){

$query = $this->db->get('t_comerciante');
return $query;


}

public function get_all_empresas(){

    $query = $this->db->get('t_empresas');
    return $query;
    
    
    }

    public function get_all_origem(){

        $query = $this->db->get('t_origem');
        return $query;
        
        
        }

        public function get_all_necessidade(){

            $query = $this->db->get('t_necessidade');
            return $query;
            
            
            }

            public function get_all_canal(){

                $query = $this->db->get('t_canal');
                return $query;
                
                
                }



                public function get_comerciante_by_session_username($username){

                    $this->db->where("username",$username);
                    $query = $this->db->get("t_comerciante");
                    $data = $query->result_array();
                    return ($data[0]['id_comerciante']);
                    
                    
                    }



public function get_proprietario_by_id_comerciante($id_com){
   
    $this->db->select('username');
    $this->db->where("id_comerciante",$id_com);
    $query = $this->db->get("t_comerciante");
    $data = $query->result_array();
    return ($data[0]['username']);

}


public function get_empresa_by_id_contacto($id_cont){

    $this->db->select('nomeEmpresa');
    $this->db->where("id_empresas",$id_cont);
    $query = $this->db->get("t_empresas");
    $data = $query->result_array();
    return ($data[0]['nomeEmpresa']);

}


public function get_moradas_by_id_contacto($id_cont){

    $this->db->select('cidade,rua,codigoPostal');
    $this->db->where("id_contacto",$id_cont);
    $query = $this->db->get("t_morada");
    return $query;

}

public function get_canal_by_id_canal($id_can){

    $this->db->select('canal');
    $this->db->where("id_canal",$id_can);
    $query = $this->db->get("t_canal");
    $data = $query->result_array();
    return ($data[0]['canal']);

}


public function get_origem_by_id_origem($id_ori){

    $this->db->select('origem');
    $this->db->where("id_origem",$id_ori);
    $query = $this->db->get("t_origem");
    $data = $query->result_array();
    return ($data[0]['origem']);

}

public function get_necessidade_by_id_necessidade($id_ness){

    $this->db->select('necessidade');
    $this->db->where("id_necessidade",$id_ness);
    $query = $this->db->get("t_necessidade");
    $data = $query->result_array();
    return ($data[0]['necessidade']);

}

public function get_notas_by_id_contacto($id){

    $this->db->where("id_contacto",$id);
    $query = $this->db->get("t_notas");
    return $query;
    
    }

    public function get_nota_by_nota_id($nota_id){

        $this->db->where("id_notas",$nota_id);
        $query = $this->db->get("t_notas");
        return $query;


    }






















}