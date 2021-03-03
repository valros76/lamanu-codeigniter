<?php
$config = array(
   'create_patients' => array(
      array(
         'field' => 'lastname',
         'label' => 'nom de famille',
         'rules' => 'required|min_length[1]|max_length[25]|regex_match[/^[A-Za-z\à\á\â\ä\ç\è\é\ê\ë\ì\í\î\ï\ñ\ò\ó\ô\ö\ù\ú\û\ü\-\ \']+$/]'
      ),
      array(
         'field' => 'firstname',
         'label' => 'prénom',
         'rules' => 'required|min_length[1]|max_length[25]|regex_match[/^[A-Za-z\à\á\â\ä\ç\è\é\ê\ë\ì\í\î\ï\ñ\ò\ó\ô\ö\ù\ú\û\ü\-\ \']+$/]'
      ),
      array(
         'field' => 'birthdate',
         'label' => 'date de naissance',
         'rules' => 'required|trim|alpha_dash|regex_match[/^\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}$/]'
      ),
      array(
         'field' => 'phone',
         'label' => 'numéro de téléphone',
         'rules' => 'trim|required|regex_match[/^(0|\+33)(\d{9,10})$/]'
      )
   ),
   'create_appointments' => array(
      array(
         'field' => 'dateHour',
         'label' => 'date et heure',
         'rules' => 'required|trim|is_unique[appointments.dateHour]|regex_match[/^\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}[\T]\d{2}[\:]\d{2}$/]'
      ),
      array(
         'field' => 'idPatients',
         'label' => 'id du patient',
         'rules' => 'required|integer|greater_than[0]'
      )
   ),
   'insert_patient_mail' => array(
      array(
         'field' => 'mail',
         'label' => 'adresse email',
         'rules' => 'required|is_unique[patients.mail]|min_length[3]|max_length[100]|valid_email|regex_match[/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,13}$/]'
      )
   ),
   'update_patient_mail' => array(
      array(
         'field' => 'mail',
         'label' => 'adresse email',
         'rules' => 'required|min_length[3]|max_length[100]|valid_email|regex_match[/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,13}$/]'
      )
   ),
   'delete_appointment' => array(
      array(
         'field' => 'appointment_id',
         'label' => 'id du rendez-vous',
         'rules' => 'required|integer|greater_than[0]'
      )
      ),
      'delete_patient' => array(
         array(
            'field' => 'patient_id',
            'label' => 'id du patient',
            'rules' => 'required|integer|greater_than[0]'
         )
      )
);
