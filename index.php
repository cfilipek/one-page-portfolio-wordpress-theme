<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package onepageportfolio
 */

get_header();
?>


<main id="primary" class="site-main">

	<div class="heading">
		<?php
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		?>
	</div>


	<!-- about section -->
	<?php query_posts( 'post_type=about&posts_per_page=1' ) ?>
	<?php if (have_posts(  )) : while(have_posts(  )): the_post(  ); ?>
	<div class="about-container" id="about">
		<div class="about design code-bkgd">
			<div class="about-inner">
				<h2 class="about-title"><?php the_title();?></h2>
				<?php the_content( ); ?>

				<div class="icons">
					<?php if( get_field('icon_one') ): ?>
						<div class="icon"><?php the_field('icon_one'); ?></div>
					<?php endif; ?>
					<?php if( get_field('icon_two') ): ?>
						<div class="icon"><?php the_field('icon_two'); ?></div>
					<?php endif; ?>
					<?php if( get_field('icon_three') ): ?>
						<div class="icon"><?php the_field('icon_three'); ?></div>
					<?php endif; ?>
					<?php if( get_field('icon_four') ): ?>
						<div class="icon"><?php the_field('icon_four'); ?></div>
					<?php endif; ?>
				</div>
				
			</div>
		</div>

		<div class="about code des-bkgd" id="about">
			<div class="about-inner">
				<h2 class="about-title"><?php the_title();?></h2>
				<?php the_content( ); ?>

				<div class="icons">
					<?php if( get_field('icon_one') ): ?>
						<div class="icon"><?php the_field('icon_one'); ?></div>
					<?php endif; ?>
					<?php if( get_field('icon_two') ): ?>
						<div class="icon"><?php the_field('icon_two'); ?></div>
					<?php endif; ?>
					<?php if( get_field('icon_three') ): ?>
						<div class="icon"><?php the_field('icon_three'); ?></div>
					<?php endif; ?>
					<?php if( get_field('icon_four') ): ?>
						<div class="icon"><?php the_field('icon_four'); ?></div>
					<?php endif; ?>
				</div>
				
			</div>
		</div>
	</div>
	<?php
	endwhile;
	endif;
	?>

	<!-- project section -->

	<!-- dev projects -->
	<div class="projects" id="projects">
		<div class="projects-wrapper design">
			<h2 class="about-title"><span class="accent-des">Design</span> Projects</h2>
			<div class="projects-grid">
				<?php query_posts( 'post_type=project_des&posts_per_page=20' ) ?>
				<?php if (have_posts(  )) : while(have_posts(  )): the_post(  ); ?>
					<div class="project-container">
						<h2 class="project-title"><?php the_title();?></h2>
						<?php the_content( ); ?>
						<div class="project-icons">
							<?php if( get_field('icon_one') ): ?>
								<div class="icon"><?php the_field('icon_one'); ?></div>
							<?php endif; ?>
							<?php if( get_field('icon_two') ): ?>
								<div class="icon"><?php the_field('icon_two'); ?></div>
							<?php endif; ?>
						</div>
					</div>
				<?php
				endwhile;
				endif;
				?>
			</div>
		</div>

		<div class="projects-wrapper code">
			<h2 class="about-title"><span class="accent">Dev</span> Projects</h2>
			<div class="projects-grid">
				<?php query_posts( 'post_type=project_dev&posts_per_page=20' ) ?>
				<?php if (have_posts(  )) : while(have_posts(  )): the_post(  ); ?>
					<div class="project-container">
						<h2 class="project-title"><?php the_title();?></h2>
						<?php the_content( ); ?>

						<div class="project-icons">
							<?php if( get_field('icon_one') ): ?>
								<div class="icon"><?php the_field('icon_one'); ?></div>
							<?php endif; ?>
							<?php if( get_field('icon_two') ): ?>
								<div class="icon"><?php the_field('icon_two'); ?></div>
							<?php endif; ?>
						</div>
					</div>
				<?php
				endwhile;
				endif;
				?>
			</div>
		</div>
	</div>

	<!-- <div class="projects code" id="projects">
		<div class="projects-grid">
			<h2 class="about-title"><span class="accent">Dev</span> Projects</h2>
			<?php query_posts( 'post_type=project_dev&posts_per_page=20' ) ?>
			<?php if (have_posts(  )) : while(have_posts(  )): the_post(  ); ?>
				<div>
					<h2 class="project-title"><?php the_title();?></h2>
					<?php the_content( ); ?>
				</div>
			<?php
			endwhile;
			endif;
			?>
		</div>
	</div> -->

</main><!-- #main -->




<?php
get_footer();
