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
                <h3 class="contacts-header">наши контакты</h3>
                <?php $page = new WP_Query(['pagename' => 'mainpage']);
                $page->the_post();?>
                <p class="contacts-text"><span class="font-weight-bold"><?= get_field('i_name');?></span></p>
                <p class="contacts-text"><span class="font-weight-bold">Адрес: </span><?= get_field('i_adress');?></p>
                <p class="contacts-text"><span class="font-weight-bold">Telefon: </span><?= get_field('i_phone');?></p>
                <p class="contacts-text"><span class="font-weight-bold">E-post: </span><?= get_field('i_mail');?></p>
                <p class="contacts-text"><span class="font-weight-bold">Reg kood: </span><?= get_field('i_rk');?></p>
                <p class="contacts-text"><span class="font-weight-bold">KMKR: </span><?= get_field('i_kmkr');?></p>
                <p class="contacts-text"><span class="font-weight-bold">SWEDBANK: </span><?= get_field('i_swedbank');?></p>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="col-12 col-md-8">
                <form action="" class="container form">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-input" placeholder="Имя*">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-input" placeholder="Телефон*">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-input" placeholder="Email*">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <textarea class="form-textarea" placeholder="Сообщение*"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 offset-8 d-flex justify-content-end">
                            <input type="submit" class="form-submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>








