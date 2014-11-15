<?php
class gallery_Widget extends WP_Widget{
  function gallery_Widget(){
      $widget_ops = array('classname' => 'gallery_Widget', 'description' => 'Use a gallery');
      $this->WP_Widget('gallery_Widget', 'Gallery', $widget_ops);
  }

  function form($instance){ 
    $type = 'foogallery';
	$args=array(
	  'post_type' => $type,
	  'post_status' => 'publish',
	  'posts_per_page' => -1,
	  'caller_get_posts'=> 1
	);
	$my_query = null;
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) {
		?>
		<p> Select a Gallery </p>
		<select id="<?= $this->get_field_id('id');?>" name="<?= $this->get_field_name('id'); ?>">
    		<option value="" <?php selected($instance['id'],'');?>>Select a Galley</option>
			<?php
			while ($my_query->have_posts()) : $my_query->the_post(); ?>
		    	<option value="<?= get_the_ID(); ?>">
		    		<?php the_title(); ?>
				</option>
			<?php endwhile;?>
	  </select>
	  <?php
	}
	wp_reset_query();  // Restore global post data stomped by the_post().
	}

	function update($new_instance, $old_instance){
	    $instance = $old_instance;
	    $instance['id'] = $new_instance['id'];
	    return $instance;
	}
	
	function widget($args, $instance){
	    echo do_shortcode("[foogallery id='".$instance['id']."']");
	}
}

add_action( 'widgets_init', create_function('', 'return register_widget("gallery_Widget");') );