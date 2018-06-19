<?php
$l = icl_get_languages('skip_missing=0&orderby=code');
if ($l['ru']['active']) {
    ?><a href="<?= $l['et']['url'] ?>" class="lang-item lang-item_est lang-item_active"> est </a> <span class="lang-item lang-item_slash">/</span> <span class="lang-item lang-item_ru"> ru </span><?php
} else {
    ?><span class="lang-item lang-item_est "> est </span> <span class="lang-item lang-item_slash">/</span> <a href="<?= $l['ru']['url'] ?>" class="lang-item lang-item_ru lang-item_active"> ru </a><?php
}

