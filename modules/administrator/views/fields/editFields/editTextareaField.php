<?php
/**
 * Created by PhpStorm.
 * User: antonglotov
 * Date: 11/04/2020
 * Time: 15:05
 */
if(!defined("adm")) die;
?>


<div class="site-about">

    <div class="i_panel">
        <div class="i_panel_buttons">
            <a class="ac_button" href="">Сохранить</a>
        </div>
    </div>

    <article class="module width_3_quarter myclassModule" id="target">

        <header>
            <h3 class="tabs_involved">Редактирование поля</h3>

        </header>

        <div class="editCat">
            <form method="post" action="/administrator/fields/edit">
                <div>
                    Тип поля
                    <select class="typeField" name="field[type]" type="text">
                        <option selected value="textarea">Текстовая область </option>
                    </select>

                </div>
                <div>Название поля <input name="field[name]" type="text" value="<? echo $field['name']?>"></div>
                <div>Alias поля <input name="field[alias]" type="text" value="<? echo $field['alias']?>"></div>


                <div class="f-fields active f-category" >
                    Категория <input name="field[category]" type="text"  value="<?=$categoryId?>" >
                </div>

                <div class="f-fields active f-required">
                    Обязательное поле
                    <? if( $field['required'] == 'yes'):?>
                        <input value="yes" name="field[required]" type="checkbox" checked>
                    <?else:?>
                        <input value="yes" name="field[required]" type="checkbox" >
                    <? endif;?>
                </div>


                <!-- верификация формы -->
                <input type="hidden" name="FID" value="<?=$FID?>">
                <input type="hidden" name="field[currentAlias]" value="<? echo $field['alias']?>">
                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken()?>">
                <div><input  type="submit" value="Сохранить"></div>

            </form>

            <? //var_dump($field)?> //!! Очень важно, тип поля уже менять нельзя
            проверка
        </div>

    </article>
</div>

<script async type="application/javascript" src="/modules/administrator/views/fields/editFields/fieldEdit.js"></script>