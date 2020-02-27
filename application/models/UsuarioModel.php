<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class UsuarioModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($usuario){
        $this->db->trans_start();
            $this->db->insert('AF_MA_RESPO_ACTI',$usuario); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_RESPO_ACTI'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 RA_ID FROM AF_MA_RESPO_ACTI ORDER BY CAST(RA_ID as BIGINT) DESC ');
        if ($query->num_rows() > 0)
        {
          $usuario = $query->result();
          $next_id = $usuario[0]->RA_ID + 1;
        }
        return $next_id;
    }

    public function getusuarios(){
      

        $this->db->order_by( 'CAST(RA_ID as BIGINT)','DESC'); 
        $sql = $this->db->get('AF_MA_RESPO_ACTI');
        //$sql = $this->db->get(); 
        return $sql->result();
    }
    public function getPaginateUsuario($limit,$offset){
        $this->db->order_by( 'CAST(RA_ID as BIGINT)','DESC'); 
        $sql = $this->db->get('AF_MA_RESPO_ACTI',$limit,$offset);
        return $sql->result();
    }
    public function updateUsuario($id,$data){

        $this->db->where('RA_ID',$id);
        $this->db->update('AF_MA_RESPO_ACTI',$data);
    }
    public function getUsuario($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $sede = $this->db->get_where('AF_MA_RESPO_ACTI',array('AF_MA_RESPO_ACTI.RA_ID' => $id),1);
        
        return $sede->row_array();
    }
    public function deleteUsuario($id){
        $this->db->where('RA_ID',$id);
        $this->db->delete('AF_MA_RESPO_ACTI');
    }
}