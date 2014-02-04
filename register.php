<?php
/*
Template Name: Register
*/
 get_header(); ?>

 <div class="span12">

 	<section class="register">

 		<h2>Register Now</h2>
		
		<form name="registerform" action="http://theme.local/wp-login.php?action=register" method="post"> 
			<fieldset>
				<input type="text" name="user_login" value="" placeholder="Username" />
				<input type="text" name="user_email" value="" placeholder="Email" />
				<input type="hidden" name="redirect_to" value="" /> 
				<input type="submit" name="wp-submit" value="Register" />
			</fieldset>
		</form>

	</section>

</div>