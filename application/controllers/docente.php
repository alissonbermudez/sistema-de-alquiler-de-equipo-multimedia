<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Docente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('docente_model');
        $this->load->database('default');

    }

    public function index($alert = 0)
    {
        $data['alert'] = $alert;
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'Docente') {
            redirect(base_url() . 'login');
        }

        $id = $this->session->userdata('id_usuario');
        $data['res'] = $this->docente_model->reserva_id($id);

        $data['horario'] = $this->horario();


        $this->load->view('template/header_docente');
        #echo $this->session->userdata('id_usuario');

        $this->load->view('docente_inicio', $data);
        $this->load->view('template/footer');


    }

    public function horario()
    {
        $query = $this->docente_model->horario();

        $select = "<label class=\"col-md-4 control-label\" for=\"horario\">horario</label>
                            <div class=\"col-md-4\">
                                <select id=\"horario\" name=\"horario\" class=\"form-control\">";


        foreach ($query as $item) {
            $select .= "<option value='" . $item->id . "'>" . $item->horario . "</option>";

        }

        $select .= " </select></div>";

        return $select;
    }

    public function nueva_reserva()
    {

        $fecha = $this->input->post('fecha');
        $horario = $this->input->post('horario');
        $carnet = $this->session->userdata('id_usuario');

        $data['carnet'] = $carnet;
        $data['nombre'] = $this->session->userdata('nombre');

        $data['horario'] = $horario;
        $data['fecha'] = $fecha;
        $data['hora'] = $this->obtenerhora($horario);


        $data['equipo'] = $this->docente_model->reservas_dia($horario, $fecha);


        $this->load->view('template/header_docente');
        $this->load->view('nueva_reserva_docente', $data);
        $this->load->view('template/footer');

    }

    public function obtenerhora($id)
    {
        $hora = $this->docente_model->obtenerhora($id);
        $txthora = $hora->horario;

        return $txthora;

    }

    public function guardar_reserva($iduser, $idequipo, $horario, $fecha)
    {
        $num = $this->docente_model->numreserv($fecha);

        $part = explode('-',$fecha);


        $id= $part[0].$part[1].$part[2].$num+1;

        $datos = array(
            'id' => $id,
            'usuario' => $iduser,
            'equipo' => $idequipo,
            'horario' => $horario,
            'fecha_reserva' => $fecha,
            'estado' => 1

        );

        $guardar = $this->docente_model->guardar_reserva($datos);
        if ($guardar) {
            redirect(base_url() . 'docente/index/1');

        } else {
            redirect(base_url() . 'docente/index/2');
        }


    }

    public function cancelar_reserva($id){
        $data=array(
            'estado'=>4
        );
        $cancelar = $this->docente_model->cambiar_estado($id,$data);

        if ($cancelar){
            redirect(base_url().'docente/index/3');

        }else{
            redirect(base_url().'docente/index/4');
        }
    }


}