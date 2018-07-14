<?php
/**
 * Template Name: Main page
 */
?>
<? if (have_rows('slides')): ?>
    <div id="photoCarousel" class="d-none d-lg-block carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">

            <?php $isFirst = true;
            while (have_rows('slides')) : the_row();
                $img = get_sub_field('slides_img'); ?>
                <div class="carousel-item <?= $isFirst ? "active" : "" ?>">
                    <img class="carousel-img" src="<?= $img['sizes']['large'] ?>" alt="<?= $img['alt'] ?>" title="<?= $img['title'] ?>"  style="filter: brightness(<?php the_field('slides-brightness') ?>%);">
                    <div class="container d-flex flex-column">
                        <div class="row">
                            <h2 class="col-12 col-md-11 carousel-header"><?= get_sub_field('slides_header') ?></h2>
                            <p class="col-12 col-md-5  carousel-text"><?= get_sub_field('slides_text') ?></p>
                        </div>
                    </div>
                </div>
                <?php $isFirst = false;
            endwhile;
            ?>
        </div>
        <a class="carousel-control carousel-control-prev" data-slide="prev"></a>
        <a class="carousel-control carousel-control-next" data-slide="next"></a>
    </div>
<?php endif; ?>
<?php get_template_part('templates/services'); ?>
<div class="container-fluid  projectCarousel">
    <h2 class="page-header  page-header_white"><?php rc_t('проекты', 1) ?></h2>
    <div class=" carousel slide container" id="projectCarousel" data-ride="carousel">
        <div class="carousel-controls">
            <a class="carousel-control carousel-control-prev" data-slide="prev" href="#projectCarousel"></a>
            <a class="carousel-control carousel-control-next" data-slide="next" href="#projectCarousel"></a>
        </div>
        <?php
        $args = [
            'category_name' => 'проекты',
        ];
        $list = new WP_Query($args);
        if ($list->have_posts()) : while ($list->have_posts()) : $list->the_post();
            $field = get_field('project_logo');
            $photos[] = [
                'src' => $field['sizes']['large'],
                'alt' => $field['alt'],
                'title' => $field['title'],
                'href' => get_permalink(),
                'pagetitle' => get_the_title()
            ];
        endwhile;endif;
        $maxRows = count($photos); ?>
        <div class="carousel-inner carousel-inner_3" role="listbox">
            <?php for ($i = 0; $i < $maxRows; $i = $i + 3): ?>
                <div class="justify-content-center carousel-item   <?= !$i ? "active" : "" ?>">
                    <a href="<?= $photos[$i]['href'] ?>" class="col-4 carousel-img" data-title="<?= $photos[$i]['pagetitle'] ?>"><img src="<?= $photos[$i]['src'] ?>" alt="<?= $photos[$i]['alt'] ?>" title="<?= $photos[$i]['title'] ?>"></a>
                    <?php if ($photos[$i + 1]): ?><a href="<?= $photos[$i + 1]['href'] ?>"  class="col-4 carousel-img" data-title="<?= $photos[$i + 1]['pagetitle'] ?>"><img src="<?= $photos[$i + 1]['src'] ?>" alt="<?= $photos[$i + 1]['alt'] ?>" title="<?= $photos[$i + 1]['title'] ?>"></a><?php endif; ?>
                    <?php if ($photos[$i + 2]): ?><a href="<?= $photos[$i + 2]['href'] ?>"  class="col-4 carousel-img" data-title="<?= $photos[$i + 2]['pagetitle'] ?>"><img src="<?= $photos[$i + 2]['src'] ?>" alt="<?= $photos[$i + 2]['alt'] ?>" title="<?= $photos[$i + 2]['title'] ?>"></a><?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>

        <div class="carousel-inner carousel-inner_2" role="listbox">
            <?php for ($i = 0; $i < $maxRows; $i = $i + 2): ?>
                <div class="justify-content-center carousel-item   <?= !$i ? "active" : "" ?>">
                    <a href="<?= $photos[$i]['href'] ?>" class="col-6 carousel-img" data-title="<?= $photos[$i]['pagetitle'] ?>"><img src="<?= $photos[$i]['src'] ?>" alt="<?= $photos[$i]['alt'] ?>" title="<?= $photos[$i]['title'] ?>"></a>
                    <?php if ($photos[$i + 1]): ?> <a href="<?= $photos[$i + 1]['href'] ?>" class="col-6 carousel-img" data-title="<?= $photos[$i + 1]['pagetitle'] ?>"><img src="<?= $photos[$i + 1]['src'] ?>" alt="<?= $photos[$i + 1]['alt'] ?>" title="<?= $photos[$i + 1]['title'] ?>"></a><?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>

        <div class="carousel-inner carousel-inner_1" role="listbox">
            <?php for ($i = 0; $i < $maxRows; $i = $i + 1): ?>
                <div class="justify-content-center carousel-item <?= !$i ? "active" : "" ?>" >
                    <a href="<?= $photos[$i]['href'] ?>" class="col-12 carousel-img" data-title="<?= $photos[$i]['pagetitle'] ?>"><img src="<?= $photos[$i]['src'] ?>" alt="<?= $photos[$i]['alt'] ?>" title="<?= $photos[$i]['title'] ?>"></a>
                </div>
            <?php endfor; ?>
        </div>

    </div>
</div>