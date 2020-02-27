<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class OrigenbienModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($origenbien){
        $this->db->trans_start();
            $this->db->insert('AF_MA_ORIGEN_REQ',$origenbien); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_ORIGEN_REQ'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 OR_ID FROM AF_MA_ORIGEN_REQ ORDER BY OR_ID DESC ');
        if ($query->num_rows() > 0)
        {
          $origenbien = $query->result();
          $next_id = $origenbien[0]->OR_ID + 1;
        }
        return $next_id;
    }

    public function getOrigenbiens(){
        $sql = $this->db->get('AF_MA_ORIGEN_REQ'); 
        return $sql->result();
    }
    public function getPaginateOrigenbien($limit,$offset){
        $sql = $this->db->get('AF_MA_ORIGEN_REQ',$limit,$offset);
        return $sql->result();
    }
    public function updateorigenbien($id,$data){
        $this->db->where('OR_ID',$id);
        $this->db->update('AF_MA_ORIGEN_REQ',$data);
    }
    public function getOrigenbien($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $origenbien = $this->db->get_where('AF_MA_ORIGEN_REQ',array('AF_MA_ORIGEN_REQ.OR_ID' => $id),1);
        
        return $origenbien->row_array();
    }
    public function deleteorigenbien($id){
        $this->db->where('OR_ID',$id);
        $this->db->delete('AF_MA_ORIGEN_REQ');
    }
}