<section class="main-sections">
   <h2 class="main-sections-title">
      Formulaire d'ajout de patient
   </h2>
   <article class="form-articles">
      <?= validation_errors(); ?>

      <?php echo form_open('patients/modif'); ?>
      <label for="lastname">Nom de famille</label>
      <input type="text" name="lastname" maxlength="25" value="<?= $patients_item['lastname'] ;?>" required />
      <?= form_error('lastname', '<div class="form-errors">,</div>'); ?>
      <label for="firstname">Prénom</label>
      <input type="text" name="firstname" maxlength="25" value="<?= $patients_item['firstname'] ;?>" required />
      <?= form_error('firstname', '<div class="form-errors">,</div>'); ?>
      <label for="birthdate">Date de naissance</label>
      <input type="date" name="birthdate" max="<?= $today->format('Y-m-d'); ?>" value="<?= $patients_item['birthdate'] ;?>" required />
      <?= form_error('date', '<div class="form-errors">,</div>'); ?>
      <label for="phone">Numéro de téléphone</label>
      <input type="tel" name="phone" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}|(0|\+33)[1-9]( *[0-9]{2}){4}" maxlength="12"  value="<?= $patients_item['phone'] ;?>" required />
      <?= form_error('phone', '<div class="form-errors">,</div>'); ?>
      <label for="mail">Adresse email</label>
      <input type="email" placeholder="first@mail.fr" name="mail" id="mail" maxlength="100" value="<?= $patients_item['mail'] ;?>" required />
      <?= form_error('mail', '<div class="form-errors">,</div>'); ?>
      <input type="hidden" value="<?= $patients_item['id'] ;?>" name="id"/>

      <input type="submit" name="submit" value="Modifier le patient" />

      </form>
   </article>
</section>