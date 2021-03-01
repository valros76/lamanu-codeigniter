<h2><?php echo $title ;?></h2>
<a href="<?php echo base_url('news/create') ;?>">Créer un article</a>
<?php foreach($news as $news_item): ;?>
<h3><?php echo $news_item['title'] ;?></h3>
<div class="main">
   <?php echo $news_item['text'] ;?>
</div>
<p><a href="<?php echo site_url('news/'.$news_item['slug']) ;?>">Voir l'article</a></p>

<?php endforeach ;?>