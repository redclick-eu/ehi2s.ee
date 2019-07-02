<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
          <div class="alert alert-warning"><?php rc_t('Вы используете <strong>устаревший</strong> браузер. Пожалуйста <a href="http://browser.yandex.ru/">обновите свой браузер</a> для корректного отображения страниц сайта.',1) ?></div>
      </div>
    <![endif]-->
    <?php
    do_action('get_header');
    get_template_part('templates/header');
    ?>
    <main>
        <?php include Wrapper\template_path(); ?>
    </main>
    <?php
    do_action('get_footer');
    get_template_part('templates/footer');
    get_template_part('templates/modals');
    get_template_part('templates/upBtn');
    wp_footer();
    ?>
  </body>
</html>