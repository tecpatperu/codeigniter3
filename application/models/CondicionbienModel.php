<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class CondicionbienModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($condicionbien){
        $this->db->trans_start();
            $this->db->insert('AF_MA_CONDICION_BIEN',$condicionbien); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_CONDICION_BIEN'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 CB_ID FROM AF_MA_CONDICION_BIEN ORDER BY CB_ID DESC ');
        if ($query->num_rows() > 0)
        {
          $condicionbien = $query->result();
          $next_id = $condicionbien[0]->CB_ID + 1;
         }else{
            $next_id = 1;
        }
        return $next_id;
    }

    public function getCondicionbiens(){
        $sql = $this->db->get('AF_MA_CONDICION_BIEN'); 
        return $sql->result();
    }
    public function getPaginateCondicionbien($limit,$offset){
        $sql = $this->db->get('AF_MA_CONDICION_BIEN',$limit,$offset);
        return $sql->result();
    }
    public function updatecondicionbien($id,$data){
        $this->db->where('CB_ID',$id);
        $this->db->update('AF_MA_CONDICION_BIEN',$data);
    }
    public function getCondicionbien($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $condicionbien = $this->db->get_where('AF_MA_CONDICION_BIEN',array('AF_MA_CONDICION_BIEN.CB_ID' => $id),1);
        
        return $condicionbien->row_array();
    }
    public function deletecondicionbien($id){
        $this->db->where('CB_ID',$id);
        $this->db->delete('AF_MA_CONDICION_BIEN');
    }
}