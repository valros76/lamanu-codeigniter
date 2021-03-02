<?php
   if(empty($appointments_item)){
      header('Location:'.base_url('appointments/listAppointments'));
   }
;?>
<section class="main-sections">
   <h2 class="main-sections-title">
      Formulaire de modification de rendez-vous
   </h2>
   <article class="form-articles">
      <?= validation_errors(); ?>

      <?php echo form_open('appointments/modif'); ?>
      <label for="dateHour">Date et heure</label>
      <input type="datetime-local" name="dateHour" value="<?= date('Y-m-d\\TH:i', strtotime($appointments_item['dateHour'])) ;?>" required />
      <?= form_error('dateHour', '<div class="form-errors">','</div>'); ?>
      <label for="idPatients">Sélection du patient :</label>
      <input list="patients-id" id="idPatients" name="idPatients" value="<?= $appointments_item['idPatients'];?>"/>

      <datalist id="patients-id">
      <?php
         foreach ($patients as $patient_item) :; ?>
            <option value="<?= $patient_item['id']; ?>"><?= $patient_item['lastname'] . ' ' . $patient_item['firstname'] . ' - ' . $patient_item['birthdate']; ?></option>
         <?php
         endforeach;; ?>
      </datalist>
      <?= form_error('idPatients', '<div class="form-errors">,</div>'); ?>
      <input type="hidden" value="<?= $appointments_item['id'] ;?>" name="id"/>

      <input type="submit" name="submit" value="Modifier le rendez-vous" />

      </form>
   </article>
</section>