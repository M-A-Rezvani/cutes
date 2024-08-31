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
		echo '  <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-clock" viewBox="0 0 1rem 1rem">
				<path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
				<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
	  			</svg>
			';
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
