<?php
/**
 * Bootstrap Pagination
 */

function getlinkColor() {
	$linkColor = get_theme_mod( 'link_color' );
	// var_dump($linkColor);
	switch ($linkColor) {
	    case '#6B757D':
	        $btnColor = 'btn-secondary';
	        break;
	    case '#29A645':
	        $btnColor = 'btn-success';
	        break;
	    case '#DC3545':
	        $btnColor = 'btn-danger';
	        break;
	    case '#FEC105':
	        $btnColor = 'btn-warning';
	        break;
	    case '#17A2B8':
	        $btnColor = 'btn-info';
	        break;
	    case '#F8F9FA':
	        $btnColor = 'btn-light';
	        break;
	    case '#343A40':
	        $btnColor = 'btn-dark';
	        break;
	    default:
	        $btnColor = 'btn-primary';
	}
    //var_dump($btnColor);
    return $btnColor;

}

function tsktwo_posts_link_attributes() {
	$var = 'class="btn ' . getlinkColor() . '"';
    return $var;
}
add_filter('next_posts_link_attributes', 'tsktwo_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'tsktwo_posts_link_attributes');


// instead of below php the css was added via jquery
// $("a[rel=next]").addClass("btn btn-primary");
//  	$("a[rel=prev]").addClass("btn btn-primary");

add_filter('next_post_link', 'tsktwo_post_link_attributes');
add_filter('previous_post_link', 'tsktwo_post_link_attributes');

function tsktwo_post_link_attributes($output) {
    $code = 'class="btn ' . getlinkColor() . '"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}
