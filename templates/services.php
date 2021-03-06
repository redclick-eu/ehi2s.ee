<div class=" container services">
    <h2 class="page-header"><?php rc_t('Услуги',1) ?> </h2>
    <div class="row">
        <?php
        $args = [
            'category_name' => 'услуги',
        ];
        $list = new WP_Query($args);
        $projects;
        if ($list->have_posts()) : while ($list->have_posts()) : $list->the_post();
            $projects[get_field('project_place')] =   '
            <div class="col-12 col-lg-4">
                <a href="'. get_permalink()  .'" class="services-item">
                    <div class="services-iconContainer">
                        <img src="" alt="'. get_field('project_logo')['alt'] .'" title="'. get_field('project_logo')['title'] .'" class="services-photo"" data-small="'. get_field('project_logo')['sizes']['thumbnail'] .'" data-large="'. get_field('project_logo')['sizes']['medium'] .'">
                        <div class="services-icon services-icon_'. get_field('project_icon') .'"></div>
                    </div>
                    <h3 class="services-header">'. get_the_title() .'</h3>
                    <p class="services-text">'.  get_field('project_about') .'</p>
                </a>
            </div>
        ';
        endwhile;
        endif;
        wp_reset_postdata();
        echo $projects['left'];
        echo $projects['mid'];
        echo $projects['right'];
        ?>

    </div>
</div>