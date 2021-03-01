<h2><?php echo $title ;?></h2>

<?php echo validation_errors() ;?>

<?php echo form_open('news/create') ;?>

<label for="title">Titre</label>
<input type="text" name="title"/><br/>

<label for="text">Contenu</label>
<textarea name="text"></textarea><br/>

<input type="submit" name="submit" value="Créer une nouvelle news">
</form>
<a href="<?php echo base_url('news') ;?>">Retourner sur les news</a>