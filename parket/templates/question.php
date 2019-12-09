<?php
	/**
		* Template name: question
	*/

get_header();
?>


	<main class="main">

		<section class="question">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<h2><?php the_title(); ?></h2>



					<?php if( have_rows('list') ): ?>

						<?php while( have_rows('list') ): the_row(); 

							$title = get_sub_field('title');
							$text = get_sub_field('text');

							?>

							<div class="question__block block">
								<div class="question__block_header block__header">
									<span></span>
									<p>
										<?php echo $title; ?>
									</p>
								</div>
								<div class="question__block_content block__content">
								  <p><?php echo $text; ?></p>
								</div>
							</div>

						<?php endwhile; ?>

					<?php endif; ?>

					</div>
				</div>
			</div>
		</section>

	</main>


<?php
get_footer();