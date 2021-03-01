<section class="main-sections">
<h2 class="main-sections-title"><?php echo $title ;?></h2>
<a href="<?php echo base_url('news/create') ;?>">Créer un article</a>
<?php foreach($news as $news_item): ;?>
<article class="main-articles">
<h3>
   <?php echo $news_item['title'] ;?>
</h3>
<div class="main">
   <?php echo $news_item['text'] ;?>
</div>
<p>
   <a href="<?php echo site_url('news/'.$news_item['slug']) ;?>">
   Voir l'article
</a>
</p>
</article>
<?php endforeach ;?>
</section>