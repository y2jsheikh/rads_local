<?php

function thinkup_toolbox_setup() {

	/**
	 * About page class
	 */
	require_once get_template_directory() . '/admin/main-toolbox/toolbox-class.php';

	/*
	* About page instance
	*/

	// Get theme data
	$theme_data     = wp_get_theme();

	// Get theme name is exists
	try {

		// Get name of parent theme
		if ( is_child_theme() ) {
			$theme_name    = trim( strtolower( str_replace( ' (Lite)', '', $theme_data->parent()->get( 'Name' ) ) ) );
			$theme_slug    = trim( strtolower( str_replace( ' (Lite)', '-lite', $theme_data->parent()->get( 'Name' ) ) ) );
			$theme_version = $theme_data->parent()->get( 'Version' );
		} else {
			$theme_name    = trim( strtolower( str_replace( ' (Lite)', '', $theme_data->get( 'Name' ) ) ) );
			$theme_slug    = trim( strtolower( str_replace( ' (Lite)', '-lite', $theme_data->get( 'Name' ) ) ) );
			$theme_version = $theme_data->get( 'Version' );
		}

	} catch (\Throwable $th) {

		// Exit early on errro
		return;
	}

	$config = array(
		// Menu name under Appearance.
		'menu_name'             => sprintf( __( 'Why %1$s (Free)', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
		// Page title.
		'page_name'             => sprintf( __( 'About %1$s (Free)', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
		// Main welcome title
		'welcome_title'         => sprintf( __( 'Welcome to %1$s!', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
		// Main welcome content
		'welcome_content'       => sprintf( esc_html__(  '%1$s is a free multi-purpose WordPress theme. It\'s fully responsive and perfect for any type of website, it\'s great web agency businesses, corporate websites , personal, blogs, photography and everything in between! Create a stunning homepage with featured homepage sections and a beautiful slideshow in seconds.', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
		/**
		 * Tabs array.
		 *
		 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
		 * the will be the name of the function which will be used to render the tab content.
		 */
		'upgrade'             => array(
			'upgrade_url'     => 'https://www.thinkupthemes.com/themes/' . $theme_name . '/',
			'price_discount'  => __( 'Upgrade for $31 (10% off)', 'thinkup-toolbox' ),
			'price_normal'	  => __( 'Normally $35. Use coupon at checkout.', 'thinkup-toolbox' ),
			'coupon'	      => $theme_name . '31',
			'button'	      => __( 'Upgrade Now', 'thinkup-toolbox' ),
		),
		'tabs'                 => array(
			'page_free_pro' => __( 'Free VS PRO', 'thinkup-toolbox' ),
			'page_start'    => __( 'Get Started', 'thinkup-toolbox' ),
			'page_docs'     => __( 'Documentation', 'thinkup-toolbox' ),
			'page_support'  => __( 'Support', 'thinkup-toolbox' ),
		),
		// Get started tab
		'page_start' => array(
			'first' => array (
				'title'               => esc_html__( 'Setup Slideshow', 'thinkup-toolbox' ),
				'text'                => sprintf( esc_html__( 'Add a slider from Customizer -> Theme Options -> Home and choose Image Slider. Add up to 3 slides quickly!', 'thinkup-toolbox' ) . '<br /><br />' . esc_html__( 'Want more slides? With %1$s Pro you can add as many slides as you want! Plus add video slides and much more!', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label'        => sprintf( esc_html__( 'View %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'         => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'           => false,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			'second' => array(
				'title'               => esc_html__( 'Setup Homepage', 'thinkup-toolbox' ),
				'text'                => sprintf( esc_html__( 'Go to Customizer -> Theme Options -> Homepage (Featured) to start adding content. Add up to 3 sections fast!', 'thinkup-toolbox' ) . '<br /><br />' . esc_html__( 'Want more control? Add unlimited featured sections, change button text, disable cropping & more with %1$s Pro!', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label'        => sprintf( esc_html__( 'View %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'         => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'           => false,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			'third' => array(
				'title'               => esc_html__( 'Go to Customizer', 'thinkup-toolbox' ),
				'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the site in seconds with just a few clicks!', 'thinkup-toolbox' ),
				'button_label'        => esc_html__( 'Go to Customizer', 'thinkup-toolbox' ),
				'button_link'         => esc_url( admin_url( 'customize.php' ) ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			)
		),
		// Documentation tab.
		'page_docs'      => array(
			'intro'  => array (
				'section'      => esc_html__( 'Intro', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'How to find what you\'re looking for.', 'thinkup-toolbox' ),
				'text_main'    => __( '<p>The documentation below will have the same title as the corresponding option in the customizer theme options area.<br />To find what you\'re looking for simply expand the toggle by clicking on it below.</p><p><strong><i>Get Started:</i></strong> You can find all of the theme specific options in the customizer under the Theme Options tab.</p>', 'thinkup-toolbox' ),
				'text_side'    => '',
				'hidden'       => true,
			),
			'101'  => array (
				'section'      => esc_html__( 'General Settings', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'Page Layout', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>This option can be used to add a sidebar to all pages on your site. To add a sidebar:</p><ul><li>Select a left sidebar or sidebar layout.</li><li>Choose the sidebar you want display for the chosen layout.</li><li>Go to Appearance -&gt; Widgets in your admin area to add widgets to the selected sidebar.</li><li><strong>Note:</strong> If no sidebar is selected then the default "Sidebar" will be used.</li></ul><p>This layout will be applied to all pages published on your website. This will not be applied to the homepage or blog posts. To add a sidebar to the homepage or blog posts go to the relevant section.</p>', 'thinkup-toolbox' ),
				'text_side'    => sprintf( __( '<p>Get more with %1$s Pro!</p><ul><li>Create unlimited sidebars.</li><li>Add a different sidebar to different pages.</li><li>Add sidebar layouts to specific pages only.</li><li>Plus much more!</li></ul>', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
				'hidden'           => '',
			),
			'102'  => array (
				'section'      => esc_html__( 'General Settings', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'Enable Fixed Layout', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>By default your website will be responsive. If you would like to disable this simply turn this switch on.</p><p>The responsive trigger widths are:</p><ul><li><span style="width: 50px;display: inline-block;">1140px</span> <span style="width: 15px;display: inline-block;">&#8211;</span> Desktops and laptop screens.</li><li><span style="width: 50px;display: inline-block;">768px</span> <span style="width: 15px;display: inline-block;">&#8211;</span> iPad and tablets.</li><li><span style="width: 50px;display: inline-block;">640px</span> <span style="width: 15px;display: inline-block;">&#8211;</span> Small tablets and larger phones.</li><li><span style="width: 50px;display: inline-block;">560px</span> <span style="width: 15px;display: inline-block;">&#8211;</span> iPhone 5 (Landscape).</li><li><span style="width: 50px;display: inline-block;">480px</span> <span style="width: 15px;display: inline-block;">&#8211;</span> iPhone 4 or before (Landscape).</li><li><span style="width: 50px;display: inline-block;">320px</span> <span style="width: 15px;display: inline-block;">&#8211;</span> iPhone (Portrait).</li></ul>', 'thinkup-toolbox' ),
				'text_side'    => sprintf( __( '<p>Get more with %1$s Pro!</p><p>Create beautiful responsive content without coding. Use our amazing drag & drop page builder and build websites with ease.</p><p>Look great on every device!</p>', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
				'hidden'           => '',
			),
			'103'  => array (
				'section'      => esc_html__( 'General Settings', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'Enable Breadcrumbs', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>Turn on to display site wide breadcrumbs. These are displayed at the top of each page and show the parent pages of the current page being viewed.</p><p>By default a forward slash (/) will be used to separate pages in the breadcrumb. If you prefer to use a different separator you can specify this using the delimiter input field.</p>', 'thinkup-toolbox' ),
				'text_side'    => '',
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => false,
				'is_new_tab'   => true,
				'hidden'           => '',
			),
			'201'  => array (
				'section'      => esc_html__( 'Homepage', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'Homepage Layout', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>This option can be used to add a sidebar to the homepage on your site. To add a sidebar:</p><ul><li>Select a left sidebar or sidebar layout.</li><li>Choose the sidebar you want display for the chosen layout.</li><li>Go to Appearance -&gt; Widgets in your admin area to add widgets to the selected sidebar.</li><li><strong>Note:</strong> If no sidebar is selected then the default "Sidebar" will be used.</li></ul><p>This layout will be applied only to the homepage on your website. This will not be applied to inner pages or blog posts. To add a sidebar to inner pages or blog posts go to the relevant section.</p>', 'thinkup-toolbox' ),
				'text_side'    => sprintf( __( '<p>Get more with %1$s Pro!</p><ul><li>Create unlimited sidebars.</li><li>Add a different sidebar to different pages.</li><li>Add sidebar layouts to specific pages only.</li><li>Plus much more!</li></ul>', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
				'hidden'           => '',
			),
			'202'  => array (
				'section'      => esc_html__( 'Homepage', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'Homepage Slider', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => sprintf( __( '<p>%1$s comes with a image slider which can be used to add slideshow to the top of your homepage.</p><p>To use the image slider:</p><ul><li>Select the <i>"Image Slider"</i> from the Choose Home Slider options.</li><li>Expand the toggle box and select an image from your media library.</li><li>Use the "Title" field to add a main message to your slide.</li><li>Use the <i>"Description"</i> field to add additional information to your slide.</li><li>Use the <i>"URL"</i> field to select a page from your site to link the slide.</li><li>The slider will display a <i>"Read More"</i> button if the <i>"URL"</i> field is set.</li><li>Repeat the above for each additional slide you want to add.</li></ul><p>Don\'t want a slider? To disable the slider entirely simply press the <i>"Disable"</i> option.</p>', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'text_side'    => sprintf( __( '<p>Get more with %1$s Pro!</p><ul><li>Unlimited slides.</li><li>Sliders for inner pages.</li><li>Video sliders.</li><li>Change <i>"Read More"</i> button.</li><li>Image only slides (no button).</li><li>Control transition speed.</li><li>Plus much more!</li></ul>', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
				'hidden'           => '',
			),
			'203'  => array (
				'section'      => esc_html__( 'Homepage', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'Call To Action - Intro', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>Add a call to action message box at the top of content area of the homepage.</p><p>To add the call to action message box do the following:</p><ul><li>Put a tick in the checkbox to enable the message box.</li><li>Add a main message. This will be the header text and wrapped in h3 title tags.</li><li>Add a teaser message to give visitors more information.</li><li>Specify a button message if you want to display a button in the message box.</li><li>Specify whether the button should link to an internal page or external URL.</li><li>If linking to an external URL be sure to add http:// before the URL.</li></ul>', 'thinkup-toolbox' ),
				'text_side'    => '',
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => false,
				'is_new_tab'   => true,
				'hidden'           => '',
			),
			'204'  => array (
				'section'      => esc_html__( 'Homepage', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'Call To Action - Outro', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>Add a call to action message box at the bottom of content area of the homepage.</p><p>To add the call to action message box do the following:</p><ul><li>Put a tick in the checkbox to enable the message box.</li><li>Add a main message. This will be the header text and wrapped in h3 title tags.</li><li>Add a teaser message to give visitors more information.</li><li>Specify a button message if you want to display a button in the message box.</li><li>Specify whether the button should link to an internal page or external URL.</li><li>If linking to an external URL be sure to add http:// before the URL.</li></ul>', 'thinkup-toolbox' ),
				'text_side'    => sprintf( __( '<p>Get more with %1$s Pro!</p><p>Add a call to action to every page of your site, not just the homepage.</p><p>Get your visitors attention on every page!</p>', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
				'hidden'           => '',
			),
			'302'  => array (
				'section'      => esc_html__( 'Homepage (Featured)', 'thinkup-toolbox' ),
				'title'        => __( 'Pre-Made Homepage<span class="hidden">Image</span>', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>Add up to 3 featured sections to your homepage. These display only on the homepage at the top of the content area. These can be used to add an image, title, text and a button to get your visitors attention.</p><p>To add a featured section:</p><ul><li>Go to the <i>"Homepage (Featured)"</i> section in the theme options area.</li><li>Turn on the <i>"Enable Pre-Made Homepage"</i> switch.</li><li>Press the <i>"Select File"</i> button to choose an image from your media library.</li><li>Use the <i>"Title"</i> field to add a main message to your featured section.</li><li>Use the <i>"Description"</i> field to add more information to your featured section.</li><li>Use the <i>"URL"</i> field to select a page from your site to link the section.</li><li>A <i>"Read More"</i> button will show if the <i>"URL"</i> field is set.</li><li>Repeat the above for each additional featured section.</li></ul><p>Don\'t want a featured section? Simply turn the <i>"Enable Pre-Made Homepage"</i> switch off.</p>', 'thinkup-toolbox' ),
				'text_side'    => sprintf( __( '<p>Get more with %1$s Pro!</p><ul><li>Unlimited featured sections.</li><li>Add featured sections to inner pages.</li><li>Disable Image cropping.</li><li>Change "Read More" button.</li><li>Add a link to any url.</li><li>Plus much more!</li></ul>', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
				'hidden'       => '',
			),
			'303'  => array (
				'section'      => esc_html__( 'Homepage (Featured)', 'thinkup-toolbox' ),
				'title'        => __( 'Pre-Made Homepage<span class="hidden">Icon</span>', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>Add up to 3 featured sections to your homepage. These display only on the homepage at the top of the content area. These can be used to add an icon, title, text and a button to get your visitors attention.</p><p>To add a featured section:</p><ul><li>Go to the <i>"Homepage (Featured)"</i> section in the theme options area.</li><li>Turn on the <i>"Enable Pre-Made Homepage"</i> switch.</li><li>Choose an icon from the dropdown list.</li><li>Use the <i>"Title"</i> field to add a main message to your featured section.</li><li>Use the <i>"Description"</i> field to add more information to your featured section.</li><li>Use the <i>"URL"</i> field to select a page from your site to link the section.</li><li>A <i>"Read More"</i> button will show if the <i>"URL"</i> field is set.</li><li>Repeat the above for each additional featured section.</li></ul><p>Don\'t want a featured section? Simply turn the <i>"Enable Pre-Made Homepage"</i> switch off.</p>', 'thinkup-toolbox' ),
				'text_side'    => sprintf( __( '<p>Get more with %1$s Pro!</p><ul><li>Unlimited featured sections.</li><li>Add featured sections to inner pages.</li><li>Change "Read More" button.</li><li>Add a link to any url.</li><li>Plus much more!</li></ul>', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
				'hidden'       => true,
			),
			'401'  => array (
				'section'      => esc_html__( 'Header', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'Enable Search (Pre Header)', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>Turn this on to add a search box to your website. The search box will display at top of your website.</p>', 'thinkup-toolbox' ),
				'text_side'    => '',
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => false,
				'is_new_tab'   => true,
				'hidden'        => '',
			),
			'501'  => array (
				'section'      => esc_html__( 'Footer', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'Footer Widgets Layout', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>Choose from 18 different footer layouts. Simply select the layout you want and save changes.</p><p>When you have chosen a layout please ensure that widgets are assigned to the footer area. To do this:</p><ul><li>Go to Appearance -> Widgets in your admin area.</li><li>Now simply drag and drop the widgets you want to display into each footer area.</li><li>The footer areas are name "<i>Footer Widget Area 1</i>", "<i>Footer Widget Area 2</i>", etc...</li></ul>', 'thinkup-toolbox' ),
				'text_side'    => sprintf( __( '<p>Want your own copyright message?</p><p>That\'s right! With %1$s Pro you can change the footer copyright message in seconds straight from the theme options panel!</p>', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
				'hidden'           => '',
			),
			'502'  => array (
				'section'      => esc_html__( 'Footer', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'Disable Footer Widgets', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>Turn this on if you want to disable the main footer area entirely.</p>', 'thinkup-toolbox' ),
				'text_side'    => sprintf( __( '<p>Want your own copyright message?</p><p>That\'s right! With %1$s Pro you can change the footer copyright message in seconds straight from the theme options panel!</p>', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
				'hidden'           => '',
			),
			'601'  => array (
				'section'      => esc_html__( 'Social Media', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'Social Media', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>Links to your favorite social media sites can be added to the header area in seconds. Plus each link comes with a nice tooltip showing the name of the social media site when the link is hovered over.</p><p>To enable social media links:</p><ul><li>First switch on the Enable Social Media Links (footer) button.</li><li>Add a display message if you choose.</li><li><strong>Tip:</strong> This can be used to get your users attention and might be something like "Follow Us".</li></ul><p>There are 7 different social platforms you can choose to show:</p><ul><li>Facebook</li><li>Twitter</li><li>Google+</li><li>LinkedIn</li><li>Flickr</li><li>YouTube</li><li>RSS</li></ul><p>To display a link to any of these you\'ll first need to switch on the button for the social platform you want to activate and then also add a link to your profile page.</p>', 'thinkup-toolbox' ),
				'text_side'    => sprintf( __( '<p>Want more?</p><p>With %1$s Pro you can add links to all these profiles in just a few clicks:</p><ul><li>Instagram</li><li>Tumblr</li><li>Pinterest</li><li>Xing</li><li>PayPal</li><li>Vimeo</li><li>Email</li></ul><p>There\'s more! You can even add your own custom social media profiles in seconds!</p>', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
				'hidden'       => '',
			),
			'701'  => array (
				'section'      => esc_html__( 'Blog', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'Blog Layout', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>This option can be used to add a sidebar to blog archive pages. To add a sidebar:</p><ul><li>Select a left sidebar or sidebar layout.</li><li>Choose the sidebar you want display for the chosen layout.</li><li>Go to Appearance -&gt; Widgets in your admin area to add widgets to the selected sidebar.</li><li><strong>Note:</strong> If no sidebar is selected then the default "Sidebar" will be used.</li></ul><p>This layout will be applied only to blog archive pages. This will not be applied to inner pages or posts. To add a sidebar to inner pages or posts go to the relevant section.</p>', 'thinkup-toolbox' ),
				'text_side'    => sprintf( __( '<p>Get more with %1$s Pro!</p><ul><li>Create unlimited sidebars.</li><li>Add a different sidebar to different pages.</li><li>Add sidebar layouts to specific pages only.</li><li>Plus much more!</li></ul>', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
				'hidden'           => '',
			),
			'702'  => array (
				'section'      => esc_html__( 'Blog', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'Post Content', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>Choose how much of individual post contents should be displayed.</p><p><strong><i>Show Excerpt:</i></strong></p><ul><li>Choose the Show Excerpt option.</li><li>The first 55 characters fro your posts text will be used.</li></ul><p><strong><i>Show Full Article:</i></strong></p><ul><li>This will show the entire post content on the main blog page.</li><li>This includes all the text, images and anything else that is published on the post.</li><li>Users can manually restrict the amount of content shown by adding the WordPress <more> tag to the post.</li><li>By adding <more> to your posts, only content before this tag will be shown.</li></ul><p><strong><i>Hide Article:</i></strong></p><ul><li>Only the featured image from the post will be displayed</li><li>No text content from the post will be displayed.</li></ul>
				', 'thinkup-toolbox' ),
				'text_side'    => sprintf( __( '<p>Get more with %1$s Pro!</p><ul><li>Create unlimited blog pages.</li><li>Choose your own excerpt length.</li><li>Different layouts for different blogs.</li><li>Plus much more!</li></ul>', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
				'hidden'           => '',
			),
			'703'  => array (
				'section'      => esc_html__( 'Blog', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'Post Layout', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>This option can be used to add a sidebar to blog posts. To add a sidebar:</p><ul><li>Select a left sidebar or sidebar layout.</li><li>Choose the sidebar you want display for the chosen layout.</li><li>Go to Appearance -&gt; Widgets in your admin area to add widgets to the selected sidebar.</li><li><strong>Note:</strong> If no sidebar is selected then the default "Sidebar" will be used.</li></ul><p>This layout will be applied only to blog posts. This will not be applied to inner pages or blog archive pages. To add a sidebar to inner pages or blog archives to the relevant section.</p>', 'thinkup-toolbox' ),
				'text_side'    => sprintf( __( '<p>Get more with %1$s Pro!</p><ul><li>Create unlimited sidebars.</li><li>Add a different sidebar to different pages.</li><li>Add sidebar layouts to specific pages only.</li><li>Plus much more!</li></ul>', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
				'hidden'           => '',
			),
			'704'  => array (
				'section'      => esc_html__( 'Blog', 'thinkup-toolbox' ),
				'title'        => esc_html__( 'Show Author Bio', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text_main'    => __( '<p>Turn this on to add an author bio to posts. This will displayed above the comments section and provides a bit of details about the author of the post. Author details will be picked up from their user profile.</p><p>To change your author details:</p><ul><li>Go to the WordPress admin area and select Users - > All Users.</li><li>Select the username of the profile you want to edit.</li><li>Next put your author details in the Biographical Info box.</li></ul><p>Any description put in here will be picked up and displayed in the author bio field.</p>', 'thinkup-toolbox' ),
				'text_side'    => '',
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => esc_url( 'https://www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button'    => false,
				'is_new_tab'   => true,
				'hidden'           => '',
			),
		),
		// Support content tab.
		'page_support'      => array(
			'first' => array (
				'title'        => esc_html__( 'Free Support', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-sos',
				'text'         => esc_html__( 'Get free support from the amazing volunteers over at the wordpress forums. This support is provided by volunteers not Think Up Themes staff.', 'thinkup-toolbox' ),
				'button_label' => esc_html__( 'Contact Free Support', 'thinkup-toolbox' ),
				'button_link'  => esc_url( '//wordpress.org/support/theme/' . $theme_slug . '/' ),
				'is_button'    => false,
				'is_new_tab'   => true,
			),
			'second' => array(
				'title'        => esc_html__( 'Changelog', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-portfolio',
				'text'         => esc_html__( 'Want to know what\'s been happing with the latest changes? Take a look at the changelog. Your can find this in the themes readme.txt file.', 'thinkup-toolbox' ),
				'button_label' => '',
				'button_link'  => '',
				'is_button'    => false,
				'is_new_tab'   => false,
			),
			'third' => array(
				'title'        => esc_html__( 'Premium Support', 'thinkup-toolbox' ),
				'icon'         => 'dashicons dashicons-book-alt',
				'text'         => sprintf( esc_html__( 'Get support from the brains behind %1$s. Upgrade to %1$s Pro and you\'ll get help straight from the theme developers!', 'thinkup-toolbox' ), ucfirst( $theme_name ) ) . '<br /><br />' . sprintf( esc_html__( 'Get VIP access to the knowledge base, personal ticket support and much more so you can make the most out of %1$s!', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro', 'thinkup-toolbox' ), ucfirst( $theme_name ) ),
				'button_link'  => 'https://www.thinkupthemes.com/themes/' . $theme_name . '/',
				'is_button'    => true,
				'is_new_tab'   => true,
			),
		),
		// Free vs pro array.
		'page_free_pro'                => array(
			'free_theme_name'     => ucfirst( $theme_name ) . ' (free)',
			'pro_theme_name'      => ucfirst( $theme_name ) . ' PRO',
			'pro_theme_link'      => 'https://www.thinkupthemes.com/themes/' . $theme_name . '/',
			'get_pro_theme_label' => sprintf( __( 'Get %s Now!', 'thinkup-toolbox' ), ucfirst( $theme_name ) . ' Pro' ),
			'features'            => array(
				array(
					'title'            => __( 'Mobile Friendly', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Background Image', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Fontpage Sections', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '3',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => 'Unlimited',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Fontpage Slides', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '3',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => 'Unlimited',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Built-In Social Buttons', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => '7',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Unlimited',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Advanced Theme Options', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Page Builder', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Theme Options Panel', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Unlimited Color Options', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( '600+ Google Fonts', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( '150+ Shortcodes', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'ThinkUpSlider', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Unlimited Sliders', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Video Sliders', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Portfolio', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Google Map Section', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Custom Widgets', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Parallax Effects', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Animation Effects', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Extended Layout Options', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Premium Support', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'No credit footer link', 'thinkup-toolbox' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
			),
		),
	);
	thinkup_toolbox_section::init( $config );

}

add_action('after_setup_theme', 'thinkup_toolbox_setup');

?>