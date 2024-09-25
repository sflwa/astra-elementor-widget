This is a plugin that was created with the help of ChatGPT

1. Understand Astra and Elementor APIs
Astra Theme: Astra allows custom meta fields on pages (like custom headers, layouts, sidebars, etc.).
Elementor: Elementor has a powerful API for extending its functionality with custom widgets.

2. Explanation of Code:
get_name(): The unique name for the widget (astra_meta_options).
get_title(): The widget's title (Astra Meta Options).
_register_controls(): This is where you add Elementor controls that link to Astra's meta options. We used two options here as an example (disable_header and disable_footer).
render(): When the widget is rendered, it updates the respective post meta (like disabling header or footer).
_content_template(): This is the live editor view in Elementor, allowing you to see real-time changes.

3. Adding More Astra Fields:
You can add more Astra fields by using the same approach in _register_controls and updating the respective Astra meta fields in render().

For example, to control the sidebar layout:

php
Copy code
$this->add_control(
    'sidebar_layout',
    [
        'label' => __( 'Sidebar Layout', 'astra-elementor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'default' => __( 'Default', 'astra-elementor' ),
            'no-sidebar' => __( 'No Sidebar', 'astra-elementor' ),
            'left-sidebar' => __( 'Left Sidebar', 'astra-elementor' ),
            'right-sidebar' => __( 'Right Sidebar', 'astra-elementor' ),
        ],
        'default' => 'default',
    ]
);
In the render() function, update the respective Astra meta field:

php
Copy code
update_post_meta( $post_id, 'astra-sidebar-layout', $settings['sidebar_layout'] );

=====================

Changelog

1.0 - 2024-09-25
* Generated Plugin
* Added Show/Hide for Header, Footer and Title
