<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Alumno extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('alumno_model');
        $this->load->database('default');

    }

    public function index($alert = 0)
    {
        $data['alert'] = $alert;
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'Alumno') {
            redirect(base_url() . 'login');
        }

        $id = $this->session->userdata('id_usuario');
        $data['res'] = $this->alumno_model->reserva_id($id);

        $data['horario'] = $this->horario();


        $this->load->view('template/header_docente');
        #echo $this->session->userdata('id_usuario');

        $this->load->view('alumno_inicio', $data);
        $this->load->view('template/footer');


    }

    public function horario()
    {
        $query = $this->alumno_model->horario();

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


        $data['equipo'] = $this->alumno_model->reservas_dia($horario, $fecha);


        $this->load->view('template/header_docente');
        $this->load->view('nueva_reserva_alumno', $data);
        $this->load->view('template/footer');

    }

    public function obtenerhora($id)
    {
        $hora = $this->alumno_model->obtenerhora($id);
        $txthora = $hora->horario;

        return $txthora;

    }

    public function guardar_reserva($iduser, $idequipo, $horario, $fecha)
    {

        $num = $this->alumno_model->numreserv($fecha);

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

        $guardar = $this->alumno_model->guardar_reserva($datos);
        if ($guardar) {
            redirect(base_url() . 'alumno/index/1');

        } else {
            redirect(base_url() . 'alumno/index/2');
        }


    }

    public function cancelar_reserva($id){
        $data=array(
            'estado'=>4
        );
        $cancelar = $this->alumno_model->cambiar_estado($id,$data);

        if ($cancelar){
            redirect(base_url().'alumno/index/3');

        }else{
            redirect(base_url().'alumno/index/4');
        }
    }


}