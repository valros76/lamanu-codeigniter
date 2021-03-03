<?php
class Patients extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('appointments_model');
      $this->load->model('patients_model');
   }

   public function index()
   {
      $data['patients'] = $this->patients_model->get_patients();
      $data['title'] = 'Archive des patients';
      $data['appointments'] = $this->appointments_model->get_appointments();
      $this->load->view('templates/header', $data);
      $this->load->view('patients/index', $data);
      $this->load->view('templates/footer', $data);
   }

   public function listePatients()
   {
      $nb_patients = $this->patients_model->count_patients();
      $limit_by_page = (int) 5;
      $offset_page = 0;
      $max_pages = (int) ceil(round(($nb_patients / $limit_by_page), 0));
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
      $data['patients'] = $this->patients_model->get_patients(FALSE, $limit_by_page, $offset_page);
      $data['all_patients'] = $this->patients_model->get_all_patients();
      $data['title'] = 'Liste des patients';
      $data['appointments'] = $this->appointments_model->get_appointments();
      $this->load->view('templates/header', $data);
      $this->load->view('patients/liste-patients', $data);
      $this->load->view('templates/footer', $data);
   }

   public function profilPatient($slug = NULL)
   {
      $data['patients_item'] = $this->patients_model->get_patients($slug);

      if (empty($data['patients_item'])) {
         show_404();
      }
      $data['title'] = $data['patients_item']['id'];
      $data['appointments'] = $this->appointments_model->get_appointments();
      $this->load->view('templates/header', $data);
      $this->load->view('patients/profil-patient', $data);
      $this->load->view('templates/footer', $data);
   }

   public function view($slug = NULL)
   {
      $data['patients_item'] = $this->patients_model->get_patients($slug);

      if (empty($data['patients_item'])) {
         show_404();
      }
      $data['title'] = $data['patients_item']['id'];
      $data['appointments'] = $this->appointments_model->get_appointments();
      $this->load->view('templates/header', $data);
      $this->load->view('patients/profil-patient', $data);
      $this->load->view('templates/footer', $data);
   }

   public function create()
   {
      if ($this->form_validation->run('create_patients') === FALSE) {
         $data['title'] = 'Créer un nouveau patient';
         setlocale(LC_ALL, 'fr_FR');
         $data['today'] = new DateTime();
         $this->load->view('templates/header', $data);
         $this->load->view('patients/ajout-patient', $data);
         $this->load->view('templates/footer');
      } else {
         $this->patients_model->set_patients();
         $data['title'] = 'Créer un nouveau patient';
         $this->load->view('templates/header', $data);
         $this->load->view('patients/success');
         $this->load->view('templates/footer');
      }
   }



   public function modifPatient($slug = NULL)
   {
      $data['patients_item'] = $this->patients_model->get_patients($slug);

      if (empty($data['patients_item'])) {
         show_404();
      }
      $data['title'] = 'Modifier un patient';
      setlocale(LC_ALL, 'fr_FR');
      $data['today'] = new DateTime();

      $this->load->view('templates/header', $data);
      $this->load->view('patients/modif-patient', $data);
      $this->load->view('templates/footer', $data);
   }

   public function modif()
   {
      $patient = $this->patients_model->get_patients($this->input->post('id'));
      $exists_email = (bool) $this->patients_model->exist_patient_email($patient['mail'], $patient['id']);
      if ($exists_email === TRUE && $this->form_validation->run('insert_patient_mail') === FALSE && $this->input->post('mail') === $patient['mail'] && $this->form_validation->run('create_patients') === FALSE && $this->form_validation->run('update_patient_mail') === FALSE) {
         $this->patients_model->update_patients();
         $data['title'] = 'Modifier un nouveau patient';
         $this->load->view('templates/header', $data);
         $this->load->view('patients/success_modif');
         $this->load->view('templates/footer');
      } else if ($exists_email === TRUE && $this->form_validation->run('insert_patient_mail') === FALSE && $this->input->post('mail') === $patient['mail'] && $this->form_validation->run('create_patients') === FALSE && $this->form_validation->run('insert_patient_mail') === FALSE) {
         $this->patients_model->update_patients();
         $data['title'] = 'Modifier un nouveau patient';
         $this->load->view('templates/header', $data);
         $this->load->view('patients/success_modif');
         $this->load->view('templates/footer');
      } else {
         $data['title'] = 'Modifier un patient';
         setlocale(LC_ALL, 'fr_FR');
         $data['today'] = new DateTime();
         $this->load->view('templates/header', $data);
         $this->load->view('patients/modif-patient', $data);
         $this->load->view('templates/footer');
      }
   }

   public function delete(){
      if($this->form_validation->run('delete_patient') === FALSE){
         $this->listePatients();
      }else{
         $this->patients_model->delete_patient($this->input->post('patient_id'));
         $data['title'] = 'Supprimer un patient';
         $this->load->view('templates/header',$data);
         $this->load->view('patients/success_modif');
         $this->load->view('templates/footer');
      }
   }

   public function search(){
      if($this->form_validation->run('search_patient') === FALSE || 
      $this->patients_model->search_patient($this->input->post('idPatients')) === false){
         $this->listePatients();
      }else{
         $data['patients_item'] = $this->patients_model->get_patients($this->input->post('idPatients'));
   
         if (empty($data['patients_item'])) {
            show_404();
         }
         $data['title'] = $data['patients_item']['id'];
         $data['appointments'] = $this->appointments_model->get_appointments();
         $this->load->view('templates/header', $data);
         $this->load->view('patients/profil-patient', $data);
         $this->load->view('templates/footer', $data);
      }
   }
}
