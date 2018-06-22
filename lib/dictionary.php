<?php

namespace Roots\Sage\Dictionary;

function tr($str, $echo)
{
    $dictionary = array(
        'ru' => 'est',
        'Вы используете <strong>устаревший</strong> браузер. Пожалуйста <a href="http://browser.yandex.ru/">обновите свой браузер</a> для корректного отображения страниц сайта.' => 'Kasutate  <strong>vananenud </strong> brauserit. Palun <a href="http://browser.yandex.ru/"> värskendage oma brauserit</a> et kuvada saidi õiged lehed.',
        'Главная' =>  'Kodulehekülg',
        'Результаты поиска по запросу' => 'Otsingutulemused',
        'Записи с тегом' => 'Märgistatud',
        'Статьи автора' => 'Autor artiklid',
        'Ошибка 404' => 'viga 404',
        'Страница комментариев' => 'Kommentaari lehekülg',
        'проекты' => 'projektid',
        'Страница не найдена' => 'Lehte ei leitud',
        'поиск' => 'otsi',
        'Извините, по Вашему результату ничего не найдено' => 'meie kontaktid',
        'наши контакты' => 'meie kontaktid',
        'Адрес' => 'Aadress',
        'Телефон' => 'Telefoninumber',

    );
    if(ICL_LANGUAGE_CODE === 'et') {
        if(isset($dictionary[$str])) {
            $str = $dictionary[$str];
        } else {
            $str = 'Not such string in array';
        }
    }
    if ($echo) {
        echo $str;
    }
    return $str;
}
// apply_filters('tr',str,boolean)
add_filter('tr', __NAMESPACE__ . '\\tr',10,2);