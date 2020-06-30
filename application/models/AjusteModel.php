<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class AjusteModel extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
       public function save($ajustes){
        $this->db->trans_start();
        foreach($ajustes as $ajuste){
      

          $this->db->query("AF_SP_I_AJUSTE ".$ajuste['AM_IDMEJORA'].",".$ajuste['AM_SEC'].",'".$ajuste['AM_CONCEPTO_AJUSTE']."','".$ajuste['AM_VOUCHER']."','".$ajuste['AM_TDOC']."','".$ajuste['AM_FDOC']."',".$ajuste['AM_IDACTIVO'].",'".$ajuste['AM_CODIGO_ACTIVO']."',".$ajuste['AM_VALOR_LIBRO'].",'".$ajuste['AM_TIPO_AJUSTE_VL']."',".$ajuste['AM_AJUSTE_VALOR_LIBRO'].",'".$ajuste['AM_TIPO_AJUSTE_TRIBUTARIO']."',".$ajuste['AM_AJUSTE_VALOR_TRIBUTARIO'].",'".$ajuste['AM_TIPO_AJUSTE_FINANCIERO']."',".$ajuste['AM_AJUSTE_VALOR_FINANCIERO'].",'".$ajuste['AM_USUARIO']."','".$ajuste['AM_TERMINAL']."'");
          $this->db->query("AF_SP_U_AJUSTE_ACTIVO ".$ajuste['AM_IDMEJORA']);    
          $this->db->query("AF_SP_I_AJUSTE_TIPO ".$ajuste['AM_IDMEJORA'].",".$ajuste['AM_SEC'].",'".$ajuste['AM_CODIGO_ACTIVO']."','',0");
        }
          $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
   

    public function getAjuste(){
      $xd = $this->db->query('AF_MA_S_ACTIVOS_MEJORAS ')->result_array();
  return $xd;
    }

    public function getAjusteporID($id){
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


    public function getPaginateAjuste($limit,$offset){
        $sql = $this->db->query("SELECT AM_IDMEJORA [Codigo.Ajuste], AM_CONCEPTO_AJUSTE [Concepto.Ajuste],  
        convert(VARCHAR,AM_FDOC,103) [Fecha],  
        AM_TDOC [Tipo.Doc], AM_VOUCHER [Nro.Voucher] FROM dbo.AF_PR_ACTIVO_AJUSTE  
        GROUP BY AM_IDMEJORA,AM_CONCEPTO_AJUSTE,AM_FDOC,AM_TDOC,AM_VOUCHER  
         ORDER BY AM_IDMEJORA");
                        //where AC_IDACTIVO = '8639'
                        
        return $sql->result_array();
    }
    public function updateMejora($id,$data){
        $this->db->where('AM_IDACTIVO',$id);
        $this->db->update('AF_PR_ACTIVO_MEJORA',$data);

         
    }
    public function getAjustes($id){
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

    public function getlastid()
    {
 

//$this->db->like('AC_ACTIVO_DES', $texto, 'both'); 
   $CodigoAjuste = $this->db->query('AF_MA_GENERA_COD_AJUSTE ')->row();

return $CodigoAjuste->Codigo;

    }


    public function get_general_data_model($id)
    {
    
    

//$this->db->like('AC_ACTIVO_DES', $texto, 'both'); 
   $CodigoAjuste = $this->db->query('AF_SP_S_ACTI_AJUSTE_NUEVO '.$id)->result_array();

return $CodigoAjuste;

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

    