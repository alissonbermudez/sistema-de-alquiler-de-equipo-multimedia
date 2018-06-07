

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }



    public function ver_equipo(){
        $this->db->select('*');
        $this->db->from('vistaequipo');

        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
    public function ver_usuarios(){
        $this->db->select('id,perfil,username,nombre');
        $this->db->from('users');

        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function guardar_equipo($datos){

        $query=$this->db->insert('equipo', $datos);

        return $query;
    }
    public function guardar_usuario($datos){

        $query=$this->db->insert('users', $datos);

        return $query;
    }
    public function guardar_comentario($datos){

        $query=$this->db->insert('comentarios', $datos);

        return $query;
    }

    public function update_equipo($datos,$id){
        $this->db->where('idequipo', $id);


        $query=$this->db->update('equipo', $datos);

        return $query;
    }
    public function update_usuario($datos,$id){
        $this->db->where('id', $id);


        $query=$this->db->update('users', $datos);

        return $query;
    }


    public function equipo_id($id){
        $this->db->select('*');
        $this->db->from('equipo');
        $this->db->where('idequipo',$id);

        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }
    public function usuario_id($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);

        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

    public function hora($id){
        $this->db->select('horario');
        $this->db->from('horarios');
        $this->db->where('id',$id);

        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

    public function ver_comentarios($id){
        $this->db->select('*');
        $this->db->from('comentarios');
        $this->db->where('equipo',$id);

        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function reservas_dia($horario,$fecha)


    {
        $this->db->select('equipo');
        $this->db->from('reservas');
        $this->db->where('fecha_reserva',$fecha);
        $this->db->where('horario',$horario);
        $subquery = $this->db->get();
        $result = $subquery->result();

        if (count($result)>0){

            $idquery = array();

            foreach ($result as $item) {
                $idquery=$item->equipo;
            }

            $this->db->select('*');
            $this->db->from('equipo');
            $this->db->join('tipoequipo','equipo.tipo = tipoequipo.idtipo');
            $this->db->where('estado',1);
            $this->db->where_not_in('idequipo',$idquery);
            $consulta = $this->db->get();
            $resultado = $consulta -> result();
        }else{
            $this->db->select('*');
            $this->db->from('equipo');
            $this->db->join('tipoequipo','equipo.tipo = tipoequipo.idtipo');
            $this->db->where('estado',1);

            $consulta = $this->db->get();
            $resultado = $consulta -> result();
        }



       return $resultado;

    }



    public function guardar_reserva($datos){

        $query=$this->db->insert('reservas', $datos);

        return $query;

    }


    public function verificar_usuario($carnet)
    {
        $this->db->where('id', $carnet);

        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            redirect(base_url().'admin/reservas/5','refresh');
        }
    }


    public function reserva_total(){
        $this->db->select('*');
        $this->db->from('reservasall');
        $this->db->where('estado','Reservado');
        $this->db->or_where('estado','Entregado');
        $this->db->or_where('estado','Cancelado');
        $this->db->order_by('fecha_reserva','desc');



        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
    public function numreserv($fecha){
        $this->db->where('fecha_reserva',$fecha);
        $this->db->from('reservasall');
        $num = $this->db->count_all_results();



        return $num;
    }

    public function reserva_id($id){
        $this->db->select('*');
        $this->db->from('reservasall');
        $this->db->where('id',$id);



        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;

    }

    public function cambiar_estado($id,$data){

        $this->db->where('id', $id);
        $query = $this->db->update('reservas', $data);
        return $query;
    }

    public function reservas_hoy(){
        $this->db->select('*');
        $this->db->from('reservas_dia');



        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }


    public function reservas_entregadas(){
        $this->db->select('*');
        $this->db->from('reservas_ent');



        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function badges(){
        $this->db->select('*');
        $this->db->from('ncancel');

        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

    public function noprocesadas(){
        $this->db->select('*');
        $this->db->from('noprocesadas');



        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function limpiar(){

        $query = $this->db->get('limpiar()');

        if ($query==true) {
             redirect(base_url() . 'admin/mensajes/1', 'refresh');
         } else {
             redirect(base_url() . 'admin/mensajes/2', 'refresh');
         }

    }

    public function horario(){
        $this->db->select('*');
        $this->db->from('horarios');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function tipoequipo(){
        $this->db->select('*');
        $this->db->from('tipoequipo');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function reserva_report($inicio,$fin)
    {
        $this->db->select('*');
        $this->db->from('reservasall');
        $this->db->where('fecha_reserva >=', $inicio);
        $this->db->where('fecha_reserva <=', $fin);
        $this->db->order_by('fecha_reserva', 'asc');


        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function reserva_report_canceladas($inicio,$fin)
    {
        $this->db->select('*');
        $this->db->from('reservasall');
        $this->db->where('fecha_reserva >=', $inicio);
        $this->db->where('fecha_reserva <=', $fin);
        $this->db->where('estado','Cancelado');
        $this->db->order_by('fecha_reserva', 'asc');


        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

}
