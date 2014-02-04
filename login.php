<?php
/*
Template Name: Login
*/
 get_header(); ?>

<div class="span12">

	<div class="spread">
		
		<section class="span8">

			<?php
				if ( !is_user_logged_in() ) { ?>
			    	
			    	<h2>Login</h2>

					<?php echo wp_login_form(); ?>

					<h2>New User? <a href="/register/">Register</a></h2>

			<?php } else { ?>
			
			    	<h1>Welcome Back 
			    		<?php global $current_user;
						      get_currentuserinfo();

						      echo $current_user->first_name . $current_user->last_name; ?>
					</h1>

					<p><?php echo '<a href="/author/' . $current_user->user_nicename . '">' . 'View Your Profile</a>'; ?></p>
					<p><?php 
							$url = admin_url();
							echo '<a href="'. $url . '">Edit Your Profile</a>'; ?></p>
					<p><a href="<?php echo wp_logout_url( home_url() ); ?>" title="Logout">Logout</a></p>

			
			<?php } ?>

		</section>

		<?php get_sidebar(); ?>
		
	</div>

</div>

<?php get_footer();