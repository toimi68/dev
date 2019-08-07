<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogstart
 */

?>

 <div class="banner-post">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page'   => 1,
				);
				$featuredlargs = get_posts( $args );
				foreach ( $featuredlargs as $post ) :
					setup_postdata( $post );
					?>
					<!-- big post-->
					<div class="big-post">
					<?php
					$post_thumnail = wp_get_attachment_image_url( get_post_thumbnail_id( get_the_ID() ), 'blogstart-flthumnail' );
					if ( has_post_thumbnail() ) :
						the_post_thumbnail( 'blogstart-flthumnail' );
						elseif ( $post_thumnail ) :
							echo '<img src="' . esc_url( $post_thumnail ) . '" alt="">';
						else :
							?>
							<div class="no-post-thumnail-available larg-thumbnail">
								<p><?php esc_html_e( 'Upload a featured Image or attachment', 'blogstart' ); ?></p>
							</div>
							<?php
						endif;
						?>
						<!-- post text -->
						<div class="big-post-text">
							<div class="inner-wrap">
							<?php
							$categories = get_the_terms( $post->ID, 'category' );
							foreach ( $categories as $category ) {
								$catlink = get_category_link( $category->term_id );
								echo '<a href="' . esc_url( $catlink ) . '"><mark class="catagory">' . esc_html( $category->name ) . '</mark></a>';
							}
							?>
								<?php the_title( '<h1>', '</h1>' ); ?>
								<a href="<?php the_permalink(); ?>" class="read-more double-line"><?php echo esc_html( 'Read More', 'blogstart' ); ?></a>
							</div>
						</div>
						<!-- posted date -->
						<span class="posted-date"><?php blogstart_time(); ?></span>
					</div>
					<?php
					endforeach;
					wp_reset_postdata();
				?>
			</div>
			<?php get_template_part( 'template-parts/featured', 'subpost' ); ?>
		</div>
	</div>
</div>
