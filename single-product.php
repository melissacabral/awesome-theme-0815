<?php get_header(); //include header.php ?>

<main id="content">

	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
			<?php 
			//display the featured image at a small size. 
			//don't forget to activate post-thumbnails in functions.php
			the_post_thumbnail('large', array( 'class' => 'product-image' )); ?>

			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>
			<div class="entry-content">
				<?php 
				//show all custom fields in a list
				the_meta(); ?>

				<?php the_content(); ?>

				 <?php wp_link_pages( array(
				 	'before' => '<div class="pagination">Keep reading this post:',
				 	'after' => '</div>',
				 ) ); ?>
			</div>
					
		</article><!-- end post -->

		<div class="pagination">
			<?php 
			//single post pagination
			next_post_link( '%link', '&larr; %title' ); 		//newer post
			previous_post_link( '%link', '%title &rarr;' ); 	//older_post ?>
		</div>

		<?php comments_template(); ?>

		<?php endwhile; ?>
	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>