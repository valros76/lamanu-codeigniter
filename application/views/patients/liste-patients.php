<section class="main-sections">
   <div class="search-container">
      <?php echo form_open('patients/search'); ?>
      <label for="idPatients">Sélection du patient :</label>
      <input list="patients-id" id="idPatients" name="idPatients" required />
      <datalist id="patients-id">
         <?php
         foreach ($patients as $patient_item) :; ?>
            <option value="<?= $patient_item['id']; ?>"><?= $patient_item['lastname'] . ' ' . $patient_item['firstname'] . ' - ' . $patient_item['birthdate']; ?></option>
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
   <a href="<?= base_url('patients/create'); ?>">Créer un nouveau patient</a>
   <div class="patients-view">
      <?php foreach ($patients as $patients_item) :; ?>
         <article class="patients-articles">
            <h3>
               <?= $patients_item['id']; ?> - <?= $patients_item['lastname'] . ' ' . $patients_item['firstname']; ?>
            </h3>
            <div class="main">
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
            </div>
            <p>
               <a href="<?= site_url('patients/profilPatient/' . $patients_item['id']); ?>">
                  Voir la fiche
               </a>
            </p>
         </article>
      <?php
      endforeach;; ?>
   </div>
</section>
<table class="pagination-table">
   <tr>
      <?php
      if ($actual_page <= $max_pages) {
         if ($actual_page === 0) {
            $actual_page = 1;
         }
         if ($max_pages === 1) {
            $max_pages = 0;
         }
         echo '<td class="pagination-index-start"><a href="' . base_url('patients/listePatients') . '?page=0" class="pagination-button pagination-start" data-page="0">First</a></td>';
         for ($i = $actual_page - $actual_page; $i <= $max_pages; $i++) {
            if ($i <= (($actual_page + 5) - 1)) {
               echo '<td><a href="' . base_url('patients/listePatients') . '?page=' . $i . '" class="pagination-button" data-page="' . $i . '">' . ($i + 1) . '</a></td>';
            }
         }
         echo '<td class="pagination-index-end"><a href="' . base_url('patients/listePatients?page=') . '' . $max_pages . '" class="pagination-button pagination-end" data-page="' . $max_pages . '">Last</a></td>';
      } else {
         if ($max_pages === 1) {
            $max_pages = 0;
         }
         echo '<td class="pagination-index-start"><a href="' . base_url('patients/listePatients') . '?page=0" class="pagination-button pagination-start" data-page="0">First</a></td>';
         echo '<td class="pagination-index-end"><a href="' . base_url('patients/listePatients') . '?page=' . $max_pages . '" class="pagination-button pagination-end" data-page="' . $max_pages . '">Last</a></td>';
      }; ?>
   </tr>
</table>