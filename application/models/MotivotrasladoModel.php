<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class MotivotrasladoModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($motivotraslado){
        $this->db->trans_start();
            $this->db->insert('AF_MA_MOTIVO_TRASLADO',$motivotraslado); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_MOTIVO_TRASLADO'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 MT_ID FROM AF_MA_MOTIVO_TRASLADO ORDER BY MT_ID DESC ');
        if ($query->num_rows() > 0)
        {
          $motivotraslado = $query->result();
          $next_id = $motivotraslado[0]->MT_ID + 1;
         }else{
            $next_id = 1;
        }
        return $next_id;
    }

    public function getMotivotraslados(){
        $sql = $this->db->get('AF_MA_MOTIVO_TRASLADO'); 
        return $sql->result();
    }
    public function getPaginateMotivotraslado($limit,$offset){
        $sql = $this->db->get('AF_MA_MOTIVO_TRASLADO',$limit,$offset);
        return $sql->result();
    }
    public function updatemotivotraslado($id,$data){
        $this->db->where('MT_ID',$id);
        $this->db->update('AF_MA_MOTIVO_TRASLADO',$data);
    }
    public function getMotivotraslado($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $motivotraslado = $this->db->get_where('AF_MA_MOTIVO_TRASLADO',array('AF_MA_MOTIVO_TRASLADO.MT_ID' => $id),1);
        
        return $motivotraslado->row_array();
    }
    public function deletemotivotraslado($id){
        $this->db->where('MT_ID',$id);
        $this->db->delete('AF_MA_MOTIVO_TRASLADO');
    }
}