<?php
	/**
		* Template name: login
	*/

get_header();

?>


	<main class="main">

		<section class="page--login">
			<div class="container">


				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="class">

						<h2><?php the_title(); ?></h2>

					
						<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

							<form class="woocommerce-form woocommerce-form-login login" method="post">

								<?php do_action( 'woocommerce_login_form_start' ); ?>

								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<input placeholder="<?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
								</p>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<input placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>" class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
								</p>

								<?php do_action( 'woocommerce_login_form' ); ?>

								<p class="form-row">
									<span>
										<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> 
										<label for="rememberme"><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></label>
									</span>
									<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
									<button type="submit" class="btn woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
								</p>
								<p class="woocommerce-LostPassword lost_password">
									<a href="http://fruitymall.ru/smena-parolja/"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
								</p>

								<?php do_action( 'woocommerce_login_form_end' ); ?>

							</form>

						<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

					</div>
				<?php endwhile; ?>
				<?php endif; ?>


			</div>
		</section>

	</main>

<?php
get_footer();
