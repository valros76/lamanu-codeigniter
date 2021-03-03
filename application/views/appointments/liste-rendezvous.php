<section class="main-sections">
   <h2 class="main-sections-title"><?= $title; ?></h2>
   <a href="<?= base_url('appointments/create'); ?>">Créer un rendez-vous</a>
   <?php foreach ($appointments as $appointments_item) :; ?>
      <article class="main-articles">
         <h3>
            <?= $appointments_item['id']; ?>
         </h3>
         <div class="main">
            <p><?= $appointments_item['dateHour']; ?></p>
            <?php
            foreach ($patients as $patient) {
               if ($patient['id'] === $appointments_item['idPatients']) {; ?>
                  <p>
                     <?= $patient['lastname'] . ' ' . $patient['firstname'] . ' - ' . $patient['birthdate']; ?>
                     <?php echo form_open('appointments/delete'); ?>
                     <input type="hidden" value="<?= $appointments_item['id']; ?>" name="appointment_id" />
                     <input type="submit" value="Supprimer" name="delete_appointment" />
                     <?= form_error('appointment_id', '<div class="form-errors">', '</div>'); ?>
                     </form>
                  </p>
            <?php
               }
            }; ?>
         </div>
         <p>
            <a href="<?= site_url('appointments/' . $appointments_item['id']); ?>">
               Voir la fiche
            </a>
      </article>
   <?php endforeach; ?>
</section>