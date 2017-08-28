<?php 
/*
Plugin Name: My Featured Content
Version: 1.0
Plugin URI: http://danielpataki.com
Description: Allows you to add an arbitrary featured item to the sidebar. Includes a title, image, description and a link.
Author: Daniel Pataki
Author URI: http://danielpataki.com/
Text Domain: my_featured_content
*/

add_action( 'widgets_init', 'mfc_init' );

function mfc_init() {
	register_widget( 'mfc_widget' );
}

class mfc_widget extends WP_Widget
{

    public function __construct()
    {
        $widget_details = array(
            'classname' => 'mfc_widget',
            'description' => 'Creates a featured item consisting of a title, image, description and link.'
        );

        parent::__construct( 'mfc_widget', 'Featured Item Widget', $widget_details );

        add_action('admin_enqueue_scripts', array($this, 'mfc_assets'));
    }


public function mfc_assets()
{
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('mfc-media-upload', get_template_directory_uri() . '/assets/js/mfc-media-upload.js', array('jquery'));
    wp_enqueue_style('thickbox');
}


    public function widget( $args, $instance )
    {
		// echo $args['before_widget'];
		// if ( ! empty( $instance['title'] ) ) {
		// 	echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        // }
        
        

		?>

		<!-- <p> -->
		<!-- <img src='<?php echo $instance['image'] ?>'> -->
		<!-- </p> -->
		
		<!-- <div class='mfc-description'> -->
			<!-- <?php echo wpautop( esc_html( $instance['description'] ) ) ?> -->
		<!-- </div> -->

		<div class='mfc-link'>
            <div class="col-md-6">
            <div class="partner-profile-area">
                <div class="partner-profile-area__logo" style="background-image:url(<?php echo $instance['image'] ?>)"></div>
                <div class="partner-profile-area__content">
                    <p><?php echo $instance['description'] ?></p>
                    <a href='<?php echo esc_url( $instance['link_url'] ) ?>' class="btn btn-primary">View documentation</a>
                </div>
                <div class="clearfix"></div>
            </div>
            </div>            
		</div>

		<?php

		echo $args['after_widget'];
    }

	public function update( $new_instance, $old_instance ) {  
	    return $new_instance;
	}

    public function form( $instance )
    {

		$title = '';
	    if( !empty( $instance['title'] ) ) {
	        $title = $instance['title'];
	    }

	    $description = '';
	    if( !empty( $instance['description'] ) ) {
	        $description = $instance['description'];
	    }

	    $link_url = '';
	    if( !empty( $instance['link_url'] ) ) {
	        $link_url = $instance['link_url'];
	    }

	    $link_title = '';
	    if( !empty( $instance['link_title'] ) ) {
	        $link_title = $instance['link_title'];
	    }

		$image = '';
		if(isset($instance['image']))
		{
		    $image = $instance['image'];
		}
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'description' ); ?>"><?php _e( 'Description:' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" ><?php echo esc_attr( $description ); ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'link_url' ); ?>"><?php _e( 'Link URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link_url' ); ?>" name="<?php echo $this->get_field_name( 'link_url' ); ?>" type="text" value="<?php echo esc_attr( $link_url ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'link_title' ); ?>"><?php _e( 'Link Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link_title' ); ?>" name="<?php echo $this->get_field_name( 'link_title' ); ?>" type="text" value="<?php echo esc_attr( $link_title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button" type="button" value="Upload Image" />
        </p>
    <?php
    }
}