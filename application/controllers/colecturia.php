<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Colecturia extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('colecturia_model');
        $this->load->database('default');

    }

    public function index($alert=0){
        $data['alert']=$alert;
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'Colecturia')
        {
            redirect(base_url().'login');
        }


        $data['res']=$this->colecturia_model->reserva_sin_pagar();



        $this->load->view('template/header_colecturia');
        $this->load->view('colector_inicio',$data);
        $this->load->view('template/footer');
    }

    public function pagar($id){
        $data=array(
            'pagado'=>'true'
        );
        $pagado = $this->colecturia_model->cambiar_estado($id,$data);

        if ($pagado){
            redirect(base_url().'colecturia/index/1');

        }else{
            redirect(base_url().'colecturia/index/2');
        }
    }

    public function reporte(){



        $this->load->view('template/header_colecturia');
        $this->load->view('reportec');
        $this->load->view('template/footer');


    }


    public function gen_report(){

        $fechai = $this->input->post('fechai');
        $fechaf = $this->input->post('fechaf');
        $data['inicio'] =$fechai;
        $data['fin'] = $fechaf;
        $data['report'] = $this->colecturia_model->pagados_report($fechai,$fechaf);
        // Load all views as normal
        $this->load->view('report/report_colecturia',$data);
        // Get output html
        $html = $this->output->get_output();

        // Load library
        $this->load->library('dompdf_gen');

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("colecturia.pdf");
    }

}