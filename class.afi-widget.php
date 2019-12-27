<?php
/**
 * Animated Featured Image Widget
 */
class AFI_Widget extends WP_Widget {
	
	/**
	 * Plugin Constructor (Sets up the widgets name etc)
	 */
	public function __construct() {
		parent::__construct(
			'AFI_Widget', // Base ID
			'Animated Featured Image', // Name
			array('description' => 'Responsive Featured Image for Sidebar Widgets with CSS3 Animations and Styles' )
		);
	}

	/**
	 * Frontend	Display
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters('widget_title', esc_attr($instance['title']));
		$image_src = $instance['image_src'];
		$image_url = $instance['image_url'];
		$image_caption = $instance['image_caption'];
		$thumbnail = $instance['thumbnail'];
		$rounded = $instance['rounded'];
		$padding = $instance['padding'];
		$circular = $instance['circular'];
		$zoom = $instance['zoom'];
		$rotate = $instance['rotate'];
		$bnw = $instance['bnw'];
		$blur = $instance['blur'];

		if( empty($title) ){
			$title = 'Animated Featured Image';
		}

		?>
			<?php echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>
                <?php
        		        
                if ($thumbnail == true) {
		        	$thumbnail_styles = 'afi-thumbnail';
		        } else {
		        	$thumbnail_styles = '';
		        }

		        if ($rounded == true) {
		        	$rounded_styles = 'afi-rounded';
		        } else {
		        	$rounded_styles = '';
		        }

		        if ($circular == true) {
		        	$circular_styles = 'afi-circular';
		        } else {
		        	$circular_styles = '';
		        }

		        if ($padding == true) {
		        	$padding_styles = 'afi-padding';
		        } else {
		        	$padding_styles = '';
		        }

		        if ($zoom == true) {
		        	$zoom_styles = 'afi-zoom';
		        } else {
		        	$zoom_styles = '';
		        }

		        if ($rotate == true) {
		        	$rotate_styles = 'afi-rotate';
		        } else {
		        	$rotate_styles = '';
		        }

		        if ($bnw == true) {
		        	$bnw_styles = 'afi-bnw';
		        } else {
		        	$bnw_styles = '';
		        }

		        if ($blur == true) {
		        	$blur_styles = 'afi-blur';
		        } else {
		        	$blur_styles = '';
		        }

				if ( !empty($image_url) ) { ?>
					<div class="afi-image <?php echo $thumbnail_styles . ' ' . $rounded_styles . ' ' . $circular_styles . ' ' . $padding_styles . ' ' . $zoom_styles . ' ' . $rotate_styles . ' ' . $bnw_styles . ' ' . $blur_styles; ?>">
						<a href="<?php echo $image_url; ?>" target="_blank">
	    					<img src="<?php echo $image_src; ?>">
	    					<h3><?php echo $image_caption; ?></h3>
						</a>
					</div>
				<?php
				} else {
                	echo '<p>Please enter Image Source URL.</p>';
				}
				?>
			<?php echo  $args['after_widget']; ?>
        <?php
	} // Widget
	
	/**
	 * Backend Form (Outputs the options form on admin)
	 */
	public function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance
		);
		
		$defaults = array(
			'title' => 'Featured Image',
			'image_src' => '',
			'image_url' => '',
			'image_caption' => '',
			'thumbnail' => '',
			'rounded' => '',
			'circular' => '',
			'padding' => '',
			'zoom' => '',
			'rotate' => '',
			'bnw' => '',
			'blur' => ''
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title = $instance['title'];
		$image_src = $instance['image_src'];
		$image_url = $instance['image_url'];
		$image_caption = $instance['image_caption'];
		$thumbnail = $instance['thumbnail'];
		$rounded = $instance['rounded'];
		$circular = $instance['circular'];
		$padding = $instance['padding'];
		$zoom = $instance['zoom'];
		$rotate = $instance['rotate'];
		$bnw = $instance['bnw'];
		$blur = $instance['blur'];
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label> 
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
            
			<p>
				<label for="<?php echo $this->get_field_id('image_src'); ?>">Image Source:</label> 
				<input class="widefat" id="<?php echo $this->get_field_id('image_src'); ?>" name="<?php echo $this->get_field_name('image_src'); ?>" type="text" value="<?php echo $image_src; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('image_url'); ?>">Image Link (on click):</label> 
				<input class="widefat" id="<?php echo $this->get_field_id('image_url'); ?>" name="<?php echo $this->get_field_name('image_url'); ?>" type="text" value="<?php echo $image_url; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('image_caption'); ?>">Image Caption:</label> 
				<input class="widefat" id="<?php echo $this->get_field_id('image_caption'); ?>" name="<?php echo $this->get_field_name('image_caption'); ?>" type="text" value="<?php echo $image_caption; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('thumbnail'); ?>">Thumbnail Image:</label>
				<input class="checkbox" type="checkbox" <?php checked($instance['thumbnail'], 'on'); ?> id="<?php echo $this->get_field_id('thumbnail'); ?>" name="<?php echo $this->get_field_name('thumbnail'); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('rounded'); ?>">Rounded Image:</label>
				<input class="checkbox" type="checkbox" <?php checked($instance['rounded'], 'on'); ?> id="<?php echo $this->get_field_id('rounded'); ?>" name="<?php echo $this->get_field_name('rounded'); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('circular'); ?>">Circular Image:</label>
				<input class="checkbox" type="checkbox" <?php checked($instance['circular'], 'on'); ?> id="<?php echo $this->get_field_id('circular'); ?>" name="<?php echo $this->get_field_name('circular'); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('padding'); ?>">Add Padding :</label>
				<input class="checkbox" type="checkbox" <?php checked($instance['padding'], 'on'); ?> id="<?php echo $this->get_field_id('padding'); ?>" name="<?php echo $this->get_field_name('padding'); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('zoom'); ?>">Zoom Animation:</label>
				<input class="checkbox" type="checkbox" <?php checked($instance['zoom'], 'on'); ?> id="<?php echo $this->get_field_id('zoom'); ?>" name="<?php echo $this->get_field_name('zoom'); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('rotate'); ?>">Rotate Animation:</label>
				<input class="checkbox" type="checkbox" <?php checked($instance['rotate'], 'on'); ?> id="<?php echo $this->get_field_id('rotate'); ?>" name="<?php echo $this->get_field_name('rotate'); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('bnw'); ?>">Black and White on Hover:</label>
				<input class="checkbox" type="checkbox" <?php checked($instance['bnw'], 'on'); ?> id="<?php echo $this->get_field_id('bnw'); ?>" name="<?php echo $this->get_field_name('bnw'); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('blur'); ?>">Blur on Hover:</label>
				<input class="checkbox" type="checkbox" <?php checked($instance['blur'], 'on'); ?> id="<?php echo $this->get_field_id('blur'); ?>" name="<?php echo $this->get_field_name('blur'); ?>" />
			</p>
			<p>
				<ul>
					<li><strong>Note:</strong></li>
					<li>Add padding and if want to use zoom or rotate option.</li>
					<li>Also try to use one animation(either zoom or rotate).</li>
					<li>If want to use circular styles then image's height & width should be same.</li>
				</ul>
			</p>
        <?php
		
	} // Backend Form

	/**
	 * Update Method (Processing widget options on save)
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['image_src'] = strip_tags($new_instance['image_src']);
		$instance['image_url'] = strip_tags($new_instance['image_url']);
		$instance['image_caption'] = strip_tags($new_instance['image_caption']);
		$instance['thumbnail'] = strip_tags($new_instance['thumbnail']);
		$instance['rounded'] = strip_tags($new_instance['rounded']);
		$instance['circular'] = strip_tags($new_instance['circular']);
		$instance['padding'] = strip_tags($new_instance['padding']);
		$instance['zoom'] = strip_tags($new_instance['zoom']);
		$instance['rotate'] = strip_tags($new_instance['rotate']);
		$instance['bnw'] = strip_tags($new_instance['bnw']);
		$instance['blur'] = strip_tags($new_instance['blur']);
		return $instance;
	} // Update Method
	
}
add_action('widgets_init', create_function('', 'return register_widget("AFI_Widget");') );