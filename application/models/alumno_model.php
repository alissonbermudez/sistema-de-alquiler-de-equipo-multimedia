
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Alumno_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function reserva_id($id){
        $this->db->select('*');
        $this->db->from('reservasall');
        $this->db->where('usuario',$id);
        $this->db->where('estado','Reservado');



        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;

    }

    public function horario(){
        $this->db->select('*');
        $this->db->from('horarios');
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
            $this->db->where('estado',1);
            $this->db->where_not_in('idequipo',$idquery);
            $consulta = $this->db->get();
            $resultado = $consulta -> result();
        }else{
            $this->db->select('*');
            $this->db->from('equipo');
            $this->db->where('estado',1);

            $consulta = $this->db->get();
            $resultado = $consulta -> result();
        }

        return $resultado;

    }

    public function obtenerhora($id){
        $this->db->select('horario');
        $this->db->from('horarios');
        $this->db->where('id',$id);
        $consulta = $this->db->get();
        $resultado = $consulta -> row();
        return $resultado;
    }

    public function guardar_reserva($datos){

        $query=$this->db->insert('reservas', $datos);

        return $query;

    }

    public function cambiar_estado($id,$data){

        $this->db->where('id', $id);
        $query = $this->db->update('reservas', $data);
        return $query;
    }





}