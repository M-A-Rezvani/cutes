<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package cutes
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found post">
			<div class="post-thumbnail">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/none.gif" style="">
			</div>
			<header class="page-header">
				<h1 style="text-align: center;">404</h1>
				<h1 class="page-title"><?php esc_html_e( 'اوه! اشتباه اومدی اینجا بن بسته!', 'cutes' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'به نظر می رسد چیزی در این مکان یافت نشد. یکی از لینک های زیر را امتحان کنید یا جستجو کنید.', 'cutes' ); ?></p>

				

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'cutes' ); ?></h2>
						<ul>
							<?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
						</ul>
					</div><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					$cutes_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'cutes' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$cutes_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
