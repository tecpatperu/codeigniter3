 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Contrato extends CI_Controller {

     public function __construct(){
        parent::__construct();
         $this->load->library('session');
        $this->load->library(array('form_validation','email','pagination'));
        $this->load->helper(array('maestros/sede_rules','string'));
        $this->load->model('contratoModel');
        $this->load->helper('date');
        $this->load->helper('form');
        $this->load->helper('date');

    }
    public function index($offset = 0){
        $data = $this->contratoModel->getcontratos();
        $config['base_url'] = base_url('contrato/index');
        $config['per_page'] = 10;
        $config['total_rows'] = count($data);

        $config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] 	= '</ul></nav></div>';
        $config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] 	= '</span></li>';
        $config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] 	= '</span></li>';
        $config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] 	= '</span></li>';

        $this->pagination->initialize($config);

        $page = $this->contratoModel->getPaginatecontrato($config['per_page'],$offset);
        
        $this->getTemplate($this->load->view('contrato',array('data' => $page),true));
        
    }
    public function delete(){
        $_id = $this->input->post('id',true);

        if(empty($_id)){
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('msg'=>'El id no puede ser vacio')));
        }else{
            $this->contratoModel->deletecontrato($_id);
            $this->output
                ->set_status_header(200);
        }
    }
    public function create(){
         // $data['groups'] = $this->contratoModel->getTiposdocumento();
            $tipos = $this->contratoModel->getTiposdocumento();

            $tipo = array();
            foreach($tipos as $r)
            {
              $tipo[$r['PRO_ID']] = $r['PRO_DESCRIPCION'];
            }

            $data['groups'] = $tipo; 
        $vista = $this->load->view('create_contrato',$data,true);
        $this->getTemplate($vista);
    }
    
    public function update(){
         $CO_ID = $this->input->post('CO_ID');
        $CO_NUMDOC = $this->input->post('CO_NUMDOC');
        $CO_MODALIDAD = $this->input->post('CO_MODALIDAD');
        $CO_FEC_CON = $this->input->post('CO_FEC_CON');
        $CO_FEC_INI = $this->input->post('CO_FEC_INI');
        $CO_FEC_FIN = $this->input->post('CO_FEC_FIN');
        $CO_NUM_CUOTAS = $this->input->post('CO_NUM_CUOTAS');
        $CO_IMPORTE = $this->input->post('CO_IMPORTE');
         $CO_OBS = $this->input->post('CO_OBS');
        $CO_ESTADO = $this->input->post('CO_ESTADO');
        $CO_DEPRECIA_LEASING = $this->input->post('CO_DEPRECIA_LEASING');

        $CO_IDTIPDOC = $this->input->post('CO_IDTIPDOC');
      
        $lastid  = $this->contratoModel->getlastid();
         
        $format = "%Y-%m-%d %h:%i %a";
        $fechaRegistro = @mdate($format);

        $this->form_validation->set_rules(getCreateUserRules());

         if (isset($this->session)){
            $usuariocrea = $this->session->userdata('CODUSUARIO');

         }else{
              $usuariocrea = NULL;  

         }  
        //if($this->form_validation->run() == FALCO){
        //   $this->output->set_status_header(400);
        //}else {
            $contrato = array(
                'CO_IDTIPDOC' =>  $CO_IDTIPDOC,
               'CO_NUMDOC' => $CO_NUMDOC,
                'CO_MODALIDAD' => $CO_MODALIDAD,
                'CO_FEC_CON' => $CO_FEC_CON,
                'CO_ESTADO' => $CO_ESTADO,
                'CO_FEC_INI' => $CO_FEC_INI,
                'CO_FEC_FIN' => $CO_FEC_FIN,
                'CO_NUM_CUOTAS' => $CO_NUM_CUOTAS,
                'CO_IMPORTE' => $CO_IMPORTE,
                'CO_OBS' => $CO_OBS,
                'CO_DEPRECIA_LEASING' => $CO_DEPRECIA_LEASING,
                'CO_USUARIO' => $usuariocrea,
        
                'CO_FECMOD' => $fechaRegistro,
            );
  
                $this->contratoModel->updatecontrato($CO_ID,$contrato);
                $this->session->set_flashdata('msg','La contrato '.$descripcion.' fue actualizado correctamente');
                redirect('contratos');
            //}
    
    }

    public function store(){
        $CO_NUMDOC = $this->input->post('CO_NUMDOC');
        $CO_MODALIDAD = $this->input->post('CO_MODALIDAD');
        $CO_FEC_CON = $this->input->post('CO_FEC_CON');
        $CO_FEC_INI = $this->input->post('CO_FEC_INI');
        $CO_FEC_FIN = $this->input->post('CO_FEC_FIN');
        $CO_NUM_CUOTAS = $this->input->post('CO_NUM_CUOTAS');
        $CO_IMPORTE = $this->input->post('CO_IMPORTE');
         $CO_OBS = $this->input->post('CO_OBS');
        $CO_ESTADO = $this->input->post('CO_ESTADO');
        $CO_DEPRECIA_LEASING = $this->input->post('CO_DEPRECIA_LEASING');

        $CO_IDTIPDOC = $this->input->post('CO_IDTIPDOC');
      
        $lastid  = $this->contratoModel->getlastid();
         
        $format = "%Y-%m-%d %h:%i %a";
        $fechaRegistro = @mdate($format);

        $this->form_validation->set_rules(getCreateUserRules());

         if (isset($this->session)){
            $usuariocrea = $this->session->userdata('CODUSUARIO');

         }else{
              $usuariocrea = NULL;  

         }  
        //if($this->form_validation->run() == FALCO){
        //   $this->output->set_status_header(400);
        //}else {
            $contrato = array(
                'CO_IDTIPDOC' =>  $CO_IDTIPDOC,
                'CO_NUMDOC' => $CO_NUMDOC,
                'CO_MODALIDAD' => $CO_MODALIDAD,
                'CO_FEC_CON' => $CO_FEC_CON,
                'CO_ESTADO' => $CO_ESTADO,
                'CO_FEC_INI' => $CO_FEC_INI,
                'CO_FEC_FIN' => $CO_FEC_FIN,
                'CO_NUM_CUOTAS' => $CO_NUM_CUOTAS,
                'CO_IMPORTE' => $CO_IMPORTE,
                'CO_OBS' => $CO_OBS,
                'CO_DEPRECIA_LEASING' => $CO_DEPRECIA_LEASING,
                'CO_USUARIO' => $usuariocrea,
                'CO_FECREG' => $fechaRegistro,
                'CO_FECMOD' => $fechaRegistro,
            );
    
            
            
            if(!$this->contratoModel->save($contrato)){
                $this->output->set_status_header(500);
            }else{
                 
                $this->session->set_flashdata('msg','El contrato a sido registrado'); 
                redirect(base_url('contratos'));
            }


        //}

        $vista = $this->load->view('admin/create_user','',true);
        $this->getTemplate($vista); 
    }
    public function edit($id = 0){
        $contrato = $this->contratoModel->getcontrato($id);
 $contrato['CO_FEC_CON'] =   nice_date($contrato['CO_FEC_CON'], 'Y-m-d');
 $contrato['CO_FEC_INI'] =   nice_date($contrato['CO_FEC_INI'], 'Y-m-d');
$contrato['CO_FEC_FIN'] =   nice_date($contrato['CO_FEC_FIN'], 'Y-m-d');     
        $tipos = $this->contratoModel->getTiposdocumento();

            $tipo = array();
            foreach($tipos as $r)
            {
              $tipo[$r['PRO_ID']] = $r['PRO_DESCRIPCION'];
            }
           
        
          $data['contrato']=$contrato;
               $data['groups'] = $tipo; 
    

        $view = $this->load->view('edit_contrato',$data,true);
        $this->getTemplate($view);
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
         $data1['idscript'] = "show_contratos.js";   
        $data = array(
            'head' => $this->load->view('templates/header','',TRUE),
            'nav' => $this->load->view('templates/menu','',TRUE),
            'aside' => $this->load->view('templates/barra_sesion','',TRUE),
            'content' => $view,
            'footer' => $this->load->view('templates/footer',$data1,TRUE),
        );
        $this->load->view('dashboard',$data);
    }
}
