<?php
	/**
		* Template name: info
	*/

get_header();
?>

	
	<main class="main">

		<section class="contacts">
			<div class="container">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<h2><?php the_title(); ?></h2>

					<?php the_content(); ?>

				<?php endwhile; ?>
				<?php endif; ?>


			</div>
		</section>

	</main>


<?php
get_footer();
