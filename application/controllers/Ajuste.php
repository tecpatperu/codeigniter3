 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Ajuste extends CI_Controller {

     public function __construct(){
        parent::__construct();
         $this->load->library('session');
        $this->load->library(array('form_validation','email','pagination'));
        $this->load->helper(array('maestros/sede_rules','string'));
        $this->load->model('AjusteModel');
        $this->load->helper('date');
        $this->load->helper('sf_helper');

        //$this->load->library('upload');
        $this->load->helper('file');
    }
    public function index($offset = 0){
        $data = $this->AjusteModel->getAjuste();
        $config['base_url'] = base_url('Ajuste/index');
        $config['per_page'] = 10;
        $config['total_rows'] = count($data);

        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['pr']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $page = $this->AjusteModel->getPaginateAjuste($config['per_page'],$offset);
        
        $this->getTemplate($this->load->view('ajuste',array('data' => $page),true));
        
    }
    public function delete(){
        $_id = $this->input->post('id',true);





        
        if(empty($_id)){
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('msg'=>'El id no puede ser vacio')));
        }else{
            $this->AjusteModel->deletemejora($_id);
            $this->output
                ->set_status_header(200);
        }
    }
    public function create(){
        
     
        $id = $this->AjusteModel->getlastid();
        $data['id'] = $id; 

        $vista = $this->load->view('create_ajuste',$data,true);
        $this->getTemplate($vista);
    }
    
    public function update(){

        $sec = 0;
        $ref="";
        
        $DESC_CODIGO   = $this->input->post('DESC_CODIGO');
        
        $prove="";
        $tipo_doc = $this->input->post('AC_TIPO_DOC');
        $serie = $this->input->post('Serie');
        $numero = $this->input->post('Numero');
        
        $birthday = $this->input->post('birthday');
        $libro = $this->input->post('Libro');
        
        $AC_TIPO_MON = $this->input->post('AC_TIPO_MON');
        
        $cambio = $this->input->post('Cambio');
        
        $cmb_tip_pago = "";
        $Concepto = $this->input->post('Concepto');
        $AM_TASA=0;
        $voucher = $this->input->post('Voucher');
        $format = "%Y-%m-%d %h:%i %a";
        $AM_FEC_REG = @mdate($format);
        
        $OF_TERMINAL = gethostname();
        if (isset($this->session)){
            $usuariocrea = $this->session->userdata('CODUSUARIO');
        
         }else{
              $usuariocrea = NULL;  
         }
        
        
        
         $ajuste = array(
            'AM_IDACTIVO' =>  $DESC_CODIGO ,
            'AM_SEC' => $sec,
            'AM_REF' => $ref,
            'AM_IDPROVE' => $prove,
            'AM_TDOC'  => $tipo_doc ,
            'AM_SDOC' => $serie,
            'AM_NDOC' => $numero,
            'AM_FDOC' => $birthday,
            'AM_MDOC' => $libro,
            'AM_IDMONEDA' => $AC_TIPO_MON,
            'AM_TCAM' => $cambio,
            'AM_IDTIPO_PAGO' => $cmb_tip_pago,
            'AM_OBS' => $Concepto,
            'AM_TASA' => $AM_TASA,
            'AM_FEC_REG' => $AM_FEC_REG,
            'AM_USUARIO' => $usuariocrea,
            'AM_TERMINAL' => $OF_TERMINAL,
            'AM_VOUCHER' => $voucher
        );

        $this->AjusteModel->updateMejora($DESC_CODIGO,$ajuste);
        $this->session->set_flashdata('msg','La mejora '.$DESC_CODIGO.' fue actualizada correctamente');
        redirect('ajuste');


    }

    public function store(){
        $ajustes = [];
        $tabla =[];//= explode(";",$this->input->post('ajuste1') );

        foreach($_POST as $key => $value) {
            if (strpos($key, 'ajuste') === 0) {
                $tabla[] = $key ; // value starts with book_
            }
        }
        for($i = 0; $i < count($tabla); ++$i) {
            $columnas =   explode(";", $this->input->post("ajuste".($i+1)) );
            //var_dump($this->input->post("ajuste".$i));
            //exit;
                $AM_IDMEJORA    =  $this->input->post('ID_AJUSTE'); 
                $AM_SEC =  $columnas[0];
                $AM_CONCEPTO_AJUSTE = $this->input->post('AM_CONCEPTO_AJUSTE'); 
                $AM_VOUCHER =  $this->input->post('AM_VOUCHER');  
                $AM_TDOC =  $this->input->post('AM_TDOC');       
                $AM_FDOC = $this->input->post('AM_FDOC');    
                $AM_IDACTIVO = $this->input->post('AM_IDACTIVO');
                $AM_CODIGO_ACTIVO = $columnas[1];
                $AM_VALOR_LIBRO =  $columnas[3];
                $AM_TIPO_AJUSTE_VL =  $columnas[4];  
                $AM_AJUSTE_VALOR_LIBRO =    $columnas[5];  
                $AM_TIPO_AJUSTE_TRIBUTARIO =  $columnas[6];  
                $AM_AJUSTE_VALOR_TRIBUTARIO =  $columnas[7];   
                $AM_TIPO_AJUSTE_FINANCIERO =  $columnas[8];  
                $AM_AJUSTE_VALOR_FINANCIERO =   $columnas[9];  
                
                if (isset($this->session)){
                    $AM_USUARIO = $this->session->userdata('CODUSUARIO');

                }else{
                    $AM_USUARIO = NULL;  
                }

                $AM_TERMINAL = gethostname();
      
      


                $ajuste = array(
                    'AM_IDMEJORA' =>  $AM_IDMEJORA ,
                    'AM_SEC' => $AM_SEC,
                    'AM_CONCEPTO_AJUSTE' => $AM_CONCEPTO_AJUSTE,
                    'AM_VOUCHER' => $AM_VOUCHER,
                    'AM_TDOC'  => $AM_TDOC ,
                    'AM_FDOC' => $AM_FDOC,
                    'AM_IDACTIVO' => $AM_IDACTIVO,
                    'AM_CODIGO_ACTIVO' => $AM_CODIGO_ACTIVO,
                    'AM_VALOR_LIBRO' => $AM_VALOR_LIBRO,
                    'AM_TIPO_AJUSTE_VL' => $AM_TIPO_AJUSTE_VL,
                    'AM_AJUSTE_VALOR_LIBRO' =>   (empty( $AM_AJUSTE_VALOR_LIBRO )) ? 0 : $AM_AJUSTE_VALOR_LIBRO,
                    'AM_TIPO_AJUSTE_TRIBUTARIO' => $AM_TIPO_AJUSTE_TRIBUTARIO,
                    'AM_AJUSTE_VALOR_TRIBUTARIO' =>  (empty( $AM_AJUSTE_VALOR_TRIBUTARIO )) ? 0: $AM_AJUSTE_VALOR_TRIBUTARIO,
                    'AM_TIPO_AJUSTE_FINANCIERO' => $AM_TIPO_AJUSTE_FINANCIERO,
                    'AM_AJUSTE_VALOR_FINANCIERO' =>  (empty( $AM_AJUSTE_VALOR_FINANCIERO )) ? 0: $AM_AJUSTE_VALOR_FINANCIERO,
                    'AM_USUARIO' => $AM_USUARIO ,
                    'AM_TERMINAL' => $AM_TERMINAL 
                );
                $ajustes[] = $ajuste;

        }
            if(!$this->AjusteModel->save($ajustes)){
                $this->output->set_status_header(500);
            }else{
                 
                $this->session->set_flashdata('msg','El ajuste a sido registrado'); 
                redirect(base_url('ajuste'));
            }


        //}

        //$vista = $this->load->view('ajuste/create_ajuste','',true);
        $this->getTemplate($vista); 
    }




    public function edit($id = 0){
        $cierre1 = $this->AjusteModel->Obtener_Ultimo_Cierre_Mensual();
      
        if(count($cierre1)>0){
            $unixtime = strtotime($cierre1[0]['Anio']);
            $unixtimeMes = strtotime($cierre1[0]['Mes']);
            $añoA =   date('Y', $unixtime);
               $mesA = date('m', $unixtimeMes);

            if($mesA=12){
                $mesA=1;
                $añoA=$añoA+1;

                $fecha_mejora="01/".$mesA."/".$añoA;
            }else{
                $mesA=$mesA+1;
                $fecha_mejora="01/".$mesA."/".$añoA;

            }
        }else{


        $cierre2 = $this->AjusteModel->Obtener_Ultimo_Cierre_Mensual_dos();

        if(count($cierre2)>0){
           $fecha_mejora= $cierre2[0]['FECHA_INI_OPERACIONES'];
        }

            }



            try{

            }catch (Exception $ex){
                $e="error";
                echo $e;
 
 
           }


        $mejora = $this->AjusteModel->getMejora($id);
        $view = $this->load->view('edit_ajuste',array('mejora' => $mejora),true);

     
       
    

        $this->getTemplate($view);



    }




    public function editfinal($id = 0){

   
     
        $registro = $this->AjusteModel->getAjusteporID($id);

        $unixtime = strtotime($registro[0]['Fecha']);

 $añoA =   date('Y', $unixtime);
    $mesA = date('m', $unixtime);
    $mesLetra="";
    if($mesA=1){
        $mesLetra="Enero";
    }elseif($mesA=2){
        $mesLetra="Febrero";
    }elseif($mesA=3){
        $mesLetra="Marzo";
    }elseif($mesA=4){
        $mesLetra="Abril";
    }elseif($mesA=5){
        $mesLetra="Mayo";
    }elseif($mesA=6){
        $mesLetra="Junio";
    }elseif($mesA=7){
        $mesLetra="Julio";
    }elseif($mesA=8){
        $mesLetra="Agosto";
    }elseif($mesA=9){
        $mesLetra="Setiembre";
    }elseif($mesA=10){
        $mesLetra="Octubre";
    }elseif($mesA=11){
        $mesLetra="Noviembre";
    }elseif($mesA=12){
        $mesLetra="Diciembre";
    }
    
    $cierre = $this->AjusteModel->Verificar_Cierre_Mensual_GPIX($mesA,$añoA);

    if($cierre>0){
        $msj1="El cierre mensual de ".$mesLetra." del ".$añoA." esta registrado.No se puede realizar la edicion.";
    }else{

        $msj1="";

    }

echo json_encode($msj1);
    }


    public function sendEmail($data){

        $this->email->from('sistema@hospidev.com', 'Hospidev');
        $this->email->to($data['correo']);

        $this->email->subject('Datos de cuenta');

        $vista = $this->load->view('emails/welcome',$data,TRUE);

        $this->email->message($vista);

        $this->email->send();
    }
    public function getTemplate($view){
         $data1['idscript'] = "show_ajuste.js";   
        $data = array(
            'head' => $this->load->view('templates/header','',TRUE),
            'nav' => $this->load->view('templates/menu','',TRUE),
            'aside' => $this->load->view('templates/barra_sesion','',TRUE),
            'content' => $view,
            'footer' => $this->load->view('templates/footer',$data1,TRUE),
        );
        $this->load->view('dashboard',$data);
    }


  
    public function get_subfamilia_data($id = '')
    {
       
        $get_student = $this->BienModel->get_subfamilia_data_model($id);
 
        echo  json_encode($get_student); 

        
    }
    public function get_familia_data($id = '')
    {
       
        $get_student = $this->AjusteModel->get_familia_data_model($id);



        
        echo  json_encode($get_student); 

        
    }


    


    public function get_general_data($id)
    {
       
        $get_student1 = $this->AjusteModel->get_general_data_model($id);



        
        echo  json_encode($get_student1); 

        
    }


   
  
    public function getcodigoajuste()
    {
       
        $getCodigoAjuste = $this->AjusteModel->getcodigoajustegeneral();



        
        echo  json_encode($getCodigoAjuste); 

        
    }
  

    public function grabarAjuste($id)
    {
       
        $AM_IDMEJORA = $id;



        
        echo  json_encode($getCodigoAjuste); 

        
    }

    public function calcular()
    {
       
        $AM_IDMEJORA = $id;



        
        echo  json_encode($getCodigoAjuste); 

        
    }


}
