<section class="main-sections">
   <article class="main-articles">
      <h2><?= $patients_item['id'] . ' - ' . $patients_item['lastname'] . ' ' . $patients_item['firstname']; ?></h2>
      <p><?= $patients_item['birthdate']; ?></p>
      <p><?= $patients_item['phone']; ?></p>
      <p><?= $patients_item['mail']; ?></p>
      <p><?php
         foreach ($appointments as $appointment_item) {
            if ($appointment_item['idPatients'] === $patients_item['id']) {
               echo '<p>Rendez-vous le : ' . $appointment_item['dateHour'] . '</p>';
            }
         }; ?></p>
      <p>
         <?php echo form_open('patients/delete'); ?>
         <input type="hidden" value="<?= $patients_item['id']; ?>" name="patient_id" />
         <input type="submit" value="Supprimer" name="delete_patient" />
         <?= form_error('patient_id', '<div class="form-errors">', '</div>'); ?>
         </form>
      </p>
      <p><a href="<?= base_url('patients/modifPatient/' . $patients_item['id']); ?>">Modifier le patient</a></p>
      <p><a href="<?= base_url('patients/listePatients'); ?>">Retouner sur la liste des patients</a></p>
   </article>
</section>