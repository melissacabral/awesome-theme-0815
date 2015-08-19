<?php get_header(); //include header.php ?>

<main id="content">

	<?php //THE LOOP
		if( have_posts() ): ?>
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
				<?php the_content(); ?>
			</div>
				
		</article><!-- end post -->
		
		<?php comments_template(); //show the comment list and form ?>

		<?php endwhile; ?>		

	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar('page'); //include sidebar-page.php ?>
<?php get_footer(); //include footer.php ?>