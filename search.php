<?php
/*
Template Name: Search Page
*/
?>


<div class=" container searchPage">
    <h2 class="page-header">поиск</h2>
    <div class="row">
        <? if (have_posts()) :
            while (have_posts()) : the_post();
                //if (get_post_type() === 'post'): ?>
                    <div class="col-12 searchPage-line">
                        <a href="<?php the_permalink() ?>" class="searchPage-url"><?= get_the_title() ?></a>
                    </div>
                <?php //endif;
                endwhile; ?>
        <?php
        else :
            echo "Извините по Вашему результату ничего не найдено";
        endif; ?>
    </div>
</div>