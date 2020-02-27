<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class CentrocostoModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($centrocosto){
        $this->db->trans_start();
            $this->db->insert('AF_MA_CENCOS',$centrocosto); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_CENCOS'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 CC_ID FROM AF_MA_CENCOS ORDER BY CC_ID DESC ');
        if ($query->num_rows() > 0)
        {
          $centrocosto = $query->result();
          $next_id = $centrocosto[0]->CC_ID + 1;
        }else{
            $next_id = 1;
        }
         
        return $next_id;
    }

    public function getCentrocostos(){
        $sql = $this->db->get('AF_MA_CENCOS'); 
        return $sql->result();
    }
    public function getPaginateCentrocosto($limit,$offset){
        $sql = $this->db->get('AF_MA_CENCOS',$limit,$offset);
        return $sql->result();
    }
    public function updatecentrocosto($id,$data){
        $this->db->where('CC_ID',$id);
        $this->db->update('AF_MA_CENCOS',$data);
    }
    public function getCentrocosto($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $centrocosto = $this->db->get_where('AF_MA_CENCOS',array('AF_MA_CENCOS.CC_ID' => $id),1);
        
        return $centrocosto->row_array();
    }
    public function deletecentrocosto($id){
        $this->db->where('CC_ID',$id);
        $this->db->delete('AF_MA_CENCOS');
    }
}