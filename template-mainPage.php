<?php
/**
 * Template Name: Main page
 */
?>
<div id="photoCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img src="<?= get_template_directory_uri(); ?>/dist/images/bg/carousel-cement.png" alt="" class="carousel-photo">
        </div>
        <div class="carousel-item ">
            <img src="<?= get_template_directory_uri(); ?>/dist/images/bg/carousel-cement.png" alt="" class="carousel-photo">
        </div>
    </div>
    <a class="carousel-control carousel-control-prev" data-slide="prev"></a>
    <a class="carousel-control carousel-control-next" data-slide="next"></a>
</div>
<?php get_template_part('templates/services'); ?>
<div class="container-fluid  projectCarousel"  >
    <h2 class="page-header  page-header_white">проекты</h2>
    <div  class=" carousel slide container" id="projectCarousel" data-ride="carousel">
        <div class="carousel-controls">
            <a class="carousel-control carousel-control-prev" data-slide="prev" href="#projectCarousel"></a>
            <a class="carousel-control carousel-control-next" data-slide="next" href="#projectCarousel"></a>
        </div>

        <div class="carousel-inner carousel-inner_3" role="listbox">
            <div class="carousel-item  active">
                <img  class="col-4 carousel-img" src="http://placehold.it/350x180?text=1">
                <img  class="col-4 carousel-img" src="http://placehold.it/350x180?text=2">
                <img  class="col-4 carousel-img" src="http://placehold.it/350x180?text=3">
            </div>
            <div class="carousel-item ">
                <img  class="col-4 carousel-img" src="http://placehold.it/350x180?text=4">
                <img  class="col-4 carousel-img" src="http://placehold.it/350x180?text=5">
                <img  class="col-4 carousel-img" src="http://placehold.it/350x180?text=6">
            </div>
        </div>

        <div class="carousel-inner carousel-inner_2" role="listbox">
            <div class="carousel-item  active">
                <img  class="col-6 carousel-img" src="http://placehold.it/350x180?text=1">
                <img  class="col-6 carousel-img" src="http://placehold.it/350x180?text=2">
            </div>
            <div class="carousel-item ">
                <img  class="col-6 carousel-img" src="http://placehold.it/350x180?text=4">
                <img  class="col-6 carousel-img" src="http://placehold.it/350x180?text=5">
            </div>
        </div>

        <div class="carousel-inner carousel-inner_1" role="listbox">
            <div class="carousel-item  active">
                <img  class="col-12 carousel-img" src="http://placehold.it/350x180?text=1">
            </div>
            <div class="carousel-item ">
                <img  class="col-12 carousel-img" src="http://placehold.it/350x180?text=4">
            </div>
        </div>

    </div>
</div>
