<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;
use WP_Query;
/**
 * Add <body> classes
 */
function body_class($classes)
{
    // Add page slug if it doesn't exist
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    // Add class if sidebar is active
    if (Setup\display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    return $classes;
}

add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more()
{
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}

add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/*
 * "Breadcrumbs" for WordPress
 * developer: Dimox
 * version: 2017.01.21
 * license: MIT
*/
function breadcrumbs()
{
    $text['home'] = rc_t('Главная',0);
    $text['category'] = '%s';//rc_t('
    $text['search'] = rc_t('Результаты поиска по запросу',0);
    $text['tag'] = rc_t('Записи с тегом',0).'"%s"';
    $text['author'] = rc_t('Статьи автора',0).'%s';
    $text['404'] = rc_t('Ошибка 404',0);
    $text['page'] = '%s';
    $text['cpage'] = rc_t('Страница комментариев',0).'%s';
    $wrap_before = '<div class="row breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">';
    $wrap_after = '</div>';
    $sep = ' / ';
    $sep_before = '<span class="sep">';
    $sep_after = '</span>';
    $show_home_link = 1;
    $show_on_home = 0;
    $show_current = 1;
    $before = '<span class="current">';
    $after = '</span>';

    global $post;
    $home_url = home_url('/');
    $link_before = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
    $link_after = '</span>';
    $link_attr = ' itemprop="item"';
    $link_in_before = '<span itemprop="name">';
    $link_in_after = '</span>';
    $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
    $frontpage_id = get_option('page_on_front');
    $parent_id = ($post) ? $post->post_parent : '';
    $sep = ' ' . $sep_before . $sep . $sep_after . ' ';
    $home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

    if (is_home() || is_front_page()) {

        if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;
    } else {

        echo $wrap_before;
        if ($show_home_link) echo $home_link;

        if (is_category()) {
            $cat = get_category(get_query_var('cat'), false);
            if ($cat->parent != 0) {
                $cats = get_category_parents($cat->parent, true, $sep);
                $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
                if ($show_home_link) echo $sep;
                echo $cats;
            }
            if (get_query_var('paged')) {
                $cat = $cat->cat_ID;
                echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
            }

        } elseif (is_search()) {
            if (have_posts()) {
                if ($show_home_link && $show_current) echo $sep;
                if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
            } else {
                if ($show_home_link) echo $sep;
                echo $before . sprintf($text['search'], get_search_query()) . $after;
            }

        } elseif (is_day()) {
            if ($show_home_link) echo $sep;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
            echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
            if ($show_current) echo $sep . $before . get_the_time('d') . $after;

        } elseif (is_month()) {
            if ($show_home_link) echo $sep;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
            if ($show_current) echo $sep . $before . get_the_time('F') . $after;

        } elseif (is_year()) {
            if ($show_home_link && $show_current) echo $sep;
            if ($show_current) echo $before . get_the_time('Y') . $after;

        } elseif (is_single() && !is_attachment()) {
            if ($show_home_link) echo $sep;
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($show_current) echo $sep . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, true, $sep);
                if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
                echo $cats;
                if (get_query_var('cpage')) {
                    echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
                } else {
                    if ($show_current) echo $before . get_the_title() . $after;
                }
            }

            // custom post type
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            if (get_query_var('paged')) {
                echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . $post_type->label . $after;
            }

        } elseif (is_attachment()) {
            if ($show_home_link) echo $sep;
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            if ($cat) {
                $cats = get_category_parents($cat, true, $sep);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
                echo $cats;
            }
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current) echo $sep . $before . get_the_title() . $after;

        } elseif (is_page() && !$parent_id) {
            if ($show_current) echo $sep . $before . get_the_title() . $after;

        } elseif (is_page() && $parent_id) {
            if ($show_home_link) echo $sep;
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs) - 1) echo $sep;
                }
            }
            if ($show_current) echo $sep . $before . get_the_title() . $after;

        } elseif (is_tag()) {
            if (get_query_var('paged')) {
                $tag_id = get_queried_object_id();
                $tag = get_tag($tag_id);
                echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
            }

        } elseif (is_author()) {
            global $author;
            $author = get_userdata($author);
            if (get_query_var('paged')) {
                if ($show_home_link) echo $sep;
                echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_home_link && $show_current) echo $sep;
                if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
            }

        } elseif (is_404()) {
            if ($show_home_link && $show_current) echo $sep;
            if ($show_current) echo $before . $text['404'] . $after;

        } elseif (has_post_format() && !is_singular()) {
            if ($show_home_link) echo $sep;
            echo get_post_format_string(get_post_format());
        }

        echo $wrap_after;
    }
}

