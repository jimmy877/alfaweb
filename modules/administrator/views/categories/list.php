<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

?>


<div class="site-about">
    <div class="i_panel">
        <div class="i_panel_search">
            <input type="text" placeholder="Название категории" id="c_search" class="i_search">
            <input id="c_status" class="i_search">
        </div>
        <div class="i_panel_buttons">
            <a class="ac_button" href="">Добавить</a>
        </div>

    </div>
    <article class="module width_3_quarter myclassModule" id="target">
        <header>
            <h3 class="tabs_involved">Категории</h3>
        </header>

        <div id="target" class="list">

            <ul class="list_category">
                <?foreach($categories as $item):?>
                    <li class="list_category_item">
                        <span parentID="<?=$item->id?>" class="open_sub">+</span>
                        <a href="/administrator/categories/edit?id=<?=$item->id?>"><?=$item->title?></a>
                        <div class="list_category_item_info">Путь:<?=$item->path?></div>
                        <div class="sub_cats"></div>

                    </li>
                <?endforeach;?>

            </ul>

        </div>

    </article>


    <article class="module width_3_quarter myclassModule" id="s_result_block">

        <header>
            <h3 class="tabs_involved">Результаты поиска</h3>
        </header>

        <div id="s_result" class="list">
        </div>

    </article>

    <div id="testWebix"></div>






</div>
