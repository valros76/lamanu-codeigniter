<?php
class Appointments extends CI_Controller{
   public function __construct(){
      parent::__construct();
      $this->load->model('appointments_model');
      $this->load->model('patients_model');
   }

   public function index(){
      $data['appointments'] = $this->appointments_model->get_appointments();
      $data['title'] = 'Archive des rendez-vous';

      $data['patients'] = $this->patients_model->get_patients();
      $this->load->view('templates/header', $data);
      $this->load->view('appointments/liste-rendezvous', $data);
      $this->load->view('templates/footer', $data);
   }

   public function view($slug = NULL){
      $data['appointments_item'] = $this->appointments_model->get_appointments($slug);
      if(empty($data['appointments_item'])){
         show_404();
      }
      $data['title'] = $data['appointments_item']['id'];

      $data['patients'] = $this->patients_model->get_patients();
      $this->load->view('templates/header',$data);
      $this->load->view('appointments/rendezvous', $data);
      $this->load->view('templates/footer',$data);
   }

   public function listAppointments(){
      $nb_appointments = $this->appointments_model->count_appointments();
      $limit_by_page = (int) 5;
      $offset_page = 0;
      $max_pages = (int) ceil(round(($nb_appointments / $limit_by_page), 0));
      /*$actual_page = $_GET['page'] > 0 ? (int) abs(strip_tags(htmlspecialchars($_GET['page']))) - 1 : (int) abs(strip_tags(htmlspecialchars($_GET['page']))); */
      if(!empty($_GET['page']) && (int) $_GET['page'] >= 1 && (int) $_GET['page'] <= $max_pages){
         $actual_page = (int) abs(strip_tags(htmlspecialchars($_GET['page'])));
         $offset_page = ($limit_by_page*$actual_page);
      }else if(!empty($_GET['page']) && (int) $_GET['page'] >= 1 && (int) $_GET['page'] > $max_pages){
         $actual_page = (int) abs(strip_tags(htmlspecialchars($_GET['page'])));
         $offset_page = ($max_pages);
      }else{
         $actual_page = 0;
      }
      $data['actual_page'] = $actual_page;
      $data['max_pages'] = $max_pages;
      $data['appointments'] = $this->appointments_model->get_appointments(FALSE, $limit_by_page, $offset_page);
      $data['all_appointments'] = $this->appointments_model->get_all_appointments();
      $data['title'] = 'Liste des rendez-vous';

      $data['patients'] = $this->patients_model->get_patients();
      $data['all_patients'] = $this->patients_model->get_all_patients();
      $this->load->view('templates/header', $data);
      $this->load->view('appointments/liste-rendezvous', $data);
      $this->load->view('templates/footer', $data);
   }

   public function create(){
      if($this->form_validation->run('create_appointments') === FALSE){
         $data['title'] = 'Créer un nouveau rendez-vous';
         setlocale(LC_ALL, 'fr_FR');
         $data['today'] = new DateTime();
         $data['patients'] = $this->patients_model->get_patients();
         $data['all_patients'] = $this->patients_model->get_all_patients();
         $this->load->view('templates/header', $data);
         $this->load->view('appointments/ajout-rendezvous', $data);
         $this->load->view('templates/footer');
      }else{
         $this->appointments_model->set_appointments();
         $data['title'] = 'Créer un nouveau rendez-vous';
         $this->load->view('templates/header',$data);
         $this->load->view('appointments/success');
         $this->load->view('templates/footer');
      }
   }

   public function modifAppointments($slug = NULL){
      $data['appointments_item'] = $this->appointments_model->get_appointments($slug);

      if(empty($data['appointments_item'])){
         show_404();
      }
      $data['title'] = 'Modifier un rendez-vous';
      setlocale(LC_ALL, 'fr_FR');
      $data['today'] = new DateTime();

      $data['patients'] = $this->patients_model->get_patients();
      $this->load->view('templates/header', $data);
      $this->load->view('appointments/modif-appointments', $data);
      $this->load->view('templates/footer', $data);
   }

   public function modif(){
      if($this->form_validation->run('create_appointments') === FALSE){
         $data['title'] = 'Modifier un rendez-vous';
         setlocale(LC_ALL, 'fr_FR');
         $data['today'] = new DateTime();
         $data['patients'] = $this->patients_model->get_patients();
         $this->load->view('templates/header',$data);
         $this->load->view('appointments/modif-patient', $data);
         $this->load->view('templates/footer');
      }else{
         $this->appointments_model->update_patients();
         $data['title'] = 'Modifier un rendez-vous';
         $this->load->view('templates/header',$data);
         $this->load->view('appointments/success_modif');
         $this->load->view('templates/footer');
      }
   }

   public function delete(){
      if($this->form_validation->run('delete_appointment') === FALSE){
         $this->listAppointments();
      }else{
         $this->appointments_model->delete_appointment($this->input->post('appointment_id'));
         $data['title'] = 'Supprimer un rendez-vous';
         $this->load->view('templates/header',$data);
         $this->load->view('appointments/success_modif');
         $this->load->view('templates/footer');
      }
   }

   public function search(){
      if($this->form_validation->run('search_appointment') === FALSE || 
      $this->patients_model->search_patient($this->input->post('idPatients')) === false){
         $this->listAppointments();
      }else{
         $data['appointments_item'] = $this->appointments_model->get_appointments($this->input->post('idPatients'));
   
         if (empty($data['appointments_item'])) {
            show_404();
         }
         $data['title'] = $data['appointments_item']['id'];
         $data['appointments'] = $this->appointments_model->get_appointments();
         $this->load->view('templates/header', $data);
         $this->load->view('appointments/rendezvous', $data);
         $this->load->view('templates/footer', $data);
      }
   }
}