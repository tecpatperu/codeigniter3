 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Area extends CI_Controller {

     public function __construct(){
        parent::__construct();
         $this->load->library('session');
        $this->load->library(array('form_validation','email','pagination'));
        $this->load->helper(array('maestros/sede_rules','string'));
        $this->load->model('AreaModel');
        $this->load->model('EdificioModel');
        $this->load->model('PisoModel');
        $this->load->helper('date');
    }
    public function index($offset = 0){
        $data = $this->AreaModel->getAreas();
        $config['base_url'] = base_url('Area/index');
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

        $page = $this->AreaModel->getPaginateArea($config['per_page'],$offset);
        
        $this->getTemplate($this->load->view('area',array('data' => $page),true));
        
    }
    public function delete(){
        $_id = $this->input->post('id',true);

        if(empty($_id)){
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('msg'=>'El id no puede ser vacio')));
        }else{
            $this->AreaModel->deletearea($_id);
            $this->output
                ->set_status_header(200);
        }
    }
    public function create(){
        $vista = $this->load->view('create_area','',true);
        $this->getTemplate($vista);
    }
    
    public function update(){
            $_id = $this->input->post('idArea');
            $descripcion = $this->input->post('descripcion');
            $abreviatura = $this->input->post('abreviatura');
            $estado = $this->input->post('estado'); 
            $edificio = $this->input->post('AR_IDEDIFICIO');
            $piso = $this->input->post('AR_IDPISO');  
            $format = "%Y-%m-%d %h:%i %a";
            $fechaRegistro = @mdate($format);
            if (isset($estado) ==false ) {
                  $estado = '0';
            }
 
           $terminal = gethostname();
         if (isset($this->session)){
            $usuariocrea = $this->session->userdata('CODUSUARIO');

         }else{
              $usuariocrea = NULL;  
         }
                $data = array(
                'AR_DESCRIPCION' => $descripcion,
                'AR_ESTADO' => $estado,
                'AR_ABREVI' => $abreviatura,
                'AR_USUARIO' => $usuariocrea,
                'AR_TERMINAL' => $terminal,
                'AR_FECMOD' => $fechaRegistro,
                'AR_IDEDIFICIO' => $edificio,
                'AR_IDPISO' => $piso,
                );
                $this->AreaModel->updateArea($_id,$data);
                $this->session->set_flashdata('msg','El area '.$descripcion.' fue actualizado correctamente');
                redirect('areas');
            //}
    
    }

    public function store(){
        $descripcion = $this->input->post('AR_DESCRIPCION');
        $abreviatura = $this->input->post('AR_ABREVI');
        $estado = $this->input->post('AR_ESTADO');
        $edificio = $this->input->post('AR_IDEDIFICIO');
        $piso = $this->input->post('AR_IDPISO');
        $lastid  = $this->AreaModel->getlastid();
         
        $format = "%Y-%m-%d %h:%i %a";
        $fechaRegistro = @mdate($format);
        $terminal = gethostname();
        $this->form_validation->set_rules(getCreateUserRules());

         if (isset($this->session)){
            $usuariocrea = $this->session->userdata('CODUSUARIO');

         }else{
              $usuariocrea = NULL;  

         }  
        //if($this->form_validation->run() == FALSE){
        //   $this->output->set_status_header(400);
        //}else {
            $area = array(
                'AR_ID' =>  $lastid,
                'AR_DESCRIPCION' => $descripcion,
                'AR_ESTADO' => 1,
                'AR_ABREVI' => $abreviatura,
                'AR_USUARIO' => $usuariocrea,
                'AR_TERMINAL' => $terminal,
                'AR_FECREG' => $fechaRegistro,
                'AR_FECMOD' => $fechaRegistro,
                'AR_IDEDIFICIO' => $edificio,
                'AR_IDPISO' => $piso,
            );
    
            
            
            if(!$this->AreaModel->save($area)){
                $this->output->set_status_header(500);
            }else{
                 
                $this->session->set_flashdata('msg','El area a sido registrado'); 
                redirect(base_url('areas'));
            }


        //}

        $vista = $this->load->view('admin/create_user','',true);
        $this->getTemplate($vista); 
    }
    public function edit($id = 0){
        $area = $this->AreaModel->getArea($id);
        $view = $this->load->view('edit_area',array('area' => $area),true);
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
         $data1['idscript'] = "show_areas.js";   
        $data = array(
            'head' => $this->load->view('templates/header','',TRUE),
            'nav' => $this->load->view('templates/menu','',TRUE),
            'aside' => $this->load->view('templates/barra_sesion','',TRUE),
            'content' => $view,
            'footer' => $this->load->view('templates/footer',$data1,TRUE),
        );
        $this->load->view('dashboard',$data);
    }
    
    public function get_edificios_data(){

        $get_student = $this->EdificioModel->getEdificios();
        echo  json_encode($get_student); 
     
    }
    public function get_pisos_data(){

        $get_student = $this->PisoModel->getPisos();
        echo  json_encode($get_student); 
     
    }

    public function get_area_data()
    {
       $get_student = $this->AreaModel->getAreas();
 
        echo  json_encode($get_student); 

        
    }

}

