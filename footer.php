<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">

				<?php if ( is_active_sidebar('footer-fullwidth') ) :
						dynamic_sidebar( 'footer-fullwidth' );
					endif;
				get_sidebar( 'footer' ); ?>

		<?php
			if ( has_nav_menu( 'footer-menu' ) ) : ?>

				<div id="et-footer-nav">
					<div class="container">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'depth'          => '1',
								'menu_class'     => 'bottom-nav',
								'container'      => '',
								'fallback_cb'    => '',
							) );
						?>
					</div>
				</div> <!-- #et-footer-nav -->

			<?php endif; ?>

				<div id="footer-bottom">
					<div class="container clearfix">
				<?php
					//get the copyright text and rights reserved text
					$copyrightText = esc_attr( get_theme_mod( 'dst_footer_copyright_text', get_bloginfo( 'name' )));

					$rightsReservedText = esc_attr( get_theme_mod( 'dst_footer_copyright_reserved' , 'All Rights Reserved' ));

								if ( has_nav_menu( 'footer-copyright-menu' ) ) :?>
											<?php
												wp_nav_menu( array(
													'theme_location' => 'footer-copyright-menu',
													'container'			 => 'div',
													'container_id'	 => 'menu-footer-copyright',
													'depth'          => '1',
													'menu_class'     => 'bottom-nav',
													'fallback_cb'    => '',
													// 'link_after' 	   => '<li class="separator">|</li>'
												) );
											?>

								<?php endif; ?>
								<p id="footer-info">

								<?php printf( et_get_safe_localization( __( '&copy; '.  date('Y') . ' %1$s', 'Divi' ) ), '<a href="' . get_bloginfo('url') . '" title="' . $copyrightText . '">' . $copyrightText .  '</a> | ' . $rightsReservedText); ?>

								</p> <!-- end #footer-info -->
								<?php
								if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
									get_template_part( 'includes/social_icons', 'footer' );
								} ?>
</div>	<!-- .container -->
				</div>
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>
</body>
</html>
