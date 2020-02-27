<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class SedeModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($sede){
        $this->db->trans_start();
            $this->db->insert('AF_MA_SEDE',$sede); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_SEDE'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 SE_ID FROM AF_MA_SEDE ORDER BY SE_ID DESC ');
        if ($query->num_rows() > 0)
        {
          $sede = $query->result();
          $next_id = $sede[0]->SE_ID + 1;
        }
        return $next_id;
    }

    public function getSedes(){
        $sql = $this->db->get('AF_MA_SEDE'); 
        return $sql->result();
    }
    public function getPaginateSede($limit,$offset){
        $sql = $this->db->get('AF_MA_SEDE',$limit,$offset);
        return $sql->result();
    }
    public function updatesede($id,$data){
        $this->db->where('SE_ID',$id);
        $this->db->update('AF_MA_SEDE',$data);
    }
    public function getSede($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $sede = $this->db->get_where('AF_MA_SEDE',array('AF_MA_SEDE.SE_ID' => $id),1);
        
        return $sede->row_array();
    }
    public function deletesede($id){
        $this->db->where('SE_ID',$id);
        $this->db->delete('AF_MA_SEDE');
    }
}