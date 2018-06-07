

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Colecturia_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function reserva_sin_pagar(){
        $this->db->select('*');
        $this->db->from('reservas_sin_pagar');
        $this->db->where('pagado','false');



        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function cambiar_estado($id,$data){

        $this->db->where('id', $id);
        $query = $this->db->update('reservas', $data);
        return $query;
    }

    public function pagados_report($inicio,$fin)
    {
        $this->db->select('*');
        $this->db->from('reservas_sin_pagar');
        $this->db->where('pagado','true');
        $this->db->where('fecha_reserva >=', $inicio);
        $this->db->where('fecha_reserva <=', $fin);
        $this->db->order_by('fecha_reserva', 'asc');


        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }





}