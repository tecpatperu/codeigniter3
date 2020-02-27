<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class TipodocumentoModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($Tipodocumento){
        $this->db->trans_start();
            $this->db->insert('AF_MA_TIPO_DOCUMENTO',$Tipodocumento); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_TIPO_DOCUMENTO'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 PRO_ID FROM AF_MA_TIPO_DOCUMENTO ORDER BY  CAST(PRO_ID as BIGINT) DESC ');
        if ($query->num_rows() > 0)
        {
          $Tipodocumento = $query->result();
          $next_id = $Tipodocumento[0]->PRO_ID + 1;
        }else{

            $next_id = 1;
        }

        return $next_id;
    }

    public function getTiposdocumento(){
        $sql = $this->db->query('AF_SP_S_TIPO_DOCUMENTO'); 
        return $sql->result();
    }
    public function getPaginateTipodocumento($limit,$offset){
       
         $sql  = $this->db->query("SELECT  PRO_ID [Codigo],PRO_DESCRIPCION [Descripcion], A.PRO_ABREV [Descripcion.Abreviada],CASE WHEN PRO_ESTADO=1 THEN 'ACTIVO' ELSE 'INACTIVO' END [Estado], CONVERT(VARCHAR,PRO_CREADO,103) [Creado.el],CONVERT(VARCHAR,PRO_MODIFICADO,103) [Modificado.el] FROM DBO.AF_MA_TIPO_DOCUMENTO A ORDER BY CONVERT(INT,PRO_ID)  OFFSET ".$offset . " ROWS FETCH NEXT ".$limit." ROWS ONLY");
      
        return $sql->result();
    }
    public function updateTipodocumento($id,$data){
        $this->db->where('PRO_ID',$id);
        $this->db->update('AF_MA_TIPO_DOCUMENTO',$data);
    }
    public function getTipodocumento($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $Tipodocumento = $this->db->get_where('AF_MA_TIPO_DOCUMENTO',array('AF_MA_TIPO_DOCUMENTO.PRO_ID' => $id),1);
        
        return $Tipodocumento->row_array();
    }
    public function deleteTipodocumento($id){
        $this->db->where('PRO_ID',$id);
        $this->db->delete('AF_MA_TIPO_DOCUMENTO');
    }
}