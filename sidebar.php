<aside class="span4">

	<div class="search">
		<h3>Search</h3>
		<?php get_search_form(); ?>
	</div>

	<section class="featured">
		<h3>Featured Players</h3>
		<?php 
			$users = get_users('role=author'); 
			foreach ($users as $user) { ?>

				<a href="/author/<?php echo $user->user_nicename ?>">
				<article class="featured-player"> 
				
					<?php if ( userphoto_exists($user) ) : ?>
				
						<div class="thumb">
									
							<?php echo userphoto($user); ?>
									
						</div>
							
					<?php else : ?>

						<div class="thumb">
									
							<img src="http://placebear.com/400/400" />
									
						</div>

					<?php endif; ?>
			        
			        <div class="featured-info">
			        
			        	<h2><?php echo $user->user_nicename ?></h2>
			        	<p><?php echo $user->user_school ?></p>
			        
			        </div>

			    </article>
			    </a>
		<?php } ?>
	</section>
		
</aside>