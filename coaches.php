<?php
/*
Template Name: Coaches
*/
 get_header(); ?>

<div class="span12">

	<div class="spread">
		
		<section class="span8">

			<h3>Coaches</h3>

				<p>For Now Coaches email us for set up.</p>
				<p>Creation of own profile coming soon. Need to figure out how to validate its a real coach</p>

				<?php 
					$users = get_users('role=coach'); 
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
					        	
					        </div>

					    </div>
					    
				    <?php } ?>

		</section>

		<?php get_sidebar(); ?>
		
	</div>

</div>

<?php get_footer();