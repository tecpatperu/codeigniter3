<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class DepreciacionModel extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
      
  

 public function insertsede($data)
 {
      
  $this->db->query('AF_SP_D_SEDE_IMPORTACION');
  $this->db->insert_batch('AF_MA_SEDE', $data);
 }
  
  public function insertbien($data,$actualiza_inicio_operacion)
 {
      
 $lista=""; 
  $this->db->query('AF_SP_O_DEL_DEPRE');
 
foreach($data as $jugador){
      

    $this->db->query("AF_SP_I_ACTIVO '".$jugador['AC_CODIGO']."','".$jugador['AC_CODIGO_ALT']."','".$jugador['AC_CODIGO_BARRA']."','".$jugador['AC_ACTIVO_DES']."','".$jugador['AC_TIPO_BIEN']."','".$jugador['AC_IDORIGEN_REQ']."','".$jugador['AC_COMPONENTE_DE']."','".$jugador['AC_CODIGO_PRINCIPAL']."','".$jugador['AC_IDFAMILIA']."','".$jugador['AC_SUBFAMILIA']."','".$jugador['AC_TASA_DEPREC_FAMILIA']."','".$jugador['AC_IDSEDE']."','".$jugador['AC_IDLOCAL']."','".$jugador['AC_IDAREA']."','".$jugador['AC_IDOFICINA']."','".$jugador['AC_IDRESPON_ACTI']."','".$jugador['AC_IDMARCA']."','".$jugador['AC_MODELO']."','".$jugador['AC_NUMSERIE']."','".$jugador['AC_IDCOLOR']."','".$jugador['AC_IDESTADO_FISICO']."','".$jugador['AC_IDCONDIBIEN']."','".$jugador['AC_IDPROCEDENCIA']."','".$jugador['AC_OBSERVACIONES']."','".$jugador['AC_TDOC']."','".$jugador['AC_SDOC']."','".$jugador['AC_NDOC']."','".$jugador['AC_IDPROVE']."','".$jugador['AC_FECHA_COMPRA']."','".$jugador['AC_FECHA_INI_OPE']."','".$jugador['AC_GUIA_REMISION']."','".$jugador['AC_NUM_DUA']."','".$jugador['AC_IDCENCOS']."','".$jugador['AC_IDCUENTA_CONTABLE']."','".$jugador['AC_TASA_DEPREC_CONTABLE']."','".$jugador['AC_MONEDACOMPRA']."','".$jugador['AC_NUM_VOUCHER']."','".$jugador['AC_TC_VOUCHER']."','".$jugador['AC_VH_SOLES']."','".$jugador['AC_VH_DOLARES']."','".$jugador['AC_TC_CONTABLE']."','".$jugador['AC_DEPREC_EJERCICIO_CONTABLE']."','".$jugador['AC_DEPREC_ACUMULADA_CONTABLE']."','".$jugador['AC_VALOR_LIBRO_CONTABLE']."','".$jugador['AC_TIEMPO_VIDA']."','".$jugador['AC_DEPREC_INDIVIDUAL']."','".$jugador['AC_TASA_DEPREC_INDIVIDUAL']."','".$jugador['AC_REFERENCIA_FINANCIERA']."','".$jugador['AC_DEPREC_EJERCICIO_FINANCIERA']."','".$jugador['AC_DEPREC_ACUMULADA_FINANCIERA']."','".$jugador['AC_NUMPLACA']."','".$jugador['AC_ANIO_OTROS']."','".$jugador['AC_CHASIS']."','".$jugador['AC_NUMMOTOR ']."','".$jugador['AC_DIFCAMBIO_ACTIVO_OTROS']."','".$jugador['AC_DIFCAMBIO_DEPREC_OTROS']."','".$jugador['AC_REVALUACION_ACTIVO_OTROS']."','".$jugador['AC_REVALUACION_DEPREC_OTROS']."','".$jugador['AC_FOTO']."','".$jugador['AC_USUARIO']."','".$jugador['AC_TERMINAL']."','".$jugador['AC_ESTADO']."','".$jugador['AC_CODPROYECTO']."','".$jugador['AC_DIFCAMBIO_DEPREC_FINANCIERO_OTROS']."','".$jugador['AC_REVALUACION_DEPREC_FINANCIERO_OTROS']."','".$jugador['AC_FLAG_ESTADO_INVENTARIO']."','".$jugador['AC_DIMENSION']."','".$jugador['AC_EDIFICIO']."','".$jugador['AC_PISO']."','".$jugador['AC_SUPERVISOR']."','".$jugador['AC_USUARIO_UBICACION']."','".$jugador['AC_FLAG_DEPRECIA']."','".$jugador['AC_FLAG_ACTIVO_INCORPORACION'] ."',null,null");
   
   }
 foreach($actualiza_inicio_operacion as $actualiza){
       
 $this->db->query("AF_SP_U_CONFIGURACION_GENERAL_IMPORTACION '".$actualiza['prefijo']."','".date("Y-m-d",strtotime($actualiza['fecha_inicio_oper']))."','".$actualiza['terminal']."','".$actualiza['usuario']."'");
   
   }
 
    $this->db->query('AF_SP_U_ACTIVO_TASA_DEPREC_TRIBUTARIA');
    $array = $this->db->query("AF_SP_S_ACTIVO04 '".date("Y-m-d",strtotime($actualiza['fecha_inicio_oper']))."'");

  
    foreach ($array->result() as $valor) {
        if ($actualiza['actualiza_depreciacion']){

       
          $php_date  = date_create(  $actualiza['fecha_inicio_oper'] );
           $this->db->query("AF_SP_O_CAL_DEPRECI '".$valor->AC_IDACTIVO."','".$actualiza['usuario']."','".$actualiza['terminal']."','".date_format($php_date,"Y")."','".date_format($php_date,"m")."'");



        }
    }
    foreach ($array->result()  as $valor) {
   
           
  
          $php_date = date_create(  $actualiza['fecha_inicio_oper'] );
      
  
        
           $this->db->query("AF_SP_I_MOVIMIENTOS_ACTIVOS_INICIO '".$valor->AC_IDACTIVO."','".$actualiza['usuario']."','".$actualiza['terminal']."','". date_format($php_date,"Y")."','". date_format($php_date,"m")."'");
         
    }
   
 }  
    public function verificar_depre_mensuales_cantidad($tipo)
    {
      // $this->db->like('AC_ACTIVO_DES', $id, 'both'); 

     return   $this->db->query('AF_SP_VERIFICA_CANTIDAD_DE_DEPRECIACION_MENSUAL '.$tipo)->result_array();
    
    }
     public function get_Fecha_Inicio_Operaciones()
    {
      // $this->db->like('AC_ACTIVO_DES', $id, 'both'); 

     return   $this->db->query('AF_SP_GET_FECHA_INICIO_OPERACIONES')->row_array();
    
    } 
    public function Verificar_Cierres_del_Ejercicio($año)
    {
      // $this->db->like('AC_ACTIVO_DES', $id, 'both'); 

     return   $this->db->query('AF_SP_VERIFICA_CIERRE_DEL_EJERCICIO '.$año)->result_array();
    
    } 
    public function Verificar_Ultimo_mes_depreciado_y_cerrado($tipo)
    {
     return   $this->db->query('AF_SP_VERIFICA_ULTIMO_MES_DEPRECIADO_Y_CERRADO '.$tipo)->result_array();
    } 
  
 
    public function Verificar_Depre_Mes_Ant_Abierto($mes,$año,$tipo)
    {
     return   $this->db->query('AF_SP_VERIFICA_MES_DEPRECIADO_Y_ABIERTO '.$mes . ','.$año.','.$tipo)->result_array();
    } 

    public function Verificar_Depreciacion_Cierre_Mensual_GPIX($mes,$año,$tipo)
    {
     return   $this->db->query('AF_SP_VERIFICA_DEPRECIACION_CON_CIERRE_MENSUAL '.$mes . ','.$año.','.$tipo)->result_array();
    } 
    
    public function Verificar_Depreciacion_GPIX_Calculo_mensual($mes,$año,$tipo)
    {
     return   $this->db->query('AF_SP_VERIFICA_DEPRECIACION_CALCULO_MENSUAL '.$mes . ','.$año.','.$tipo)->result_array();
    } 

    public function Calcular_Depreciacion_GPIX($fechaproceso,$mes,$año)
    {
      //retornar calculo depreiacion
      
     $this->db->query("AF_SP_G_DEPRECIACION '".$fechaproceso ."',".$mes.",".$año);
     $r= $this->db->query("select * from TAB_DEPRECIACION_MENSUAL ORDER BY [Cododigo.Interno] ")->result_array();
     //foreach ($r->result() as $valor) {

      

    
     //}
     
  
    return $r;

  

    } 

    public function Calcular_Depreciacion_GPIX1($messelect,$añoselect,$chk_tributario,$OF_TERMINAL, $usuariocrea)
    {
    
     


  
   
     $this->db->query('AF_SP_D_DEPRECIACION '.$añoselect . ','.$messelect.','.$chk_tributario)->result_array();
   
      
    //return $b;

  $abe =  $this->db->query("insert into AF_PR_DEPRECIACION (DM_IDACTIVO, DM_ANHO, DM_MES, DM_USUARIO, DM_TERMINAL, DM_VALOR_LIBRO,   
    DM_F_ACTIVIDAD, DM_TASA  
    , DM_FACTOR, DM_DEPREC_MES, DM_NUM_MESES, DM_DEPREC_EJERCICIO, DM_DEPREC_ACUMULADA, DM_VALOR_RESIDUAL, DM_CUENTA  
    , DM_CENTRO_COSTO, DM_TIPO,DM_DEPREC_ACUMULADA_INICIAL,DM_TIPO_BIEN,DM_ESTADO_BAJA,  
    DM_DEPREC_MES_DOS ) select  Codigo ,'".$añoselect ."','".$messelect."','".$usuariocrea."','".$OF_TERMINAL."',ValorLibro,[F.Actividad],[%],[Factor],[DeprecMensual],[Meses] ,[DeprecEjercicio]
    ,[DeprecAcumulada]
    ,[ValorResidual]
    ,[CuentaContable]
    ,[Centro.Costo],'".$chk_tributario."'
    ,[DeprecAcumInicial],[Tipo]
    ,[Baja],[Meses] from TAB_DEPRECIACION_MENSUAL where Grabar='SI' ORDER BY [Cododigo.Interno] ");
    
    return $abe;


    } 


    public function Calcular_Depreciacion_Financiera_Cta_Contable_GPIX($fechaproceso,$mes,$año)
    {
  
     $comilla="'";
     return   $this->db->query('AF_SP_G_DEPRECIACION_FINANCIERA_CUENTA_CONTABLE '.$comilla.$fechaproceso .$comilla. ','.$mes.','.$año)->result_array();


    } 
    public function Calcular_Depreciacion_Financiera_Sub_Familia_GPIX($fechaproceso,$mes,$año)
    {
      $comilla="'";
    
     return   $this->db->query('AF_SP_G_DEPRECIACION_FINANCIERA_SUB_FAMILIA '.$comilla.$fechaproceso .$comilla. ','.$mes.','.$año)->result_array();

    } 
    public function rpt_AF_Lista_general($ordenarpor,$tipo_depreciacion,$todos,$txtclienteinicial, $txtclientefinal)
    {
     
    
     return   $this->db->query("AF_RPT_A_ACTIVOS_FIJOS ".$ordenarpor.",".$tipo_depreciacion .",'".$todos."','".$txtclienteinicial."','". $txtclientefinal."','2019'" )->result_array();

    } 

   

   

}