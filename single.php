<?php get_header(); ?>

<div class="span12">

	<div class="spread">
		
		<section class="span8">
			
			<?php while ( have_posts() ) : the_post(); ?>
				
				<article class="post">

						<div class="content">
					
							<div class="thumb">
								<?php the_post_thumbnail( 'featured-thumb' ); ?>
							</div>
								
							<h2><?php the_title(); ?></h2>

							<?php the_content(); ?>
							
							<div class="tags"><?php the_tags(); ?></div>

							<div class="comments">

								<?php	
									if ( comments_open() || get_comments_number() ) {
										comments_template();
									}
								?>
								
							</div>

						</div>

				</article>
			
			<?php endwhile; ?>	
		
		</section>
			
		<?php get_sidebar(); ?>
		
	</div>

</div>

<?php
	get_footer();