<?php
	/**
		* Template name: logout
	*/

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main page">

			<div class="container">
				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'К сожалению! Эта страница не может быть найдена.', 'schoolstudy' ); ?></h1>
						<a href="<?php echo get_home_url(); ?>" class="button--index">Вернутся на главную</a>
					</header><!-- .page-header -->

				</section><!-- .error-404 -->

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
