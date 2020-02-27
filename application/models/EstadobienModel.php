<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class EstadobienModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($Estadobien){
        $this->db->trans_start();
            $this->db->insert('AF_MA_ESTADO_FISICO',$Estadobien); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_ESTADO_FISICO'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 EF_ID FROM AF_MA_ESTADO_FISICO ORDER BY EF_ID DESC ');
        if ($query->num_rows() > 0)
        {
          $Estadobien = $query->result();
          $next_id = $Estadobien[0]->EF_ID + 1;
          }else{
            $next_id = 1;
        }
        return $next_id;
    }

    public function getEstadosbien(){
        $sql = $this->db->get('AF_MA_ESTADO_FISICO'); 
        return $sql->result();
    }
    public function getPaginateEstadobien($limit,$offset){
        $sql = $this->db->get('AF_MA_ESTADO_FISICO',$limit,$offset);
        return $sql->result();
    }
    public function updateEstadobien($id,$data){
        $this->db->where('EF_ID',$id);
        $this->db->update('AF_MA_ESTADO_FISICO',$data);
    }
    public function getEstadobien($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $Estadobien = $this->db->get_where('AF_MA_ESTADO_FISICO',array('AF_MA_ESTADO_FISICO.EF_ID' => $id),1);
        
        return $Estadobien->row_array();
    }
    public function deleteEstadobien($id){
        $this->db->where('EF_ID',$id);
        $this->db->delete('AF_MA_ESTADO_FISICO');
    }
}