<?php
/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php cutes_post_thumbnail(); //post image?>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
            if ( is_singular() ) :
			?>
			<div class="entry-meta">
                <p class="entry-meta-date">
				<?php
				cutes_posted_on();
                echo '</p><br><p class="entry-meta-author" >';
				cutes_posted_by();
				?>
                </p>
			</div><!-- .entry-meta -->
		<?php endif;
            endif;
        // echo get_read_time_by_words_count(get_the_content());
        echo reading_time(get_the_content());
        ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		if ( !is_singular() ) :
			echo getCustomeWords(get_the_content(), $start = 0, $end = 50);

		else:
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cutes' ),
					'after'  => '</div>',
				)
			);
		endif;
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php cutes_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
