<?php
$l = icl_get_languages('skip_missing=0&orderby=code');
if ($l['ru']['active']) {
    ?><a href="<?= $l['et']['url'] ?>" class="lang-item lang-item_est lang-item_active"> eesti </a> <span class="lang-item lang-item_slash">/</span> <span class="lang-item lang-item_ru"> русский </span><?php
} else {
    ?><span class="lang-item lang-item_est "> eesti </span> <span class="lang-item lang-item_slash">/</span> <a href="<?= $l['ru']['url'] ?>" class="lang-item lang-item_ru lang-item_active"> русский </a><?php
}

