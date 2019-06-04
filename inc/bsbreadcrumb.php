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

    if (!is_home()) {
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
        }

        echo '      </div><!-- .btn-group .btn-breadcrumb -->
                </div><!-- .row -->
             </div><!-- .container -->';
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo '<span class="btn btn-default">Archive for '; the_time('F jS, Y'); echo'</span>';}



    elseif (is_month()) {echo"<li class='breadcrumb-item'>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li class='breadcrumb-item'>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li class='breadcrumb-item'>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li class='breadcrumb-item'>Search Results"; echo'</li>';}

}

/*<li><a href="#">Camper Vans</a></li>
          <li><a href="#">1989 VW Westfalia Vanagon</a></li>*/

