<?php
/**
 * An example file demonstrating how to add all controls.
 *
 * @package Kirki
 * @category Core
 * @author Ari Stathopoulos (@aristath)
 * @copyright Copyright (c) 2019, Ari Stathopoulos (@aristath)
 * @license https://opensource.org/licenses/MIT
 * @since 3.0.12
 */

use Kirki\Util\Helper;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_config(
	'kirki_demo_config',
	[
		'option_type' => 'theme_mod',
		'capability'  => 'manage_options',
	]
);

/**
 * Add a panel.
 *
 * @link https://kirki.org/docs/getting-started/panels.html
 */
new \Kirki\Panel(
	'narasix_panel',
	[
		'priority'    => 10,
		'title'       => esc_html__( 'Narasix Options', 'narasix' ),
		'description' => esc_html__( 'Contains sections for all kirki controls.', 'narasix' ),
	]
);

/**
 * Add Sections.
 *
 * We'll be doing things a bit differently here, just to demonstrate an example.
 * We're going to define 1 section per control-type just to keep things clean and separate.
 *
 * @link https://kirki.org/docs/getting-started/sections.html
 */
$sections = [
	'background'      => [ esc_html__( 'Background', 'narasix' ), '' ],
	'typography'      => [ esc_html__( 'Typography', 'narasix' ), '' ],
	'header'          => [ esc_html__( 'Header', 'narasix' ), '' ],
	'frontpage'       => [ esc_html__( 'Fronpage', 'narasix' ), '' ],
	'postcard'        => [ esc_html__( 'Post Card', 'narasix' ), esc_html__( 'Post Card Meta.', 'narasix' ) ],
	'singlepost'      => [ esc_html__( 'Single Post', 'narasix' ), '' ],
	'footer'      => [ esc_html__( 'Footer', 'narasix' ), '' ],
];

foreach ( $sections as $section_id => $section ) {
	$section_args = [
		'title'       => $section[0],
		'description' => $section[1],
		'panel'       => 'narasix_panel',
	];
	if ( isset( $section[2] ) ) {
		$section_args['type'] = $section[2];
	}
	new \Kirki\Section( str_replace( '-', '_', $section_id ) . '_section', $section_args );
}

/**
 * Background Control.
 */
