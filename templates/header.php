<header class="p-sm-0 container-fluid header">
    <div class="container d-none d-lg-block">
        <div class="row">
            <div class="col-4 header-bg ">
                <a href="<?= home_url('/'); ?>"><img src="<?= get_template_directory_uri(); ?>/dist/images/logo-white.png" alt="logo" class="header-logo"> </a>
            </div>
            <div class="col-8  header-info">
                <div class="container">
                    <div class="row">
                        <?php $page = new WP_Query(['pagename' => 'mainpage']);
                        $page->the_post();
                        $contactsUrl = get_pages(array(
                            'meta_key' => '_wp_page_template',
                            'meta_value' => 'template-contacts.php'
                        ))[0] -> guid;
                        $contactsUrl = apply_filters( 'wpml_permalink', $contactsUrl , ICL_LANGUAGE_CODE );?>
                        <a href="tel:<?= get_field('i_phone_url');?>" class="col-6 col-xl-3 info-item info-item_phone">
                            <span class="info-text"><?= get_field('i_phone');?></span>
                        </a>
                        <a  href="mailto:<?= get_field('i_mail'); ?>" class="col-6 col-xl-3 info-item info-item_mail">
                            <span class="info-text"><?= get_field('i_mail');?></span>
                        </a>
                        <a href="<?= $contactsUrl ?>" class="col-6 col-xl-5 info-item info-item_adr js-contacts">
                            <span class="info-text"><?= get_field('i_adress');?></span>
                        </a>

                        <a  href="<?= get_field('i_fb'); ?>" target="_blank" class="col-6 col-xl-1 info-item info-item_fb">
                            <span class="d-xl-none">facebook.com</span>
                        </a>
                            <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php get_template_part('templates/navBar'); ?>
        <?php do_action('breadcrumbs'); ?>
    </div>
    <div class="container d-block d-lg-none">
        <div class="row">
            <div class="p-sm-0 col-8  header-bg ">
                <a href="<?= home_url('/'); ?>"><img src="<?= get_template_directory_uri(); ?>/dist/images/logo.png" alt="logo" class="header-logo header-logo_smallMenu"> </a>
            </div>
            <div class="col-2 p-5 d-flex align-items-center">
                <a class="header-btn header-btn_phone" href="<?= get_field('i_phone_url');?>"></a>
            </div>
            <div class="col-2 d-flex p-5 align-items-center">
                <div class="header-btn header-btn_menu" data-toggle="modal" data-target="#navbar_top"></div>
            </div>
        </div>
    </div>
    <?php get_template_part('templates/navBar', 'top'); ?>
</header>