add_action('breadcrumbs', __NAMESPACE__ . '\\breadcrumbs');

function my_searchwp_live_search_configs($configs)
{
    // override some defaults
    $configs['default'] = array(
        'engine' => 'default',                      // search engine to use (if SearchWP is available)
        'input' => array(
            'delay' => 500,                 // wait 500ms before triggering a search
            'min_chars' => 1,                   // wait for at least 3 characters before triggering a search
        ),
        'results' => array(
            'position' => 'bottom',            // where to position the results (bottom|top)
            'width' => 'auto',              // whether the width should automatically match the input (auto|css)
            'offset' => array(
                'x' => 0,                   // x offset (in pixels)
                'y' => 5                    // y offset (in pixels)
            ),
        ),
        'spinner' => array(                         // powered by http://fgnass.github.io/spin.js/
            'lines' => 10,              // number of lines in the spinner
            'length' => 8,               // length of each line
            'width' => 4,               // line thickness
            'radius' => 8,               // radius of inner circle
            'corners' => 1,               // corner roundness (0..1)
            'rotate' => 0,               // rotation offset
            'direction' => 1,               // 1: clockwise, -1: counterclockwise
            'color' => '#000',          // #rgb or #rrggbb or array of colors
            'speed' => 1,               // rounds per second
            'trail' => 60,              // afterglow percentage
            'shadow' => false,           // whether to render a shadow
            'hwaccel' => false,           // whether to use hardware acceleration
            'className' => 'spinner',       // CSS class assigned to spinner
            'zIndex' => 2000000000,      // z-index of spinner
            'top' => '50%',           // top position (relative to parent)
            'left' => '50%',           // left position (relative to parent)
        ),
    );

    return $configs;
}

add_filter('searchwp_live_search_configs', __NAMESPACE__ . '\\my_searchwp_live_search_configs');

add_action( 'wp_ajax_sendMail',        __NAMESPACE__ . '\\sendMail_callback' ); // For logged in users
add_action( 'wp_ajax_nopriv_sendMail', __NAMESPACE__ . '\\sendMail_callback' ); // For anonymous users

if (isset($_POST['smb'])) {sendMail_callback();}; //Offline start
function sendMail_callback(){
    $page = new WP_Query(['pagename' => 'mainpage']);
    $page->the_post();
    $to =  get_field('i_mail');
    $subject= 'Сообщение '.$_POST['id'].' от '.$_POST['name'];
    $message = '
    <table>     
      <tr>
        <td>Имя</td>
        <td>'.$_POST['name'].'</td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td>'.$_POST['mail'].'</td>
      </tr>
      <tr>
        <td>Телефон</td>
        <td>'.$_POST['phone'].'</td>
      </tr>
       <tr>
        <td>Источник </td>
        <td><a href="'.$_POST['pageUrl'].'">'.$_POST['pageName'].'</a></td>
      </tr>
      <tr>
        <td>Сообщение</td>
        <td>'.$_POST['text'].'</td>
      </tr>
    </table>
    ';
    $headers = "Content-type: text/html; charset=utf-8\r\n";
    $headers .= 'Reply-To: ' . $_POST['mail'] . "\r\n";;
    wp_mail($to, $subject, $message,$headers);
};

add_filter( 'jpeg_quality',  __NAMESPACE__ . 'custom_jpeg_quality', 10, 2 );
function custom_jpeg_quality() {
    return 100;
}