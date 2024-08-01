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
    <meta charset="<?php bloginfo('charset'); ?>">
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
                if (is_front_page() && is_home()) :
                    ?>
                    <div class="site-title" title="<?php echo bloginfo('description'); ?>"><a
                                href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                    </div>
                <?php
                else :
                    ?>
                    <p class="site-title" title="<?php echo bloginfo('description'); ?>"><a
                                href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                    </p>
                <?php
                endif;
                ?>


                <a href="<?php echo home_url(); ?>"><img src="<?php echo custom_get_site_icon_url(); ?>"
                                                         class="rounded-circle" style="float: left; width: 3rem;"></a>
            </div><!-- .site-branding -->


            <button class="menu-toggle" aria-controls="primary-menu"
                    aria-expanded="false"><?php esc_html_e('Primary Menu', 'cutes'); ?></button>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id' => 'primary-menu',
                )
            );
            ?>



            <button class="darkmode" id="darkmode"  onclick="darkmode()">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                     class="bi bi-moon dark-mode-svg" viewBox="0 0 16 16">
                    <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278M4.858 1.311A7.27 7.27 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.32 7.32 0 0 0 5.205-2.162q-.506.063-1.029.063c-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286"/>
                </svg>
            </button>



            <!-- This code is copied from ghasemi theme -> header.php -->
            <button id="myBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search"
                     viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
            </button>
            <!-- The Modal -->
            <div id="myModal" class="modal fadeIn">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form class="searchform" role="search" method="get"
                          id="searchform" action="<?php echo home_url(); ?>">
                        <input class="search-bar" placeholder="کلمه مورد نظرتان را وارد نمایید ..." aria-label="Search"
                               value="<?php echo $s; ?>" name="s" id="s" required>
                        <button class="search-btn" type="submit" id="searchsubmit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                 class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->







