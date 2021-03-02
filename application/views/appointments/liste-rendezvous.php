<section class="main-sections">
<h2 class="main-sections-title"><?= $title ;?></h2>
<a href="<?= base_url('appointments/create') ;?>">Créer un rendez-vous</a>
<?php foreach($appointments as $appointments_item): ;?>
<article class="main-articles">
<h3>
   <?= $appointments_item['id'] ;?>
</h3>
<div class="main">
   <p><?= $appointments_item['dateHour'] ;?></p>
   <p>
      <?php
         foreach($patients as $patient){
            if($patient['id'] === $appointments_item['idPatients']){
               echo $patient['lastname'].' '.$patient['firstname'].' - '.$patient['birthdate'];
            }
         }
      ;?>
   </p>
</div>
<p>
   <a href="<?= site_url('appointments/'.$appointments_item['id']) ;?>">
   Voir la fiche
</a>
</p>
</article>
<?php endforeach ;?>
</section>