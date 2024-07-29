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

    <style>

    </style>



</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation">












            <div class="site-branding">
                <?php
                if ( is_front_page() && is_home() ) :
                    ?>
                    <div class="site-title" title="<?php echo bloginfo( 'description' ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
                <?php
                else :
                    ?>
                    <p class="site-title" title="<?php echo bloginfo( 'description' ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
                endif;
                ?>



                <a href="<?php echo home_url(); ?>"><img src="<?php echo custom_get_site_icon_url(); ?>" class="rounded-circle" style="float: left; width: 3rem;"></a>
            </div><!-- .site-branding -->




            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'cutes' ); ?></button>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                )
            );
            ?>



            <!-- This code is copied from ghasemi theme -> header.php -->


            <button id="myBtn"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg></button>
            <!-- The Modal -->
            <div id="myModal" class="modal fadeIn">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form class="searchform" role="search" method="get"
                          id="searchform" action="<?php echo home_url(); ?>">
                        <label class="screen-reader-text" for="s">جستجو برای:</label>
                        <input class="search-bar" type="search" placeholder="کلمه موردن نظرتان را وارد نمایید ..." aria-label="Search"
                               value="<?php echo $s; ?>" name="s" id="s" required>
                        <button class="search-btn" type="submit" id="searchsubmit"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->







