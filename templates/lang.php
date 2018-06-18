<?php if(ICL_LANGUAGE_CODE === 'ru'):
    $wpml_permalink = apply_filters( 'wpml_permalink', get_the_permalink() , 'est' );?>

<a href="<?= $wpml_permalink?>" class="lang-item lang-item_est lang-item_active"> est </a> <span class="lang-item lang-item_slash">/</span> <span class="lang-item lang-item_ru"> ru </span>
<?php else:
    $wpml_permalink = apply_filters( 'wpml_permalink', get_the_permalink() , 'ru' );?>
<span class="lang-item lang-item_est "> est </span> <span class="lang-item lang-item_slash">/</span> <a href="<?= $wpml_permalink?>" class="lang-item lang-item_ru lang-item_active"> ru </a>
<?php endif; ?>