<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blogstart
 */

 get_template_part( 'template-parts/footer', 'area' );
?>
	<div class="footer-bottom">
		<?php
		$copyright = get_theme_mod( 'copyright_content' );
		if ( ! empty( $copyright ) ) :
			echo '<p>' . wp_kses_post( $copyright ) . '</p>';
		else :
			?>
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'blogstart' ) ); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'Proudly powered by %s', 'blogstart' ), 'WordPress' );
			?>
		</a>
		<span class="sep"> | </span>
		<p>
			<?php
			esc_html_e( 'Copyright 2018 All rights reserved.', 'blogstart' )
			?>
		</p>
		<?php endif; ?>
	  </div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
