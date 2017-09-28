<?php
class ET_Divi_Slick_Gallery extends ET_Builder_Module{
	function init() {
		$this->name       = esc_html__( 'Slick Gallery', 'divi_slick_gallery' );
		$this->slug       = 'et_pb_slick_gallery';
		$this->fb_support = false;

		$this->whitelisted_fields = array(
			'src',
			'gallery_ids',
			'gallery_orderby',
			'fullwidth',
			'posts_number',
			'show_title_and_caption',
			'show_pagination',
			'background_layout',
			'auto',
			'auto_speed',
			'speed',
			'auto_play_speed',
			'admin_label',
			'module_id',
			'autoplay',
			'velocidad',
			'module_class',
			'zoom_icon_color',
			'hover_overlay_color',
			'hover_icon',
			'accessibility',
			'adaptive_height',
			'arrows',
			'prev_arrow',
			'next_arrow',
			'center_mode',
			'center_padding',
			'css_ease',
			'dots',
			'dots_class',
			'draggable',
			'fade',
			'focus_on_select',
			'easing',
			'edge_friction',
			'infinite',
			'slides_to_show_in_xl',
			'slides_to_scroll_in_xl',
			'slides_to_show_in_lg',
			'slides_to_scroll_in_lg',
			'slides_to_show_in_md',
			'slides_to_scroll_in_md',
			'slides_to_show_in_sm',
			'slides_to_scroll_in_sm',
		);

		$this->fields_defaults = array(
			'posts_number'           => array( 4, 'add_default_setting' ),
			'show_title_and_caption' => array( 'on' ),
			'show_pagination'        => array( 'on' ),
			'show_dots'        => array( 'on' ),
			'background_layout'      => array( 'light' ),
			'auto'                   => array( 'off' ),
			'auto_speed'             => array( '7000' ),
			'speed'=>array('300'),
			'accessibility'=>array('on'),
			'adaptive_height'=>array('off'),
			'autoplay'=>array('off'),
			'auto_play_speed'=>array('3000'),
			'arrows'=>array('on'),
			'center_padding'=>array('50px'),
			'center_mode'=>array('off'),
			'css_ease'=>array('ease'),
			'dots'=>array('off'),
			'dotsClass'=>array('slick-dots'),
			'draggable'=>array('on'),
			'fade'=>array('off'),
			'focus_on_select'=>array('off'),
			'easing'=>array('linear'),
			'edge_friction'=>array('0.15'),
			'infinite'=>array('on'),
			'slides_to_show_in_xl'=>array(4),
			'slides_to_scroll_in_xl'=>array(1),
			'slides_to_show_in_lg'=>array(3),
			'slides_to_scroll_in_lg'=>array(1),
			'slides_to_show_in_md'=>array(2),
			'slides_to_scroll_in_md'=>array(1),
			'slides_to_show_in_sm'=>array(1),
			'slides_to_scroll_in_sm'=>array(1),
		);

		$this->main_css_element = '%%order_class%%.et_pb_gallery';
		$this->advanced_options = array(
			'fonts' => array(
				'caption' => array(
					'label'    => esc_html__( 'Caption', 'et_builder' ),
					'use_all_caps' => true,
					'css'      => array(
						'main' => "{$this->main_css_element} .mfp-title, {$this->main_css_element} .et_pb_gallery_caption",
					),
					'line_height' => array(
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
					),
				),
				'title'   => array(
					'label'    => esc_html__( 'Title', 'et_builder' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .et_pb_gallery_title",
					),
				),
			),
			'border' => array(
				'css' => array(
					'main' => "{$this->main_css_element} .et_pb_gallery_item",
				),
			),
		);

		$this->custom_css_options = array(
			'gallery_item' => array(
				'label'    => esc_html__( 'Gallery Item', 'et_builder' ),
				'selector' => '.et_pb_gallery_item',
			),
			'overlay' => array(
				'label'    => esc_html__( 'Overlay', 'et_builder' ),
				'selector' => '.et_overlay',
			),
			'overlay_icon' => array(
				'label'    => esc_html__( 'Overlay Icon', 'et_builder' ),
				'selector' => '.et_overlay:before',
			),
			'gallery_item_title' => array(
				'label'    => esc_html__( 'Gallery Item Title', 'et_builder' ),
				'selector' => '.et_pb_gallery_title',
			),
			'gallery_item_caption' => array(
				'label'    => esc_html__( 'Gallery Item Caption', 'et_builder' ),
				'selector' => '.et_pb_gallery_caption',
			),
			'gallery_pagination' => array(
				'label'    => esc_html__( 'Gallery Pagination', 'et_builder' ),
				'selector' => '.et_pb_gallery_pagination',
			),
			'gallery_pagination_active' => array(
				'label'    => esc_html__( 'Pagination Active Page', 'et_builder' ),
				'selector' => '.et_pb_gallery_pagination a.active',
			),
		);
	}

