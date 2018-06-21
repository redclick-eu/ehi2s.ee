<?php
/**
 * Template Name: Main page
 */
?>
<? if (have_rows('photos')): ?>
    <div id="photoCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">

            <?php $isFirst = true;
            while (have_rows('photos')) : the_row();
                $subField = get_sub_field('photos_photo'); ?>
                <div class="carousel-item <?= $isFirst ? "active" : "" ?>">
                    <img class="carousel-photo" src="<?= $subField['sizes']['large'] ?>" alt="<?= $subField['alt'] ?>" title="<?= $subField['title'] ?>">
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
    <h2 class="page-header  page-header_white"><?php apply_filters('tr','проекты',1) ?></h2>
    <div class=" carousel slide container" id="projectCarousel" data-ride="carousel">
        <div class="carousel-controls">
            <a class="carousel-control carousel-control-prev" data-slide="prev" href="#projectCarousel"></a>
            <a class="carousel-control carousel-control-next" data-slide="next" href="#projectCarousel"></a>
        </div>
        <? $photos = [];

        if (have_rows('photos_projects')):
            while (have_rows('photos_projects')) : the_row();
                $subField = get_sub_field('photos_photo');
                $photos[] = [
                    'src' => $subField['sizes']['large'],
                    'alt' => $subField['alt'],
                    'title' => $subField['title'],
                ];
            endwhile;endif;
        $maxRows = count($photos); ?>
        <div class="carousel-inner carousel-inner_3" role="listbox">
            <?php for ($i = 0; $i < $maxRows; $i = $i + 3): ?>
                <div class="justify-content-center carousel-item   <?= !$i ? "active" : "" ?>">
                    <img class="col-4 carousel-img" src="<?= $photos[$i]['src'] ?>"  alt="<?= $photos[$i]['alt'] ?>"  title="<?= $photos[$i]['title'] ?>">
                    <?php if ($photos[$i+1]): ?><img class="col-4 carousel-img" src="<?= $photos[$i+1]['src'] ?>"  alt="<?= $photos[$i+1]['alt'] ?>"  title="<?= $photos[$i+1]['title'] ?>"><?php endif; ?>
                    <?php if ($photos[$i+2]): ?><img class="col-4 carousel-img" src="<?= $photos[$i+2]['src'] ?>"  alt="<?= $photos[$i+2]['alt'] ?>"  title="<?= $photos[$i+2]['title'] ?>"><?php endif; ?>
                </div>
                <?php  endfor; ?>
        </div>

        <div class="carousel-inner carousel-inner_2" role="listbox">
            <?php for ($i = 0; $i < $maxRows; $i = $i + 2): ?>
                <div class="justify-content-center carousel-item   <?= !$i ? "active" : "" ?>">
                    <img class="col-6 carousel-img" src="<?= $photos[$i]['src'] ?>"  alt="<?= $photos[$i]['alt'] ?>"  title="<?= $photos[$i]['title'] ?>">
                    <?php if ($photos[$i+1]): ?> <img class="col-6 carousel-img" src="<?= $photos[$i+1]['src'] ?>"  alt="<?= $photos[$i+1]['alt'] ?>"  title="<?= $photos[$i+1]['title'] ?>"><?php endif; ?>
                </div>
                <?php endfor; ?>
        </div>

        <div class="carousel-inner carousel-inner_1" role="listbox">
            <?php for ($i = 0; $i < $maxRows; $i = $i + 1): ?>
                <div class="justify-content-center carousel-item   <?= !$i ? "active" : "" ?>">
                    <img class="col-12 carousel-img" src="<?= $photos[$i]['src'] ?>"  alt="<?= $photos[$i]['alt'] ?>"  title="<?= $photos[$i]['title'] ?>">
                </div>
                <?php  endfor; ?>
        </div>

    </div>
</div>
