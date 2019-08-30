<?php
/**
 * Customizing Search form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package blogstart
 */

?>

<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search...', 'blogstart' ); ?>">
	<button class="fa fa-search" type="submit"></button>
</form>
