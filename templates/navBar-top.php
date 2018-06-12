<div class="d-flex d-lg-none header_fullScreen collapse flex-column" id="navbar_top">
    <div class="container">
        <div class="row">
            <div class="col-3 lang">
                <span class="lang-item lang-item_est lang-item_active"> est </span> <span class="lang-item lang-item_slash">/</span> <span class="lang-item lang-item_ru"> ru </span>
            </div>
            <div class="col-9 search">
                <?php get_template_part('templates/search'); ?>
            </div>

        </div>
        <nav class="row">
            <ul class="d-flex flex-column">
                <li><a href="<?= home_url('/'); ?>">Главная</a></li>
                <li><a href="<?= home_url('/'); ?>">Услуги</a></li>
                <ul>
                    <li> <a href="<?= home_url('/'); ?>">Бетонные полы</a></li>
                    <li><a href="<?= home_url('/'); ?>">Фундамент</a></li>
                    <li><a href="<?= home_url('/'); ?>">Общестроительные работы</a></li>
                </ul>
                <li><a href="<?= home_url('/'); ?>">Проекты</a></li>
                <li><a href="<?= home_url('/'); ?>">О нас</a></li>
                <li><a href="<?= home_url('/'); ?>">Контакты</a></li>
            </ul>
        </nav>
    </div>
</div>