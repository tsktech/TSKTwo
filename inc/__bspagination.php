<?php
/*
*@title: Bootstrap Pagination for WordPress
*@link: http://extracatchy.net/bootstrap-pagination-wordpress/
*/

function page_navigation($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}

	echo $before.'<div class="pagination"><ul class="clearfix">'."";
	if ($paged > 1) {
		$first_page_text = "«";
		echo '<li class="prev"><a href="'.get_pagenum_link().'" title="First">'.$first_page_text.'</a></li>';
	}

	$prevposts = get_previous_posts_link('← Previous');
	if($prevposts) { echo '<li>' . $prevposts  . '</li>'; }
	else { echo '<li class="disabled"><a href="#">← Previous</a></li>'; }

	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="active"><a href="#">'.$i.'</a></li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li class="">';
	next_posts_link('Next →');
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = "»";
		echo '<li class="next"><a href="'.get_pagenum_link($max_page).'" title="Last">'.$last_page_text.'</a></li>';
	}
	echo '</ul></div>'.$after."";
}
