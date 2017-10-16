<?php
	class FPP_Widget extends WP_Widget
	{
		function __construct()
		{
			parent::__construct(
				'facebook-page-plugin',
				__('Facebook Page Plugin', 'fpp'),
				[
					'description' => __('Add facebook page to your WordPress webstite.', 'fpp')
				]
			);
		}

		public function widget($args, $instance)
		{
			$data = [];
			$data['title'] = esc_attr($instance['title']);
			$data['page_url'] = esc_attr($instance['page_url']);
			$data['adapt_container'] = esc_attr($instance['adapt_container']);
			$data['width'] = esc_attr($instance['width']);
			$data['height'] = esc_attr($instance['height']);
			$data['show_timeline'] = esc_attr($instance['show_timeline']);
			$data['show_faces'] = esc_attr($instance['show_faces']);
			$data['use_small_header'] = esc_attr($instance['use_small_header']);
			$data['hide_cover_image'] = esc_attr($instance['hide_cover_image']);

			echo $args['before_widget'];
				echo $args['before_title'];
					echo $data['title'];
				echo $args['after_title'];

				echo $this->displayFPPWidget($data);
			echo $args['after_widget'];
		}

		public function form($instance)
		{
			echo $this->displayFPPAdminForm($instance);
		}

		public function update($new_instance, $old_instance)
		{
			$instance = [];
				$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
				$instance['page_url'] = (!empty($new_instance['page_url'])) ? strip_tags($new_instance['page_url']) : '';
				$instance['adapt_container'] = (!empty($new_instance['adapt_container'])) ? strip_tags($new_instance['adapt_container']) : '';
				$instance['width'] = (!empty($new_instance['width'])) ? strip_tags($new_instance['width']) : '';
				$instance['height'] = (!empty($new_instance['height'])) ? strip_tags($new_instance['height']) : '';
				$instance['show_faces'] = (!empty($new_instance['show_faces'])) ? strip_tags($new_instance['show_faces']) : '';
				$instance['show_timeline'] = (!empty($new_instance['show_timeline'])) ? strip_tags($new_instance['show_timeline']) : '';
				$instance['use_small_header'] = (!empty($new_instance['use_small_header'])) ? strip_tags($new_instance['use_small_header']) : '';
				$instance['hide_cover_image'] = (!empty($new_instance['hide_cover_image'])) ? strip_tags($new_instance['hide_cover_image']) : '';

 			return $instance;
		}

		private function displayFPPAdminForm($instance)
		{
			if (isset($instance['title'])) {
				$title = $instance['title'];
			}else{
				$title = __('Like Us on Facebook', 'fpp');
			}

			if (isset($instance['page_url'])) {
				$page_url = $instance['page_url'];
			}else{
				$page_url = 'https://www.facebook.com/RedLightMagazine';
			}

			if (isset($instance['adapt_container'])) {
				$adapt_container = $instance['adapt_container'];
			}else{
				$adapt_container = 'true';
			}

			if (isset($instance['width'])) {
				$width = $instance['width'];
			}else{
				$width = 250;
			}

			if (isset($instance['height'])) {
				$height = $instance['height'];
			}else{
				$height = 500;
			}

			if (isset($instance['show_timeline'])) {
				$show_timeline = $instance['show_timeline'];
			}else{
				$show_timeline = 'true';
			}

			if (isset($instance['show_faces'])) {
				$show_faces = $instance['show_faces'];
			}else{
				$show_faces = 'true';
			}

			if (isset($instance['use_small_header'])) {
				$use_small_header = $instance['use_small_header'];
			}else{
				$use_small_header = 'false';
			}

			if (isset($instance['hide_cover_image'])) {
				$hide_cover_image = $instance['hide_cover_image'];
			}else{
				$hide_cover_image = 'false';
			}
			?>
				
				<p>
					<label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title', 'fpp'); ?></label>
					<input type="text" class="widefat" value="<?php echo esc_attr($title); ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('page_url') ?>"><?php _e('Page URL', 'fpp'); ?></label>
					<input type="text" class="widefat" value="<?php echo esc_attr($page_url); ?>" name="<?php echo $this->get_field_name('page_url'); ?>" id="<?php echo $this->get_field_id('page_url'); ?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('show_timeline') ?>"><?php _e('Show Timeline', 'fpp'); ?></label>
					<select class="widefat" value="<?php echo esc_attr($show_timeline); ?>" name="<?php echo $this->get_field_name('show_timeline'); ?>" id="<?php echo $this->get_field_id('show_timeline'); ?>">
						<option value="true" <?php echo ($show_timeline == 'true') ? 'selected' : '' ?>>Show the Timeline</option>
						<option value="false" <?php echo ($show_timeline == 'false') ? 'selected' : '' ?>>Not Show the Timeline</option>
					</select>
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('adapt_container') ?>"><?php _e('Adapt Container', 'fpp'); ?></label>
					<select class="widefat" value="<?php echo esc_attr($adapt_container); ?>" name="<?php echo $this->get_field_name('adapt_container'); ?>" id="<?php echo $this->get_field_id('adapt_container'); ?>">
						<option value="true" <?php echo ($adapt_container == 'true') ? 'selected' : '' ?>>Fill the Container</option>
						<option value="false" <?php echo ($adapt_container == 'false') ? 'selected' : '' ?>>Not Fill the Container</option>
					</select>
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('width') ?>"><?php _e('Width', 'fpp'); ?></label>
					<input type="text" class="widefat" value="<?php echo esc_attr($width); ?>" name="<?php echo $this->get_field_name('width'); ?>" id="<?php echo $this->get_field_id('width'); ?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('height') ?>"><?php _e('Height', 'fpp'); ?></label>
					<input type="text" class="widefat" value="<?php echo esc_attr($height); ?>" name="<?php echo $this->get_field_name('height'); ?>" id="<?php echo $this->get_field_id('height'); ?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('show_faces') ?>"><?php _e('Show Faces', 'fpp'); ?></label>
					<select class="widefat" value="<?php echo esc_attr($show_faces); ?>" name="<?php echo $this->get_field_name('show_faces'); ?>" id="<?php echo $this->get_field_id('show_faces'); ?>">
						<option value="true" <?php echo ($show_faces == 'true') ? 'selected' : '' ?>>Show Faces</option>
						<option value="false" <?php echo ($show_faces == 'false') ? 'selected' : '' ?>>Do Not Show Faces</option>
					</select>
				</p>
				
				<p>
					<label for="<?php echo $this->get_field_id('use_small_header') ?>"><?php _e('Use Small Header', 'fpp'); ?></label>
					<select class="widefat" value="<?php echo esc_attr($use_small_header); ?>" name="<?php echo $this->get_field_name('use_small_header'); ?>" id="<?php echo $this->get_field_id('use_small_header'); ?>">
						<option value="true" <?php echo ($use_small_header == 'true') ? 'selected' : '' ?>>Use Small Header</option>
						<option value="false" <?php echo ($use_small_header == 'false') ? 'selected' : '' ?>>Do Not Use Small Header</option>
					</select>
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('hide_cover_image') ?>"><?php _e('Hide Cover Photo', 'fpp'); ?></label>
					<select class="widefat" value="<?php echo esc_attr($hide_cover_image); ?>" name="<?php echo $this->get_field_name('hide_cover_image'); ?>" id="<?php echo $this->get_field_id('hide_cover_image'); ?>">
						<option value="true" <?php echo ($hide_cover_image == 'true') ? 'selected' : '' ?>>Show Cover Photo</option>
						<option value="false" <?php echo ($hide_cover_image == 'false') ? 'selected' : '' ?>>Hide Cover Photo</option>
					</select>
				</p>

			<?php
		}	

		private function displayFPPWidget($data)
		{
			?>
				<div class="fb-page"
					data-href="<?php echo $data['page_url'] ?>"
					<?php if($data['show_timeline'] == 'true'): ?>
						data-tabs="timeline"
					<?php endif; ?>
					data-small-header="<?php echo $data['use_small_header'] ?>"
					<?php if($data['adapt_container'] == 'false'): ?>
						data-width="<?php echo $data['width'] ?>"
						data-height="<?php echo $data['height'] ?>"
					<?php else: ?>
						data-adapt-container-width="<?php $data['adapt_container'] ?>"
					<?php endif; ?>
					data-hide-cover="<?php echo $data['hide_cover_image'] ?>"
					data-show-facepile="<?php echo $data['show_faces'] ?>">
				</div>
			<?php
		}
	}