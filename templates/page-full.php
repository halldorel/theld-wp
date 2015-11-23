<?php
/*
Template Name: Full Width
*/
get_header(); ?>
<div class="row">
	<header class="small-12 columns">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>
	<div class="small-12 large-6 columns" role="main">

	<?php /* Start loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>

	</div>
  <aside class="small-12 large-6 columns"> 
    <?php 
    $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()) , 'large');
    $large_url = $url[0];
    ?>
    <img src="<?php echo $large_url; ?>" alt="<?php the_title(); ?> kápumynd">
  </aside>

	<?php endwhile; // End the loop ?>
</div>

<?php get_footer(); ?>
