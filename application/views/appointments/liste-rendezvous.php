<section class="main-sections">
   <div class="search-container">
      <?php echo form_open('appointments/search'); ?>
      <label for="idPatients">Sélection du rendez-vous :</label>
      <input list="patients-id" id="idPatients" name="idPatients" required />
      <datalist id="patients-id">
         <?php
         foreach ($all_appointments as $appointments_item) :; ?>
            <option value="<?= $appointments_item['id']; ?>">
               <?= $appointments_item['dateHour'] . ' - '; ?>
               <?php
               foreach ($all_patients as $patient) {
                  if ($patient['id'] === $appointments_item['idPatients']) {; ?>
                     <p>
                        <?= $patient['lastname'] . ' ' . $patient['firstname'] . ' - ' . $patient['birthdate']; ?>
                     </p>
               <?php
                  }
               }; ?>
            </option>
         <?php
         endforeach;; ?>
      </datalist>
      <?= form_error('idPatients', '<div class="form-errors">', '</div>'); ?>
      <input type="submit" name="submit" value="Rechercher" />
      </form>
   </div>
</section>
<section class="main-sections">
   <h2 class="main-sections-title"><?= $title; ?></h2>
   <a href="<?= base_url('appointments/create'); ?>">Créer un rendez-vous</a>
   <div class="patients-view">
   <?php foreach ($appointments as $appointments_item) :; ?>
      <article class="patients-articles">
         <h3>
            <?= $appointments_item['id']; ?>
         </h3>
         <div class="main">
            <p><?= $appointments_item['dateHour']; ?></p>
            <?php
            foreach ($all_patients as $patient) {
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
   </div>
</section>
<table class="pagination-table">
   <tr>
      <?php
      if ($actual_page <= $max_pages) {
         if ($max_pages === 1) {
            $max_pages = 0;
         }
         echo '<td class="pagination-index-start"><a href="' . base_url('appointments/listAppointments') . '?page=0" class="pagination-button pagination-start" data-page="0">First</a></td>';
         for ($i = $actual_page - $actual_page; $i <= $max_pages; $i++) {
            if ($i <= (($actual_page + 5) - 1)) {
               if($i === $actual_page){
               echo '<td><a href="' . base_url('appointments/listAppointments') . '?page=' . $i . '" class="pagination-button pagination-active" data-page="' . $i . '">' . ($i + 1) . '</a></td>';
               }else{
               echo '<td><a href="' . base_url('appointments/listAppointments') . '?page=' . $i . '" class="pagination-button" data-page="' . $i . '">' . ($i + 1) . '</a></td>';
               }
            }
         }
         echo '<td class="pagination-index-end"><a href="' . base_url('appointments/listAppointments?page=') . '' . $max_pages . '" class="pagination-button pagination-end" data-page="' . $max_pages . '">Last</a></td>';
      } else {
         if ($max_pages === 1) {
            $max_pages = 0;
         }
         echo '<td class="pagination-index-start"><a href="' . base_url('appointments/listAppointments') . '?page=0" class="pagination-button pagination-start" data-page="0">First</a></td>';
         echo '<td class="pagination-index-end"><a href="' . base_url('appointments/listAppointments') . '?page=' . $max_pages . '" class="pagination-button pagination-end" data-page="' . $max_pages . '">Last</a></td>';
      }; ?>
   </tr>
</table>