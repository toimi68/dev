<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogstart
 */

?>


<div class="col-md-4 col-sm-12 mt-md-0 mt-sm-4 mt-4">
	<div class="h-100 row banner-sidebar">
		<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page'    => 2,
			'offset'    => 1,
		);
		$featuredsmpost = get_posts( $args );
		foreach ( $featuredsmpost as $post ) :
			setup_postdata( $post );
			?>
			<div class="col-md-12 col-sm-6 col-6 align-self-md-start">
			<div class="sub-post">
				<div class="post-content hvr-rectangle-out">
					<?php blogstart_post_thumbnail(); ?>
					<!-- post text -->
					<div class="sub-post-text ">
						<div class="inner-wrap">
							<?php
							$categories = get_the_terms( $post->ID, 'category' );
							foreach ( $categories as $category ) :
								$catlink = get_category_link( $category->term_id );
								echo '<a href="' . esc_url( $catlink ) . '"><mark class="catagory">' . esc_html( $category->name ) . '</mark></a>';
								endforeach;
							?>
							<h2><?php the_title(); ?></h2>
							<a href="<?php the_permalink(); ?>" class="read-more double-line"><?php esc_html_e( 'Read More', 'blogstart' ); ?></a>
						</div>
					</div>
					<!-- posted date -->
					<span class="posted-date"><?php blogstart_time(); ?></span>
				</div>
			</div>
		</div>
			<?php
		endforeach;
		wp_reset_postdata();
		?>
	</div>
</div>
