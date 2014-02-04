<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title><?php wp_title( '', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<link href='http://fonts.googleapis.com/css?family=Ovo:400' rel='stylesheet' type='text/css'>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

	<main>
		
		<header>

			<div class="span12">

				<div class="logo">
					<a href="/">
						<h1>Seen Them Given <span>beta</span></h1>
						<div class="soccer-ball">
							<?php include( get_stylesheet_directory() . '/img/soccer-ball.svg'); ?>
						</div>
					</a>
				</div>

				<nav>
					<a href="/players/">Players</a>
					<a href="/coaches/">Coaches</a>
					<a href="/faqs/">FAQs</a>
					<?php if ( is_user_logged_in() ) { ?>
						<a href="<?php echo wp_logout_url(get_permalink()) ?>">Logout</a>
					<?php } else { ?>
						<a href="/login/">Login</a>
					<?php } ?>
				</nav>

			</div>

		</header>