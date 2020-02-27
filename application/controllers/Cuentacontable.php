 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Cuentacontable extends CI_Controller {

     public function __construct(){
        parent::__construct();
         $this->load->library('session');
        $this->load->library(array('form_validation','email','pagination'));
        $this->load->helper(array('maestros/sede_rules','string'));
        $this->load->model('CuentacontableModel');
        $this->load->helper('date');
    }
    public function index($offset = 0){
        $data = $this->CuentacontableModel->getCuentacontables();
        $config['base_url'] = base_url('cuentascontable/index');
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

        $page = $this->CuentacontableModel->getPaginateCuentacontable($config['per_page'],$offset);
        
        $this->getTemplate($this->load->view('cuentacontable',array('data' => $page),true));
        
    }
    public function delete(){
        $_id = $this->input->post('id',true);

        if(empty($_id)){
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('msg'=>'El id no puede ser vacio')));
        }else{
            $this->CuentacontableModel->deletecuentacontable($_id);
            $this->output
                ->set_status_header(200);
        }
    }
    public function create(){
        $vista = $this->load->view('create_cuentacontable','',true);
        $this->getTemplate($vista);
    }
    
    public function update(){
            $_id = $this->input->post('idCuentacontable');
            $descripcion = $this->input->post('descripcion');
            $abreviatura = $this->input->post('abreviatura');
            $estado = $this->input->post('estado');   
            if (isset($estado) ==false ) {
                  $estado = '0';
            }
           // $this->form_validation->set_rules(getUpdateUserRules());
           // if($this->form_validation->run() === FALSE){
           //     $view = $this->load->view('admin/edit_user','',true);
           //     $this->getTemplate($view);
           // }else{
                # actualizar
                // show_404();
         if (isset($this->session)){
            $usuariocrea = $this->session->userdata('CODUSUARIO');

         }else{
              $usuariocrea = NULL;  
         }
                $data = array(
                    'SE_DESCRIPCION' => $descripcion,
                    'SE_ABREVIATURA' => $abreviatura,
                    'SE_ESTADO' => $estado,
                    'SE_FECMOD' => $fechaRegistro,
                    'SE_USUARIO' => $usuariocrea,

                );
                $this->CuentacontableModel->updateCuentacontable($_id,$data);
                $this->session->set_flashdata('msg','La cuentacontable '.$descripcion.' fue actualizado correctamente');
                redirect('cuentascontable');
            //}
    
    }

    public function store(){
        $AR_ID = $this->input->post('AR_ID');
        $AR_DESCRIPCION = $this->input->post('AR_DESCRIPCION');
        $AR_TASA = $this->input->post('AR_TASA');
        $tiempovida = $this->input->post('tiempovida');
        $AR_CUENTA_CARGO = $this->input->post('AR_CUENTA_CARGO');
        $AR_CUENTA_ABONO = $this->input->post('AR_CUENTA_ABONO');
        $AR_CUENTA_CARGO_DC = $this->input->post('AR_CUENTA_CARGO_DC');
        $AR_CUENTA_ABONO_DC = $this->input->post('AR_CUENTA_ABONO_DC');
        $AR_CUENTA_ABONO_DC_PERDIDA = $this->input->post('AR_CUENTA_ABONO_DC_PERDIDA');
        $AR_CUENTA_CARGO_R = $this->input->post('AR_CUENTA_CARGO_R');
        $AR_CUENTA_ABONO_R = $this->input->post('AR_CUENTA_ABONO_R');
        $terminal = gethostname();
        $format = "%Y-%m-%d %h:%i %a";
        $fechaRegistro = @mdate($format);

        $this->form_validation->set_rules(getCreateUserRules());

         if (isset($this->session)){
            $usuariocrea = $this->session->userdata('CODUSUARIO');

         }else{
              $usuariocrea = NULL;  

         }  


         if (isset($tiempovida) or $tiempovida == ""  or tiempovida == "0" ){
             $AR_TIEMPO_VIDA_FINANCIERO   =  '0';
             $AR_TASA_ANUAL_FINANCIERO    =  '0';
             $AR_TASA_MENSUAL_FINANCIERO   = '0';
        }else{
             $AR_TIEMPO_VIDA_FINANCIERO   =  $tiempovida;
             $AR_TASA_ANUAL_FINANCIERO    =  $tiempovida;
             $AR_TASA_MENSUAL_FINANCIERO   = $tiempovida;
        }
        //if($this->form_validation->run() == FALSE){
        //   $this->output->set_status_header(400);
        //}else {
            $cuentacontable = array(
                'AR_ID' =>  $AR_ID,
                'AR_DESCRIPCION' => $AR_DESCRIPCION,
                'AR_TASA' => $AR_TASA,
                'AR_CUENTA_CARGO' => $AR_CUENTA_CARGO,
                'AR_CUENTA_ABONO' => $AR_CUENTA_ABONO,
                'AR_CUENTA_CARGO_DC' => $AR_CUENTA_CARGO_DC,
                'AR_CUENTA_ABONO_DC' => $AR_CUENTA_ABONO_DC,
                'AR_CUENTA_ABONO_DC_PERDIDA' => $AR_CUENTA_ABONO_DC_PERDIDA,
                'AR_CUENTA_CARGO_R' => $AR_CUENTA_CARGO_R,
                'AR_CUENTA_ABONO_R' => $AR_CUENTA_ABONO_R,
                'AR_TERMINAL' => $AR_TERMINAL,
                'AR_TIEMPO_VIDA_FINANCIERO' => $AR_TIEMPO_VIDA_FINANCIERO,
                'AR_TASA_ANUAL_FINANCIERO' => $AR_TASA_ANUAL_FINANCIERO,
                'AR_TASA_MENSUAL_FINANCIERO' => $AR_TASA_MENSUAL_FINANCIERO,
                'AR_FECREG' => $fechaRegistro,
                'AR_FECMOD' => $fechaRegistro,
                'AR_USUARIO' => $usuariocrea,
                'AR_ESTADO' => 1,
            );
    
            
            
            if(!$this->CuentacontableModel->save($cuentacontable)){
                $this->output->set_status_header(500);
            }else{
                 
                $this->session->set_flashdata('msg','El usuario a sido registrado'); 
                redirect(base_url('cuentascontable'));
            }


        //}

        $vista = $this->load->view('admin/create_user','',true);
        $this->getTemplate($vista); 
    }
    public function edit($id = 0){
        $cuentacontable = $this->CuentacontableModel->getCuentacontable($id);
        $view = $this->load->view('edit_cuentacontable',array('cuentacontable' => $cuentacontable),true);
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
         $data1['idscript'] = "show_cuentascontable.js";   
        $data = array(
            'head' => $this->load->view('templates/header','',TRUE),
            'nav' => $this->load->view('templates/menu','',TRUE),
            'aside' => $this->load->view('templates/barra_sesion','',TRUE),
            'content' => $view,
            'footer' => $this->load->view('templates/footer',$data1,TRUE),
        );
        $this->load->view('dashboard',$data);
    }

        public function get_plan_cuenta_data()
    {
              $resultado = $this->CuentacontableModel->get_plan_cuentas_data_model();
 
        echo  json_encode($resultado); 

        
    }
}
