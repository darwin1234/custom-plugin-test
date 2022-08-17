<?php


use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class CustomElementorWidget extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'custom-element-widget';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Custom Widget Elementor', 'elementor-hello-world' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'elementor-hello-world' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Post Object', 'elementor-hello-world' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Title Here', 'elementor-hello-world' ),
			]
		);

		$this->add_control(
			'field_1',
			[
				'label' => __( 'ACF Field Slug', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'acf_field', 'elementor-hello-world' ),
				'description' => __( 'This is the "Name" you assigned to your Post Object field in ACF.' ),
			]
		);

		$this->add_control(
			'field_2',
			[
				'label' => __( 'ACF Field Slug', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'acf_field', 'elementor-hello-world' ),
				'description' => __( 'This is the "Name" you assigned to your Post Object field in ACF.' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Post Object', 'elementor-acf-po-li-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		


		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$title = $settings['title'];
		$field_1 = $settings['field_1'];
		$field_2 = $settings['field_2'];
		//Get Field Name
		$field_1  = get_field($field_1);
		if(is_array($field_1)){  $this->repeater_fields($field_1);}
		echo "<h3>" . $field_1 . "</h3>"; 
		$field_2  = get_field($field_2);

		if(is_array($field_2)){ $this->repeater_fields($field_2);}
	
	
	}

	/**
	 * 
	 * 
	 */

	public function repeater_fields($repeater){
		$html =  "";
	
		for($i = 0; $i < count($repeater[0]); $i++){
			if(array_key_exists('text_area', $repeater[0])){
				$html  .= "<p>" . $repeater[$i]['text_area'] . "</p>";
			}
			if(array_key_exists('image', $repeater[0])){
				$imageUrl = $repeater[$i]['image']['url'];
				$html  .= "<img src='$imageUrl'>";
			}
		
		
		}
		print $html;
		

	}
 
	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
		<div class="title">
			{{{ settings.title }}}
		</div>
		<?php
	}
}