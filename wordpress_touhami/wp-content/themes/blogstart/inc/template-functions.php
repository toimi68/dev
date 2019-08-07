<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package blogstart
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function blogstart_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'blogstart_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function blogstart_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'blogstart_pingback_header' );



/**
 *
 * Comments lists style markup
 */


if ( ! function_exists( 'blogstart_comments_list' ) ) :

	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @param object $comment markup of html wordpress comment list.
	 * @param array  $args modifying wordpress_comment_list function argument.
	 * @param array  $depth modifying child comment.
	 */
	function blogstart_comments_list( $comment, $args, $depth ) {

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
		?>
  <<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
		<?php if ( 'div' == $args['style'] ) : ?>
  <div id="div-comment-<?php comment_ID(); ?>" class="comment-body review-list">
	<?php endif; ?>
	<div class="single-comment">
		<div class="commenter-image">
			<?php
			if ( 0 != $args['avatar_size'] ) {
				echo get_avatar( $comment, $args['avatar_size'] );}
			?>
		</div>
		<div class="commnenter-details">
		<?php if ( 0 == $comment->comment_approved ) : ?>
			<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'blogstart' ); ?></em>
			<br />
		<?php endif; ?>
			<h4><?php printf( wp_kses_post( '%s', 'construc' ), sprintf( '%s', get_comment_author_link() ) ); ?></h4>
			<div class="comment-time">
				<p><time datetime="<?php comment_time( 'c' ); ?>">
								<?php
									/* translators: 1: comment date, 2: comment time */
									printf( wp_kses_post( '%1$s at %2$s', 'blogstart' ), wp_kses_post( get_comment_date( '', $comment ) ), wp_kses_post( get_comment_time() ) );
								?>
							</time></p>
			</div>
				<?php comment_text(); ?>
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<div class="reply">',
							'after'     => '</div>',
						)
					)
				);
				?>
		</div>
	</div>
		<?php if ( 'div' == $args['style'] ) : ?>
  </div>
			<?php
  endif;

	}
endif; // ends check for blogstart_comments_list().


/**
 *  Related Post.
 */

if ( ! function_exists( 'blogstart_related_post' ) ) :
	/**
	 *
	 * Blogstart related Post function.
	 */
	function blogstart_related_post() {
		global $post;
		$original_post = '';
		$categories = get_the_category( $post->ID );

		if ( $categories ) {

			$category_ids = array();
			foreach ( $categories as $individual_category ) {
				$category_ids[] = $individual_category->term_id;
			}
			$args = array(
				'category__in' => $category_ids,
				'post__not_in' => array( $post->ID ),
				'posts_per_page' => 3, // Number of related posts that will be shown.
				'ignore_sticky_posts' => 1,
				'post_type' => 'post',
			);
			$related_post_query = new wp_query( $args );

			if ( $related_post_query->have_posts() ) {

				echo '<div class="releted-post"><h2 class="widget-title">';
				esc_html_e( 'Related Post', 'blogstart' );
				echo '</h2> <div class="row align-items-end">';

				while ( $related_post_query->have_posts() ) {
					$related_post_query->the_post();
					?>
	   <article class="card single-blog text-center border-0 mb-4 mb-lg-0 col-lg-4 col-sm-6">
			<a href="<?php the_permalink(); ?>">
						<?php
						$categories = get_the_terms( $post->ID, 'category' );
						foreach ( $categories as $category ) {
							  $link = get_category_link( $category->term_id );
							  echo '<mark class="catagory">' . esc_html( $category->name ) . '</mark>';
						}

						?>
			  <h3 class="card-title"><?php the_title(); ?></h3>
				<!-- Blog Content-->
				<div class="blgo-content">
						<?php
						if ( has_post_thumbnail() ) :
							the_post_thumbnail( 'blogstart-related', array( 'class' => 'card-img rounded-0' ) );
						  else :
								echo '<div class="no-related-post-thumbnail"></div>';
						endif;
							?>
					<span class="posted-date"><?php echo wp_kses_post( blogstart_time() ); ?></span>
				</div>
			</a>
		</article>
					<?php
				} // if
				echo '</div></div>';
			} // foreach
		} // if

		wp_reset_postdata();
	}

endif;

if ( ! function_exists( 'blogstart_single_post_pagination' ) ) {
	/**
	 *
	 * Blogstart single post pagination functions.
	 */
	function blogstart_single_post_pagination() {
		?>
	  <nav class="blog-pagination">
		  <ul class="justify-content-between pagination"> 
			
			  <li class="page-item newer-post pl-15"><?php next_post_link( '%link', 'Next Post', true ); ?></li>
			  <li class="page-item older-post pr-15"><?php previous_post_link( '%link', 'Previous Post', true ); ?></li>
		  </ul>
	  </nav>
		<?php
	}
}

