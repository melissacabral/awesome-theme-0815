<?php get_header(); //include header.php ?>

<main id="content">
<h2>
<?php //conditional tag demo
// if( is_front_page() ){
// 	echo 'This is the front page';
// }elseif( is_home() ){
// 	echo 'This is home (aka: blog)';
// }elseif( is_search() ){
// 	echo 'This is a search result';
// }else{
// 	echo 'this is something else';
// } ?>
</h2>


	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
			<?php 
			//display the featured image at a small size. 
			//don't forget to activate post-thumbnails in functions.php
			the_post_thumbnail('big-banner'); ?>

			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
				
		</article><!-- end post -->

		<?php endwhile; ?>
	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>


	<section id="featured-content" class="clearfix">
		<?php 
		//defined in functions.php
		awesome_products( 6, 'Latest Products' ); ?>		
	</section>

</main><!-- end #content -->

<?php get_sidebar('frontpage'); //include sidebar-frontpage.php ?>
<?php get_footer(); //include footer.php ?>