<?php
/**
 * Template Name: Contacts
 */
?>

<div class=" container-fluid contacts">
    <div class="row">
        <div id="map"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <h3 class="contacts-header"><?php rc_t('наши контакты', 1) ?></h3>
                <?php $page = new WP_Query(['pagename' => 'mainpage']);
                $page->the_post(); ?>
                <p class="contacts-text"><span class="font-weight-bold"><?= get_field('i_name'); ?></span></p>
                <p class="contacts-text"><span class="font-weight-bold"><?php rc_t('Адрес', 1) ?>: </span><?= get_field('i_adress'); ?></p>
                <p class="contacts-text"><span class="font-weight-bold"><?php rc_t('Телефон', 1) ?>: </span><?= get_field('i_phone'); ?></p>
                <p class="contacts-text"><span class="font-weight-bold"><?php rc_t('E-mail', 1) ?>: </span><?= get_field('i_mail'); ?></p>
                <p class="contacts-text"><span class="font-weight-bold">Reg kood: </span><?= get_field('i_rk'); ?></p>
                <p class="contacts-text"><span class="font-weight-bold">KMKR: </span><?= get_field('i_kmkr'); ?></p>
                <p class="contacts-text"><span class="font-weight-bold">SWEDBANK: </span><?= get_field('i_swedbank'); ?></p>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="col-12 col-md-8">
                <form action="" class="container form" id="form">
                    <input type="hidden" value="#<?= str_replace(" ", "", date('Y n d H i')); ?>" name="id">
                    <input type="hidden" value="<?= is_404() ? get_home_url() . "/404" : get_permalink() ?>" name="pageUrl">
                    <input type="hidden" value="<?= get_the_title(); ?>" name="pageName">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <input type="text" name="name" class="form-input js-modal-input" placeholder="<?php rc_t('Имя', 1) ?>*">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <input type="tel" name="phone" class="form-input js-modal-input" placeholder="<?php rc_t('Телефон', 1) ?>*" pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="email" name="mail" class="form-input js-modal-input" placeholder="<?php rc_t('E-mail', 1) ?>*" pattern="^[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}$">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <textarea class="form-textarea js-modal-input" name="text" placeholder="<?php rc_t('Сообщение', 1) ?>*"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 offset-8 d-flex justify-content-end">
                            <input type="submit" name="smb" class="form-submit" value="<?php rc_t('Отправить', 1) ?>">
                        </div>
                    </div>
                </form>
                <div id="form-answer" class=" align-items-center justify-content-center" data-toggle="modal" data-target="#form-answer">
                    Ваше сообщение получено!<br>Мы с Вами свяжемся в ближайшее время.
                </div>
            </div>
        </div>
    </div>
</div>








