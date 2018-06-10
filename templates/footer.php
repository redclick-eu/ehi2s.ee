<footer class="container-fluid footer">
    <div class="container">
        <div class="row">
            <div class="col-4 d-none d-xl-block footer-bg ">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/logo.png" alt="logo" class="footer-logo">
            </div>
            <div class="col-12 col-xl-8  footer-info">
                <div class="container">
                    <div class="row justify-content-center">
                        <?php $page = new WP_Query(['pagename' => 'mainpage']);
                        $page->the_post(); ?>
                        <div class="info-item info-item_phone">
                            <span class="info-text"><?= get_field('i_phone'); ?></span>
                        </div>
                        <div class="info-item info-item_mail">
                            <span class="info-text"><?= get_field('i_mail'); ?></span>
                        </div>
                        <div class="info-item info-item_adr">
                            <span class="info-text"><?= get_field('i_adress'); ?></span>
                        </div>
                        <div class="info-item info-item_fb"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <span class="copyright"><?= get_field('i_copyright'); ?></span>
        <?php wp_reset_postdata(); ?>
    </div>
</footer>