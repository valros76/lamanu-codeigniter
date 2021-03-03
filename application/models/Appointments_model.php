<?php
class Appointments_model extends CI_Model{
   public function __construct(){
      $this->load->database();
   }

   public function get_appointments($slug = FALSE, $limit = 5, $offset = 0){
      if($slug === FALSE){
         $query = $this->db->get('appointments', $limit, $offset);
         return $query->result_array();
      }
      $query = $this->db->get_where('appointments', array('id' => $slug), $limit ,$offset);
      return $query->row_array();
   }

   public function count_appointments(){
      return $this->db->count_all('appointments');
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

   public function delete_appointment($id = NULL){
      if($id != NULL){
         $this->db->delete('appointments', array('id' => $id));
      }
   }

   public function search_appointments($id){
      $this->db->get_where('appointments', array('id' => $id));
      if($this->db->count_all_results() != 0){
         return true;
      }else{
         return false;
      }
   }
}