<section class="main-sections">
   <article class="main-articles">
      <h2>ID : <?= $appointments_item['id']; ?></h2>
      <p>Date et heure : <?= $appointments_item['dateHour']; ?></p>
      <p>Id du patient : <?= $appointments_item['idPatients']; ?></p>
      <?php echo form_open('appointments/delete'); ?>
      <input type="hidden" value="<?= $appointments_item['id']; ?>" name="appointment_id" />
      <input type="submit" value="Supprimer" name="delete_appointment" />
      <?= form_error('appointment_id', '<div class="form-errors">', '</div>'); ?>
      </form>
      <p><a href="<?= base_url('appointments/modifAppointments/' . $appointments_item['id']); ?>">Modifier le rendez-vous</a></p>
      <p><a href="<?= base_url('appointments/listAppointments'); ?>">Retouner sur la liste des rendez-vous</a></p>
   </article>
</section>