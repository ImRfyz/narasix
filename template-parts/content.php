<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package narasix
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'flex w-full flex-wrap group' ); ?>>
	<?php 
		/**
		 * @func markup narasix_post_action
		*/
		do_action( 'narasix_post_action' );
	?>
</div><!-- #post-<?php the_ID(); ?> -->
