<div class="row">
    <div class="col-md-3 col-lg-5">
        <a href="http://rangers.az/">
            <img src="https://internationalfootball.academy/wp-content/themes/fcvacademy/assets/img/fcv-international-football-academy.png">
        </a>
    </div>
    <div class="col-md-9 col-lg-7" id="uppermenu">
        
            <div class="col-xs-12 ">
                <p class="text-right text-danger font-weight-bold">
                    +1223212312312
                </p>
            </div>
        
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-white text-uppercase">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                    $args = array(
                        'theme_location' => 'primary',
                        'container' => 'ul',
                        'container_class' => 'navbar-nav mr-auto font-weight-bold',
                        'container_id' => 'primary-navigation',
                        // 'items_wrap'  => '<ul><li class="nav-link text-dark text-uppercase">%2$s</li>%3$s</ul>',
                        'walker' => new My_Custom_Primary_Nav_Walker
                    );
                    wp_nav_menu( $args );
                ?>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
    </div>
</div>