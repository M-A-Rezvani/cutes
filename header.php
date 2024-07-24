<?php
/**
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>
<?php if (isset($_GET['s'])) {
    $s = $_GET['s'];
} else {
    $s = '';
} ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">



	<?php wp_head(); ?>



</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="site-branding">
		<?php
		if ( is_front_page() && is_home() ) :
			?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
		else :
			?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
		endif;
			?>

			<a href="<?php bloginfo("home"); ?>"><p class="site-description"><?php echo bloginfo( 'description' ); ?></p></a>

			<!-- This code is copied from ghasemi theme -> header.php -->
			<div class="col-4">
				<form class="d-flex searchform col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" method="get"
					id="searchform" action="<?php echo home_url(); ?>">
					<label class="screen-reader-text" for="s">جستجو برای:</label>
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
						value="<?php echo $s; ?>" name="s" id="s" required>
					<button class="btn btn-outline-success" type="submit" id="searchsubmit" value="جستجو">Search
					</button>
				</form>
			</div>



			<a href="<?php echo home_url(); ?>"><img src="<?php echo custom_get_site_icon_url(); ?>" class="rounded-circle" style="float: left; width: 3rem;"></a>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'cutes' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	
	