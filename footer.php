<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package onepageportfolio
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="footer-copyright">
				&copy; <?php echo date("Y") ?> <?php bloginfo('name')?>. All Rights Reserved
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
