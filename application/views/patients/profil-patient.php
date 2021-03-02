<section class="main-sections">
<article class="main-articles">
<h2><?= $patients_item['id'].' - '.$patients_item['lastname'].' '.$patients_item['firstname'] ;?></h2>
<p><?= $patients_item['birthdate'] ;?></p>
<p><?= $patients_item['phone'] ;?></p>
<p><?= $patients_item['mail'] ;?></p>
<p><a href="<?= base_url('patients/listePatients');?>">Retouner sur la liste des patients</a></p>
</article>
</section>
