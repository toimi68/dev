<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogstart
 */

?>
<article <?php post_class( 'card single-blog pt-0' ); ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<!-- left -->
		<div class="col-xl-6 col-sm-12">
			<!-- Blog Content-->
			<div class="blgo-content">
				<?php blogstart_post_thumbnail(); ?>
				<span class="posted-date"><?php blogstart_time(); ?></span>
			</div>
		</div>
		<!-- right -->
		<?php
		$fullwidthcontent = ( has_post_thumbnail() ? '' : 'col-xl-12 col-sm-12' );
		?>
		<div class="col-xl-6 col-sm-12">
			<?php if ( is_sticky( get_the_ID() ) ) : ?>
				<div class="featured-text"><mark><?php esc_html_e( 'Featured Post', 'blogstart' ); ?></mark></div>
			<?php endif; ?>
			<?php
			$categories = get_the_terms( $post->ID, 'category' );
			if ( is_array( $categories ) ) :
				foreach ( $categories as $category ) :
					$catlink = get_category_link( $category->term_id );
					echo '<a href="' . esc_url( $catlink ) . '"><mark class="catagory">' . esc_html( $category->name ) . '</mark></a>';
				endforeach;
			endif;
			?>
			<a class="post-title-link" href="<?php the_permalink(); ?>"><?php the_title( '<h2 class="card-title h1">', '</h2>' ); ?></a>
			<!-- Card Body -->
			<div class="card-body p-0">
				<span class="posted-by"><?php esc_html_e( 'Posted By', 'blogstart' ); ?> <mark class="admin"><?php the_author(); ?></mark></span>
				<div class="card-text"><?php the_excerpt(); ?></div>
				<a href="<?php the_permalink(); ?>" class="read-more double-line"><?php esc_html_e( 'read more', 'blogstart' ); ?></a>
				<!-- Card Footer -->
			</div>
			<div class="card-footer border-0 p-0 bg-white">
				<div class="share-icons">
					<span><?php esc_html_e( 'Share:', 'blogstart' ); ?></span>
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo esc_url( 'https://twitter.com/share?url=' . get_the_permalink() . '&amp;text=' . $post->post_title . '&amp;hashtags=' . get_bloginfo( 'name' ) ); ?>"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo esc_url( 'https://plus.google.com/share?url=' . get_the_permalink() ); ?>"><i class="fa fa-google-plus"></i></a>
				</div>
			</div>
		</div>
	</div>
</article>
