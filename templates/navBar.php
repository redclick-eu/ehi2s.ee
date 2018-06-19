    <div class="container navBar ">
    <div class="row">
        <nav class="col-7">
            <?php
            wp_nav_menu( array(
                'menu_class'=>'menu',
                'theme_location'=>'primary_navigation',
                'container'       => 'ul',
            ) );
            ?>
        </nav>
        <div class="col-3 search">
            <?php get_template_part('templates/search'); ?>
        </div>
        <div class="col-2 lang">
            <?php get_template_part('templates/lang') ?>
        </div>
    </div>
</div>