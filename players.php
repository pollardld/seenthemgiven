<?php
/*
Template Name: Players
*/
 get_header(); ?>

<div class="span12">

	<div class="spread">
		
		<section class="span8">

			<h3>Players</h3>
				<?php 
					$users = get_users('role=author'); 
					foreach ($users as $user) { ?>

						<div class="user-section"> 
						
							<div class="thumb">
								
								<?php if ( userphoto_exists($user) ) {				
									
									echo userphoto($user);

								} else { ?>

									<img src="http://placebear.com/600/600">

								<?php } ?>
											
							</div>
									
							<div class="name">
					        
					        	<h5><a href="/author/<?php echo $user->user_nicename; ?>"><?php echo $user->user_nicename; ?></a></h5>
					        	<p><?php echo $user->user_school ?></p>
					        	<p><?php echo $user->user_state ?></p>
					        	
					        </div>

					    </div>
					    
				    <?php } ?>

		</section>

		<?php get_sidebar(); ?>
		
	</div>

</div>

<?php get_footer();