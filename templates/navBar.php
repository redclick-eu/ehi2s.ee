    <div class="container navBar ">
    <div class="row">
        <nav class="col-7">
            <ul class="menu">
                <li class="menu-item"><a href="<?= home_url('/'); ?>" class="menu-url">главная</a></li>
                <li class="menu-item"><a href="<?= home_url('/'); ?>" class="menu-url">услуги</a>
                    <ul class="menu menu_sub">
                        <li class="menu_sub-item"><a href="<?= home_url('/'); ?>">бетонные полы</a></li>
                        <li class="menu_sub-item"><a href="<?= home_url('/'); ?>">фундамент</a></li>
                        <li class="menu_sub-item"><a href="<?= home_url('/'); ?>">общестроительные работы</a></li>
                    </ul>
                </li>
                <li class="menu-item"><a href="<?= home_url('/'); ?>" class="menu-url">проекты</a></li>
                <li class="menu-item"><a href="<?= home_url('/'); ?>" class="menu-url">о нас</a></li>
                <li class="menu-item"><a href="<?= home_url('/'); ?>" class="menu-url">контакты</a></li>
            </ul>
        </nav>
        <div class="col-3 search">
            <?php get_template_part('templates/search'); ?>
        </div>
        <div class="col-2 lang">
            <?php get_template_part('templates/lang') ?>
        </div>
    </div>
</div>