
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('admin_model');
        $this->load->database('default');

    }

    public function index($alert=0)
    {

        $data['alert']=$alert;
        if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'Admin')
        {
            redirect(base_url().'login');
        }
        $nbadge=$this->admin_model->badges();
        $dhead['badges']=$nbadge->num;
        $data['reservashoy']=$this->admin_model->reservas_hoy();
        $data['reservasent']=$this->admin_model->reservas_entregadas();

        $this->load->view('template/header',$dhead);
        $this->load->view('admin_inicio',$data);
        $this->load->view('template/footer');
    }



    public function equipo($alert=0){
        $data['alert']=$alert;

        $data['equipo']=$this->admin_model->ver_equipo();
        $nbadge=$this->admin_model->badges();
        $dhead['badges']=$nbadge->num;

        $this->load->view('template/header',$dhead);
        $this->load->view('admin_equipo',$data);
        $this->load->view('template/footer');
    }

    public function usuarios($alert=0){
        $data['alert']=$alert;

        $data['usuarios']=$this->admin_model->ver_usuarios();
        $nbadge=$this->admin_model->badges();
        $dhead['badges']=$nbadge->num;

        $this->load->view('template/header',$dhead);
        $this->load->view('admin_users',$data);
        $this->load->view('template/footer');
    }

    public function nuevo_equipo(){

        $nbadge=$this->admin_model->badges();
        $dhead['badges']=$nbadge->num;

        $data['tipo'] = $this->tipoequipo();
        $this->load->view('template/header',$dhead);
        $this->load->view('nuevo_equipo',$data);
        $this->load->view('template/footer');
    }
    public function nuevo_usuario(){

        $nbadge=$this->admin_model->badges();
        $dhead['badges']=$nbadge->num;


        $this->load->view('template/header',$dhead);
        $this->load->view('nuevo_usuario');
        $this->load->view('template/footer');
    }

    public function guardar_equipo(){
        $datos= array(
            'idequipo' => $this->input->post('idequipo'),
            'marca' => $this->input->post('marca'),
            'modelo' => $this->input->post('modelo'),
            'serie' => $this->input->post('serie'),
            'tipo' => $this->input->post('tipo'),
            'descripcion' => $this->input->post('descripcion'),
            'fechaadq' => $this->input->post('adquisicion')
        );

        $guardar = $this->admin_model->guardar_equipo($datos);
        if ($guardar){
            redirect(base_url().'admin/equipo/1');

        }else{
            redirect(base_url().'admin/equipo/2');
        }

    }
    public function guardar_usuario(){
        $datos= array(
            'id' => $this->input->post('id'),
            'perfil' => $this->input->post('rol'),
              'username' => $this->input->post('usuario'),
              'password' => sha1($this->input->post('password')),

            'nombre' => $this->input->post('nombre'));

        $guardar = $this->admin_model->guardar_usuario($datos);
        if ($guardar){
            redirect(base_url().'admin/usuarios/1');

        }else{
            redirect(base_url().'admin/usuarios/2');
        }

    }

    public function edit_equipo($id){
        $datos = $this->admin_model->equipo_id($id);
        $data['idequipo']=$datos->idequipo;
        $data['marca']=$datos->marca;
        $data['modelo']=$datos->modelo;
        $data['serie']=$datos->serie;
        $data['tipo']=$datos->tipo;
        $data['descripcion']=$datos->descripcion;
        $data['fechaadq']=$datos->fechaadq;
        $data['estado']=$datos->estado;

        $nbadge=$this->admin_model->badges();
        $dhead['badges']=$nbadge->num;

        $this->load->view('template/header',$dhead);
        $this->load->view('edit_equipo',$data);
        $this->load->view('template/footer');
    }

    public function edit_usuario($id){
        $datos = $this->admin_model->usuario_id($id);
        $data['id']=$datos->id;
        $data['nombre']=$datos->nombre;
        $data['username']=$datos->username;
        $data['password']=$datos->password;
        $data['perfil']=$datos->perfil;


        $nbadge=$this->admin_model->badges();
        $dhead['badges']=$nbadge->num;

        $this->load->view('template/header',$dhead);
        $this->load->view('edit_usuario',$data);
        $this->load->view('template/footer');
    }

    public function update_equipo($id){

        $datos= array(
            'marca' => $this->input->post('marca'),
            'modelo' => $this->input->post('modelo'),
            'serie' => $this->input->post('serie'),
            'tipo' => $this->input->post('tipo'),
            'descripcion' => $this->input->post('descripcion'),
            'fechaadq' => $this->input->post('adquisicion'),
            'estado' => $this->input->post('estado')
        );

        $guardar = $this->admin_model->update_equipo($datos,$id);
        if ($guardar){
            redirect(base_url().'admin/equipo/1');

        }else{
            redirect(base_url().'admin/equipo/2');
        }

    }

    public function update_usuario($id){

      $datos = $this->admin_model->usuario_id($id);

      if ($this->input->post('password')==$datos->password){
        $datos= array(
            'id' => $this->input->post('id'),
            'perfil' => $this->input->post('rol'),
              'username' => $this->input->post('usuario'),


            'nombre' => $this->input->post('nombre'));
      }else {
        $datos= array(
            'id' => $this->input->post('id'),
            'perfil' => $this->input->post('rol'),
              'username' => $this->input->post('usuario'),
              'password' => sha1($this->input->post('password')),

            'nombre' => $this->input->post('nombre'));
      }


        $guardar = $this->admin_model->update_usuario($datos,$id);
        if ($guardar){
            redirect(base_url().'admin/usuarios/1');

        }else{
            redirect(base_url().'admin/usuarios/2');
        }

    }


    public function comentarios($id,$alert=0){
        $data['alert']=$alert;

        $data['coment']=$this->admin_model->ver_comentarios($id);
        $data['idequipo'] = $id;

        $nbadge=$this->admin_model->badges();
        $dhead['badges']=$nbadge->num;

        $this->load->view('template/header',$dhead);
        $this->load->view('comentarios',$data);
        $this->load->view('template/footer');
    }

    public function guardar_comentario($id){
        $datos= array(
            'titulo' => $this->input->post('titulo'),
            'comentar' => $this->input->post('comentario'),
            'equipo' => $id

        );

        $guardar = $this->admin_model->guardar_comentario($datos);
        if ($guardar){
            redirect(base_url().'admin/comentarios/'.$id.'/1');

        }else{
            redirect(base_url().'admin/comentarios/'.$id.'/2');
        }

    }

    public function reservas($alert=0){
        $data['alert']=$alert;

        $data['horario']=$this->horario();

        $data['res']=$this->admin_model->reserva_total();

        $nbadge=$this->admin_model->badges();
        $dhead['badges']=$nbadge->num;

        $this->load->view('template/header',$dhead);
        $this->load->view('reservas',$data);
        $this->load->view('template/footer');

    }

    public function nueva_reserva(){

        $fecha = $this->input->post('fecha');
        $horario = $this->input->post('horario');
        $carnet = $this->input->post('carnet');

        $usuario = $this->admin_model->verificar_usuario($carnet);

        if($usuario==true){


            $carnet = $usuario->id;
            $nombre = $usuario->nombre;
            $perfil = $usuario->perfil;

            $data['carnet']=$carnet;
            $data['nombre']=$nombre;
            $data['perfil']=$perfil;

            $data['horario'] = $horario;
            $data['fecha'] = $fecha;

            $nbadge=$this->admin_model->badges();
            $dhead['badges']=$nbadge->num;

            $data['equipo'] = $this->admin_model->reservas_dia($horario,$fecha);


            $this->load->view('template/header',$dhead);
            $this->load->view('nueva_reserva',$data);
            $this->load->view('template/footer');

        }



    }

    public function guardar_reserva($iduser,$idequipo,$horario,$fecha,$perfil){

        $num = $this->admin_model->numreserv($fecha);

        $part = explode('-',$fecha);


        $id= $part[0].$part[1].$part[2].$num+1;

        $datos= array(
            'id' => $id,
            'usuario' => $iduser,
            'equipo' => $idequipo,
            'horario' => $horario,
            'fecha_reserva' => $fecha,
            'estado' => 1

        );


        ##Imprimir comprobante alumno ---------------------------------------------------
        $guardar = $this->admin_model->guardar_reserva($datos);





        if ($guardar){

            if ($perfil == 'Alumno'){


                redirect(base_url().'admin/imprimir_report/'.$id);

            }else{
                redirect(base_url().'admin/reservas/1');
            }


        }else{
            redirect(base_url().'admin/reservas/2');
        }




    }

    public function ver_reserva($id){



        $res=$this->admin_model->reserva_id($id);
        $data['id']=$res->id;
        $data['usuario']= $res->usuario;
        $data['equipo']=$res->equipo;
        $data['horario']=$res->horario;
        $data['estado']=$res->estado;
        $data['fecha']=$res->fecha;
        $data['fecha_reserva']=$res->fecha_reserva;

        $nbadge=$this->admin_model->badges();
        $dhead['badges']=$nbadge->num;

        $this->load->view('template/header',$dhead);
        $this->load->view('ver_reserva',$data);
        $this->load->view('template/footer');

    }

    public function cancelar_reserva($id){
        $data=array(
            'estado'=>4
        );
        $cancelar = $this->admin_model->cambiar_estado($id,$data);

        if ($cancelar){
            redirect(base_url().'admin/reservas/3');

        }else{
            redirect(base_url().'admin/reservas/4');
        }
    }

    public function entregar_equipo($id){
        $data=array(
            'estado'=>2
        );
        $entregar = $this->admin_model->cambiar_estado($id,$data);

        if ($entregar){
            redirect(base_url().'admin/index/1');

        }else{
            redirect(base_url().'admin/index/2');
        }
    }


    public function recibir_equipo($id){
        $data=array(
            'estado'=>3
        );
        $recibir = $this->admin_model->cambiar_estado($id,$data);

        if ($recibir){
            redirect(base_url().'admin/index/3');

        }else{
            redirect(base_url().'admin/index/4');
        }
    }

    public function mensajes($alert=0){

        $data['alert']=$alert;

        $data['res']=$this->admin_model->noprocesadas();

        $nbadge=$this->admin_model->badges();
        $dhead['badges']=$nbadge->num;

        $this->load->view('template/header',$dhead);
        $this->load->view('mensajes',$data);
        $this->load->view('template/footer');

    }

    public function limpiar(){
        $this->admin_model->limpiar();
    }

    public function horario(){
        $query= $this->admin_model->horario();

        $select="<label class=\"col-md-4 control-label\" for=\"horario\">horario</label>
                            <div class=\"col-md-4\">
                                <select id=\"horario\" name=\"horario\" class=\"form-control\">";



        foreach($query as $item){
            $select.="<option value='".$item->id."'>".$item->horario."</option>";

        }

        $select.=" </select></div>";

        return $select;
    }

    public function tipoequipo(){
        $query= $this->admin_model->tipoequipo();

        $select="<label class=\"col-md-4 control-label\" for=\"tipo\">Tipo equipo</label>
                            <div class=\"col-md-4\">
                                <select id=\"tipo\" name=\"tipo\" class=\"form-control\">";



        foreach($query as $item){
            $select.="<option value='".$item->idtipo."'>".$item->nombre."</option>";

        }

        $select.=" </select></div>";

        return $select;
    }

    public function reporte(){

        $nbadge=$this->admin_model->badges();
        $dhead['badges']=$nbadge->num;

        $this->load->view('template/header',$dhead);
        $this->load->view('reporte');
        $this->load->view('template/footer');


    }


    public function gen_report(){

        $fechai = $this->input->post('fechai');
        $fechaf = $this->input->post('fechaf');
        $data['inicio'] =$fechai;
        $data['fin'] = $fechaf;
        $data['report'] = $this->admin_model->reserva_report($fechai,$fechaf);
        // Load all views as normal
        $this->load->view('report/report_reservas',$data);
        // Get output html
        $html = $this->output->get_output();

        // Load library
        $this->load->library('dompdf_gen');

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('letter','portrait');
        $this->dompdf->render();
        $this->dompdf->stream("reservas.pdf");
    }



    public function gen_report_canceladas(){

        $fechai = $this->input->post('fechai');
        $fechaf = $this->input->post('fechaf');
        $data['inicio'] =$fechai;
        $data['fin'] = $fechaf;
        $data['report'] = $this->admin_model->reserva_report_canceladas($fechai,$fechaf);
        // Load all views as normal
        $this->load->view('report/report_reservas_canceladas',$data);
        // Get output html
        $html = $this->output->get_output();

        // Load library
        $this->load->library('dompdf_gen');

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('letter','portrait');
        $this->dompdf->render();
        $this->dompdf->stream("reservas_canceladas.pdf");
    }

    public function gen_report_equipo(){


        $data['report'] = $this->admin_model->ver_equipo();
        // Load all views as normal
        $this->load->view('report/report_equipo',$data);
        // Get output html
        $html = $this->output->get_output();

        // Load library
        $this->load->library('dompdf_gen');

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('letter','landscape');
        $this->dompdf->render();
        $this->dompdf->stream("equipo.pdf");
    }

    public function imprimir_report($id){
        $nbadge=$this->admin_model->badges();
        $dhead['badges']=$nbadge->num;

        $dato = $this->admin_model->reserva_id($id);
        $data['id'] =$dato->id;
        $data['usuario']=$dato->usuario;
        $data['equipo'] = $dato->equipo;
        $data['hora'] = $dato->horario;
        $data['fecha']=$dato->fecha_reserva;

        $this->load->view('template/header',$dhead);
        $this->load->view('resumen',$data);
        $this->load->view('template/footer');

    }

    public function gen_report_alumno($id){
        $dato = $this->admin_model->reserva_id($id);



        $data['id'] =$dato->id;
        $data['carnet']=$dato->usuario;
        $data['equipo'] = $dato->equipo;
        $data['horario'] = $dato->horario;
        $data['fecha']=$dato->fecha_reserva;

        // Load all views as normal
        $this->load->view('report/comprobante',$data);
        // Get output html
    $html = $this->output->get_output();

        // Load library
        $this->load->library('dompdf_gen');

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('letter','portrait');
        $this->dompdf->render();
        $this->dompdf->stream("comprobante.pdf");
    }



}
