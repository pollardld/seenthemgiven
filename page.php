<?php get_header(); ?>

<div class="span12">

	<div class="spread">
		
		<section class="span8">
			
			<?php 
				if ( have_posts() ) : 

					while ( have_posts() ) : the_post(); ?>
					
					<article class="post">

						<div class="content">
							
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

							<?php the_content(); ?>
							
							<div class="tags"><?php the_tags(); ?></div>
							<div class="tags"><?php the_author_posts_link(); ?></div>

						</div>

					</article>
				
			<?php 
					endwhile; 

					wp_reset_query();

				endif; ?>	
		
		</section>
			
		<?php get_sidebar(); ?>
		
	</div>
	
</div>

<?php
	get_footer();