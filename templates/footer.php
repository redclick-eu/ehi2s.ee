<footer class="container-fluid footer">
    <div class="container">
        <div class="row">
            <div class="col-4 d-none d-xl-flex align-items-center footer-bg ">
                <a href="<?= home_url('/'); ?>"><img src="<?= get_template_directory_uri(); ?>/dist/images/logo.png" alt="logo" class="footer-logo"></a>
            </div>
            <div class="col-12 col-xl-8  footer-info">
                <div class="container">
                    <div class="row justify-content-center">
                        <?php $page = new WP_Query(['pagename' => 'mainpage']);
                        $page->the_post();
                        $contactsUrl = get_pages(array(
                            'meta_key' => '_wp_page_template',
                            'meta_value' => 'template-contacts.php'
                        ))[0] -> guid;
                        ?>
                        <a  href="tel:<?= get_field('i_phone_url');?>" class="info-item info-item_phone">
                            <span class="info-text"><?= get_field('i_phone'); ?></span>
                        </a>
                        <a href="mailto:<?= get_field('i_mail'); ?>" class="info-item info-item_mail">
                            <span class="info-text"><?= get_field('i_mail'); ?></span>
                        </a>
                        <a href="<?= $contactsUrl ?>" class="info-item info-item_adr js-contacts">
                            <span class="info-text"><?= get_field('i_adress'); ?></span>
                        </a>
                        <a  href="<?= get_field('i_fb'); ?>" target="_blank" class="info-item info-item_fb"><span class="d-lg-none">facebook.com</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <span class="copyright"><?= get_field('i_copyright'); ?></span>
        <?php wp_reset_postdata(); ?>
    </div>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MQGECQW6VB"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MQGECQW6VB');
</script>
</footer>