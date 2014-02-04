<?php

function modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['user_phone'] = 'Phone Number';
	$profile_fields['user_address'] = 'Full Address';
	$profile_fields['user_twitter'] = 'Twitter Username';
	$profile_fields['user_facebook'] = 'Facebook URL';
	$profile_fields['user_gplus'] = 'Google+ URL';
	$profile_fields['user_height'] = 'Height';
	$profile_fields['user_weight'] = 'Weight';
	$profile_fields['user_position'] = 'Position';
	$profile_fields['user_school'] = 'Current School';
	$profile_fields['user_gpa'] = 'GPA';
	$profile_fields['user_gradeYear'] = 'Grade Year';
	$profile_fields['user_country'] = 'Country';
	$profile_fields['user_state'] = 'State Or County';
	$profile_fields['user_interestedIn'] = 'School(s) Interested In';

	return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');

function my_login_logo() { ?>
    <style type="text/css">
        html {
            background-color: #fafff7;
            background-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyB3aWR0aD0nMTUnIGhlaWdodD0nNSc+Cgk8cmVjdCB3aWR0aD0nMTAwJScgaGVpZ2h0PScxMDAlJyBmaWxsPScjZmFmZmY3Jy8+Cgk8ZWxsaXBzZSBjeD0nNTAlJyBjeT0nMCUnIHJ4PSc1MCUnIHJ5PSc1MCUnIGZpbGwtb3BhY2l0eT0nMC4wNScgZmlsbD0nIzY2YTg0MycvPgoJPGVsbGlwc2UgY3g9JzAlJyBjeT0nMTAwJScgcng9JzUwJScgcnk9JzUwJScgZmlsbC1vcGFjaXR5PScwLjA1JyBmaWxsPScjNjZhODQzJy8+Cgk8ZWxsaXBzZSBjeD0nMTAwJScgY3k9JzEwMCUnIHJ4PSc1MCUnIHJ5PSc1MCUnIGZpbGwtb3BhY2l0eT0nMC4wNScgZmlsbD0nIzY2YTg0MycvPgo8L3N2Zz4=');
        }
        body.login {
            background-color: #fafff7;
            background-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyB3aWR0aD0nMTUnIGhlaWdodD0nNSc+Cgk8cmVjdCB3aWR0aD0nMTAwJScgaGVpZ2h0PScxMDAlJyBmaWxsPScjZmFmZmY3Jy8+Cgk8ZWxsaXBzZSBjeD0nNTAlJyBjeT0nMCUnIHJ4PSc1MCUnIHJ5PSc1MCUnIGZpbGwtb3BhY2l0eT0nMC4wNScgZmlsbD0nIzY2YTg0MycvPgoJPGVsbGlwc2UgY3g9JzAlJyBjeT0nMTAwJScgcng9JzUwJScgcnk9JzUwJScgZmlsbC1vcGFjaXR5PScwLjA1JyBmaWxsPScjNjZhODQzJy8+Cgk8ZWxsaXBzZSBjeD0nMTAwJScgY3k9JzEwMCUnIHJ4PSc1MCUnIHJ5PSc1MCUnIGZpbGwtb3BhY2l0eT0nMC4wNScgZmlsbD0nIzY2YTg0MycvPgo8L3N2Zz4=');
            color: #00363a;
            font-size: 1em;
        }
        body.login #nav a, body.login #backtoblog a {
            color: #734f79;
        }
        body.login #nav a:hover, , body.login #backtoblog a:hover {
            color: #66a843;
        }
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/soccer-ball.svg);
            padding-bottom: 0;
        }
        .login form {
            background: #fe9644;
        }
        .login label {
            color: #fff;
        }
        .wp-core-ui .button-primary {
            background: #66a843;
            border: none;
            padding: 1rem;
        }
        .wp-core-ui .button.button-large {
            height: auto;
            line-height: normal;
            padding: .5rem 1rem;
        }
        .wp-core-ui .button-primary:hover {
            background: #00a486;
        }
        .login form input[type=checkbox] {
            background: #fff;
            border: none;
        }
        .login form .input {
            border: none;
        }
        .login #nav, .login #backtoblog {
            padding: .5rem 1rem 1rem;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

add_role('coach', 'Coach', array(
    'read' => true,
    'edit_posts' => true,
    'delete_posts' => true,
    'edit_published_posts' => true,
    'upload_files' => true,
    'publish_posts' => true,
    'delete_published_posts' => true,    
));

function add_theme_caps() {
    // gets the author role
    $role = get_role( 'author' );

    // This only works, because it accesses the class instance.
    // would allow the author to edit others' posts for current theme only
    $role->add_cap( 'upload_files' ); 
}
add_action( 'admin_init', 'add_theme_caps');


register_sidebar(array(
  'name' => __( 'Author Sidebar' ),
  'id' => 'author-sidebar',
  'description' => __( 'Author Sidebar' ),
  'before_title' => '<h1>',
  'after_title' => '</h1>'
));