<header class="container-fluid header">
    <div class="container d-none d-lg-block">
        <div class="row">
            <div class="col-4 header-bg ">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/logo-white.png" alt="logo" class="header-logo">
            </div>
            <div class="col-8  header-info">
                <div class="container">
                    <div class="row">
                        <?php $page = new WP_Query(['pagename' => 'mainpage']);
                        $page->the_post();?>

                        <div class="col-6 col-xl-3 info-item info-item_phone">
                            <span class="info-text"><?= get_field('i_phone');?></span>
                        </div>
                        <div class="col-6 col-xl-3 info-item info-item_mail">
                            <span class="info-text"><?= get_field('i_mail');?></span>
                        </div>
                        <div class="col-6 col-xl-5 info-item info-item_adr">
                            <span class="info-text"><?= get_field('i_adress');?></span>
                        </div>
                        <?php wp_reset_postdata(); ?>
                        <div class="col-6 col-xl-1 info-item info-item_fb"></div>
                    </div>
                </div>
            </div>

        </div>
        <?php get_template_part('templates/navBar'); ?>
        <?php do_action('breadcrumbs'); ?>
    </div>
    <div class="container d-block d-lg-none">
        <div class="row">
            <div class="col-8  header-bg ">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/logo.png" alt="logo" class="header-logo header-logo_smallMenu">
            </div>
            <div class="col-2 p-5 d-flex align-items-center">
                <a class="header-btn header-btn_phone" href="#"></a>
            </div>
            <div class="col-2 d-flex p-5 align-items-center">
                <div class="header-btn header-btn_menu" data-toggle="modal" data-target="#navbar_top"></div>
            </div>
        </div>
    </div>
    <?php get_template_part('templates/navBar', 'top'); ?>
</header>