new \Kirki\Field\Background(
	[
		'settings'    => 'background',
		'label'       => esc_html__( 'Background Control', 'narasix' ),
		'description' => esc_html__( 'Background conrols are pretty complex! (but useful if properly used) download Background image https://narasix.hidunks.com/bg.webp', 'narasix' ),
		'section'     => 'background_section',
		'default'     => [
			'background-color'      => 'rgba(20,20,20,.8)',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
    'transport'   => 'auto',
    'output'      => [
      [
        'element' => 'body',
      ],
    ],
    
	]
);

new \Kirki\Section(
	'narasix_pro',
	[
		'title'       => esc_html__( 'Narasix Pro Themes', 'narasix' ),
		'type'        => 'link',
		'button_text' => esc_html__( 'PRO', 'narasix' ),
		'button_url'  => 'https://narasix.hidunks.com/pro',
    'priority'    => 5,
	]
);

/**
 * Typography Control
 */
new \Kirki\Field\Typography(
	[
		'settings'    => 'kirki_demo_typography_setting_1',
		'label'       => esc_html__( 'Typography Control', 'narasix' ),
		'description' => esc_html__( 'Just the font-family and font-weight.', 'narasix' ),
		'section'     => 'typography_section',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => [
			'font-family' => 'Roboto',
		],
    'choices' => [
      'fonts' => [
        'google'   => [ 'popularity', 50 ],
        'standard' => [
          'Georgia,Times,"Times New Roman",serif',
          'Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
          'Poppins',
        ],
      ],
    ],
		'output'      => [
			[
				'element' => [ 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ],
			],
		],
	]
);

/**
 * Header Control
 */
new \Kirki\Field\Checkbox_Switch(
	[
	  'settings'    => 'narasix_header_sticky',
	  'label'       => esc_html__( 'Sticky', 'narasix' ),
	  'description' => esc_html__( 'Header Sticky or not', 'narasix' ),
	  'section'     => 'header_section',
	  'default'     => 'off',
	  'choices'     => [
		'on'  => esc_html__( 'Enable', 'narasix' ),
		'off' => esc_html__( 'Disable', 'narasix' ),
	  ],
	]
);
/**
 * Icon Dark Mode Control
 */
new \Kirki\Field\Checkbox(
  [
    'settings'    => 'narasix_header_icon_darkmode',
    'label'       => esc_html__( 'Dark Mode Icon', 'narasix' ),
    'section'     => 'header_section',
    'default'     => true,
  ]
);
/**
 * Search icon Control
 */
new \Kirki\Field\Checkbox(
  [
    'settings'    => 'narasix_header_search',
    'label'       => esc_html__( 'Search Icon', 'narasix' ),
    'section'     => 'header_section',
    'default'     => true,
  ]
);
/**
 * Button Control
 */
new \Kirki\Field\Checkbox(
  [
    'settings'    => 'narasix_header_button',
    'label'       => esc_html__( 'Buttton', 'narasix' ),
    'section'     => 'header_section',
    'default'     => true,
  ]
);
/**
 * Button Text Control
 */
new \Kirki\Field\Text(
  [
    'settings' => 'narasix_header_button_text',
    'label'    => esc_html__( 'Text Button', 'narasix' ),
    'section'  => 'header_section',
    'default'  => esc_html__( 'Subscribe', 'narasix' ),
    'priority' => 10,
  ]
);
/**
 * Button url Control
 */
new \Kirki\Field\URL(
  [
    'settings' => 'narasix_header_button_url',
    'label'    => esc_html__( 'URL Control', 'narasix' ),
    'section'  => 'header_section',
    'default'  => 'https://yoururl.com/',
    'priority' => 10,
  ]
);

/// End Header Section

/**
 * Featured Control
 */
new \Kirki\Field\Checkbox_Switch(
  [
    'settings'    => 'narasix_post_featured',
    'label'       => esc_html__( 'Featured', 'narasix' ),
    'description' => esc_html__( 'Show or Hide Featured Section', 'narasix' ),
    'section'     => 'frontpage_section',
    'default'     => 'off',
    'choices'     => [
      'on'  => esc_html__( 'Enable', 'narasix' ),
      'off' => esc_html__( 'Disable', 'narasix' ),
    ],
  ]
);
/**
 * Top Stories
 */
new \Kirki\Field\Checkbox_Switch(
  [
    'settings'    => 'narasix_post_top_stories',
    'label'       => esc_html__( 'Top Stories', 'narasix' ),
    'description' => esc_html__( 'Show or Hide Top Stories Section', 'narasix' ),
    'section'     => 'frontpage_section',
    'default'     => 'off',
    'choices'     => [
      'on'  => esc_html__( 'Enable', 'narasix' ),
      'off' => esc_html__( 'Disable', 'narasix' ),
    ],
  ]
);
new \Kirki\Field\Text(
  [
    'settings' => 'narasix_title_option_section_one',
    'label'    => esc_html__( 'Title', 'narasix' ),
    'section'  => 'frontpage_section',
    'default'  => esc_html__( 'Top Stories', 'narasix' ),
    'priority' => 10,
  ]
);
new \Kirki\Field\Number(
  [
    'settings' => 'narasix_top_stories_show_post_limit',
    'label'    => esc_html__( 'Post Limit', 'narasix' ),
    'section'  => 'frontpage_section',
    'default'  => 6,
    'choices'  => [
      'min'  => -6,
      'max'  => 80,
      'step' => 1,
    ],
  ]
);
new \Kirki\Field\Select(
  [
    'settings'    => 'narasix_top_stories_show_post_order',
    'label'       => esc_html__( 'Post Order', 'narasix' ),
    'section'     => 'frontpage_section',
    'default'     => 'DESC',
    'placeholder' => esc_html__( 'Choose an option', 'narasix' ),
    'choices'     => [
      'DESC'      => esc_html__( 'DESC', 'narasix' ),
      'ASC'       => esc_html__( 'ASC', 'narasix' ),

    ],
  ]
);
new \Kirki\Field\Select(
  [
    'settings'    => 'narasix_top_stories_show_post_orderby',
    'label'       => esc_html__( 'Post Orderby', 'narasix' ),
    'section'     => 'frontpage_section',
    'default'     => 'date',
    'placeholder' => esc_html__( 'Choose an option', 'narasix' ),
    'choices'     => [
      'date'          => esc_html__( 'Data', 'narasix' ),
      'comment_count' => esc_html__( 'Comment', 'narasix' ),
      'rand'          => esc_html__( 'Random', 'narasix' ),

    ],
  ]
);
/**
 * Most Popular
 */
new \Kirki\Field\Checkbox_Switch(
  [
    'settings'    => 'narasix_post_most_popular',
    'label'       => esc_html__( 'Most Popular', 'narasix' ),
    'description' => esc_html__( 'Show or Hide Most Popular Section', 'narasix' ),
    'section'     => 'frontpage_section',
    'default'     => 'off',
    'choices'     => [
      'on'  => esc_html__( 'Enable', 'narasix' ),
      'off' => esc_html__( 'Disable', 'narasix' ),
    ],
  ]
);
new \Kirki\Field\Text(
  [
    'settings' => 'narasix_title_option_section_two',
    'label'    => esc_html__( 'Title', 'narasix' ),
    'section'  => 'frontpage_section',
    'default'  => esc_html__( 'Most Popular', 'narasix' ),
    'priority' => 10,
  ]
);
new \Kirki\Field\Number(
  [
    'settings' => 'narasix_most_popular_show_post_limit',
    'label'    => esc_html__( 'Post Limit', 'narasix' ),
    'section'  => 'frontpage_section',
    'default'  => 6,
    'choices'  => [
      'min'  => -6,
      'max'  => 80,
      'step' => 1,
    ],
  ]
);
new \Kirki\Field\Select(
  [
    'settings'    => 'narasix_most_popular_show_post_order',
    'label'       => esc_html__( 'Post Order', 'narasix' ),
    'section'     => 'frontpage_section',
    'default'     => 'DESC',
    'placeholder' => esc_html__( 'Choose an option', 'narasix' ),
    'choices'     => [
      'DESC'      => esc_html__( 'DESC', 'narasix' ),
      'ASC'       => esc_html__( 'ASC', 'narasix' ),

    ],
  ]
);
new \Kirki\Field\Select(
  [
    'settings'    => 'narasix_most_popular_show_post_orderby',
    'label'       => esc_html__( 'Post Orderby', 'narasix' ),
    'section'     => 'frontpage_section',
    'default'     => 'date',
    'placeholder' => esc_html__( 'Choose an option', 'narasix' ),
    'choices'     => [
      'date'          => esc_html__( 'Data', 'narasix' ),
      'comment_count' => esc_html__( 'Comment', 'narasix' ),
      'rand'          => esc_html__( 'Random', 'narasix' ),

    ],
  ]
);

new \Kirki\Field\Text(
  [
    'settings' => 'narasix_title_option_section_three',
    'label'    => esc_html__( 'Title', 'narasix' ),
    'description' => esc_html__( 'Title Section Recently', 'narasix' ),
    'section'  => 'frontpage_section',
    'default'  => esc_html__( 'Recently', 'narasix' ),
    'priority' => 10,
  ]
);
/// End Frontpage Section

new \Kirki\Field\Checkbox_Switch(
  [
    'settings'    => 'narasix_single_sidebar',
    'label'       => esc_html__( 'Sidebar', 'narasix' ),
    'description' => esc_html__( 'Show or Hide Sidebar', 'narasix' ),
    'section'     => 'singlepost_section',
    'default'     => 'on',
    'choices'     => [
      'on'  => esc_html__( 'Enable', 'narasix' ),
      'off' => esc_html__( 'Disable', 'narasix' ),
    ],
  ]
);

new \Kirki\Field\Checkbox(
  [
    'settings'    => 'narasix_signle_blog_post_author',
    'label'       => esc_html__( 'Author', 'narasix' ),
    'section'     => 'singlepost_section',
    'default'     => true,
  ]
);
new \Kirki\Field\Checkbox(
  [
    'settings'    => 'narasix_single_blog_post_publish_date',
    'label'       => esc_html__( 'Publish Date', 'narasix' ),
    'section'     => 'singlepost_section',
    'default'     => true,
  ]
);
new \Kirki\Field\Checkbox(
  [
    'settings'    => 'narasix_single_blog_post_comment',
    'label'       => esc_html__( 'Comment', 'narasix' ),
    'section'     => 'singlepost_section',
    'default'     => true,
  ]
);
new \Kirki\Field\Checkbox(
  [
    'settings'    => 'narasix_single_blog_post_category',
    'label'       => esc_html__( 'Category', 'narasix' ),
    'section'     => 'singlepost_section',
    'default'     => true,
  ]
);
new \Kirki\Field\Checkbox(
  [
    'settings'    => 'narasix_single_blog_post_tag',
    'label'       => esc_html__( 'Tags', 'narasix' ),
    'section'     => 'singlepost_section',
    'default'     => true,
  ]
);

/// End Single Post Section 

new \Kirki\Field\Checkbox(
  [
    'settings'    => 'narasix_blog_post_author',
    'label'       => esc_html__( 'Author', 'narasix' ),
    'section'     => 'postcard_section',
    'default'     => true,
  ]
);
new \Kirki\Field\Checkbox(
  [
    'settings'    => 'narasix_blog_post_publish_date',
    'label'       => esc_html__( 'Publish Date', 'narasix' ),
    'section'     => 'postcard_section',
    'default'     => true,
  ]
);
new \Kirki\Field\Checkbox(
  [
    'settings'    => 'narasix_blog_post_comment',
    'label'       => esc_html__( 'Comment', 'narasix' ),
    'section'     => 'postcard_section',
    'default'     => true,
  ]
);
new \Kirki\Field\Checkbox(
  [
    'settings'    => 'narasix_blog_post_category',
    'label'       => esc_html__( 'Category', 'narasix' ),
    'section'     => 'postcard_section',
    'default'     => true,
  ]
);

/// 