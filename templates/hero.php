<?php
/*
Template Name: Forsíða
*/
get_header(); ?>

	<div class="row">
		<div id="random-quote" class="small-12 columns">
		 „Stök spök koma hér, eða allavega er það ætlunin.“
		</div>
	</div>
	<div class="row" id="about-section">
		<div class="small-12 large-12 columns" role="main">

		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1 class="entry-title hide"><?php the_title(); ?></h1>
				</header>
				<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<footer>
					<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
					<p><?php the_tags(); ?></p>
				</footer>
				<?php do_action( 'foundationpress_page_before_comments' ); ?>
				<?php comments_template(); ?>
				<?php do_action( 'foundationpress_page_after_comments' ); ?>
			</article>
		<?php endwhile;?>

		<?php do_action( 'foundationpress_after_content' ); ?>
      	</div>
	</div>
    <div class="milliprik"></div>
	<div class="row">
      	<div class="small-12 columns">
		<h2>Ljóðabækur</h2>
      	<ul class="overview-grid">
      	  <?php
      	  $child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = 13 AND post_type = 'page' ORDER BY RAND() LIMIT 3", 'OBJECT');    ?>
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
      	<p class="center"><a href="/ljodabaekur" class="show-all">Allar ljóðabækur</a></p>
      	</div></div>
      	<div class="milliprik"></div>
      	<div class="row">
      	<div class="small-12 columns">
      	<h2>Smásagnasöfn</h2>
      	<ul class="overview-grid">
      	  <?php
      	  $child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = 7 AND post_type = 'page' ORDER BY RAND() LIMIT 3", 'OBJECT');    ?>
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
      	<p class="center"><a href="/ljodabaekur" class="show-all">Öll smásagnasöfn</a></p>
      </div>

	</div>

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
