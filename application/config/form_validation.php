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
         'rules' => 'trim|required|min_length[10]|regex_match[/^(0|\+33)(\d{9,10})$/]'
      ),
      array(
         'field' => 'mail',
         'label' => 'adresse email',
         'rules' => 'required|is_unique[patients.mail]|min_length[3]|max_length[100]|valid_email|regex_match[/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,13}$/]'
      )
   ),
);
