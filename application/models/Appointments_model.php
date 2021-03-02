<?php
class Appointments_model extends CI_Model{
   public function __construct(){
      $this->load->database();
   }

   public function get_appointments($slug = FALSE){
      if($slug === FALSE){
         $query = $this->db->get('appointments');
         return $query->result_array();
      }
      $query = $this->db->get_where('appointments', array('id' => $slug));
      return $query->row_array();
   }

   public function set_appointments(){
      $data = array(
         'dateHour' => $this->input->post('dateHour'),
         'idPatients' => $this->input->post('idPatients')
      );

      return $this->db->insert('appointments', $data);
   }

   public function update_appointments(){
      $data = array(
         'dateHour' => $this->input->post('dateHour'),
         'idPatients' => $this->input->post('idPatients')
      );
      $where = 'id = '.$this->input->post('id');
      $this->db->update('appointments', $data, $where);
   }
}