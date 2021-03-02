<section class="main-sections">
<article class="main-articles">
<h2>ID : <?= $appointments_item['id'] ;?></h2>
<p>Date et heure : <?= $appointments_item['dateHour'] ;?></p>
<p>Id du patient : <?= $appointments_item['idPatients'] ;?></p>
<p><a href="<?= base_url('appointments/modifAppointments/'.$appointments_item['id']);?>">Modifier le rendez-vous</a></p>
<p><a href="<?= base_url('appointments/listAppointments');?>">Retouner sur la liste des rendez-vous</a></p>
</article>
</section>
