<h2 class='post-title'>
  <a href='<?php the_permalink() ?>'><?php the_title() ?></a>
</h2>

<div class='post-meta'>
  Published: <?php the_time( "Y/m/d" ) ?> by <?php the_author() ?>
</div>

<div class="content">
	<?php the_content() ?>
</div>

<div class="featured-image">
  <?php the_post_thumbnail() ?>
</div>
