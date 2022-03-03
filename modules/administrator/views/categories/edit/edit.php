<?php
if(!defined("adm")) die;
/* @var $this yii\web\View */

use yii\helpers\Html;

$info = json_decode($category->metadata);
$photogallery = json_decode($category->photogallery);

?>

<div class="site-about">
    <form method="post" action="" nctype="multipart/form-data">


        <div class="i_panel">
            <div class="i_panel_buttons">
                <a class="ac_button" href="">Сохранить</a>
            </div>

        </div>

        <div class="tabs_menu">
            <a class="tab_item" href="tab_main">Основное</a>
            <a class="tab_item" href="tab_seo">SEO</a>
            <a class="tab_item" href="tab_photo">Фотогалерея</a>
            <a class="tab_item" href="tab_fields">Доп.поля</a>
            <a class="tab_item" href="tab_access">Уровень доступа</a>
            <a class="tab_item" href="tab_information">Информация о категории</a>

        </div>

        <div class="tabs tab_main">

            <article class="module width_3_quarter myclassModule" id="target">
                <header>
                    <h3 class="tabs_involved"><?=$category->title?></h3>
                </header>
                <div class="editCat">
                    <label>
                        Название категории<br/>
                        <input name="page[title]" value="<?=$category->title?>" type="text">
                    </label>
                </div>

                <div class="editCat_hidden">
                    <input name="page[parent_id]" value="<?=$category->parent_id?>" type="hidden">
                </div>

                <div class="editCat">
                    <label>
                        Алиас<br/>
                        <input name="page[alias]" value="<?=$category->alias?>" type="text">
                    </label>
                </div>

                <div class="editCat">
                    <label>
                        Путь<br/>
                        <?=$category->path?>
                    </label>
                </div>

                <div class="editCat">
                    <label>
                        Родительская категория<br/>
                        <select class="select_cat" name="page[parent_page]"> <!-- Пока работает не правильно!!! Не все категории скрывает относитльно редактируемой -->
                            <option value="1">Без категории</option>
                            <?foreach($catTree as $item):?>
                                <?if ($item['level']>$category->level and $item['baseID']==$category->base_id or $item['id']==$category->id):?>
                                    <option disabled value="<?=$item['id']?>"><?=$item['name'].' '.$item['parent_id']?> </option>

                                <?else:?>
                                    <option value="<?=$item['id']?>"><?=$item['name'].' '.$item['parent_id']?></option>
                                <?endif;?>
                            <?endforeach;?>
                        </select>

                    </label>
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken()?>">

                </div>

                <div id="target" class="list">


                </div>

            </article>
        </div>


        <!-- SEO Tab -->

        <? include(Yii::getAlias('@app/modules/administrator/views/categories/edit/seo.php'));?>


        <!-- Photogallery Tab -->

        <? include(Yii::getAlias('@app/modules/administrator/views/categories/edit/photogallery.php'));?>

        <? include(Yii::getAlias('@app/modules/administrator/views/categories/edit/fields.php'));?>

        <div class="tabs tab_access">
            there access
        </div>

        <div class="tabs tab_information">
            there information
        </div>

        <div>
            <input type="submit" value="send">
        </div>


    </form>





</div>
