<?php
$instance = FooGallery_Plugin::get_instance();
$info = $instance->get_plugin_info();
$title = apply_filters( 'foogallery_admin_help_title', sprintf( 'Welcome to %s %s', foogallery_plugin_name(), $info['version'] ) );
$tagline = apply_filters( 'foogallery_admin_help_tagline', sprintf( __( 'Thank you for choosing %s, the most intuitive and extensible gallery creation and management tool ever created for WordPress!', 'foogallery' ), foogallery_plugin_name() ) );
$show_tabs = apply_filters( 'foogallery_admin_help_show_tabs', true );
$show_extensions_section = apply_filters( 'foogallery_admin_help_show_extensions_section', true );
?>
<style>
	.about-wrap img.foogallery-help-screenshot {
		float:right;
		margin-left: 20px;
	}
	.feature-section h2 { margin-top: 0; }

</style>
<div class="wrap about-wrap">
	<h2><?php echo $title; ?></h2>
	<div class="about-text">
		<?php echo $tagline; ?>
	</div>
	<?php if ( $show_tabs ) { ?>
	<h2 class="nav-tab-wrapper">
		<a class="nav-tab nav-tab-active" href="#">Getting Started</a>
<!-- 		<a class="nav-tab" href="<?php echo foogallery_admin_extensions_url(); ?>">Extensions</a> -->
	</h2>
	<?php } else { ?><hr /><?php } ?>
	<div class="changelog">
		<div class="feature-section">
			<img src="<?= FOOGALLERY_URL . 'assets/screenshots/admin-edit-gallery.jpg'; ?>" class="foogallery-help-screenshot"/>

			<h2>Creating Your First Gallery</h2>
			<h4><a href="<?= admin_url( 'post-new.php?post_type=foogallery' )?>">Galleries &rarr; Add New</a></h4>
			<p>To create your first gallery, simply click the Add New button or click the Add Gallery menu link. Then choose images from the media library to include in your gallery.</p>

			<h4>Drag and Drop Reordering</h4>
			<p>Sort the images in your gallery simply by dragging them around.</p>

			<h4>Gallery Templates</h4>
			<p>Choose one of our built-in gallery templates or download one via our extension library.</p>

			<h4>Lightbox Support</h4>
			<p>Our default gallery template supports FooBox : our popular responsive image lightbox.</p>
		</div>
	</div>

	<?php do_action( 'foogallery_admin_help_after_section_one' ); ?>

	<div class="changelog">

		<div class="feature-section">
			<img src="<?php echo FOOGALLERY_URL . 'assets/screenshots/admin-insert-shortcode.jpg'; ?>" class="foogallery-help-screenshot"/>

			<h2><?php _e( 'Show Off Your Gallery', 'foogallery' );?></h2>

			<h4><?php printf( __( 'The <em>[%s]</em> Short Code','foogallery' ), foogallery_gallery_shortcode_tag() );?></h4>
			<p><?php _e( 'Simply copy the shortcode code from the gallery listing page and paste it into your posts or pages.', 'foogallery' );?></p>

			<h4><?php _e( 'Visual Editor Button', 'foogallery' );?></h4>
			<p><?php printf( __( 'Or to make life even easier, you can insert a gallery using the Add %s button inside the WordPress visual editor.', 'foogallery' ), foogallery_plugin_name() );?></p>

			<h4><?php _e( 'Copy To Clipboard','foogallery' );?></h4>
			<p><?php _e( 'We make your life easy! Just click the shortcodes and they get copied to your clipboard automatically. ', 'foogallery' );?></p>

		</div>
	</div>

	<?php do_action( 'foogallery_admin_help_after_section_two' ); ?>

	<?php if ( $show_extensions_section ) { ?>
	<div class="changelog">

		<div class="feature-section">

			<img src="<?php echo FOOGALLERY_URL . 'assets/screenshots/admin-extensions.jpg'; ?>" class="foogallery-help-screenshot"/>

			<h2><?php _e( 'Create Your Own Extensions', 'foogallery' );?></h2>

			<h4><?php _e( 'Easy To Code','foogallery' );?></h4>
			<p><?php printf( __( 'We have done all the hard work to make your life easier. Creating an extension for %s can be done in a couple lines of code.', 'foogallery' ), foogallery_plugin_name() );?></p>

			<h4><?php _e( 'Actions and Filters', 'foogallery' );?></h4>
			<p><?php printf( __( 'We coded %s with extensibility in mind. There are hundreds of actions and filters and helper functions to change every aspect of the plugin.', 'foogallery' ), foogallery_plugin_name() );?></p>

			<h4><?php _e( 'Host Anywhere', 'foogallery' );?></h4>
			<p><?php _e( 'Host your extensions on the WordPress.org plugin repo, or GitHub, or even in your own Amazon S3 bucket. You have the power and choice!', 'foogallery' );?></p>

		</div>
	</div>
	<?php } ?>
	<?php do_action( 'foogallery_admin_help_after_section_three' ); ?>

</div>
