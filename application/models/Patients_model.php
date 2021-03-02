<?php
class Patients_model extends CI_Model
{
   public function __construct()
   {
      $this->load->database();
   }

   public function get_patients($slug = FALSE)
   {
      if ($slug === FALSE) {
         $query = $this->db->get('patients');
         return $query->result_array();
      }
      $query = $this->db->get_where('patients', array('id' => $slug));
      return $query->row_array();
   }

   public function exist_patient_email($email,$id)
   {
      return $this->db->query('SELECT `id` FROM `patients` WHERE `mail` = '.$this->db->escape($email) .' AND `id` = '.$id)->num_rows();
   }

   public function set_patients()
   {
      $data = array(
         'lastname' => $this->input->post('lastname'),
         'firstname' => $this->input->post('firstname'),
         'birthdate' => $this->input->post('birthdate'),
         'phone' => $this->input->post('phone'),
         'mail' => $this->input->post('mail'),
      );

      return $this->db->insert('patients', $data);
   }

   public function update_patients()
   {
      $data = array(
         'lastname' => $this->input->post('lastname'),
         'firstname' => $this->input->post('firstname'),
         'birthdate' => $this->input->post('birthdate'),
         'phone' => $this->input->post('phone'),
         'mail' => $this->input->post('mail'),
      );
      $where = 'id = ' . $this->input->post('id');
      $this->db->update('patients', $data, $where);
   }
}
