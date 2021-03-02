<section class="main-sections">
   <h2 class="main-sections-title">
      Formulaire d'ajout de patient
   </h2>
   <article class="form-articles">

      <?php echo form_open('patients/create'); ?>
      <label for="lastname">Nom de famille</label>
      <input type="text" name="lastname" maxlength="25" required />
      <?= form_error('lastname', '<div class="form-errors">','</div>'); ?>
      <label for="firstname">Prénom</label>
      <input type="text" name="firstname" maxlength="25" required />
      <?= form_error('firstname', '<div class="form-errors">','</div>'); ?>
      <label for="birthdate">Date de naissance</label>
      <input type="date" name="birthdate" max="<?= $today->format('Y-m-d'); ?>" required />
      <?= form_error('date', '<div class="form-errors">','</div>'); ?>
      <label for="phone">Numéro de téléphone</label>
      <input type="tel" name="phone" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}|(0|\+33)[1-9]( *[0-9]{2}){4}" maxlength="12" required />
      <?= form_error('phone', '<div class="form-errors">','</div>'); ?>
      <label for="mail">Adresse email</label>
      <input type="email" placeholder="first@mail.fr" name="mail" id="mail" maxlength="100" required />
      <?= form_error('mail', '<div class="form-errors">','</div>'); ?>

      <input type="submit" name="submit" value="Créer un patient" />

      </form>
   </article>
</section>