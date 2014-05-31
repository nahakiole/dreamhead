<?php
function theme_styles()
{
    wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap_main_css', get_template_directory_uri() . '/css/main.css');
}

add_action('wp_enqueue_scripts', 'theme_styles');

function theme_js()
{
    wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_script('color-thief', get_template_directory_uri() . '/js/color-thief.js', array('jquery'), '', true);
    wp_enqueue_script('main_js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'theme_js');
add_theme_support('menus');
function register_theme_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu')
        )
    );
}

add_action('init', 'register_theme_menus');

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }

    return $classes;
}


register_sidebar(
    array(
        'name'          => __('Footer left'),
        'id'            => 'footer-left',
        'description'   => 'Footer left',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>'
    )
);


remove_filter ('the_content', 'wpautop');
add_theme_support( 'post-thumbnails' );

add_action('add_meta_boxes', 'awesome_video_meta');
function awesome_video_meta()
{
    add_meta_box('video_meta', 'Awesome Video', 'awesome_video_url_meta', 'post', 'advanced', 'high');
}

function awesome_video_url_meta($post)
{
    $awesome_video_url = get_post_meta($post->ID, '_awesome_video_url', true);
    ?>
    <textarea name="awesome_video_url" style="width: 100%; min-height: 100px; resize: vertical"/><?php echo esc_attr($awesome_video_url); ?></textarea>
<?php
}

add_action('save_post', 'video_save_project_meta');
function video_save_project_meta($post_ID)
{
    global $post;
        if (isset($_POST)) {
            update_post_meta($post_ID, '_awesome_video_url', strip_tags($_POST['awesome_video_url']));
        }
}


function get_navigation() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /**	Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /**	Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<ul class="pagination pagination-md">' . "\n";

    /**	Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /**	Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li><a class="disabled">…</a></li>';
    }

    /**	Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /**	Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li><a class="disabled">…</a></li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /**	Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

    echo '</ul>' . "\n";

}



add_theme_support('post-formats', array('video', 'gallery', 'audio'));