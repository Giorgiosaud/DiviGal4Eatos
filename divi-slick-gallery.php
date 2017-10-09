<?php
class ET_Divi_Slick_Gallery extends ET_Builder_Module {

	
	function init() {
				$this->name            = esc_html__( 'Slick Gallery', 'divi-slick' );
		$this->slug            = 'et_pb_slick_carousel';
		$this->fb_support      = true;
		$this->fullwidth       = true;
		$this->child_slug      = 'et_pb_slick_gallery_item';
		$this->child_item_text = esc_html__( 'Slick Item', 'divi-slick' );

		$this->whitelisted_fields = array(
			'allow_accessibility',
			'adaptiveHeight',
			'auto_play',
			'show_pagination',
			'auto',
			'auto_speed',
			'auto_ignore_hover',
			'parallax',
			'parallax_method',
			'show_inner_shadow',
			'background_position',
			'background_size',
			'admin_label',
			'module_id',
			'module_class',
			'show_content_on_mobile',
			'show_cta_on_mobile',
			'show_image_video_mobile',
		);

		$this->fields_defaults = array(
			'allow_accessibility'             => array( 'on' ),
			'adaptiveHeight'             => array( 'off' ),
			'show_pagination'         => array( 'on' ),
			'auto'                    => array( 'off' ),
			'auto_speed'              => array( '7000' ),
			'auto_ignore_hover'       => array( 'off' ),
			'parallax'                => array( 'off' ),
			'parallax_method'         => array( 'off' ),
			'show_inner_shadow'       => array( 'on' ),
			'background_position'     => array( 'center' ),
			'background_size'         => array( 'cover' ),
			'show_content_on_mobile'  => array( 'on' ),
			'show_cta_on_mobile'      => array( 'on' ),
			'show_image_video_mobile' => array( 'off' ),
			'text_orientation'        => array( 'center' ),
		);

		$this->main_css_element = '%%order_class%%.et_pb_slider';

		$this->options_toggles = array(
			'general'  => array(
				'toggles' => array(
					'setup'   => esc_html__( 'Setup', 'divi-slick' ),
					'background' => esc_html__( 'Background', 'divi-slick' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'layout'    => esc_html__( 'Layout', 'divi-slick' ),
				),
			),
			'custom_css' => array(
				'toggles' => array(
					'animation' => array(
						'title'    => esc_html__( 'Animation', 'divi-slick' ),
						'priority' => 90,
					),
				),
			),
		);

		$this->advanced_options = array(
			'fonts' => array(
				'header' => array(
					'label'    => esc_html__( 'Header', 'divi-slick' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .et_pb_slide_description .et_pb_slide_title",
						'plugin_main' => "{$this->main_css_element} .et_pb_slide_description .et_pb_slide_title, {$this->main_css_element} .et_pb_slide_description .et_pb_slide_title a",
						'important' => array(
							'color',
							'size',
							'font-size',
							'plugin_all',
						),
					),
				),
				'body'   => array(
					'label'    => esc_html__( 'Body', 'divi-slick' ),
					'css'      => array(
						'main'        => "{$this->main_css_element}.et_pb_module .et_pb_slides .et_pb_slide_content",
						'line_height' => "{$this->main_css_element} p",
						'important' => array( 'size', 'font-size' ),
					),
				),
			),
			'button' => array(
				'button' => array(
					'label' => esc_html__( 'Button', 'divi-slick' ),
					'css' => array(
						'plugin_main' => "{$this->main_css_element} .et_pb_more_button.et_pb_button",
						'alignment' => "{$this->main_css_element} .et_pb_button_wrapper",
					),
					'use_alignment' => true,
				),
			),
			'background' => array(
				'use_background_color'          => 'fields_only',
				'use_background_color_gradient' => 'fields_only',
				'use_background_image'          => 'fields_only',
			),
			'custom_margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'padding'   => '%%order_class%% .et_pb_slide_description, .et_pb_slider_fullwidth_off%%order_class%% .et_pb_slide_description',
					'important' => array( 'custom_margin' ), // needed to overwrite last module margin-bottom styling
				),
			),
			'max_width' => array(),
			'text'      => array(
				'css'   => array(
					'text_orientation' => '%%order_class%% .et_pb_slide .et_pb_slide_description',
				),
			),
		);
		$this->custom_css_options = array(
			'slide_description' => array(
				'label'    => esc_html__( 'Slide Description', 'divi-slick' ),
				'selector' => '.et_pb_slide_description',
			),
			'slide_title' => array(
				'label'    => esc_html__( 'Slide Title', 'divi-slick' ),
				'selector' => '.et_pb_slide_description .et_pb_slide_title',
			),
			'slide_button' => array(
				'label'    => esc_html__( 'Slide Button', 'divi-slick' ),
				'selector' => '.et_pb_slider .et_pb_slide .et_pb_slide_description a.et_pb_more_button.et_pb_button',
				'no_space_before_selector' => true,
			),
			'slide_controllers' => array(
				'label'    => esc_html__( 'Slide Controllers', 'divi-slick' ),
				'selector' => '.et-pb-controllers',
			),
			'slide_active_controller' => array(
				'label'    => esc_html__( 'Slide Active Controller', 'divi-slick' ),
				'selector' => '.et-pb-controllers .et-pb-active-control',
			),
			'slide_image' => array(
				'label'    => esc_html__( 'Slide Image', 'divi-slick' ),
				'selector' => '.et_pb_slide_image',
			),
			'slide_arrows' => array(
				'label'    => esc_html__( 'Slide Arrows', 'divi-slick' ),
				'selector' => '.et-pb-slider-arrows a',
			),
		);
	}

	function get_fields() {
		$fields = array(
			'allow_accessibility' => array(
				'label'           => esc_html__( 'Use Tabs and Arrows', 'divi-slick' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-slick' ),
					'off' => esc_html__( 'No', 'divi-slick' ),
				),
				'toggle_slug'     => 'setup',
				'description'     => esc_html__( 'This setting Allow Movements With Tab And Arrow Keys.', 'divi-slick' ),
			),
			'adaptiveHeight' => array(
				'label'           => esc_html__( 'Adapt the Height', 'divi-slick' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-slick' ),
					'on'  => esc_html__( 'Yes', 'divi-slick' ),
				),
				'toggle_slug'     => 'setup',
				'description'     => esc_html__( 'Enables adaptive height for single slide horizontal carousels.', 'divi-slick' ),
			),
			'auto_play' => array(
				'label'           => esc_html__( 'Auto Play', 'divi-slick' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-slick' ),
					'on'  => esc_html__( 'Yes', 'divi-slick' ),
				),
				'affects'         => array(
					'auto_speed',
				),
				'toggle_slug'     => 'setup',
				'description'     => esc_html__( 'Enables Autoplay', 'divi-slick' ),
			),
			'auto_speed' => array(
				'label'           => esc_html__( 'Auto Play Speed', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'value_type'      => 'float',
				'description'     => esc_html__( "Define a number for the speed in miliscnds", 'et_builder' ),
				'toggle_slug'     => 'setup',
				'depends_default'     => true,
			),
			'auto' => array(
				'label'           => esc_html__( 'Autoplay', 'divi-slick' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-slick' ),
					'off' => esc_html__( 'No', 'divi-slick' ),
				),
				'toggle_slug'     => 'setup',
				'description'     => esc_html__( 'This setting allows you to turn the auto slideon or off.', 'divi-slick' ),
			),
			'auto_ignore_hover' => array(
				'label'           => esc_html__( 'Autoplay', 'divi-slick' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-slick' ),
					'off' => esc_html__( 'No', 'divi-slick' ),
				),
				'toggle_slug'     => 'setup',
				'description'     => esc_html__( 'This setting allows you to turn the auto slideon or off.', 'divi-slick' ),
			),
			
			'show_pagination' => array(
				'label'           => esc_html__( 'Show Controls', 'divi-slick' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-slick' ),
					'off' => esc_html__( 'No', 'divi-slick' ),
				),
				'toggle_slug'     => 'setup',
				'description'     => esc_html__( 'Disabling this option will remove the circle button at the bottom of the slider.', 'divi-slick' ),
			),
			'show_inner_shadow' => array(
				'label'           => esc_html__( 'Show Inner Shadow', 'divi-slick' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-slick' ),
					'off' => esc_html__( 'No', 'divi-slick' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout',
			),
			'show_content_on_mobile' => array(
				'label'           => esc_html__( 'Show Content On Mobile', 'divi-slick' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-slick' ),
					'off' => esc_html__( 'No', 'divi-slick' ),
				),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'visibility',
			),
			'show_cta_on_mobile' => array(
				'label'           => esc_html__( 'Show CTA On Mobile', 'divi-slick' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'divi-slick' ),
					'off' => esc_html__( 'No', 'divi-slick' ),
				),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'visibility',
			),
			'show_image_video_mobile' => array(
				'label'            => esc_html__( 'Show Image / Video On Mobile', 'divi-slick' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'No', 'divi-slick' ),
					'on'  => esc_html__( 'Yes', 'divi-slick' ),
				),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'visibility',
			),
			'disabled_on' => array(
				'label'           => esc_html__( 'Disable on', 'divi-slick' ),
				'type'            => 'multiple_checkboxes',
				'options'         => array(
					'phone'   => esc_html__( 'Phone', 'divi-slick' ),
					'tablet'  => esc_html__( 'Tablet', 'divi-slick' ),
					'desktop' => esc_html__( 'Desktop', 'divi-slick' ),
				),
				'additional_att'  => 'disable_on',
				'option_category' => 'configuration',
				'description'     => esc_html__( 'This will disable the module on selected devices', 'divi-slick' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'visibility',
			),
			'admin_label' => array(
				'label'       => esc_html__( 'Nombre a Mostrar', 'divi-slick' ),
				'type'        => 'text',
				'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'divi-slick' ),
				'toggle_slug' => 'admin_label',
			),
			'module_id' => array(
				'label'           => esc_html__( 'CSS ID', 'divi-slick' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'module_class' => array(
				'label'           => esc_html__( 'CSS Class', 'divi-slick' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),

		);

		return $fields;
	}

	function pre_shortcode_content() {
		global $et_pb_slider_has_video, $et_pb_slider_parallax, $et_pb_slider_parallax_method, $et_pb_slider_show_mobile, $et_pb_slider_custom_icon, $et_pb_slider_item_num, $et_pb_slider_button_rel;

		$et_pb_slider_item_num = 0;

		$parallax        = $this->shortcode_atts['parallax'];
		$parallax_method = $this->shortcode_atts['parallax_method'];
		$show_content_on_mobile  = $this->shortcode_atts['show_content_on_mobile'];
		$show_cta_on_mobile      = $this->shortcode_atts['show_cta_on_mobile'];
		$button_rel              = $this->shortcode_atts['button_rel'];
		$button_custom           = $this->shortcode_atts['custom_button'];
		$custom_icon             = $this->shortcode_atts['button_icon'];

		$et_pb_slider_has_video = false;

		$et_pb_slider_parallax = $parallax;

		$et_pb_slider_parallax_method = $parallax_method;

		$et_pb_slider_show_mobile = array(
			'show_content_on_mobile'  => $show_content_on_mobile,
			'show_cta_on_mobile'      => $show_cta_on_mobile,
		);

		$et_pb_slider_custom_icon = 'on' === $button_custom ? $custom_icon : '';
		$et_pb_slider_button_rel  = $button_rel;

		// Pass Fullwidth Slider Module settings to Slide Item
		global $et_pb_slider;

		$et_pb_slider = array(
			'background_color'                           => $this->shortcode_atts['background_color'],
			'use_background_color_gradient'              => $this->shortcode_atts['use_background_color_gradient'],
			'background_color_gradient_type'             => $this->shortcode_atts['background_color_gradient_type'],
			'background_color_gradient_direction'        => $this->shortcode_atts['background_color_gradient_direction'],
			'background_color_gradient_direction_radial' => $this->shortcode_atts['background_color_gradient_direction_radial'],
			'background_color_gradient_start'            => $this->shortcode_atts['background_color_gradient_start'],
			'background_color_gradient_end'              => $this->shortcode_atts['background_color_gradient_end'],
			'background_color_gradient_start_position'   => $this->shortcode_atts['background_color_gradient_start_position'],
			'background_color_gradient_end_position'     => $this->shortcode_atts['background_color_gradient_end_position'],
			'background_image'                           => $this->shortcode_atts['background_image'],
			'background_size'                            => $this->shortcode_atts['background_size'],
			'background_position'                        => $this->shortcode_atts['background_position'],
			'background_repeat'                          => $this->shortcode_atts['background_repeat'],
			'background_blend'                           => $this->shortcode_atts['background_blend'],
			'parallax'                                   => $this->shortcode_atts['parallax'],
			'parallax_method'                            => $this->shortcode_atts['parallax_method'],
			'background_video_mp4'                       => $this->shortcode_atts['background_video_mp4'],
			'background_video_webm'                      => $this->shortcode_atts['background_video_webm'],
			'background_video_width'                     => $this->shortcode_atts['background_video_width'],
			'background_video_height'                    => $this->shortcode_atts['background_video_height'],
		);
	}

	function shortcode_callback( $atts, $content = null, $function_name ) {

		$module_id               = $this->shortcode_atts['module_id'];
		$module_class            = $this->shortcode_atts['module_class'];
		$allow_accessibility             = $this->shortcode_atts['allow_accessibility'];
		$adaptiveHeight             = $this->shortcode_atts['adaptiveHeight'];
		$show_pagination         = $this->shortcode_atts['show_pagination'];
		$parallax                = $this->shortcode_atts['parallax'];
		$parallax_method         = $this->shortcode_atts['parallax_method'];
		$auto                    = $this->shortcode_atts['auto'];
		$auto_speed              = $this->shortcode_atts['auto_speed'];
		$auto_ignore_hover       = $this->shortcode_atts['auto_ignore_hover'];
		$show_inner_shadow       = $this->shortcode_atts['show_inner_shadow'];
		$show_image_video_mobile = $this->shortcode_atts['show_image_video_mobile'];
		$background_position     = $this->shortcode_atts['background_position'];
		$background_size         = $this->shortcode_atts['background_size'];

		global $et_pb_slider_has_video, $et_pb_slider_parallax, $et_pb_slider_parallax_method, $et_pb_slider_show_mobile, $et_pb_slider_custom_icon, $et_pb_slider;

		$content = $this->shortcode_content;

		$module_class              = ET_Builder_Element::add_module_order_class( $module_class, $function_name );

		if ( '' !== $background_position && 'default' !== $background_position && 'off' === $parallax ) {
			$processed_position = str_replace( '_', ' ', $background_position );

			ET_Builder_Module::set_style( $function_name, array(
				'selector'    => '%%order_class%% .et_pb_slide',
				'declaration' => sprintf(
					'background-position: %1$s;',
					esc_html( $processed_position )
				),
			) );
		}

		if ( '' !== $background_size && 'default' !== $background_size && 'off' === $parallax ) {
			ET_Builder_Module::set_style( $function_name, array(
				'selector'    => '%%order_class%% .et_pb_slide',
				'declaration' => sprintf(
					'-moz-background-size: %1$s;
					-webkit-background-size: %1$s;
					background-size: %1$s;',
					esc_html( $background_size )
				),
			) );
		}

		$fullwidth = 'et_pb_slick_carousel' === $function_name ? 'on' : 'off';

		$class  = '';
		$class .= 'off' === $fullwidth ? ' et_pb_slider_fullwidth_off' : '';
		$class .= 'off' === $allow_accessibility ? ' et_pb_slider_no_arrows' : '';
		$class .= 'off' === $show_pagination ? ' et_pb_slider_no_pagination' : '';
		$class .= 'on' === $parallax ? ' et_pb_slider_parallax' : '';
		$class .= 'on' === $auto ? ' et_slider_auto et_slider_speed_' . esc_attr( $auto_speed ) : '';
		$class .= 'on' === $auto_ignore_hover ? ' et_slider_auto_ignore_hover' : '';
		$class .= 'on' !== $show_inner_shadow ? ' et_pb_slider_no_shadow' : '';
		$class .= 'on' === $show_image_video_mobile ? ' et_pb_slider_show_image' : '';

		$output = sprintf(
			'<div%4$s class="et_pb_module et_pb_slider%1$s%3$s%5$s">
				<div class="et_pb_slides">
					%2$s
				</div> <!-- .et_pb_slides -->
			</div> <!-- .et_pb_slider -->
			',
			$class,
			$content,
			( $et_pb_slider_has_video ? ' et_pb_preload' : '' ),
			( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
			( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
		);

		// Reset passed slider item value
		$et_pb_slider = array();

		return $output;
	}


}
new ET_Divi_Slick_Gallery;