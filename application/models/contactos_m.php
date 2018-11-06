<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos_m extends CI_Model {


    public function get_t_contactos($id_contacto){

        $this->db->select('t_comerciais.username, t_empresas.nomeEmpresa, t_origem.origem, t_necessidade.necessidade, t_canal.canal, t_contacto.nome, t_contacto.email, t_contacto.id_contacto, t_contacto.pessoaDeContacto, t_contacto.telemovel, t_contacto.telemovel2, t_contacto.dataVisita, t_contacto.observacoes, t_contacto.clienteNovo')
        ->from('t_contacto')
        ->where('t_contacto.id_contacto', $id_contacto)
        ->join('t_comerciais', 't_contacto.id_comercial = t_comerciais.id_comercial','Left')
        ->join('t_empresas', 't_contacto.id_empresas = t_empresas.id_empresas','Left')
        ->join('t_origem', 't_contacto.id_origem = t_origem.id_origem','Left')
        ->join('t_necessidade', 't_contacto.id_necessidade = t_necessidade.id_necessidade','Left')
        ->join('t_canal', 't_contacto.id_canal = t_canal.id_canal','Left');
      $query = $this->db->get();

      return $query;
        
      //var_dump($query->result());
    
    }

public function get_moradas_contacto($id_contacto){

    $this->db->select('cidade,rua,codigoPostal');
    $this->db->where("id_contacto",$id_contacto);
    $query = $this->db->get("t_morada");
    return $query;
    
}


public function delete_contacto_by_id($id_contacto){

    $this->db->where('id_contacto', $id_contacto);
    $this->db->delete('t_contacto');

if($this->db->affected_rows()>0){
    return true;
}else{
    return false;
}
}


public function negocio_seleccionado_detalhes($id_negocio){

    $this->db->select('t_negocio.id_negocio, t_negocio.nomeNegocio, t_negocio.numeroOrcamento,t_negocio.valorNegocio, t_negocio.ajudicado, t_negocio.motivosNaoAvancou, t_funil.estadoFunil, t_estadonegocio.estadoNegocio, t_contacto.nome,t_comerciais.username')
    ->from('t_negocio')
    ->where('t_negocio.id_negocio', $id_negocio)
    ->join('t_comerciais', 't_negocio.id_comercial = t_comerciais.id_comercial','Left')
    ->join('t_funil', 't_negocio.id_funil = t_funil.id_funil','Left')
    ->join('t_contacto', 't_negocio.id_contacto = t_contacto.id_contacto','Left')
    ->join('t_estadonegocio', 't_negocio.id_estadoNegocio = t_estadonegocio.id_estadoNegocio','Left')
    ->order_by("estadoNegocio", "asc");
  $query = $this->db->get();
    
                return $query;
    }

    public function get_negocios($id_contacto){

        $this->db->select('t_negocio.id_negocio, t_negocio.nomeNegocio, t_estadonegocio.estadoNegocio, t_contacto.nome,t_comerciais.username ')
        ->from('t_negocio')
        ->where('t_negocio.id_contacto', $id_contacto)
        ->join('t_comerciais', 't_negocio.id_comercial = t_comerciais.id_comercial','Left')
        ->join('t_contacto', 't_negocio.id_contacto = t_contacto.id_contacto','Left')
        ->join('t_estadonegocio', 't_negocio.id_estadoNegocio = t_estadonegocio.id_estadoNegocio','Left')
        ->order_by("estadoNegocio", "asc")
        ->order_by("nomeNegocio", "asc");

      $query = $this->db->get();
        
                    return $query;
        }

public function get_notas($id_contacto){

$this->db->select('id_notas, notaTitulo, diaHoras')
         ->where('id_contacto',$id_contacto)
            ->from('t_notas');
            $query = $this->db->get();

            return $query;
}



public function nota_seleccionada_detalhes($id_notas){


    $this->db->select('*')
    ->from('t_notas')
    ->where('id_notas',$id_notas);
       $query = $this->db->get();

       return $query;


}


public function get_proprietario_by_id_comercial($id_comercial){

    $this->db->select('username');
    $this->db->where("id_comercial",$id_comercial);
    $query = $this->db->get("t_comerciais");
    $data = $query->result_array();
    return ($data[0]['username']);

}



public function nota_seleccionada_apagar($id_notas){


        $this->db->where('id_notas', $id_notas);
        $this->db->delete('t_notas');
    
    if($this->db->affected_rows()>0){
        return true;
    }else{
        return false;
    }


}


public function get_ficheiros($id_contacto){

    $this->db->select('id_ficheiros, nome, dataHoras, path')
    ->where('id_contacto',$id_contacto)
       ->from('t_ficheiros');
       $query = $this->db->get();

       return $query;

}

public function ficheiro_seleccionado_detalhes($id_ficheiro){


    $this->db->select('*')
    ->from('t_ficheiros')
    ->where('id_ficheiros',$id_ficheiro);
       $query = $this->db->get();

       return $query;


}



public function ficheiro_seleccionado_apagar($id_ficheiro){


    $this->db->where('id_ficheiros', $id_ficheiro);
    $this->db->delete('t_ficheiros');

if($this->db->affected_rows()>0){
    return true;
}else{
    return false;
}


}



public function get_path_ficheiro_by_id($id_ficheiro){

    $this->db->select('path');
    $this->db->where("id_ficheiros",$id_ficheiro);
    $query = $this->db->get("t_ficheiros");
    $data = $query->result_array();
    return ($data[0]['path']);

   //var_dump($data[0]['path']);

}
public function get_nome_ficheiro_by_id($id_ficheiro){

    $this->db->select('nome');
    $this->db->where("id_ficheiros",$id_ficheiro);
    $query = $this->db->get("t_ficheiros");
    $data = $query->result_array();
    return ($data[0]['nome']);

   //var_dump($data[0]['path']);

}


public function uniqueName($nomeFicheiro){

$this->db->select('nome');
$this->db->where("nome", $nomeFicheiro);
$query = $this->db->get("t_ficheiros");

if($query->num_rows()>0){

    return true;
}else{

    return false;
}


}




    public function criarContactoUniqueName($nomeCriarContacto){

        $this->db->select('nome');
        $this->db->where("nome", $nomeCriarContacto);
        $query = $this->db->get("t_contacto");
        
        if($query->num_rows()>0){
        
            return true;
        }else{
        
            return false;
        }
        
        
        }


        public function editContactoUniqueName($nomeEditContacto, $id){

            $this->db->select('nome');
            $this->db->where("nome", $nomeEditContacto);
            $this->db->where_not_in("id_contacto", $id);
            $query = $this->db->get("t_contacto");
            
            if($query->num_rows()>0){
            
                return true;
            }else{
            
                return false;
            }
            
            
            }


            public function nomeNegocioCriarNegocioUniqueName($nomeDoNegocioCriarNegocio){

                $this->db->select('nomeNegocio');
                $this->db->where("nomeNegocio", $nomeDoNegocioCriarNegocio);
                $query = $this->db->get("t_negocio");
                
                if($query->num_rows()>0){
                
                    return true;
                }else{
                
                    return false;
                }
                
                
                }

                public function nomeNegocioEditarNegocioUniqueName($nomeDoNegocioEditarNegocio, $id){

                    $this->db->select('nomeNegocio');
                    $this->db->where("nomeNegocio", $nomeDoNegocioEditarNegocio);
                    $this->db->where_not_in("id_negocio", $id);
                    $query = $this->db->get("t_negocio");
                    
                    if($query->num_rows()>0){
                    
                        return true;
                    }else{
                    
                        return false;
                    }
                    
                    
                    }


                public function notaTituloUniqueName($notaTitulo){

                    $this->db->select('notaTitulo');
                    $this->db->where("notaTitulo", $notaTitulo);
                    $query = $this->db->get("t_notas");
                    
                    if($query->num_rows()>0){
                    
                        return true;
                    }else{
                    
                        return false;
                    }
                    
                    
                    }

            public function editNotaTituloUniqueName($editNotaTitulo, $id){

                $this->db->select('notaTitulo');
                $this->db->where("notaTitulo", $editNotaTitulo);
                $this->db->where_not_in("id_notas", $id);
                $query = $this->db->get("t_notas");
                
                if($query->num_rows()>0){
                
                    return true;
                }else{
                
                    return false;
                }
                
                
                }



public function get_dados_editFicheiros($id){


    $this->db->select('nome, dataHoras, descricao, id_ficheiros, id_comercial')
    ->from('t_ficheiros')
    ->where('id_ficheiros',$id);
       $query = $this->db->get();

       return $query;

       //var_dump($query->result());
}



public function edit_ficheiro($data){
    


    $this->db->trans_start();
    //$this->db->set('nome', $data['nome']);
    $this->db->set('dataHoras', $data['dataHoras']);
    $this->db->set('id_contacto', $data['id_contacto']);
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




public function get_all_comerciais(){

    $this->db->select('username, id_comercial');
    $this->db->from('t_comerciais');
    $this->db->order_by("username", "asc");

$query = $this->db->get();

return $query;


}

public function get_all_contactos(){

    $this->db->select('nome, id_contacto');
    $this->db->from('t_contacto');
    $this->db->order_by("nome", "asc");

$query = $this->db->get();

return $query;


}

public function get_all_contactos_edit(){

    $this->db->select('nome, id_contacto');
    $this->db->from('t_contacto');
    $this->db->order_by("nome", "asc");

$query = $this->db->get();

return $query;


}

public function estadoDoNegocio_dropdown(){

    $this->db->select('estadoNegocio, id_estadoNegocio');
    $this->db->from('t_estadonegocio');
    $this->db->order_by("estadoNegocio", "asc");

$query = $this->db->get();

return $query;


}

public function etapasFunil_dropdown(){

    $this->db->select('estadoFunil, id_funil');
    $this->db->from('t_funil');
    $this->db->order_by("estadoFunil", "asc");

$query = $this->db->get();

return $query;


}

public function get_all_necessidades(){

    $this->db->select('necessidade, id_necessidade');

    $this->db->from('t_necessidade');
    $this->db->order_by("ordem", "asc");

$query = $this->db->get();

return $query;


}

public function get_all_origem_options(){

    $this->db->select('origem, id_origem');

    $this->db->from('t_origem');
    $this->db->order_by("ordem", "asc");

$query = $this->db->get();

return $query;


}

public function get_all_canal_options(){

    $this->db->select('canal, id_canal');

    $this->db->from('t_canal');
    $this->db->order_by("canal", "asc");

$query = $this->db->get();

return $query;


}

public function get_all_empresas(){

    $this->db->select('nomeEmpresa, id_empresas');

    $this->db->from('t_empresas');
    $this->db->order_by("nomeEmpresa", "asc");

$query = $this->db->get();

return $query;


}



public function insert_nota($data){

    $this->db->insert("t_notas",$data);

    if ($this->db->affected_rows() >= '1') {
        return true;
    } else {

        return false;
    }
    
    }




    public function get_dados_editNotas($id){


        $this->db->select('diaHoras, nota, notaTitulo, id_comercial, id_notas')
        ->from('t_notas')
        ->where('id_notas',$id);
           $query = $this->db->get();
    
           return $query;
    
           //var_dump($query->result());
    }


    public function get_dados_edit_negocio($id){


        $this->db->select('id_negocio, nomeNegocio, numeroOrcamento, valorNegocio, ajudicado, motivosNaoAvancou, id_funil, id_estadoNegocio, id_contacto, id_comercial')
        ->from('t_negocio')
        ->where('id_negocio',$id);
           $query = $this->db->get();
    
           return $query;
    
           //var_dump($query->result());
    }





    public function edit_nota($data){
    


        $this->db->trans_start();
        $this->db->set('id_comercial', $data['id_comercial']);
        $this->db->set('notaTitulo', $data['notaTitulo']);
        $this->db->set('nota', $data['nota']);
        $this->db->set('diaHoras', $data['diaHoras']);
        $this->db->where('id_notas', $data['id_notas']);
        $this->db->update('t_notas');
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


    public function edit_negocio($data){
    


        $this->db->trans_start();
        $this->db->set('nomeNegocio', $data['nomeNegocio']);
        $this->db->set('numeroOrcamento', $data['numeroOrcamento']);
        $this->db->set('valorNegocio', $data['valorNegocio']);
        $this->db->set('ajudicado', $data['ajudicado']);
        $this->db->set('motivosNaoAvancou', $data['motivosNaoAvancou']);
        $this->db->set('id_funil', $data['id_funil']);
        $this->db->set('id_estadoNegocio', $data['id_estadoNegocio']);
        $this->db->set('id_contacto', $data['id_contacto']);
        $this->db->set('id_comercial', $data['id_comercial']);
        $this->db->where('id_negocio', $data['id_negocio']);
        $this->db->update('t_negocio');
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



    public function get_dados_editContacto($id){


        $this->db->select('*')
        ->from('t_contacto')
        ->where('id_contacto',$id);
           $query = $this->db->get();
    
           return $query;
    
           //var_dump($query->result());
    }

    public function get_dados_morada_editContacto($id){


        $this->db->select('*')
        ->from('t_morada')
        ->where('id_contacto',$id);
           $query = $this->db->get();
    
           return $query;
    
           //var_dump($query->result());
    }



    public function edit_contacto($data){
    


        $this->db->trans_start();
        $this->db->set('nome', $data['nome']);
        $this->db->set('pessoaDeContacto', $data['pessoaDeContacto']);
        $this->db->set('telemovel', $data['telemovel']);
        $this->db->set('telemovel2', $data['telemovel2']);
        $this->db->set('email', $data['email']);
        $this->db->set('dataVisita', $data['dataVisita']);
        $this->db->set('clienteNovo', $data['clienteNovo']);
        $this->db->set('id_comercial', $data['id_comercial']);
        $this->db->set('id_empresas', $data['id_empresas']);
        $this->db->set('observacoes', $data['observacoes']);
        $this->db->set('id_origem', $data['id_origem']);
        $this->db->set('id_necessidade', $data['id_necessidade']);
        $this->db->set('id_canal', $data['id_canal']);  
        $this->db->where('id_contacto', $data['id_contacto']);
        $this->db->update('t_contacto');
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

    public function edit_morada($data2){
    


        $this->db->trans_start();
        $this->db->set('cidade', $data2['cidade']);
        $this->db->set('rua', $data2['rua']);
        $this->db->set('codigoPostal', $data2['codigoPostal']);  
        $this->db->where('id_contacto', $data2['id_contacto']);
        $this->db->update('t_morada');
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



    public function negocio_seleccionado_apagar($id_negocio){


        $this->db->where('id_negocio', $id_negocio);
        $this->db->delete('t_negocio');
    
    if($this->db->affected_rows()>0){
        return true;
    }else{
        return false;
    }


}







































}//class