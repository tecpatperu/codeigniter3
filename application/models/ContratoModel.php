<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class ContratoModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($Contrato){
        $this->db->trans_start();
            $this->db->insert('AF_MA_CONTRATO',$Contrato); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_CONTRATO'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 CO_ID FROM AF_MA_CONTRATO ORDER BY CO_ID DESC ');
        if ($query->num_rows() > 0)
        {
          $Contrato = $query->result();
          $next_id = $Contrato[0]->CO_ID + 1;
        }
        return $next_id;
    }

    public function getContratos(){
        $sql = $this->db->query('AF_SP_S_CONTRATO'); 
        return $sql->result();
    }
    public function getPaginateContrato($limit,$offset){
        $sql = $this->db->query('AF_SP_S_CONTRATO',$limit,$offset);
        return $sql->result();
    }
    public function updateContrato($id,$data){
        $this->db->where('CO_ID',$id);
        $this->db->update('AF_MA_CONTRATO',$data);
    }
    public function getContrato($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $Contrato = $this->db->get_where('AF_MA_CONTRATO',array('AF_MA_CONTRATO.CO_ID' => $id),3);
        
        return $Contrato->row_array();
    }
    public function deleteContrato($id){
        $this->db->where('SE_ID',$id);
        $this->db->delete('AF_SP_S_CONTRATO');
    }

    public function getTiposdocumento()
    {
        $query = $this->db->query('SELECT PRO_ID,PRO_DESCRIPCION from AF_MA_TIPO_DOCUMENTO');
        return $query->result_array();
    }
}