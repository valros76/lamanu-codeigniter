<section class="main-sections">
   <h2 class="main-sections-title">
      Formulaire d'ajout de rendez-vous
   </h2>
   <article class="form-articles">

      <?php echo form_open('appointments/create'); ?>
      <label for="dateHour">Date et heure</label>
      <input type="datetime-local" name="dateHour" required />
      <?= form_error('dateHour', '<div class="form-errors">','</div>'); ?>
      
      <label for="idPatients">Sélection du patient :</label>
      <input list="patients-id" id="idPatients" name="idPatients" />

      <datalist id="patients-id">
      <?php
         foreach ($all_patients as $patient_item) :; ?>
            <option value="<?= $patient_item['id']; ?>"><?= $patient_item['lastname'] . ' ' . $patient_item['firstname'] . ' - ' . $patient_item['birthdate']; ?></option>
         <?php
         endforeach;; ?>
      </datalist>
      <?= form_error('idPatients', '<div class="form-errors">','</div>'); ?>

      <input type="submit" name="submit" value="Créer un rendez-vous" />

      </form>
   </article>
</section>