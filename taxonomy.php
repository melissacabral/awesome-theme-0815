<?php get_header(); //include header.php ?>

<main id="content">

	<?php //THE LOOP
		if( have_posts() ): ?>

		<h2 class="archive-title">Products that are <?php single_cat_title(); //single term title ?></h2>

		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
			<?php 
			//display the featured image at a small size. 
			//don't forget to activate post-thumbnails in functions.php
			the_post_thumbnail('thumbnail'); ?>

			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>
			<div class="entry-content">
				<?php the_excerpt(); //first few words of the post ?>

				<?php //show the price custom field (meta)
										//post id,  key,  single?
				 $price = get_post_meta( $post->ID, 'price', true ); 
				 if($price){
				 	//display a cute price tag
				 	?>
				 	<span class="product-price"><?php echo $price; ?></span>
				 	<?php
				 }
				 ?>

			</div>
					
		</article><!-- end post -->

		<?php endwhile; ?>

		<div class="pagination">
			<?php 
			//archive pagination - use pagenavi if it is activated in plugins
			if( function_exists('wp_pagenavi') ){
				wp_pagenavi();
			}else{
				//fallback to default WP pagination
				previous_posts_link( '&larr; Newer Posts' );  //newer
				next_posts_link( 'Older Posts &rarr;' );      //older
			}
			?>
		</div>

	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>