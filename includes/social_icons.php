<?php
$socialLinkedIn = get_theme_mod( 'dst_social_media_linkedin' );
$socialInstagram = get_theme_mod( 'dst_social_media_instagram' );
$socialPinterest = get_theme_mod( 'dst_social_media_pinterest' );
$socialYouTube = get_theme_mod( 'dst_social_media_youtube' );
$socialVimeo = get_theme_mod( 'dst_social_media_vimeo' );
$socialSnapchat = get_theme_mod( 'dst_social_media_snapchat' );
$socialEmail = get_theme_mod( 'dst_social_media_email' );
?>


<ul class="et-social-icons">

<?php if ( 'on' === et_get_option( 'divi_show_facebook_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-facebook">
		<a href="<?php echo esc_url( et_get_option( 'divi_facebook_url', '#' ) ); ?>" class="icon" target="_blank">
			<span><?php esc_html_e( 'Facebook', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>
<?php if ( 'on' === et_get_option( 'divi_show_twitter_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-twitter">
		<a href="<?php echo esc_url( et_get_option( 'divi_twitter_url', '#' ) ); ?>" class="icon" target="_blank">
			<span><?php esc_html_e( 'Twitter', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>
<?php if ( 'on' === et_get_option( 'divi_show_google_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-google-plus">
		<a href="<?php echo esc_url( et_get_option( 'divi_google_url', '#' ) ); ?>" class="icon" target="_blank">
			<span><?php esc_html_e( 'Google', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>

<?php if(!empty($socialLinkedIn)) : ?>
	<li class="et-social-icon et-social-linkedin">
	<a href="<?php echo et_sanitize_html_input_text($socialLinkedIn); ?>" class="icon" target="_blank">
	<span><?php esc_html_e( 'LinkedIn', 'Divi' ); ?></span>
	</a>
	</li>
<?php endif; ?>
<?php if(!empty($socialPinterest)) : ?>
	<li class="et-social-icon et-social-pinterest">
	<a href="<?php echo et_sanitize_html_input_text($socialPinterest); ?>" class="icon" target="_blank">
	<span><?php esc_html_e( 'Pinterest', 'Divi' ); ?></span>
	</a>
	</li>
<?php endif; ?>

<?php if(!empty($socialYouTube)) : ?>
	<li class="et-social-icon et-social-youtube">
	<a href="<?php echo et_sanitize_html_input_text($socialYouTube); ?>" class="icon" target="_blank">
	<span><?php esc_html_e( 'YouTube', 'Divi' ); ?></span>
	</a>
	</li>
<?php endif; ?>

<?php if(!empty($socialVimeo)) : ?>
	<li class="et-social-icon et-social-vimeo">
	<a href="<?php echo et_sanitize_html_input_text($socialVimeo); ?>" class="icon" target="_blank">
	<span><?php esc_html_e( 'Vimeo', 'Divi' ); ?></span>
	</a>
	</li>
<?php endif; ?>

<?php if(!empty($socialInstagram)) : ?>
	<li class="et-social-icon et-social-instagram">
	<a href="<?php echo et_sanitize_html_input_text($socialInstagram); ?>" class="icon" target="_blank">
	<span><?php esc_html_e( 'Instagram', 'Divi' ); ?></span>
	</a>
	</li>
<?php endif; ?>

<?php if(!empty($socialSnapchat)) : ?>
	<li class="et-social-icon et-social-snapchat">
	<a href="<?php echo et_sanitize_html_input_text($socialSnapchat); ?>" class="icon fa-icon" target="_blank">
	<span><?php esc_html_e( 'Snapchat', 'Divi' ); ?></span>
	</a>
	</li>
<?php endif; ?>

<?php if(!empty($socialEmail)) : ?>
	<li class="et-social-icon et-social-email">
	<a href="mailto:<?php echo et_sanitize_html_input_text($socialEmail); ?>" class="icon">
	<span><?php esc_html_e( 'Email', 'Divi' ); ?></span>
	</a>
	</li>
<?php endif; ?>
<?php if ( 'on' === et_get_option( 'divi_show_rss_icon', 'on' ) ) : ?>
<?php
	$et_rss_url = '' !== et_get_option( 'divi_rss_url' )
		? et_get_option( 'divi_rss_url' )
		: get_bloginfo( 'rss2_url' );
?>
	<li class="et-social-icon et-social-rss">
		<a href="<?php echo esc_url( $et_rss_url ); ?>" class="icon" target="_blank">
			<span><?php esc_html_e( 'RSS', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>
</ul>
