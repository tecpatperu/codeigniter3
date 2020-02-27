<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class CuentacontableModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
       public function save($cuentacontable){
        $this->db->trans_start();
            $this->db->insert('AF_MA_CUENTA_CONTABLE',$cuentacontable); 
            //$user_info['id_usuario'] = $this->db->insert_id();   
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
        $sql = $this->db->get('AF_MA_CUENTA_CONTABLE'); 
        // users table for example
        $query = $this->db->query('SELECT top 1 SE_ID FROM AF_MA_CUENTA_CONTABLE ORDER BY CONVERT(INT, A.AR_ID) DESC ');
        if ($query->num_rows() > 0)
        {
          $cuentacontable = $query->result();
          $next_id = $cuentacontable[0]->SE_ID + 1;
        }
        return $next_id;
    }

    public function getCuentacontables(){
        $sql = $this->db->query("AF_SP_S_CUENTA_CONTABLE");
        //$sql = $this->db->get('AF_MA_CUENTA_CONTABLE'); 
        return $sql->result();
    }
    public function getPaginateCuentacontable($limit,$offset){
        $sql = $this->db->query("SELECT AR_ID [Codigo],AR_DESCRIPCION [Cuenta.Contable],isnull(a.AR_TASA,0) [Tasa Tributaria],(CASE WHEN AR_ESTADO = 1 THEN 'ACTIVO' ELSE 'INACTIVO' END) AS [Estado],convert(VARCHAR,a.AR_FECREG,103) [Creado],convert(VARCHAR,a.AR_FECMOD,103) [Modificado],isnull(AR_CUENTA_CARGO,'') [Cuenta.Cargo], isnull(a.AR_DES_CUENTA_CARGO,'') [Des.Cuenta.Cargo],isnull(a.AR_CUENTA_ABONO,'') [Cuenta.Abono],isnull(a.AR_DES_CUENTA_ABONO,'') [Des.Cuenta.Abono],isnull(AR_CUENTA_CARGO_DC,'') [Cuenta.Cargo.DC], isnull(a.AR_DES_CUENTA_CARGO_DC,'') [Des.Cuenta.Cargo.DC],isnull(a.AR_CUENTA_ABONO_DC,'') [Cuenta.Abono.DC],isnull(a.AR_DES_CUENTA_ABONO_DC,'') [Des.Cuenta.Abono.DC],isnull(AR_CUENTA_CARGO_R,'') [Cuenta.Cargo.R], isnull(a.AR_DES_CUENTA_CARGO_R,'') [Des.Cuenta.Cargo.R],isnull(a.AR_CUENTA_ABONO_R,'') [Cuenta.Abono.R],isnull(a.AR_DES_CUENTA_ABONO_R,'') [Des.Cuenta.Abono.R],isnull(a.AR_CUENTA_ABONO_DC_PERDIDA,'') [Cuenta.Abono.DC.Perdida],isnull(a.AR_DES_CUENTA_ABONO_DC_PERDIDA,'') [Des.Cuenta.Abono.DC.Perdida],isnull(AR_TIEMPO_VIDA_FINANCIERO,0)[Tiempo.Vida.Financiero], isnull(AR_TASA_ANUAL_FINANCIERO,0) [Tasa.Anual.Financiero], isnull(AR_TASA_MENSUAL_FINANCIERO,0) [Tasa.Mensual.Financiero] FROM AF_MA_CUENTA_CONTABLE a order by  CONVERT(INT, A.AR_ID)  OFFSET ".$offset . " ROWS FETCH NEXT ".$limit." ROWS ONLY");
        return $sql->result();
    }
    public function updatecuentacontable($id,$data){
        $this->db->where('SE_ID',$id);
        $this->db->update('AF_MA_CUENTA_CONTABLE',$data);
    }
    public function getCuentacontable($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
        $cuentacontable = $this->db->get_where('AF_MA_CUENTA_CONTABLE',array('AF_MA_CUENTA_CONTABLE.AR_ID' => $id),1);
        
        return $cuentacontable->row_array();
    }
    public function deletecuentacontable($id){
        $this->db->where('AR_ID',$id);
        $this->db->delete('AF_MA_CUENTA_CONTABLE');
    }

    public function get_plan_cuentas_data_model(){

      return  $this->db->query('AF_SP_S_PLAN_CUENTAS')->result_array();
  
   
    }
}