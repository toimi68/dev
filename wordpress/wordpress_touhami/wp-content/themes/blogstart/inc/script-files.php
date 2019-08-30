<?php
/**
 * Enqueue scripts and styles.
 *
 * @package blogstart
 */

/**
 *
 * Blogstart
 */
function blogstart_scripts() {
	wp_enqueue_style( 'blogstart-style', get_stylesheet_uri(), array(), time(), 'all' );
	wp_enqueue_style( 'droid', 'https://fonts.googleapis.com/css?family=Droid+Serif:400,400i', array(), time(), 'all' );
	wp_enqueue_style( 'playfair', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i', array(), time(), 'all' );

	wp_enqueue_style( 'bootstrap', get_theme_file_uri( 'assets/stylesheets/vendor/resources/bootstrap.css' ), array(), time(), 'all' );

	wp_enqueue_style( 'font-awesome', get_theme_file_uri( 'assets/stylesheets/vendor/resources/font-awesome.css' ), array(), time(), 'all' );
	wp_enqueue_style( 'stellarnav', get_theme_file_uri( 'assets/stylesheets/vendor/resources/stellarnav.css' ), array(), time(), 'all' );
	wp_enqueue_style( 'animate', get_theme_file_uri( 'assets/stylesheets/vendor/resources/animate.css' ), array(), time(), 'all' );
	wp_enqueue_style( 'component', get_theme_file_uri( 'assets/stylesheets/vendor/resources/component.css' ), array(), time(), 'all' );
	wp_enqueue_style( 'owl-carousel', get_theme_file_uri( 'assets/stylesheets/vendor/resources/owl.carousel.css' ), array(), time(), 'all' );
	wp_enqueue_style( 'normalize', get_theme_file_uri( 'assets/stylesheets/vendor/resources/normalize.css' ), array(), time(), 'all' );
	wp_enqueue_style( 'blogstart-main', get_theme_file_uri( '/assets/stylesheets/main.css' ), array(), time(), 'all' );
	$custom_css = '.posted-date{
			background-color: ' . esc_attr(get_theme_mod( 'base_color' )) . ';
		}
		.widget-title:before, .double-line:before, .double-line:after, .bottom-border-twist:after, .card-list .list-group-item:before {
			background-color: ' . esc_attr(get_theme_mod( 'base_color' )) . ';
		}
		.widget_search button, .middle-sidebar .sidebar-widget .news-letter form button[type=submit]{
			background-color: ' . esc_attr(get_theme_mod( 'base_color' )) . ';
		}
		
		.footer.footer-bottom a, .banner-post .big-post .big-post-text a.read-more:hover{
			color: ' . esc_attr(get_theme_mod( 'base_color' )) . ';
		}
		#scrollup, .blog-area .single-blog.quotes-post i, .contact-page-area .contact-info-area .jumbotron li i{
			background-color: ' . esc_attr(get_theme_mod( 'base_color' )) . ';
		}
		.main-header .header-top .icons a i{
			color: ' . esc_attr(get_theme_mod( 'base_color' )) . ';
		}
		mark.catagory, mark.admin, .required_icon a, .popular-post li .post-info span, .middle-sidebar .sidebar-widget ul li a:hover, #cssmenu>ul>li:hover>a, .banner-post .banner-sidebar .sub-post .sub-post-text .read-more:hover, .catagory-area .catagory .read-more:hover, #cssmenu ul ul li:hover>a, #cssmenu ul ul li a:hover, .card-list .card-footer .tags a:hover, nav.blog-pagination li a:hover, .share-icons i:hover, .icon-list i:hover, .footer .footer-top .footer-widget .site-info .icon-list i, .blog-area .single-blog.quotes-post blockquote a{
			color: ' . esc_attr(get_theme_mod( 'base_color' )) . ';
		}
		#scrollup:hover{
		background: #111111 !important
		}
		.popular-post li:hover .post-info h3, .read-more:hover{
			color: ' . esc_attr(get_theme_mod( 'base_color' )) . ' !important;
		}
		.card-list .card-footer, .card-list .card-footer .share-icons{
			border-color: ' . esc_attr(get_theme_mod( 'base_color' )) . ' !important;
		}
		.featured-text mark, .middle-sidebar .sidebar-widget .latest-post.owl-carousel .owl-dots .owl-dot, .middle-content .blog-details-area .comments-area form button.submit{
			background-color: ' . esc_attr(get_theme_mod( 'base_color' )) . ';
		}
		.blog-area .single-blog.quotes-post, blockquote, .banner-post .big-post .big-post-text:before, .commenter-image img, .tagcloud a, .middle-sidebar .sidebar-widget .news-letter form button[type=submit], .middle-sidebar .sidebar-widget .news-letter form input[type=text], .footer .footer-top .footer-widget .site-info .navbar-brand, .middle-content .blog-details-area .author-box img{
			border-color: ' . esc_attr(get_theme_mod( 'base_color' )) . ';
		}
		';
	wp_add_inline_style( 'blogstart-mian', $custom_css );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), '4.1.3', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array( 'jquery' ), '2.3.4', true );
	wp_enqueue_script( 'stellarnav', get_template_directory_uri() . '/assets/js/stellarnav.js', array( 'jquery' ), '2.6.0', true );
	wp_enqueue_script( 'blogstart-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '20151215', true );
	wp_enqueue_script( 'blogstart-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'blogstart-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blogstart_scripts' );
