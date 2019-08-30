<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogstart
 */

?>


<div <?php post_class( 'card single-blog quotes-post text-center' ); ?>>
	<span class="icon"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
	<p class="card-text">
		<?php the_content(); ?>
	</p>
	<mark><?php the_author(); ?></mark>
</div>
