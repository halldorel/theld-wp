<?php
/*
Template Name: Yfirlitssíða
*/
get_header(); ?>
<div class="row">
	<div class="small-12 large-12 columns" role="main">

	<?php /* Start loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title hide"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
        <?php the_content(); ?>
      
      <ul class="overview-grid">
        <?php
        $child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' ORDER BY menu_order", 'OBJECT');    ?>
          <?php if ( $child_pages ) : foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild ); ?> 

          <li>
            <a href="<?php echo  get_permalink($pageChild->ID); ?>" rel="bookmark" title="<?php echo $pageChild->post_title; ?>">
            <?php echo $pageChild->post_title; ?>
          <div class="child-thumb">
            <?php 
            $url = wp_get_attachment_image_src( get_post_thumbnail_id($pageChild->ID) , 'medium');
            $thumbnail_url = $url[0];
            ?>
            <div class="book-container">
              <div class="book-cover" style="background:url('<?php echo $thumbnail_url;?>')">
              </div>
            </div>

          </div>
            
          </a>
        </li>

        <?php endforeach; endif;
        ?>
      </ul>
			</div>
			<footer>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php comments_template(); ?>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
</div>

<?php get_footer(); ?>