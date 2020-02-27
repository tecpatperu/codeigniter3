<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class ProyectoModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($proyecto){
        $this->db->trans_start();
            $this->db->insert('AF_MA_PROYECTO',$proyecto); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_PROYECTO'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 PY_ID FROM AF_MA_PROYECTO ORDER BY PY_ID DESC ');
        if ($query->num_rows() > 0)
        {
          $proyecto = $query->result();
 
          $next_id = $proyecto[0]->PY_ID + 1;
        }else{
            $next_id = 1;
        }
        return $next_id;
    }

    public function getProyectos(){
        $sql = $this->db->get('AF_MA_PROYECTO'); 
        return $sql->result();
    }
    public function getPaginateProyecto($limit,$offset){
        $sql = $this->db->get('AF_MA_PROYECTO',$limit,$offset);
        return $sql->result();
    }
    public function updateproyecto($id,$data){
        $this->db->where('PY_ID',$id);
        $this->db->update('AF_MA_PROYECTO',$data);
    }
    public function getProyecto($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $proyecto = $this->db->get_where('AF_MA_PROYECTO',array('AF_MA_PROYECTO.PY_ID' => $id),1);
        
        return $proyecto->row_array();
    }
    public function deleteproyecto($id){
        $this->db->where('PY_ID',$id);
        $this->db->delete('AF_MA_PROYECTO');
    }
}