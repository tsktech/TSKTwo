<?php
// Do NOT include the opening PHP tag
/**
 * Generate breadcrumbs
 */
function get_breadcrumb() {
/*    echo '<ul class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">Vehicles</a></li>
          <li><a href="#">Vans</a></li>

        </ul>';*/

/*    echo '<div class="container">
            <div class="row">
                <div class="btn-group btn-breadcrumb">
                    <a href="#" class="btn btn-default"><i class="fas fa-home"></i></a>
                    <a href="#" class="btn btn-default">Browse</a>
                    <a href="#" class="btn btn-default">Compare</a>
                    <a href="#" class="btn btn-default">Order</a>
                    <a href="#" class="btn btn-default">Checkout</a>

                </div>
            </div>
        </div>';*/
    global $wp;
    // var_dump(is_author());
    if (!is_home()) {
        // var_dump(is_author());
        echo '<div class="container">
                <div class="row">
                    <div class="btn-group btn-breadcrumb">';
        echo '<span class="btn btn-default">';
        echo '<a href="';
        echo home_url();
        echo '"><i class="fas fa-home"></i></a></span>';
        /*var_dump(the_category('<>', multiple));*/
        if (is_category() || is_single()) {
/*            echo '<div class="btn btn-default tsk-a">';*/
            $catCount = count(get_the_category());
            $categories = get_the_category();
            //var_dump($categories);
            //var_dump($categories[$catCount-1]->name);
            // var_dump(get_the_author_meta('display_name'));
            // $displayCat = 0;
            // var_dump($catCount);
            if ($catCount > 5) {
                $startCnt = $catCount - 5;
            } else {
                $startCnt = 1;
            }
            //var_dump($displayCat);
            for($i = $startCnt; $i <= $catCount; $i++) {
            //for($i = 2012; $i >= 1900; $i--) {
            //
                // echo ($categories[$i-1]->name);
                // var_dump($categories[$i]->name);
                echo '<span class="btn btn-default">
                        <a href="';
                echo  esc_url( get_category_link($categories[$i-1]->term_id ) ) . '">';
                echo  $categories[$i-1]->name . '</a></span>';
            }
        } elseif (is_page()) {
            echo '<span class="btn btn-default">';
            echo '<a href="';
            echo add_query_arg( $wp->query_vars, home_url( $wp->request ) );
            echo '">';
            echo the_title();
            echo '</a></span>';
        } elseif (is_tag()) {
            echo '<span class="btn btn-default"><a href="#">';
            single_tag_title(__( 'Currently Browsing Tags "', 'tsktwo' ));
            echo '"</a></span>';
        } elseif (is_day()) {
            echo '<span class="btn btn-default"><a href="#">Archive for ';
            the_time('F jS, Y');
            echo '</a></span>';
        } elseif (is_month()) {
            echo '<span class="btn btn-default"><a href="#">Archive for ';
            the_time('F, Y');
            echo '</a></span>';
        } elseif (is_year()) {
            echo '<span class="btn btn-default"><a href="#">Archive for ';
            the_time('Y');
            echo '</a></span>';
        } elseif (is_author()) {
            echo '<span class="btn btn-default"><a href="#">This is Archive of ';;
            echo strtoupper(get_the_author_meta('display_name'));
            echo '</a></span>';
        } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
            echo '<span class="btn btn-default"><a href="#">Blog Archives';
            echo '</a></span>';
        } elseif (is_search()) {
            echo '<span class="btn btn-default"><a href="#">Search Results';
            echo '</a></span>';
        }
        echo '      </div><!-- .btn-group .btn-breadcrumb -->
                </div><!-- .row -->
             </div><!-- .container -->';
    }
}

/*<li><a href="#">Camper Vans</a></li>
          <li><a href="#">1989 VW Westfalia Vanagon</a></li>*/

