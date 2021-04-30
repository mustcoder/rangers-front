<div class="social-menu-bar"> 
    <!-- BREADCRUMB -->
        <!-- <nav aria-label="breadcrumb" class="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">Education</a></li>
            </ol>
        </nav> -->
        <div class="social_menu ">
            <a href="#"><i class="fab fa-facebook fb"></i></a>
            <a href="#"><i class="fab fa-instagram instagram"></i></a>
            <a href="#"><i class="fab fa-google-plus google"></i></a>
            <a href="#"><i class="fab fa-twitter twitter"></i></a>
            <a href="#"><i class="fab fa-youtube twitter"></i></a>
        </div>
        <div class="modal-btn">
            <button data-toggle="modal" data-target="#myModal" class="btn-danger btn float-right">Modal</button>
        </div> 
    </div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">                  
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Test</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>                    
            <!-- Modal body -->
            <div class="modal-body">
                 Modal body..
            </div>                    
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>                    
          </div>
        </div>
    </div>
    <?php
        if (get_field('page_main_title') && get_field('page_main_subtitle')):
    ?>
        <div class="row">
            <div class="header d-flex flex-nowrap">
                <h1><?php the_field('page_main_title') ?></h1>
                <p><?php the_field('page_main_subtitle') ?></p>
            </div>
        </div>
    <?php
        endif;
    ?>