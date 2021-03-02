<section class="main-sections">
   <h2 class="main-sections-title">
      Formulaire d'ajout de patient
   </h2>
   <article class="form-articles">
      <?= validation_errors(); ?>

      <?php echo form_open('patients/create'); ?>
      <label for="lastname">Nom de famille</label>
      <input type="text" name="lastname" maxlength="25" required /><br />
      <label for="firstname">Prénom</label>
      <input type="text" name="firstname" maxlength="25" required /><br />
      <label for="birthdate">Date de naissance</label>
      <input type="date" name="birthdate" max="<?= $today->format('Y-m-d'); ?>" required /><br />
      <label for="phone">Numéro de téléphone</label>
      <input type="tel" name="phone" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}|(0|\+33)[1-9]( *[0-9]{2}){4}" maxlength="12" required /><br />
      <label for="mail">Adresse email</label>
      <input type="email" placeholder="first@mail.fr" name="mail" id="mail" maxlength="100" required />

      <input type="submit" name="submit" value="Créer un patient" />

      </form>
   </article>
</section>