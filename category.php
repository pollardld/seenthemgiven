<?php get_header(); ?>

<div class="span12">

	<div class="spread">
		
		<section class="span8 category">
			
			<?php if ( have_posts() ) : ?>

				<h1 class="cat-title"><?php printf( __( '%s', 'twentyfourteen' ), single_cat_title( '', false ) ); ?></h1>

				<?php while ( have_posts() ) : the_post(); ?>
				
				<article class="post">
					
					<div class="thumb">
						<?php the_post_thumbnail( 'featured-thumb' ); ?>
					</div>
						
					<div class="content">
						
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

						<?php the_content(); ?>

						<div class="tags"><?php the_tags(); ?></div>

					</div>
				</article>
			
			<?php endwhile; endif; ?>	
		
		</section>
			
		<?php get_sidebar(); ?>
		
	</div>

<?php
	get_footer();