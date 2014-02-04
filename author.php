<?php get_header(); ?>

	<div class="span12">

		<div class="spread">

			<?php
			    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
			?>

					<article class="post author-post">

						<div class="content author-content">
								
							<div class="thumb">
								
								<?php if ( userphoto_exists($curauth) ) {

									echo userphoto($curauth);

								} else { ?>

									<img src="http://placebear.com/600/600">
								
								<?php } ?>

							</div>
											
							<?php if ( $curauth->last_name !== '' ) : ?>
								
								<div class="content-description">
									
									<h2>
										<?php 
											echo $curauth->first_name;
											echo (' ');
											echo $curauth->last_name; ?>
									</h2>
									
									<?php echo $curauth->description; ?>

									<section class="messages">
	
										<a class="follow" href="#">Follow Me</a>

										<a class="message" href="/messages/">Message Me</a>
									
									</section>
									
								</div>

							<?php elseif ( $curauth->first_name !== '' ) : ?>
								
								<div class="content-description">
									
									<h2>
										<?php echo $curauth->first_name; ?>
									</h2>

									<?php echo $curauth->description; ?>

									<section class="messages">
	
										<a class="message" href="/messages/">Message Me</a>
									
									</section>

								</div>

							<?php elseif ( $curauth->description !== '' ) : ?>

								<div class="content-description">
									
									<?php echo $curauth->description; ?>

									<section class="messages">
	
										<a class="message" href="/messages/">Message Me</a>
									
									</section>
								
								</div>

							<?php endif; ?>

						</div>

					</article>
			
			<section class="span8">		

				<?php 

					if ( have_posts() ) :

						// Start the Loop.
						while ( have_posts() ) : the_post(); ?>

							<article class="post">

								<div class="content">
							
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="thumb">
											<?php the_post_thumbnail(); ?>
										</div>
									<?php endif; ?>
										
									<div class="content-description">
										<a href="<?php echo the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

										<?php the_content(); ?>
										
										<div class="tags"><?php the_tags(); ?></div>
									</div>

								</div>

							</article>

					<?php 
					
						endwhile;

					else : // If no content. ?>
						
						<article class="post">
							<div class="content">
								<p>No Posts Yet</p>
							</div>
						</article>

				<?php endif; ?>

		</section>

		<aside class="span4">

			<section>

				<h4><?php echo $curauth->first_name ?></h4>

					<?php if( $curauth->user_height !== '') : ?>
						<p><span>Height:</span> <?php echo $curauth->user_height; ?></p>
					<?php endif; ?>

					<?php if( $curauth->user_weight !== '') : ?>
						<p><span>Weight:</span> <?php echo $curauth->user_weight; ?></p>
					<?php endif; ?>

					<?php if( $curauth->user_position !== '') : ?>
						<p><span>Position:</span> <?php echo $curauth->user_position; ?></p>
					<?php endif; ?>

					<?php if( $curauth->user_school !== '') : ?>
						<p><span>Current School:</span> <?php echo $curauth->user_school; ?></p>
					<?php endif; ?>

					<?php if( $curauth->user_gpa !== '') : ?>
						<p><span>GPA:</span> <?php echo $curauth->user_gpa; ?></p>
					<?php endif; ?>

					<?php if( $curauth->user_gradeYear !== '') : ?>
						<p><span>Grade Year:</span> <?php echo $curauth->user_gradeYear; ?></p>
					<?php endif; ?>

					<?php if( $curauth->user_country !== '') : ?>
						<p><span>Country:</span> <?php echo $curauth->user_country; ?></p>
					<?php endif; ?>

					<?php if( $curauth->user_state !== '') : ?>
						<p><span>State/County:</span> <?php echo $curauth->user_state; ?></p>
					<?php endif; ?>

					<?php if( $curauth->user_email !== '') : ?>
						<p><span>Email:</span> <a href="mailto:<?php echo $curauth->user_email; ?>"><?php echo $curauth->user_email; ?></a></p>
					<?php endif; ?>

					<?php if( $curauth->user_phone !== '') : ?>
						<p><span>Phone:</span> <?php echo $curauth->user_phone; ?></p>
					<?php endif; ?>

					<?php if( $curauth->user_address !== '') : ?>
						<p><span>Address:</span> <?php echo $curauth->user_address; ?></p>
					<?php endif; ?>
			</section>

			<section class="references">

				<h4>References</h4>

				<?php 
					$args = array ( 'cat' => '5' );
					$the_query = new WP_Query( $args );

					if ( $the_query->have_posts() ) :
						
						while ( $the_query->have_posts() ) : $the_query->the_post();  ?>

							<p><span><?php the_date(); ?></span> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

				<?php 
						endwhile;
						wp_reset_postdata();
					endif;
				?>

			</section>

			<section class="messages">
	
				<a class="message" href="/messages/">Message Me</a>
								
				<?php if( $curauth->user_twitter !== '') : ?>
					<a href="https://twitter.com/<?php echo $curauth->user_twitter; ?>"><i class="icon-twitter"></i></a>
				<?php endif; ?>

				<?php if( $curauth->user_facebook !== '') : ?>
					<a href="<?php echo $curauth->user_facebook; ?>"><i class="icon-facebook"></i></a>
				<?php endif; ?>

				<?php if( $curauth->user_gplus !== '') : ?>
					<a href="<?php echo $curauth->user_gplus; ?>"><i class="icon-google"></i></a>
				<?php endif; ?>
			
			</section>

		</aside>

	</div>

</div>

<?php get_footer();
