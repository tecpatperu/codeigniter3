<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class ProcedenciabienModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($procedenciabien){
        $this->db->trans_start();
            $this->db->insert('AF_MA_PROCEDENCIA',$procedenciabien); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_PROCEDENCIA'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 PR_ID FROM AF_MA_PROCEDENCIA ORDER BY PR_ID DESC ');
        if ($query->num_rows() > 0)
        {
          $procedenciabien = $query->result();
          $next_id = $procedenciabien[0]->PR_ID + 1;
        }
        return $next_id;
    }

    public function getProcedenciabienes(){
        $sql = $this->db->get('AF_MA_PROCEDENCIA'); 
        return $sql->result();
    }
    public function getPaginateProcedenciabien($limit,$offset){
        $sql = $this->db->get('AF_MA_PROCEDENCIA',$limit,$offset);
        return $sql->result();
    }
    public function updateprocedenciabien($id,$data){
        $this->db->where('PR_ID',$id);
        $this->db->update('AF_MA_PROCEDENCIA',$data);
    }
    public function getProcedenciabien($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $procedenciabien = $this->db->get_where('AF_MA_PROCEDENCIA',array('AF_MA_PROCEDENCIA.PR_ID' => $id),1);
        
        return $procedenciabien->row_array();
    }
    public function deleteprocedenciabien($id){
        $this->db->where('PR_ID',$id);
        $this->db->delete('AF_MA_PROCEDENCIA');
    }
}