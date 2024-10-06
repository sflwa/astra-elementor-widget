<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Astra_Elementor_Meta_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'astra_meta_options';
    }

    public function get_title() {
        return __( 'Astra Meta Options', 'astra-elementor' );
    }

    public function get_icon() {
        return 'eicon-settings';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'astra_options_section',
            [
                'label' => __( 'Astra Page Options', 'astra-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Add controls for Astra options here. For example:
        $this->add_control(
            'disable_header',
            [
                'label' => __( 'Disable Header', 'astra-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'astra-elementor' ),
                'label_off' => __( 'No', 'astra-elementor' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'disable_footer',
            [
                'label' => __( 'Disable Footer', 'astra-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'astra-elementor' ),
                'label_off' => __( 'No', 'astra-elementor' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'disable_title',
            [
                'label' => __( 'Disable Title', 'astra-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'astra-elementor' ),
                'label_off' => __( 'No', 'astra-elementor' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        
      $this->add_control(
            'container_layout',
           [
                'label' => __( 'Container Layout', 'astra-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
               'options' => [
					'default' => esc_html__( 'Customizer Setting', 'textdomain' ),
					'normal-width-container' => esc_html__( 'Normal', 'textdomain' ),
					'narrow-width-container' => esc_html__( 'Narrow', 'textdomain' ),
                    'full-width-container' => esc_html__( 'Full Width', 'textdomain' ),
				],
				'default' => 'default',
            ]
        );

        $this->add_control(
            'container_style',
           [
                'label' => __( 'Container Style', 'astra-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
               'options' => [
					'default' => esc_html__( 'Customizer Setting', 'textdomain' ),
					'unboxed' => esc_html__( 'Unboxed', 'textdomain' ),
					'boxed' => esc_html__( 'Boxed', 'textdomain' ),
				],
				'default' => 'default',
            ]
        );


        

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Get post meta
        $post_id = get_the_ID();

        // Save Astra meta options for the page
        update_post_meta( $post_id, 'ast-global-header-display', $settings['disable_header'] === 'yes' ? 'disabled' : '' );
        update_post_meta( $post_id, 'astra-footer-display', $settings['disable_footer'] === 'yes' ? 'disabled' : '' );
        update_post_meta( $post_id, 'site-post-title', $settings['disable_title'] === 'yes' ? 'disabled' : '' );
        update_post_meta( $post_id, 'ast-site-content-layout', $settings['ast-site-content-layout'] );
        update_post_meta( $post_id, 'site-content-style', $settings['container_style'] );

        
        // Output content (optional, since we're working with meta fields only)
      //  echo '<div class="astra-meta-options-widget">';
      //  echo __( 'Astra page options have been updated.', 'astra-elementor' );
      //  echo '</div>';
    }

    protected function _content_template() {
        ?>
        <#
        view.addInlineEditingAttributes( 'disable_header', 'none' );
        view.addInlineEditingAttributes( 'disable_footer', 'none' );
        view.addInlineEditingAttributes( 'disable_title', 'none' );
        #>
        <div class="astra-meta-options-widget">
            {{{ settings.disable_header === 'yes' ? '<?php _e( "Header Disabled", "astra-elementor" ); ?>' : '<?php _e( "Header Enabled", "astra-elementor" ); ?>' }}}
            {{{ settings.disable_footer === 'yes' ? '<?php _e( "Footer Disabled", "astra-elementor" ); ?>' : '<?php _e( "Footer Enabled", "astra-elementor" ); ?>' }}}
            {{{ settings.disable_title === 'yes' ? '<?php _e( "Title Disabled", "astra-elementor" ); ?>' : '<?php _e( "Title Enabled", "astra-elementor" ); ?>' }}}
        </div>
        <?php
    }
}
