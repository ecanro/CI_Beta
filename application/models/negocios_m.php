<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Negocios_m extends CI_Model {


    public function get_detalhes_negocio($id_negocio){

        $this->db->select('t_negocio.id_negocio, t_negocio.nomeNegocio, t_negocio.numeroOrcamento, t_negocio.valorNegocio, t_negocio.ajudicado, t_negocio.motivosNaoAvancou, t_funil.estadoFunil, t_estadoNegocio.estadoNegocio, t_contacto.nome, t_comerciais.username')
        ->from('t_negocio')
        ->where('t_negocio.id_negocio', $id_negocio)
        ->join('t_funil', 't_negocio.id_funil = t_funil.id_funil','Left')
        ->join('t_estadoNegocio', 't_negocio.id_estadoNegocio = t_estadoNegocio.id_estadoNegocio','Left')
        ->join('t_contacto', 't_negocio.id_contacto = t_contacto.id_contacto','Left')
        ->join('t_comerciais', 't_negocio.id_comercial = t_comerciais.id_comercial','Left');
      $query = $this->db->get();

      return $query;
    
    }



    public function get_id_contacto_negocio($id_negocio){

        $this->db->select('id_contacto');
        $this->db->where("id_negocio",$id_negocio);
        $query = $this->db->get("t_negocio");
        $data = $query->result_array();
        return ($data[0]['id_contacto']);
    
    }

    public function get_tarefas($id_negocio){

        $this->db->select('*')
                 ->where('id_negocio',$id_negocio)
                    ->from('t_tarefas');
                    $query = $this->db->get();
        
                    return $query;
        }

    public function get_notas($id_negocio){

        $this->db->select('id_notas, notaTitulo, diaHoras')
                 ->where('id_negocio',$id_negocio)
                    ->from('t_notas');
                    $query = $this->db->get();
        
                    return $query;
        }


        public function get_ficheiros($id_negocio){

            $this->db->select('id_ficheiros, nome, dataHoras, path')
            ->where('id_negocio',$id_negocio)
               ->from('t_ficheiros');
               $query = $this->db->get();
        
               return $query;
        
        }



        public function edit_ficheiro($data){
    


            $this->db->trans_start();
            //$this->db->set('nome', $data['nome']);
            $this->db->set('dataHoras', $data['dataHoras']);
            $this->db->set('id_negocio', $data['id_negocio']);
            $this->db->set('id_comercial', $data['id_comercial']);
            $this->db->set('descricao', $data['descricao']);
            $this->db->where('id_ficheiros', $data['id_ficheiros']);
            //$this->db->update('t_ficheiros', $data);
        
        
            $this->db->update('t_ficheiros');
            $this->db->trans_complete();
        
            if ($this->db->affected_rows() >= '1') {
                return TRUE;
            } else {
                // any trans error?
                if ($this->db->trans_status() === FALSE) {
                    return false;
                }
                return true;
            }
        
        }


        public function tarefaTituloUniqueName($tarefaTitulo){

            $this->db->select('tituloTarefa');
            $this->db->where("tituloTarefa", $tarefaTitulo);
            $query = $this->db->get("t_tarefas");
            
            if($query->num_rows()>0){
            
                return true;
            }else{
            
                return false;
            }
            
            
            }


public function estadoTarefa_dropdown(){

    $this->db->select('estadoTarefa, id_estadoTarefa');
    $this->db->from('t_estadotarefa');
    $this->db->order_by("ordem", "asc");

$query = $this->db->get();

return $query;


}

public function prioridadeTarefa_dropdown(){

    $this->db->select('prioridade, id_prioridade');
    $this->db->from('t_prioridade');
    $this->db->order_by("ordem", "asc");

$query = $this->db->get();

return $query;


}



public function insert_destinatarioTarefas($data_d){

    $this->db->insert("t_destinatariostarefas",$data_d);

    if ($this->db->affected_rows() >= '1') {
        return true;
    } else {

        return false;
    }
    
    }


public function comercial_tem_tarefa($data_d){
$this->db->select('id_destinatariosTarefas');
$this->db->where("id_tarefas", $data_d['id_tarefas']);
$this->db->where("id_comercial", $data_d['id_comercial']);
$query = $this->db->get("t_destinatariostarefas");
        
if($query->num_rows()>0){
        
    return true;
}else{
        
    return false;
}
        
        
}


public function criar_tarefa($data){

    $this->db->insert("t_tarefas",$data);

}


public function find_tituloTarefa_para_inserir_destinatarios_by_nomeTarefa($tarefaTitulo){

    $this->db->where("tituloTarefa",$tarefaTitulo);
    $query = $this->db->get("t_tarefas");
    $data = $query->result_array();
    return ($data[0]['id_tarefas']);
    
    }

public function tarefa_seleccionada_detalhes($id_tarefa){


    $this->db->select('t_estadotarefa.estadoTarefa, t_negocio.nomeNegocio,t_prioridade.prioridade,t_comerciais.username, t_tarefas.id_tarefas, t_tarefas.tituloTarefa, t_tarefas.descricao, t_tarefas.alertaInstantaneo, t_tarefas.dataCriacaoTarefa, t_tarefas.dataTerminaTarefa')
    ->from('t_tarefas')
    ->where('id_tarefas',$id_tarefa)
    ->join('t_estadotarefa', 't_tarefas.id_estadoTarefa = t_estadotarefa.id_estadoTarefa','Left')
    ->join('t_negocio', 't_tarefas.id_negocio = t_negocio.id_negocio','Left')
    ->join('t_prioridade', 't_tarefas.id_prioridade = t_prioridade.id_prioridade','Left')
    ->join('t_comerciais', 't_tarefas.id_comercial = t_comerciais.id_comercial','Left');
        $query = $this->db->get();
    
        return $query;
     
}

public function get_proprietario_mail($tarefaComercial){

    $this->db->select('email');
    $this->db->where("id_comercial",$tarefaComercial);
    $query = $this->db->get("t_comerciais");
    $data = $query->result_array();
    return ($data[0]['email']);

}

public function get_proprietario_username($tarefaComercial){

    $this->db->select('username');
    $this->db->where("id_comercial",$tarefaComercial);
    $query = $this->db->get("t_comerciais");
    $data = $query->result_array();
    return ($data[0]['username']);

}


public function getDatasTerminoTarefas(){

        $this->db->select('*')
        ->from('t_tarefas');
        //->join('t_destinatariostarefas', 't_tarefas.id_comercial = t_destinatariostarefas.id_comercial ', 'Left');
    
    $query = $this->db->get();
    
    return $query;
}

public function getDestinatariosTarefaAutoMail($id_tarefas){

    $this->db->select('id_comercial')
    ->from('t_destinatariostarefas')
    ->where('id_tarefas', $id_tarefas);

$query = $this->db->get();

return $query;
}





































}//class