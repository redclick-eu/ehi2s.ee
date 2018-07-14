<?php
/*
 * Template Name: Post
 * Template Post Type: post, page, product
 */


?>
<div class=" container projectsPost">
    <?php get_template_part('templates/pageHeader'); ?>
    <div class="row">
        <?php if (have_rows('project')): while (have_rows('project')) : the_row();
            $photo = get_sub_field('project_photo');
            ?>
            <div class="col-12 col-md-6 ">
                <img class="projectsPost-img" src="<?= $photo['sizes']['large'] ?>" alt="<?= $photo['alt'] ?>" title="<?= $photo['title'] ?>">
            </div>

            <div class="col-12 col-md-6 projectsPost-text">
                <?= get_sub_field('project_text') ?>
            </div>
        <?php
        endwhile;endif; ?>
    </div>
</div>