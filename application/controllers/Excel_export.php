<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_export extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("excel_export_model");
        $this->load->library("excel");
    }
 function index()
 {
//  $this->load->model("excel_export_model");
 // $data["employee_data"] = $this->excel_export_model->fetch_data();
  //$this->load->view("excel_export_view", $data);
 //}
 }
 function action()
 {
 

  $object = new PHPExcel();

  $object->getActiveSheet()
  ->getStyle('A8:Z8')
  ->getFill()
  ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
  ->getStartColor()
  ->setARGB('FF808080');
 

  
  
  $object->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('A')->setWidth(54);

  $object->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('B')->setWidth(30);

  $object->getActiveSheet()->getColumnDimension('C')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('C')->setWidth(35);

  $object->getActiveSheet()->getColumnDimension('D')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('D')->setWidth(18);

  $object->getActiveSheet()->getColumnDimension('E')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('E')->setWidth(25);

  $object->getActiveSheet()->getColumnDimension('F')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('F')->setWidth(43);

  $object->getActiveSheet()->getColumnDimension('G')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('G')->setWidth(19);

  
  $object->getActiveSheet()->getColumnDimension('H')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('H')->setWidth(28);

  
  $object->getActiveSheet()->getColumnDimension('I')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('I')->setWidth(13);

  
  $object->getActiveSheet()->getColumnDimension('J')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('J')->setWidth(18);

  $object->getActiveSheet()->getColumnDimension('K')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('K')->setWidth(15);

  $object->getActiveSheet()->getColumnDimension('L')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('L')->setWidth(45);

  $object->getActiveSheet()->getColumnDimension('M')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('M')->setWidth(22);

  $object->getActiveSheet()->getColumnDimension('N')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('N')->setWidth(45);

  $object->getActiveSheet()->getColumnDimension('O')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('O')->setWidth(22);

  $object->getActiveSheet()->getColumnDimension('P')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('P')->setWidth(41);

  $object->getActiveSheet()->getColumnDimension('Q')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('Q')->setWidth(18);

  $object->getActiveSheet()->getColumnDimension('R')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('R')->setWidth(35);

  $object->getActiveSheet()->getColumnDimension('S')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('S')->setWidth(30);

  $object->getActiveSheet()->getColumnDimension('T')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('T')->setWidth(59);


  $object->getActiveSheet()->getColumnDimension('U')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('U')->setWidth(29);

  
  $object->getActiveSheet()->getColumnDimension('V')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('V')->setWidth(67);
    
  $object->getActiveSheet()->getColumnDimension('W')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('W')->setWidth(46);
      
  $object->getActiveSheet()->getColumnDimension('X')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('X')->setWidth(36);

  $object->getActiveSheet()->getColumnDimension('Y')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('Y')->setWidth(41);

  $object->getActiveSheet()->getColumnDimension('Z')->setAutoSize(false);
  $object->getActiveSheet()->getColumnDimension('Z')->setWidth(50);

 

$object->getActiveSheet()->mergeCells('A8:A9');
$object->getActiveSheet()->mergeCells('B8:B9');
$object->getActiveSheet()->mergeCells('C8:F8');
$object->getActiveSheet()->mergeCells('G8:G9');

$object->getActiveSheet()->mergeCells('H8:H9');
$object->getActiveSheet()->mergeCells('I8:I9');
$object->getActiveSheet()->mergeCells('J8:J9');
$object->getActiveSheet()->mergeCells('K8:K9');
$object->getActiveSheet()->mergeCells('L8:L9');
$object->getActiveSheet()->mergeCells('M8:M9');
$object->getActiveSheet()->mergeCells('N8:N9');
$object->getActiveSheet()->mergeCells('O8:O9');
$object->getActiveSheet()->mergeCells('P8:P9');

$object->getActiveSheet()->mergeCells('Q8:R8');


$object->getActiveSheet()->mergeCells('S8:S9');
$object->getActiveSheet()->mergeCells('T8:T9');
$object->getActiveSheet()->mergeCells('U8:U9');
$object->getActiveSheet()->mergeCells('V8:V9');
$object->getActiveSheet()->mergeCells('W8:W9');
$object->getActiveSheet()->mergeCells('X8:X9');
$object->getActiveSheet()->mergeCells('Y8:Y9');
$object->getActiveSheet()->mergeCells('Z8:Z9');
$object->getActiveSheet()->mergeCells('A1:D1');

  $object->setActiveSheetIndex(0);

  $table_columns = array("CODIGO_ACTIVO", "CUENTA_CONTABLE", "DESCRIPCION", "MARCA", "MODELO" ,"SERIE_PLACA","SALDO_INICIAL","ADQUISICIONES_ADICIONES","MEJORAS","RETIROS_BAJAS","OTROS_AJUSTES","VALOR_HISTORICO_DEL_ACTIVO","AJUSTE_POR_INFLACION","VALOR_AJUSTADO_DEL_ACTIVO","FECHA_ADQUISICION","FECHA_INICIO_USO","METODO_APLICADO","NRO_DOCUMENTO_AUTORIZACION","PORCENTAJE_DEPRECIACION","DEPRECIACION_ACUMULADA_CIERRE_EJERCICIO_ANTERIOR","DEPRECIACION_DEL_EJERCICIO","DEPRECIACION_DEL_EJERCICIO_RELACIONADA_CON_BAJAS","DEPRECIACION_RELACIONA_CON_OTROS_AJUSTES","DEPRECIACION_ACUMULADA_HISTORICA","AJUSTE_POR_INFLACION_DE_LA_DEPRECIACION","DEPRECIACION_ACUMULADA_AJUSTADA_POR_INFLACION");

  $column = 0;


  $año = (int)$this->input->post('año');


  $arregloG = $this->excel_export_model->Obtener_Nombre_Empresa();


 $contador = 10;
 $object->getActiveSheet()->setCellValueByColumnAndRow(0, 1,'FORMATO 7.1: "REGISTRO DE ACTIVOS FIJOS - DETALLE DE LOS ACTIVOS FIJOS"');

  foreach($arregloG as $row1)
  {
    $object->getActiveSheet()->setCellValueByColumnAndRow(0, 4,'RUC: ');
    $object->getActiveSheet()->setCellValueByColumnAndRow(1, 4, $row1['VAT_REGISTRATION']);
  
    $object->getActiveSheet()->setCellValueByColumnAndRow(0, 5,'APELLIDOS Y NOMBRES, DENOMINACIÓN O RAZÓN SOCIAL:');
    $object->getActiveSheet()->setCellValueByColumnAndRow(1, 5,$row1['REPORT_SCREEN']);
  }





  $object->getActiveSheet()->setCellValueByColumnAndRow(0, 3,'Periodo: ');
  $object->getActiveSheet()->setCellValueByColumnAndRow(1, 3,$año);



  
  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, 8,"CODIGO_ACTIVO");
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, 8,"CUENTA_CONTABLE");
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, 8,"DETALLE DEL ACTIVO FIJO");
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, 9,"DESCRIPCION");
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, 9,"MARCA DEL ACTIVO FIJO");
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, 9,"MODELO DEL ACTIVO FIJO");
   $object->getActiveSheet()->setCellValueByColumnAndRow(5, 9,"NUMERO DE SERIE Y/O PLACA DEL ACTIVO FIJO");
   $object->getActiveSheet()->setCellValueByColumnAndRow(6, 8,"SALDO INICIAL");

   $object->getActiveSheet()->setCellValueByColumnAndRow(7, 8,"ADQUISICIONES / ADICIONES");
   $object->getActiveSheet()->setCellValueByColumnAndRow(8, 8,"MEJORAS");
   $object->getActiveSheet()->setCellValueByColumnAndRow(9, 8,"RETIROS Y/O BAJAS");
   $object->getActiveSheet()->setCellValueByColumnAndRow(10, 8,"OTROS AJUSTES");
   $object->getActiveSheet()->setCellValueByColumnAndRow(11, 8,"VALOR HISTORICO DEL ACTIVO FIJO AL 31.DIC.XXXX");
   $object->getActiveSheet()->setCellValueByColumnAndRow(12, 8,"AJUSTE POR INFLACION");
   $object->getActiveSheet()->setCellValueByColumnAndRow(13, 8,"VALOR AJUSTADO DEL ACTIVO FIJO AL 31.DIC.XXXX");
   $object->getActiveSheet()->setCellValueByColumnAndRow(14, 8,"FECHA DE ADQUISICION");
   $object->getActiveSheet()->setCellValueByColumnAndRow(15, 8,"FECHA DE INICIO DEL USO DEL ACTIVO FIJO");


   $object->getActiveSheet()->setCellValueByColumnAndRow(16, 8,"DEPRECIACION");
   $object->getActiveSheet()->setCellValueByColumnAndRow(16, 9,"METODO APLICADO");
   $object->getActiveSheet()->setCellValueByColumnAndRow(17, 9,"Nro DE DOCUMENTO DE AUTORIZACION");

   $object->getActiveSheet()->setCellValueByColumnAndRow(18, 8,"PORCENTAJE DE DEPRECIACION");
   $object->getActiveSheet()->setCellValueByColumnAndRow(19, 8,"DEPRECIACION ACUMULADA AL CIERRE DEL EJERCICIO ANTERIOR");
   $object->getActiveSheet()->setCellValueByColumnAndRow(20, 8,"DEPRECIACION DEL EJERCICIO");
   $object->getActiveSheet()->setCellValueByColumnAndRow(21, 8,"DEPRECIACION DEL EJERCICIO RELACIONADA CON LOS RETIROS Y/O BAJAS");
   $object->getActiveSheet()->setCellValueByColumnAndRow(22, 8,"DEPRECIACION RELACIONADA CON OTROS AJUSTES");
   $object->getActiveSheet()->setCellValueByColumnAndRow(23, 8,"DEPRECIACION ACUMULADA HISTORICA");
   $object->getActiveSheet()->setCellValueByColumnAndRow(24, 8,"AJUSTE POR INFLACION DE LA DEPRECIACION");
   $object->getActiveSheet()->setCellValueByColumnAndRow(25, 8,"DEPRECIACION ACUMULADA AJUSTADA POR INFLACION");


  }

    


 $trib="1";
 $anual="A";


  $employee_data = $this->excel_export_model->Obtener_Datos_Empresa($año,$trib,$anual);

  $excel_row = 10;

  foreach($employee_data as $row)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['CODIGO_ACTIVO']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['CUENTA_CONTABLE']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['DESCRIPCION']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['MARCA']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['MODELO']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['SERIE_PLACA']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['SALDO_INICIAL']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['ADQUISICIONES_ADICIONES']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['MEJORAS']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row['RETIROS_BAJAS']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row['OTROS_AJUSTES']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row['VALOR_HISTORICO_DEL_ACTIVO']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row['AJUSTE_POR_INFLACION']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row['VALOR_AJUSTADO_DEL_ACTIVO']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row['FECHA_ADQUISICION']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row['FECHA_INICIO_USO']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row['METODO_APLICADO']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row['NRO_DOCUMENTO_AUTORIZACION']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row['PORCENTAJE_DEPRECIACION']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row['DEPRECIACION_ACUMULADA_CIERRE_EJERCICIO_ANTERIOR']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $row['DEPRECIACION_DEL_EJERCICIO']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $row['DEPRECIACION_DEL_EJERCICIO_RELACIONADA_CON_BAJAS']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $row['DEPRECIACION_RELACIONA_CON_OTROS_AJUSTES']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $row['DEPRECIACION_ACUMULADA_HISTORICA']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, $row['AJUSTE_POR_INFLACION_DE_LA_DEPRECIACION']);
   $object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $row['DEPRECIACION_ACUMULADA_AJUSTADA_POR_INFLACION']);
  

   $excel_row++;
  }

  

  $object->getActiveSheet()
  ->getStyle('G10:N'.$excel_row)
  ->getNumberFormat()
  ->setFormatCode(
      '_-* #,##0.00\ [$-415]_-'
  );


  $object->getActiveSheet()
  ->getStyle('S10:Z'.$excel_row)
  ->getNumberFormat()
  ->setFormatCode(
      '_-* #,##0.00\ [$-415]_-'
  );

  $styleArray = array(
    'borders' => array(
      'allborders' => array(
        'style' => PHPExcel_Style_Border::BORDER_THIN
      )
    )
  );
  
  $object->getActiveSheet()->getStyle('A8:Z'.$excel_row)->applyFromArray($styleArray);
  unset($styleArray);



  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
  ob_end_clean();
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Formato7_1.xlsx"');
 


  $object_writer->save('php://output');
 }

 
 
}
