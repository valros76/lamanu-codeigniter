<section class="main-sections">
<h2 class="main-sections-title"><?= $title ;?></h2>
<a href="<?= base_url('patients/create') ;?>">Créer un nouveau patient</a>
<?php foreach($patients as $patients_item): ;?>
<article class="main-articles">
<h3>
   <?= $patients_item['id'] ;?> - <?= $patients_item['lastname'].' '.$patients_item['firstname'] ;?>
</h3>
<div class="main">
   <p><?= $patients_item['birthdate'] ;?></p>
   <p><?= $patients_item['phone'] ;?></p>
   <p><?= $patients_item['mail'] ;?></p>
   <p><?php 
      foreach($appointments as $appointment_item){
         if($appointment_item['idPatients'] === $patients_item['id']){
            echo '<p>Rendez-vous le : '.$appointment_item['dateHour'].'</p>';
         }
      }
   ;?></p>
</div>
<p>
   <a href="<?= site_url('patients/profilPatient/'.$patients_item['id']) ;?>">
   Voir la fiche
</a>
</p>
</article>
<?php endforeach ;?>
</section>