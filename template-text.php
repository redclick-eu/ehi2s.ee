<?php
/**
 * Template Name: Text
 */
?>

<div class="container ">
    <h2 class="page-header"><?php the_title() ?></h2>
    <div class="row">
        <div class="col-12">
            <?php the_post(); the_content() ?>
        </div>
    </div>
</div>
