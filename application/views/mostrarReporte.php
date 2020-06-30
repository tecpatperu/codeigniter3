<?php
 
tcpdf(); 
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
$obj_pdf->SetCreator(PDF_CREATOR); 
$title = "Reporte de Activos Fijos"; 
$obj_pdf->SetTitle($title); 
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING); 
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN)); 
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); 
$obj_pdf->SetDefaultMonospacedFont('helvetica'); 
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER); 
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER); 
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT); 
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
$obj_pdf->SetFont('helvetica', '', 9); 
$obj_pdf->setFontSubsetting(false); 
$obj_pdf->AddPage(); 
ob_start(); 
    // we can have any view part here like HTML, PHP etc 
    
    
     


  $content="<table>";
foreach ($reporte as $fila) {
    $content.="<tr>";
    foreach($fila as $key=>$value){
       $content.="<td>"; 
       $content.=$value;
       $content.="</td>";
    }
    $content.="</tr>";
}
/*'ITEM' => int 1
'ID_SEDE' => string '1/3/2/1' (length=7)
'CUENTA_CONT' => string '322501' (length=6)
'DES_CUENTA_CONTABLE' => string 'Muebles Y Enseres Arrendamiento Financie' (length=40)
'CODIGO' => string '1' (length=1)
'DESCRIPCION' => string 'Base para Step' (length=14)
'FECHA_INI_OPE' => string '03/04/2011' (length=10)
'FECHA_INICIAL_DEPREC' => string '03/04/2011' (length=10)
'VALOR_ACTIVO_DOLARES' => float 9.22
'VALOR_ACTIVO_SOLES' => float 25.816
'DEPRECIACION' => float 1.5989753852756
'RESIDUAL' => float 24.217024614724
'AC_CODIGO_PRINCIPAL' => string '' (length=0)
*/ 
$obj_pdf->writeHTML($content, true, false, true, false, ''); 
ob_end_clean(); 
$obj_pdf->Output('output.pdf', 'I'); 
exit;
        ?>