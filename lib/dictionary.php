<?php

namespace Roots\Sage\Dictionary;

function tr($num, $echo)
{
    $dictionary = array(
        '0' => array(
            'ru' => 'ru',
            'et' => 'est'
        ),
        '1' => array(
            'ru' => ' Вы используете <strong>устаревший</strong> браузер. Пожалуйста <a href="http://browser.yandex.ru/">обновите свой браузер</a> для корректного отображения страниц сайта.',
            'et' => 'Kasutate  <strong>vananenud </strong> brauserit. Palun <a href="http://browser.yandex.ru/"> värskendage oma brauserit</a> et kuvada saidi õiged lehed.',
        ),
        '2' => array(
            'ru' => 'Главная',
            'et' => 'Kodulehekülg',
        ),
        '3' => array(
            'ru' => 'Результаты поиска по запросу',
            'et' => 'Otsingutulemused',
        ),
        '4' => array(
            'ru' => 'Записи с тегом',
            'et' => 'Märgistatud',
        ),
        '5' => array(
            'ru' => 'Статьи автора',
            'et' => 'Autor artiklid',
        ),
        '6' => array(
            'ru' => 'Ошибка 404',
            'et' => 'viga 404',
        ),
        '7' => array(
            'ru' => 'Страница комментариев',
            'et' => 'Kommentaari lehekülg',
        ),
        '8' => array(
            'ru' => 'Главная',
            'et' => 'Kodulehekülg',
        ),
        '9' => array(
            'ru' => 'Главная',
            'et' => 'Kodulehekülg',
        ),
        '10' => array(
            'ru' => 'Главная',
            'et' => 'Kodulehekülg',
        ),
    );
    if ($echo) {
        echo $dictionary[$num][ICL_LANGUAGE_CODE];
    }
    return $dictionary[$num][ICL_LANGUAGE_CODE];
}

add_filter('tr', __NAMESPACE__ . '\\tr',10,2);