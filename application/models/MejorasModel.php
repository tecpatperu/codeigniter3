<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class MejorasModel extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
       public function save($mejoras){
        $this->db->trans_start();
 
            $this->db->insert('AF_PR_ACTIVO_MEJORA',$mejoras); 
            
             $this->db->query('AF_SP_U_MEJORA_ACTIVO '.$mejoras['AM_IDACTIVO']);
      
            //$this->db->insert('medicos',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
    public function getlastid(){
    
        $query = $this->db->query('AF_SP_I_ACTIVO_MEJORA');
        if ($query->num_rows() > 0)
        {
          $bien = $query->result();
          $next_id = $bien[0]->CORRELATIVO ;
        }else{
            $next_id = 1;
        }
        return $next_id;
    }

    public function getMejoras(){
        $sql = $this->db->query("SELECT AM_IDACTIVO AS [Codigo.Activo],B.AC_CODIGO [Codigo],AC_ACTIVO_DES [Descripcion.Activo],AM_SEC AS [Sec.]  
        ,convert(VARCHAR,AM_FDOC,103) AS [Fecha],a.AM_OBS AS [Concepto.Mejora]  
        ,convert(VARCHAR,a.AM_FEC_REG,103) [Fecha.Registro]  
        FROM AF_PR_ACTIVO_MEJORA A INNER JOIN AF_MA_ACTIVO B ON A.AM_IDACTIVO = B.AC_IDACTIVO  
        ORDER BY AC_ACTIVO_DES,AM_SEC,AM_REF "); 
        return $sql->result_array();
    }

    public function getMejorasporID($id){
      $sql = $this->db->query("SELECT AM_IDACTIVO AS [Codigo.Activo],B.AC_CODIGO [Codigo],AC_ACTIVO_DES [Descripcion.Activo],AM_SEC AS [Sec.]  
      ,convert(VARCHAR,AM_FDOC,103) AS [Fecha],a.AM_OBS AS [Concepto.Mejora]  
      ,convert(VARCHAR,a.AM_FEC_REG,103) [Fecha.Registro]  
      FROM AF_PR_ACTIVO_MEJORA A INNER JOIN AF_MA_ACTIVO B ON A.AM_IDACTIVO = B.AC_IDACTIVO 
      where AM_IDACTIVO = ".$id." 
      ORDER BY AC_ACTIVO_DES,AM_SEC,AM_REF "); 
      return $sql->result_array();
  }

  public function Verificar_Cierre_Mensual_GPIX($mesA,$añoA){

    $xd = count($this->db->query('AF_SP_S_ACTI_MEJO_NUEVO '.$mesA.$añoA)->result_array());



return $xd;
  }


  public function Obtener_Ultimo_Cierre_Mensual(){
    $xd = $this->db->query('AF_SP_OBTENER_ULTIMO_CIERRE_MENSUAL')->result_array();
  
    return $xd;
  }
  
  public function Obtener_Ultimo_Cierre_Mensual_dos(){
    $xd = $this->db->query('AF_SP_OBTENER_ULTIMO_CIERRE_MENSUAL_DOS')->result_array();
  
    return $xd;
  }


    public function getPaginateMejoras($limit,$offset){
        $sql = $this->db->query("SELECT AM_IDACTIVO AS [Codigo.Activo],B.AC_CODIGO [Codigo],AC_ACTIVO_DES [Descripcion.Activo],AM_SEC AS [Sec.]  
        ,convert(VARCHAR,AM_FDOC,103) AS [Fecha],a.AM_OBS AS [Concepto.Mejora]  
        ,convert(VARCHAR,a.AM_FEC_REG,103) [Fecha.Registro]  
        FROM AF_PR_ACTIVO_MEJORA A INNER JOIN AF_MA_ACTIVO B ON A.AM_IDACTIVO = B.AC_IDACTIVO  
        ORDER BY AC_ACTIVO_DES,AM_SEC,AM_REF ");
                        //where AC_IDACTIVO = '8639'
                        
        return $sql->result_array();
    }
    public function updateMejora($id,$data){
        $this->db->where('AM_IDACTIVO',$id);
        $this->db->update('AF_PR_ACTIVO_MEJORA',$data);

         
    }
    public function getMejora($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.id_usuario
        // WHERE usuarios.id = $id LIMIT 1
       
     //   $oficina = $this->db->get_where('AF_MA_OFICINA',array('AF_MA_OFICINA.OF_ID' => $id),1);
        
     //   return $oficina->row_array();
     $this->db->select('AM_IDACTIVO,AM_SEC,AM_REF,AM_IDPROVE,AM_SDOC,AM_NDOC,AM_FDOC,AM_MDOC,AM_IDMONEDA,AM_TCAM,AM_IDTIPO_PAGO,AM_OBS,AM_TASA,AM_FEC_REG,AM_USUARIO,AM_TERMINAL,AM_TDOC,AM_FEC_MOD,AM_VOUCHER,d.AC_ACTIVO_DES,d.AC_IDMARCA,d.AC_MODELO,d.AC_NUMSERIE,e.EF_DESCRIPCION,d.AC_CODIGO_ALT,d.AC_FECHA_COMPRA,d.AC_IDCUENTA_CONTABLE,d.AC_VALOR_LIBRO_CONTABLE,d.AC_DEPREC_ACUMULADA_CONTABLE,(d.AC_VALOR_LIBRO_CONTABLE)-(d.AC_DEPREC_ACUMULADA_CONTABLE) [VALORRESIDUAL],c.MO_ABRE');
     $this->db->from('AF_PR_ACTIVO_MEJORA');
  // $this->db->join('AF_MA_SEDE','AF_MA_LOCAL.LO_IDSEDE = AF_MA_SEDE.SE_ID');
     $this->db->join('AF_MA_TIPO_DOCUMENTO as b','AF_PR_ACTIVO_MEJORA.AM_TDOC = b.PRO_ID','left');
     $this->db->join('CO_TB_MONEDA as c','AF_PR_ACTIVO_MEJORA.AM_IDMONEDA = c.MO_ABRE','left');
     $this->db->join('AF_MA_ACTIVO as d','AF_PR_ACTIVO_MEJORA.AM_IDACTIVO = d.AC_IDACTIVO','left');
     $this->db->join('AF_MA_ESTADO_FISICO as e','d.AC_IDESTADO_FISICO = e.EF_ID','left');

     $this->db->where('AM_IDACTIVO',$id);

     $sql=$this->db->get();
 
     return  $sql->row_array();
    }
    public function deletemejora($id){
        $this->db->where('AM_IDACTIVO',$id);
        $this->db->delete('AF_PR_ACTIVO_MEJORA');
    }

 
    public function hexToStr($hex){
         $string='';
        for ($i=0; $i < strlen($hex)-1; $i+=2)
            $string .= chr(hexdec($hex[$i].$hex[$i+1]));
        return $string;
    }
    
    public function get_familia_data_model($texto)
    {
    

$this->db->like('AC_ACTIVO_DES', $texto, 'both'); 
return   $this->db->query('AF_MA_S_ACTIVOS_MEJORAS')->result_array();;

    }

    public function get_general_data_model($id)
    {
    
    

//$this->db->like('AC_ACTIVO_DES', $texto, 'both'); 
   $xd = $this->db->query('AF_SP_S_ACTI_MEJO_NUEVO '.$id)->result_array();

return $xd;

    }
    
    public function get_subfamilia_data_model($id)
    {

        $this->db->where('LO_IDFAMILIA',$id);
      return  $this->db->get('AF_MA_SUB_FAMILIA')->result_array();
    
   
    }

    public function get_codigo_data_model($texto)
    {

      $this->db->where('AC_ACTIVO_DES',$texto);
      return  $this->db->get('AF_MA_ACTIVO')->result_array();
    
    }

    public function get_local_data_model($id)
    {
       $this->db->like('LO_IDSEDE', $id, 'both'); 
     return   $this->db->get('AF_MA_LOCAL')->result_array();
    
    }
    public function get_area_data_model($id)
    {
       $this->db->like('AR_DESCRIPCION', $id, 'both'); 
     return   $this->db->get('AF_MA_AREA')->result_array();
    
    }
    public function get_oficina_data_model($id)
    {
       $this->db->like('OF_DESCRIPCION', $id, 'both'); 
     return   $this->db->get('AF_MA_OFICINA')->result_array();
    
    }

    public function get_edificio_data_model($id)
    {
       $this->db->like('SE_DESCRIPCION', $id, 'both'); 
     return   $this->db->get('AF_MA_EDIFICIO')->result_array();
    
    }

    public function get_piso_data_model($id)
    {
       $this->db->like('SE_DESCRIPCION', $id, 'both'); 
     return   $this->db->get('AF_MA_PISO')->result_array();
    
    }
    public function get_responsable_data_model($id)
    {
       $this->db->like('RA_DESCRIPCION', $id, 'both'); 
     return   $this->db->get('AF_MA_RESPO_ACTI')->result_array();
    
    }
    public function get_proyecto_data_model($id)
    {
       $this->db->like('PY_DESCRIPCION', $id, 'both'); 
     return   $this->db->get('AF_MA_PROYECTO')->result_array();
    
    }
    public function get_contrato_data_model($id)
    {
       $this->db->like('CO_MODALIDAD', $id, 'both'); 
     return   $this->db->get('AF_MA_CONTRATO')->result_array();
    
    }
    public function get_tasa_depre_cuenta($id)
    {

        $query = $this->db->query('AF_SP_S_TASA_DEPRE_CUENTA '.$id);

        if ($query->num_rows() > 0)
        {
          $tasa = $query->result();
          $valor = $tasa[0]->AR_TASA;
        }else{
            $valor = 0;
        }
        return $valor;
    
    }
    public function get_bien_data_model($id)
    {
       $this->db->like('AC_ACTIVO_DES', $id, 'both'); 
    $this->db->select('AC_CODIGO, AC_ACTIVO_DES');
     return   $this->db->get('AF_MA_ACTIVO')->result_array();
    
    }

}

    