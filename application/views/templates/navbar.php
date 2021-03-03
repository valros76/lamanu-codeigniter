<nav class="main-nav">
   <i id="main-menu-wrapper">▼</i>
   <ul class="main-menu">
      <li class="main-menu-items">
         <a href="<?= base_url('/index'); ?>" class="main-menu-links">
            Index
         </a>
      </li>
      <li class="main-menu-items">
         <a href="<?= base_url('patients/create'); ?>" class="main-menu-links">
            Ajouter un patient
         </a>
      </li>
      <li class="main-menu-items">
         <a href="<?= base_url('appointments/create'); ?>" class="main-menu-links">
            Ajouter un rendez-vous
         </a>
      </li>
      <li class="main-menu-items">
         <a href="<?= base_url('patients/create_with_appointment'); ?>" class="main-menu-links">
            Ajouter Patient + RDV
         </a>
      </li>
      <li class="main-menu-items">
         <a href="<?= base_url('patients/listePatients'); ?>" class="main-menu-links">
            Liste des patients
         </a>
      </li>
      <li class="main-menu-items">
         <a href="<?= base_url('appointments/listAppointments'); ?>" class="main-menu-links">
            Liste des rendez-vous
         </a>
      </li>
      <!-- <li class="main-menu-items">
         <a href="<?= '/about'; ?>" class="main-menu-links">
            About
         </a>
      </li>
      <li class="main-menu-items">
         <a href="<?= '/news'; ?>" class="main-menu-links">
            Voir les articles
         </a>
      </li>
      <li class="main-menu-items">
         <a href="<?= '/news/create'; ?>" class="main-menu-links">
            Créer un article
         </a>
      </li> -->
   </ul>
</nav>