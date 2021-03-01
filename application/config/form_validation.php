<?php
$config = array(
   'create_news' => array(
      array(
         'field' => 'title',
         'label' => 'Titre',
         'rules' => 'required|min_length[3]|is_unique[news.title]'
      ),
      array(
         'field' => 'text',
         'label' => 'Contenu',
         'rules' => 'required|min_length[3]|max_length[5000]'
      )
   ),
);
