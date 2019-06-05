          /*        echo home_url();
        echo '"><i class="fas fa-home"></i></a>';*/
        if (is_category() || is_single()) {
            echo '<div class="btn btn-default tsk-a">';
            // if (the_cat)
            // the_category('</div><div class="btn btn-default tsk-a"> ');
            $msg = the_category(' ');
            $msg = json_encode($msg);
/*            echo
                    "<div display='none'>
                    <script type='text/javascript'>
                        console.log($msg);
                    </script>
                    </div>";*/
            //console.log('console log message');
            echo '</div>';
/*            if (is_single()) {*/
                /*echo "</li><li class='breadcrumb-item active'>";
                the_title();
                echo '</li>';*/
/*                echo '<a class="btn btn-default" href="';
                echo add_query_arg( $wp->query_vars, home_url( $wp->request ) );
                echo '">';
                echo the_title();
                echo '</a>';
            }*/

        } elseif (is_page()) {
            /*echo '<a class="btn btn-default" href="';
            echo add_query_arg( $wp->query_vars, home_url( $wp->request ) );
            echo '">';
            echo the_title();
            echo '</a>';*/
        }
