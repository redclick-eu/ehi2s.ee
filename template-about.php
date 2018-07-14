<?php
/**
 * Template Name: About us
 */
?>

<div class=" container about">
    <?php get_template_part('templates/pageHeader'); ?>
    <div class="row">
        <?php if (have_rows('about')): while (have_rows('about')) : the_row();
            $photo = get_sub_field('about_photo');
            ?>
            <div class="col-12 col-md-6">
                <img class="about-img" src="<?= $photo['sizes']['large'] ?>" alt="<?= $photo['alt'] ?>" title="<?= $photo['title'] ?>">
            </div>
            <div class="col-12 col-md-6 about-text">
                <?= get_sub_field('about_text') ?>
            </div>
        <?php
        endwhile;endif; ?>
    </div>
</div>