	function get_fields() {
		$fields = array(
			'src' => array(
				'label'           => esc_html__( 'Gallery Images', 'et_builder' ),
				'renderer'        => 'et_builder_get_gallery_settings',
				'option_category' => 'basic_option',
				'overwrite'       => array(
					'ids'         => 'gallery_ids',
					'orderby'     => 'gallery_orderby',
				),
			),
			'gallery_ids' => array(
				'type'  => 'hidden',
				'class' => array( 'et-pb-gallery-ids-field' ),
				'computed_affects'   => array(
					'__gallery',
				),
			),
			'gallery_orderby' => array(
				'label' => esc_html__( 'Gallery Images', 'et_builder' ),
				'type'  => 'hidden',
				'class' => array( 'et-pb-gallery-ids-field' ),
				'computed_affects'   => array(
					'__gallery',
				),
			),
		//	'fullwidth' => array(
		//		'label'             => esc_html__( 'Layout', 'et_builder' ),
		//		'type'              => 'select',
		//		'option_category'   => 'layout',
		//		'options'           => array(
		//			'on'  => esc_html__( 'Slider', 'et_builder' ),
		//			'off' => esc_html__( 'Grid', 'et_builder' ),
		//		),
		//		'description'       => esc_html__( 'Toggle between the various blog layout types.', 'et_builder' ),
		//		'affects'           => array(
		//			'zoom_icon_color',
		//			'caption_font',
		//			'caption_font_color',
		//			'caption_font_size',
		//			'hover_overlay_color',
		//			'auto',
		//			'posts_number',
		//			'show_title_and_caption',
		//		),
		//	),
		//	'posts_number' => array(
		//		'label'             => esc_html__( 'Images Number', 'et_builder' ),
		//		'type'              => 'text',
		//		'option_category'   => 'configuration',
		//		'description'       => esc_html__( 'Define the number of images that should be displayed per page.', 'et_builder' ),
		//		'depends_show_if'   => 'off',
		//	),
		//	'show_title_and_caption' => array(
		//		'label'              => esc_html__( 'Show Title and Caption', 'et_builder' ),
		//		'type'               => 'yes_no_button',
		//		'option_category'    => 'configuration',
		//		'options'            => array(
		//			'on'  => esc_html__( 'Yes', 'et_builder' ),
		//			'off' => esc_html__( 'No', 'et_builder' ),
		//		),
		//		'description'        => esc_html__( 'Here you can choose whether to show the images title and caption, if the image has them.', 'et_builder' ),
		//		'depends_show_if'    => 'off',
		//	),
			'accessibility' => array(
				'label'           => esc_html__('Accesibility', 'divi_slick_gallery' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi_slick_gallery' ),
					'off' => esc_html__( 'No', 'divi_slick_gallery' ),
				),
				'description'=>esc_html__('Enables tabbing and arrow key navigation','divi_slick_gallery')
			),
			'adaptive_height' => array(
				'label'           => esc_html__('Adaptive Height', 'divi_slick_gallery' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi_slick_gallery' ),
					'on'  => esc_html__( 'Yes', 'divi_slick_gallery' ),
				),
				'description'=>esc_html__('Enables adaptive height for single slide horizontal carousels','divi_slick_gallery')
			),
			'autoplay' => array(
				'label'           => esc_html__('Autoplay', 'divi_slick_gallery' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi_slick_gallery' ),
					'on'  => esc_html__( 'Yes', 'divi_slick_gallery' ),
				),
				'description'=>esc_html('Enables Autoplay','divi_slick_gallery')
			),
			'auto_play_speed' => array(
				'label'           => esc_html__( 'Auto Play Speed', 'divi_slick_gallery' ),
				'type'            => 'text',
				'default'    	  =>'3000',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Autoplay Speed in milliseconds', 'divi_slick_gallery' ),
			),
			'arrows' => array(
				'label'           => esc_html__( 'Arrows', 'divi_slick_gallery' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi_slick_gallery' ),
					'off' => esc_html__( 'No', 'divi_slick_gallery' ),
				),
				'description'=>esc_html__('Prev/Next Arrows','divi_slick_gallery')
			),
			'prev_arrow' => array(
				'label'           => esc_html__( 'Change Prev  Arrow', 'divi_slick_gallery' ),
				'type'            => 'text',
				'default' 	  =>'<button type="button" class="slick-prev">Previous</button>',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Allows you to select a node or customize the HTML for the "Previous" arrow', 'divi_slick_gallery' ),
			),
			'next_arrow' => array(
				'label'           => esc_html__( 'Change Next Arrow', 'divi_slick_gallery' ),
				'type'            => 'text',
				'default' 	  =>'<button type="button" class="slick-next">Next</button>',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Allows you to select a node or customize the HTML for the "Next" arrow', 'divi_slick_gallery' ),
			),
			'center_mode' => array(
				'label'           => esc_html__('Center Mode', 'divi_slick_gallery' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi_slick_gallery' ),
					'on'  => esc_html__( 'Yes', 'divi_slick_gallery' ),
				),
				'description'=>esc_html__('Enables centered view with partial prev/next slides. Use with odd numbered slidesToShow counts.','divi_slick_gallery')
			),
			'center_padding' => array(
				'label'           => esc_html__( 'Center Padding', 'divi_slick_gallery' ),
				'type'            => 'text',
				'default' 	  =>'50px',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Side padding when in center mode (px or %)', 'divi_slick_gallery' ),
			),
			'easing' => array(
				'label'           => esc_html__( 'Ease', 'divi_slick_gallery' ),
				'type'            => 'text',
				'default' 	  =>'ease',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'CSS3 Animation Easing', 'divi_slick_gallery' ),
			),
			'css_ease' => array(
				'label'           => esc_html__( 'Css Ease', 'divi_slick_gallery' ),
				'type'            => 'text',
				'default' 	  =>'ease',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'CSS3 Animation Easing', 'divi_slick_gallery' ),
			),
			'dots' => array(
				'label'           => esc_html__('Dots', 'divi_slick_gallery' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi_slick_gallery' ),
					'on'  => esc_html__( 'Yes', 'divi_slick_gallery' ),
				),
				'description'=>esc_html__('Show dot indicators','divi_slick_gallery')
			),
			'dots_class' => array(
				'label'           => esc_html__( 'Dots Class', 'divi_slick_gallery' ),
				'type'            => 'text',
				'default' 	  =>'slick-dots',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Class for slide indicator dots container', 'divi_slick_gallery' ),
			),
			'draggable' => array(
				'label'           => esc_html__('Draggable', 'divi_slick_gallery' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi_slick_gallery' ),
					'off' => esc_html__( 'No', 'divi_slick_gallery' ),
				),
				'description'=>esc_html__('Enable mouse dragging','divi_slick_gallery')
			),
			'infinite' => array(
				'label'           => esc_html__('Infinite', 'divi_slick_gallery' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi_slick_gallery' ),
					'off' => esc_html__( 'No', 'divi_slick_gallery' ),
				),
				'description'=>esc_html__('Infinite loop sliding','divi_slick_gallery')
			),
			'speed' => array(
				'label'           => esc_html__( 'Fade Speed', 'divi_slick_gallery' ),
				'type'            => 'text',
				'default' 	  =>'300',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Slide/Fade animation speed', 'divi_slick_gallery' ),
			),
			'slides_to_show_in_xl' => array(
				'label'           => esc_html__( 'Slides To Show in XL Devices', 'divi_slick_gallery' ),
				'type'            => 'number',
				'attributes' 	  =>'min=0 ',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Autoplay Speed in milliseconds', 'divi_slick_gallery' ),
			),
			'slides_to_scroll_in_xl' => array(
				'label'           => esc_html__( 'Slides To Scroll in XL Devices', 'divi_slick_gallery' ),
				'type'            => 'number',
				'attributes' 	  =>'min=0 ',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Autoplay Speed in milliseconds', 'divi_slick_gallery' ),
			),
			'slides_to_show_in_lg' => array(
				'label'           => esc_html__( 'Slides To Show in LG Devices', 'divi_slick_gallery' ),
				'type'            => 'number',
				'attributes' 	  =>'min=0 ',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Autoplay Speed in milliseconds', 'divi_slick_gallery' ),
			),
			'slides_to_scroll_in_lg' => array(
				'label'           => esc_html__( 'Slides To Scroll in LG Devices', 'divi_slick_gallery' ),
				'type'            => 'number',
				'attributes' 	  =>'min=0 ',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Autoplay Speed in milliseconds', 'divi_slick_gallery' ),
			),
			'slides_to_show_in_md' => array(
				'label'           => esc_html__( 'Slides To Show in MD Devices', 'divi_slick_gallery' ),
				'type'            => 'number',
				'attributes' 	  =>'min=0 ',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Autoplay Speed in milliseconds', 'divi_slick_gallery' ),
			),
			'slides_to_scroll_in_md' => array(
				'label'           => esc_html__( 'Slides To Scroll in MD Devices', 'divi_slick_gallery' ),
				'type'            => 'number',
				'attributes' 	  =>'min=0 ',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Autoplay Speed in milliseconds', 'divi_slick_gallery' ),
			),
			'slides_to_show_in_sm' => array(
				'label'           => esc_html__( 'Slides To Show in SM Devices', 'divi_slick_gallery' ),
				'type'            => 'number',
				'attributes' 	  =>'min=0 ',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Autoplay Speed in milliseconds', 'divi_slick_gallery' ),
			),
			'slides_to_scroll_in_sm' => array(
				'label'           => esc_html__( 'Slides To Scroll in SM Devices', 'divi_slick_gallery' ),
				'type'            => 'number',
				'attributes' 	  =>'min=0 ',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Autoplay Speed in milliseconds', 'divi_slick_gallery' ),
			),
//			'background_layout' => array(
//				'label'             => esc_html__( 'Text Color', 'et_builder' ),
//				'type'              => 'select',
//				'option_category'   => 'color_option',
//				'options'           => array(
//					'light'  => esc_html__( 'Dark', 'et_builder' ),
//					'dark' => esc_html__( 'Light', 'et_builder' ),
//				),
//				'description'        => esc_html__( 'Here you can choose whether your text should be light or dark. If you are working with a dark background, then your text should be light. If your background is light, then your text should be set to dark.', 'et_builder' ),
//			),
//			'auto' => array(
//				'label'           => esc_html__( 'Automatic Animation', 'et_builder' ),
//				'type'            => 'yes_no_button',
//				'option_category' => 'configuration',
//				'options'         => array(
//					'off' => esc_html__( 'Off', 'et_builder' ),
//					'on'  => esc_html__( 'On', 'et_builder' ),
//				),
//				'affects' => array(
//					'auto_speed',
//				),
//				'depends_show_if'   => 'on',
//				'description'       => esc_html__( 'If you would like the slider to slide automatically, without the visitor having to click the next button, enable this option and then adjust the rotation speed below if desired.', 'et_builder' ),
//			),
//			'auto_speed' => array(
//				'label'             => esc_html__( 'Automatic Animation Speed (in ms)', 'et_builder' ),
//				'type'              => 'text',
//				'option_category'   => 'configuration',
//				'depends_default'   => true,
//				'description'       => esc_html__( "Here you can designate how fast the slider fades between each slide, if 'Automatic Animation' option is enabled above. The higher the number the longer the pause between each rotation.", 'et_builder' ),
//			),
//			'zoom_icon_color' => array(
//				'label'             => esc_html__( 'Zoom Icon Color', 'et_builder' ),
//				'type'              => 'color',
//				'custom_color'      => true,
//				'depends_show_if'   => 'off',
//				'tab_slug'          => 'advanced',
//			),
//			'hover_overlay_color' => array(
//				'label'             => esc_html__( 'Hover Overlay Color', 'et_builder' ),
//				'type'              => 'color-alpha',
//				'custom_color'      => true,
//				'depends_show_if'   => 'off',
//				'tab_slug'          => 'advanced',
//			),
//			'hover_icon' => array(
//				'label'               => esc_html__( 'Hover Icon Picker', 'et_builder' ),
//				'type'                => 'text',
//				'option_category'     => 'configuration',
//				'class'               => array( 'et-pb-font-icon' ),
//				'renderer'            => 'et_pb_get_font_icon_list',
//				'renderer_with_field' => true,
//				'tab_slug'            => 'advanced',
//			),
//			'disabled_on' => array(
//				'label'           => esc_html__( 'Disable on', 'et_builder' ),
//				'type'            => 'multiple_checkboxes',
//				'options'         => array(
//					'phone'   => esc_html__( 'Phone', 'et_builder' ),
//					'tablet'  => esc_html__( 'Tablet', 'et_builder' ),
//					'desktop' => esc_html__( 'Desktop', 'et_builder' ),
//				),
//				'additional_att'  => 'disable_on',
//				'option_category' => 'configuration',
//				'description'     => esc_html__( 'This will disable the module on selected devices', 'et_builder' ),
//			),
//			'admin_label' => array(
//				'label'       => esc_html__( 'Admin Label', 'et_builder' ),
//				'type'        => 'text',
//				'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'et_builder' ),
//			),
			'module_id' => array(
				'label'           => esc_html__( 'CSS ID', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'module_class' => array(
				'label'           => esc_html__( 'CSS Class', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'__gallery' => array(
				'type' => 'computed',
				'computed_callback' => array( 'ET_Builder_Module_Gallery', 'get_gallery' ),
				'computed_depends_on' => array(
					'gallery_ids',
					'gallery_orderby',
				),
			),
		);

return $fields;
}

	/**
	 * Get attachment data for gallery module
	 *
	 * @param string comma separated gallery ID
	 * @param string on|off to determine grid / slider layout
	 *
	 * @return string JSON encoded array of attachments data
	 */
	static function get_gallery( $args = array(), $conditional_tags = array(), $current_page = array() ) {
		$attachments = array();

		$defaults = array(
			'gallery_ids'     => array(),
			'gallery_orderby' => '',
			'fullwidth'       => 'on',
		);

		$args = wp_parse_args( $args, $defaults );

		$attachments_args = array(
			'include'        => $args['gallery_ids'],
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'post__in',
		);

		if ( 'rand' === $args['gallery_orderby'] ) {
			$attachments_args['orderby'] = 'rand';
		}

		$width = 1080;
		$width = (int) apply_filters( 'et_pb_gallery_image_width', $width );

		$height = 9999;
		$height = (int) apply_filters( 'et_pb_gallery_image_height', $height );

		$_attachments = get_posts( $attachments_args );

		foreach ( $_attachments as $key => $val ) {
			$attachments[$key] = $_attachments[$key];
			$attachments[$key]->image_src_full  = wp_get_attachment_image_src( $val->ID, 'full' );
			$attachments[$key]->image_src_thumb = wp_get_attachment_image_src( $val->ID, array( $width, $height ) );
			$attachments[$key]->urlTo= get_post_meta($val->ID,'link_to',true);

			if ( et_fb_is_enabled() ) {
				$attachments[$key]->image_src_thumb_fullwidth = wp_get_attachment_image_src( $val->ID, array( 1080, 9999 ) );
				$attachments[$key]->image_src_thumb_grid      = wp_get_attachment_image_src( $val->ID, array( 400, 284 ) );
			}
		}

		return $attachments;
	}

	function shortcode_callback( $atts, $content = null, $function_name ) {
		wp_enqueue_style('slicktheme');
		wp_enqueue_script('slick');
		$module_id              = $this->shortcode_atts['module_id'];
		$module_class           = $this->shortcode_atts['module_class'];
		$gallery_ids            = $this->shortcode_atts['gallery_ids'];
		$fullwidth              = 'on';
		$show_title_and_caption = $this->shortcode_atts['show_title_and_caption'];
		$background_layout      = $this->shortcode_atts['background_layout'];
		$posts_number           = $this->shortcode_atts['posts_number'];
		$show_pagination        = $this->shortcode_atts['show_pagination'];
		$gallery_orderby        = $this->shortcode_atts['gallery_orderby'];
		$zoom_icon_color        = $this->shortcode_atts['zoom_icon_color'];
		$hover_overlay_color    = $this->shortcode_atts['hover_overlay_color'];
		$hover_icon             = $this->shortcode_atts['hover_icon'];
		$auto                   = $this->shortcode_atts['auto'];
		$auto_speed             = $this->shortcode_atts['auto_speed'];

		$accessibility              = $this->shortcode_atts['accessibility'];
		$adaptiveHeight              = $this->shortcode_atts['adaptive_height'];
		$autoplay              = $this->shortcode_atts['autoplay'];
		$autoplaySpeed              = $this->shortcode_atts['auto_play_speed'];
		$arrows              = $this->shortcode_atts['arrows'];
		$prevArrow              = $this->shortcode_atts['prev_arrow'];
		$nextArrow              = $this->shortcode_atts['next_arrow'];
		$centerMode              = $this->shortcode_atts['center_mode'];
		$centerPadding              = $this->shortcode_atts['center_padding'];
		$cssEase              = $this->shortcode_atts['css_ease'];
		$dots              = $this->shortcode_atts['dots'];
		$dotsClass              = $this->shortcode_atts['dots_class'];
		$draggable              = $this->shortcode_atts['draggable'];
		$fade              = $this->shortcode_atts['fade'];
		$easing              = $this->shortcode_atts['easing'];
		$infinite              = $this->shortcode_atts['infinite'];
		$speed              = $this->shortcode_atts['speed'];
		$eaccessibility=($accessibility==='on')?'true':'false';
		$eadaptiveHeight=($adaptiveHeight==='on')?'true':'false';
		$eautoplay=($autoplay==='on')?'true':'false';
		$earrows=($arrows==='on')?'true':'false';
		$ecenterMode=($centerMode==='on')?'true':'false';
		$edots=($dots==='on')?'true':'false';
		$edraggable=($draggable==='on')?'true':'false';
		$efade=($fade==='on')?'true':'false';
		$einfinite=($infinite==='on')?'true':'false';
		$slidesToShowInXL=$this->shortcode_atts['slides_to_show_in_xl'];
		$slidesToShowInLG=$this->shortcode_atts['slides_to_show_in_lg'];
		$slidesToShowInMD=$this->shortcode_atts['slides_to_show_in_md'];
		$slidesToShowInSM=$this->shortcode_atts['slides_to_show_in_sm'];
		$slidesToScrollInXL=$this->shortcode_atts['slides_to_scroll_in_xl'];
		$slidesToScrollInLG=$this->shortcode_atts['slides_to_scroll_in_lg'];
		$slidesToScrollInMD=$this->shortcode_atts['slides_to_scroll_in_md'];
		$slidesToScrollInSM=$this->shortcode_atts['slides_to_scroll_in_sm'];
		$module_class = ET_Builder_Element::add_module_order_class( $module_class, $function_name );
		if ( '' !== $zoom_icon_color ) {
			ET_Builder_Element::set_style( $function_name, array(
				'selector'    => '%%order_class%% .et_overlay:before',
				'declaration' => sprintf(
					'color: %1$s !important;',
					esc_html( $zoom_icon_color )
				),
			) );
		}

		if ( '' !== $hover_overlay_color ) {
			ET_Builder_Element::set_style( $function_name, array(
				'selector'    => '%%order_class%% .et_overlay',
				'declaration' => sprintf(
					'background-color: %1$s;
					border-color: %1$s;',
					esc_html( $hover_overlay_color )
				),
			) );
		}

		// Get gallery item data
		$attachments = self::get_gallery( array(
			'gallery_ids'     => $gallery_ids,
			'gallery_orderby' => $gallery_orderby,
			'fullwidth'       => $fullwidth,

		) );

		if ( empty($attachments) )
			return '';

		wp_enqueue_script( 'hashchange' );

		$fullwidth_class = 'on' === $fullwidth ?  ' et_pb_gallery_fullwidth' : ' et_pb_gallery_grid';
		$background_class = " et_pb_bg_layout_{$background_layout}";

		$module_class .= 'on' === $auto && 'on' === $fullwidth ? ' et_slider_auto et_slider_speed_' . esc_attr( $auto_speed ) : '';

		$output = sprintf(
			'<div%1$s class="et_pb_module et_pb_gallery%2$s%3$s%4$s clearfix">
			<div class="et_pb_gallery_items_slick et_post_gallery_slick" data-per_page="%5$d">',
			( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
			( '' !== $module_class ? sprintf( ' %1$s', esc_attr( ltrim( $module_class ) ) ) : '' ),
			esc_attr( $fullwidth_class ),
			esc_attr( $background_class ),
			esc_attr( $posts_number )
		);

		$i = 0;
		foreach ( $attachments as $id => $attachment ) {

			$data_icon = '' !== $hover_icon
			? sprintf(
				' data-icon="%1$s"',
				esc_attr( et_pb_process_font_icon( $hover_icon ) )
			)
			: '';

			$link=$attachment->urlTo;
			$image_output = sprintf(
				'<a href="%3$s" target="_blank"><img src="%1$s" alt="%2$s" /></a>',
				esc_url( $attachment->image_src_thumb[0] ),
				esc_attr( $attachment->post_title ),
				$link
			);

			$orientation = ( $attachment->image_src_thumb[2] > $attachment->image_src_thumb[1] ) ? 'portrait' : 'landscape';

			$output .= sprintf(
				'<div class="et_pb_gallery_item_slick%2$s%1$s">',
				esc_attr( $background_class ),
				( 'on' !== $fullwidth ? ' et_pb_grid_item_slick' : '' )
			);
			$output .= "
			<div class='et_pb_gallery_image {$orientation}'>
			$image_output
			</div>";

			if ( 'on' !== $fullwidth && 'on' === $show_title_and_caption ) {
				if ( trim($attachment->post_title) ) {
					$output .= "
					<h3 class='et_pb_gallery_title'>
					" . wptexturize($attachment->post_title) . "
					</h3>";
				}
				if ( trim($attachment->post_excerpt) ) {
					$output .= "
					<p class='et_pb_gallery_caption'>
					" . wptexturize($attachment->post_excerpt) . "
					</p>";
				}
			}
			$output .= "</div>";
		}

		$output .= "</div><!-- .et_pb_gallery_items -->";


		if ( 'on' !== $fullwidth && 'on' === $show_pagination ) {
			$output .= "<div class='et_pb_gallery_pagination'></div>";
		}
		$output .= "</div><!-- .et_pb_gallery -->";
		$output .=sprintf('<script>
			jQuery(document).ready(function($){
				$(".%1$s > .et_pb_gallery_items_slick").slick({
					accessibility:%2$s,
					adaptiveHeight:%3$s,
					autoplay:%4$s,
					autoplaySpeed:%5$s,
					arrows:%6$s,
					prevArrow:\'<button type="button" class="slick-prev">Previous</button>\',
					nextArrow:\'<button type="button" class="slick-next">Next</button>\',
					centerMode:%9$s,
					centerPadding:\'%10$s\',
					cssEase:\'%11$s\',
					dots: %12$s,
					dotsClass:\'%13$s\',
					draggable:%14$s,
					fade:%15$s,
					easing:\'%16$s\',
					infinite: %17$s,
					speed: %18$s,
					slidesToShow: %19$s,
					slidesToScroll: %20$s,
					responsive:[
						{
							breakpoint:1024,
							settings:{
								slidesToShow:%21$s,
								slidesToScroll:%22$s,
							}
						},
						{
							breakpoint:600,
							settings:{
								slidesToShow:%23$s,
								slidesToScroll:%24$s,
							}
						},
						{
							breakpoint:480,
							settings:{
								slidesToShow:%25$s,
								slidesToScroll:%26$s,
							}
						}
					]
				});	
			});
			</script>',
			esc_attr( trim($module_class ,' ')),
			$eaccessibility,
			$eadaptiveHeight,
			$eautoplay,
			$autoplaySpeed,
			$earrows,
			$prevArrow,
			$nextArrow,
			$ecenterMode,
			$centerPadding,
			$cssEase,
			$edots,
			$dotsClass,
			$edraggable,
			$efade,
			$easing,
			$einfinite,
			$speed,
			esc_attr( $slidesToShowInXL ),
			esc_attr( $slidesToScrollInXL ),
			esc_attr($slidesToShowInLG),
			esc_attr($slidesToScrollInLG),
			esc_attr($slidesToShowInMD),
			esc_attr($slidesToScrollInMD),
			esc_attr($slidesToShowInSM),
			esc_attr($slidesToScrollInSM)
		);
		return $output;
	}
}
new ET_Divi_Slick_Gallery();
