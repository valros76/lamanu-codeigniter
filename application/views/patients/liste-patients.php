<section class="main-sections">
<div class="search-container">
      <?php echo form_open('patients/search'); ?>
      <label for="idPatients">Sélection du patient :</label>
      <input list="patients-id" id="idPatients" name="idPatients" required/>
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
   <?php foreach ($patients as $patients_item) :; ?>
      <article class="main-articles">
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
   <?php endforeach; ?>
</section>