<?php
/**
 * Template Name: Projects
 */
?>

<div class=" container projects">
    <?php get_template_part('templates/pageHeader'); ?>
    <div class="row">
        <?php
        $args = [
            'category_name'=>'проекты',
        ];
        $list = new WP_Query($args);
        if ($list->have_posts()) : while($list->have_posts()) : $list->the_post(); ?>
            <div class="col-12 col-sm-6 col-md-4 d-inline-flex d-sm-inline-block justify-content-center">
                <a class="projects-item" href="<?php the_permalink() ?>">
                    <img src="<?= get_field('project_logo')['sizes']['thumbnail'] ?>"
                         alt="<?= get_field('project_logo')['alt'] ?>"
                         title="<?= get_field('project_logo')['title'] ?>"  class="projects-img">
                    <div class="projects-placeholder">
                        <h3 class="projects-header"><?= get_the_title()  ?></h3>
                    </div>
                </a>
            </div>
        <?php
        endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>
</div>


