<?php
	/**
		* Template name: Страница информации
	*/

get_header();
?>
	

	<section class="about">
		<div class="container">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>

			<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</section>

<?php
get_footer();
