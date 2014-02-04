<?php
/**
 * @package Private Messages For WordPress
 *
 * @author: Rilwis
 * @url: http://www.deluxeblogtips.com
 * @email: rilwis@gmail.com
 
 Template Name: Private Messages
 
 */

get_header();
?>

<div class="span12">

	<div class="spread">

		<?php 

		if (!is_user_logged_in()) { ?>
			
			<section class="span8">
				<h1>You Must Be Logged In To Message</h1>

				<h2>Login</h2>

				<?php echo wp_login_form(); ?>

				<h2>New User? <?php echo wp_register(''); ?></h2>

			</section>

			<aside class="span4">

			</aside>
		
		<?php } else { ?>

		<article class="post">

			<div class="content message-boxes">
				
				<h2><?php the_title(); ?></h2>
				
				<a href="javascript:void(0);" onclick="pmSwitch('pm-send');">Send</a>
				<a href="javascript:void(0);" onclick="pmSwitch('pm-inbox');">Inbox</a>
				<a href="javascript:void(0);" onclick="pmSwitch('pm-outbox');">Outbox</a>
			</div>

		</article>

		<section class="span8">

				<script type="text/javascript">
					// Switch between send page, inbox and outbox
					function pmSwitch(page) {
						document.getElementById('pm-send').style.display = 'none';
						document.getElementById('pm-inbox').style.display = 'none';
						document.getElementById('pm-outbox').style.display = 'none';
						document.getElementById(page).style.display = '';
						return false;
					}
				</script>
				
				<!-- Include scripts and style for autosuggest feature -->
				<script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/private-messages-for-wordpress/js/jquery.min.js"></script>
				<script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/private-messages-for-wordpress/js/jquery.autoSuggest.packed.js"></script>
				<script type="text/javascript" src="<?php echo WP_PLUGIN_URL; ?>/private-messages-for-wordpress/js/script.js"></script>
				<link rel="stylesheet" type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/private-messages-for-wordpress/css/style.css" />
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<article class="post">

						<div class="content">

							<?php
								$show = array(true, false, false);
								
								if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'rwpm_inbox') {
									
									$show = array(false, true, false);
								} elseif (
									isset($_REQUEST['page']) && $_REQUEST['page'] == 'rwpm_outbox') {
									$show = array(false, false, true);
								}
							?>
							
							<div id="pm-send" <?php if (!$show[0]) echo 'style="display:none"'; ?>>
								<?php rwpm_send();?>
							</div>

							<div id="pm-inbox" <?php if (!$show[1]) echo 'style="display:none"'; ?>>
								<?php rwpm_inbox();?>
							</div>

							<div id="pm-outbox" <?php if (!$show[2]) echo 'style="display:none"'; ?>>
								<?php rwpm_outbox();?>
							</div>

						</div>

					</article>
				
				<?php endwhile; endif; ?>

		</section>

		<aside class="span4">

		</aside>

	<?php } ?>

	</div>

</div>

<?php get_footer(); ?>
