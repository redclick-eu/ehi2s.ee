<div class="d-flex d-lg-none header_fullScreen collapse flex-column" id="navbar_top">
    <div class="container">
        <div class="row">
            <div class="col-3 lang">
                <?php get_template_part('templates/lang') ?>
            </div>
            <div class="col-9 search">
                <?php get_template_part('templates/search'); ?>
            </div>

        </div>
        <nav class="row">
            <?php
            wp_nav_menu( array(
                'menu_class'=>'d-flex flex-column',
                'theme_location'=>'primary_navigation',
            ) );
            ?>
        </nav>
    </div>
</div>